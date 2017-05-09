<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_Common {

    //public $template = '/pages/user/page';

    public function action_index()
    {
        // Load the user information
        $user = Auth::instance()->get_user();
        // if a user is not logged in, redirect to login page
        if (!$user)
        {
            HTTP::redirect('/user/login');
        }

        if (Auth::instance()->get_user()->emp_applic == 1){

            $content = View::factory('/pages/user/info_resume');
            $list = Model::factory('Resume')->get_user_resume($user->id);

        }elseif (Auth::instance()->get_user()->emp_applic == 2){

            $content = View::factory('/pages/user/info_vacancy');
            $list = Model::factory('Vacancy')->get_user_vacancy($user->id);

        }

        $content->list = $list;
        $content->user = $user;
        $this->template->content = $content;

    }

    public function action_create()
    {

        if (Auth::instance()->logged_in())
        {
            HTTP::redirect('/');
        }

        if (HTTP_Request::POST == $this->request->method())
        { 
            try
            {

                $file = $this->upload($_POST['email']);

                $data = array(
                    'username' => $_POST['username'],
                    'password' => $_POST['password'],
                    'email' => $_POST['email'],
                    'phone' => $_POST['phone'],
                    'role_id'=>1,
                    'img' => $file ?: null,
                    'created' => date('U'),
                    'company_name' => $_POST['company_name'] ?: null,
                    'profession' => $_POST['profession'] ?: null,
                    'residence' => $_POST['residence'] ?: null,
                    'emp_applic' => $_POST['emp_applic'] ?: null,
                    'password_confirm' => $_POST['password'],
                   // 'token' => $token,
                );

                // Create the user using form values
                $user = ORM::factory('User')
                    ->create_user($data, array('username','password','email','phone','role_id','img','created','company_name','profession','residence','emp_applic'));
                // Grant user login role
                $user->add('roles', ORM::factory('Role', array('name' => 'login')));

                // Reset values so form is not sticky
                $_POST = [];

                 Auth::instance()->login($data['email'], $data['password'], true);

                 Session::instance()->set('auth', $user->email);
                 HTTP::redirect('/');
                // Set success message
                //$message = "Логин  '{$user->username}' успешно добавлен в базу.Спасибо за регистрацию!";

            } catch (ORM_Validation_Exception $e)
            {
                // Set failure message
                //$message = 'Возникли ошибки, пожалуйста, исправьте их.';

                // Set errors using custom messages
                $errors = $e->errors('models');
            }
        }

        $content = View::factory('/pages/user/create');

        //$country = Model::factory('User')->country('user_page');
        
        //$content->country = $country;
        $content->errors = $errors;
        
        
        $this->template->content = $content;
          
    }

    public function action_login()
    {
        if (Auth::instance()->logged_in())
        {
            HTTP::redirect('/');
        }

        if (HTTP_Request::POST == $this->request->method())
        {
            // Attempt to login user
            $remember = array_key_exists('remember', $this->request->post()) ? (bool)$this->request->post('remember') : FALSE;

            $user = Auth::instance()->login($this->request->post('email'), $this->request->post('password'), $remember);

            // If successful, redirect user
            if ($user)
            {
                Session::instance()->set('auth', $this->request->post('email'));
                HTTP::redirect('/');
            }
            else
            {
                $message = 'Неверный логин или пароль';
            }
        }
        $this->template->content = View::factory('/pages/user/login')->bind('message', $message);
    }

    public function action_logout()
    {
        
        Auth::instance()->logout();
     // Redirect to login page
        HTTP::redirect('/');
    }

    /**
     * A basic implementation of the "Forgot password" functionality
     */
    public function action_forgot()
    {
        $message = '';

        if (isset($_POST['reset_email']))
        {
            $user = ORM::factory('User')->where('email', '=', $_POST['reset_email'])->find();

            // admin passwords cannot be reset by email
            if (is_numeric($user->id) && ($user->username != 'admin'))
            {
                // send an email with the account reset token
                $user->reset_token = $user->generate_password(32);
                $user->save();

                $message = "Вы сделали запрос на восстановление пароля. Вы можете получить новый пароль по этой ссылке:\n\n" .
                            ":reset_token_link\n\n" . "Если ссылка не кликабельна, пожалуйста, перейдите на следующую страницу:\n" .
                            ":reset_link\n\n" . "и введите эти данные: Reset Token: :reset_token\nВаш логин: :username\n";
               // $mailer = Email::connect();
                // Create complex Swift_Message object stored in $message
           
                $subject = __('Account password reset');
                $to = $_POST['reset_email'];
                $from = 'noreply@jobseor.com';
                $body = __($message, array(':reset_token_link' => URL::site('user/reset?reset_token=' . $user->reset_token . '&reset_email=' . $_POST['reset_email'], TRUE), ':reset_link' => URL::site('user/reset', TRUE), ':reset_token' => $user->reset_token, ':username' => $user->username));
               
               // $message_swift = Swift_Message::newInstance($subject, $body)->setFrom($from)->setTo($to);
                $message_swift = Email::send('support', $subject, $body, $from, $to);
                if ($message_swift)
                {
                    $message = 'Письмо для измененения пароля отправлено на ваш email.';
                }
                else
                {
                    $message = 'Could not send email.';
                }
            }
            else
            {
                if ($user->username == 'admin')
                {
                    $message = 'Admin account password cannot be reset via email.';
                }
                else
                {
                    $message = 'User account could not be found.';
                }
            }
        }

        $this->template->content = View::factory('/pages/user/forgot')->bind('message', $message);
    }

    /**
     * A basic version of "reset password" functionality.
     */
    public function action_reset()
    {
        if (isset($_REQUEST['reset_token']) && isset($_REQUEST['reset_email']))
        {
            // make sure that the reset_token has exactly 32 characters (not doing that would allow resets with token length 0)
            if ((strlen($_REQUEST['reset_token']) == 32) && (strlen(trim($_REQUEST['reset_email'])) > 1))
            {
                $user = ORM::factory('User')->where('email', '=', $_REQUEST['reset_email'])->and_where('reset_token', '=', $_REQUEST['reset_token'])->find();

                if (is_numeric($user->id) && ($user->reset_token == $_REQUEST['reset_token']))
                {
                    $password = $user->generate_password();
                    $user->password = $password;

                    $user->save();

                    $message = "Ваш новый пароль:\n\n" . ":password\n\n" . "Вы можете войти здесь: " . ":link\n\n";

                  //  $mailer = Email::connect();
                    // Create complex Swift_Message object stored in $message
                    // MUST PASS ALL PARAMS AS REFS
                    $subject = __('Account password reset');
                    $to = $_REQUEST['reset_email'];
                    $from = 'noreply@jobseor.com';
                    $body = __($message, array(':link' => URL::site('user/login', TRUE), ':password' => $password));

                    // FIXME: Test if Swift_Message has been found.
                   // $message_swift = Swift_Message::newInstance($subject, $body)->setFrom($from)->setTo($to);
                    $message_swift = Email::send('support', $subject, $body, $from, $to);
                    if ($message_swift)
                    {
                        $message = 'Ваш пароль был успешно изменен и отправлен на ваш email';
                    }
                    else
                    {
                        $message = 'Could not send email.';
                    }
                }
            }
        }

        $this->template->content = View::factory('/pages/user/reset')->bind('message', $message);
    }

    public function action_approved()
    {
        $token = $this->request->query('token');
        if($token){
            // ищем пользователя с нужным токеном
            $user = ORM::factory('User')->where('token', '=', $token)->find();
            if($user->get('id')){

                // добавляем пользователю роль login, чтобы он мог авторизоваться
                $user->add('roles',ORM::factory('Role',array('name'=>'login')));

                // Чистим поле с токеном
                $user->update_user(array('token'=>null), array('token'));

                // Можно сразу и авторизовать и перенаправить ЛК
                Auth::instance()->force_login($user->get('username'));
                $this->redirect("/users/login");

                // Или переадресовать на форму входа для ввода логина и пароль
                //$this->redirect("/users/login");
            }
        }

        // Делаем редирект на страницу авторизации
        $this->redirect("/users/login");
    }

    public function upload($name) {
        $files = [];
        $config = [];

        include_once('Upload.php');

        $this->upload = new Upload();

        $config['upload_path'] = './media/users/'.$name;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['encrypt_name'] = true;
        $config['max_size'] = 1500;

        if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, true);

        $this->upload->initialize($config);


        foreach ($_FILES as $key => $value) {
            if (!$this->upload->do_upload($key)) {
               // echo ($this->upload->display_errors());

            } else {
                $result = ['upload_data' => $this->upload->data()];
                $files[$key] .= $result['upload_data']['file_name'];
            }
        }


        return $files;
    }

}