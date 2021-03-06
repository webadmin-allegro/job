<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_User extends Controller {

    public $template ='admin_site/home';

    public function action_login()
    {
		if (Auth::instance()->logged_in())
        {
            HTTP::redirect('/admin_site/main/index');

		}
		
        if (HTTP_Request::POST == $this->request->method())
        {
            // Attempt to login user
            $remember = true;
            $user = Auth::instance()->login($this->request->post('username'), $this->request->post('password'), $remember);
        
            // If successful, redirect user
            if ($user)
            {
                HTTP::redirect('/admin_site/main/index');
            }
            else
            {
                $message = 'Не правильный логин или пароль';
				View::bind_global('message', $message);
            }
        }

        echo View::factory('admin_site/reg');
    }

    public function action_reset()
    {
        $auth = Auth::instance();

        if ($_POST)
        {

       // $id = $this->request->param('id');
                $user = ORM::factory('User',1);

                $data = Arr::extract($_POST, array('passS', 'passN'));


            if ($auth->hash($data['passS']) == $auth->password('admin'))

            {
                $password = trim($data['passN']);

                  $user->password = $password;
                  $user->save();

                HTTP::redirect('/admin_site/main/index');

            }

            else
            {
                exit("<h2 align='center' >Не верный старый пароль</h2><br>
                <form><div align='center'><input type='button' value='�����' onClick='history.go(-1)'></div></form>");


            }


        }
        else
        {
            exit ("<h2 align='cenrer'>Couldn't load user</h2>");
        }

    }


    

    public function action_logout()
    {
        // Log user out

        Auth::instance()->logout();

     //   Cookie::delete('cookie_name');

        // Redirect to login page
        HTTP::redirect('/');
    }
	 
	
}