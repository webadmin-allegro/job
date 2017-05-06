<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Admin_Main extends Controller_Common {
    
	 
	 public $template ='admin_site/home';
    // Главная страница


    public static function ckeditor($name, $value = '', $height = '260', $width = '98%')
    {
        $url_base = URL::base();

        include_once(DOCROOT.'media/assets/vendors/ckeditor/ckeditor.php');
        include_once(DOCROOT.'media/assets/vendors/ckfinder/ckfinder.php');

        $CKEditor = new CKEditor();
        $CKEditor->basePath = $url_base . 'media/assets/vendors/ckeditor/';

        $CKEditor->config['height'] = $height . 'px';
        $CKEditor->config['width']  = $width;

        $CKEditor->config['filebrowserBrowseUrl']      = $url_base . 'media/assets/vendors/ckfinder/ckfinder.html';
        $CKEditor->config['filebrowserImageBrowseUrl'] = $url_base . 'media/assets/vendors/ckfinder/ckfinder.html?type=Images';
        $CKEditor->config['filebrowserFlashBrowseUrl'] = $url_base . 'media/assets/vendors/ckfinder/ckfinder.html?type=Flash';
        $CKEditor->config['filebrowserUploadUrl']      = $url_base . 'media/assets/vendors/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
        $CKEditor->config['filebrowserImageUploadUrl'] = $url_base . 'media/assets/vendors/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
        $CKEditor->config['filebrowserFlashUploadUrl'] = $url_base . 'media/assets/vendors/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';

        $config['uiColor'] = '#efefef';

        // Кнопки (добавляем/убираем)
        $config['toolbar'] = array(
            array('Source','-', 'Maximize', 'ShowBlocks'),
            array('Cut','Copy','Paste','PasteText','PasteFromWord'),
            array('Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'),
            array('Link','Unlink','Anchor'),
            array('Image','Table','HorizontalRule','SpecialChar','PageBreak'),
            '/',
            array('Format','Font', 'Bold','Italic','Underline','Strike',),
            array('JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','NumberedList','BulletedList'),
            array('Outdent','Indent','-','TextColor','BGColor','-','Subscript','Superscript'),
            array('uiColor')
        );

        ob_start();

        //return ob_get_clean();
        return $CKEditor->editor($name, $value, $config);


    }

	 public function before()
    {
        parent::before();

        $this->auth  = Auth::instance();

        if (!$this->auth->logged_in()){

            HTTP::redirect('/admin_site/user/login');

        } else if ($this->auth->logged_in()) {

            $this->user = $this->auth->get_user();
            $this->user_roles = Model::factory('User')->user_roles($this->user->id);
          
            if (!$this->user_roles) {
                 HTTP::redirect('/');
            }

        }

        $user = ORM::factory('User')->where('id','=',Auth::instance()->get_user())->find();

        $res = DB::select('rbac_privileges.action')
            ->join('rbac_privileges','left')
            ->on('rbac_privileges.id', '=', 'rbac_roles_privileges.privilege_id')
            ->where('rbac_roles_privileges.role_id','=',$user->role_id)
            ->from('rbac_roles_privileges')
            ->execute()
            ->as_array();

        $this->template->user = $user;

        $rbac = ['rbac_none'];
        foreach ($res as $v) $rbac[] = $v['action'];

        if (!in_array($this->request->action(),$rbac))
        {
            HTTP::redirect('/admin_site/main/rbac_none');
           // die('Доступ запрещен');
        } 

    }
	
	
	 
	
    public function action_index()
    {
		$content = View::factory('/admin_site/main');
	       
		 $this->template->content = $content;
			
	}

    public function action_rbac_none()
    {
        $content = View::factory('/admin_site/rbac_none');
        
        $this->template->content = $content;

    }



    public function action_str()
    {
        //$id = $this->request->param('id');
        $content = View::factory('/admin_site/str');
        

        $this->template->content = $content;

    }


    public function action_users()
    {
        //$id = $this->request->param('id');
        $content = View::factory('/admin_site/users');

        $res = DB::select('*')
            ->from('users')
            ->execute();

        $users = $res->as_array();

        $res = DB::select('*')
            ->from('roles')
            ->execute();

        $roles = $res->as_array();


        $content->roles = $roles;
        $content->users = $users;

        $this->template->content = $content;

    }


    public function action_user_edit()
    {
        $id = $this->request->param('id');


        if ($_POST['id']){

            $data = $_POST;
            $role_index = DB::select('id')->from('rbac_roles_privileges')->where('role_id','=',$data['role_id'])->and_where('privilege_id','=',1) ->execute();
            DB::delete('roles_users')->where('user_id', '=', $data['id'])->execute();

            if ($role_index[0]['id']){

                for ($i=1;$i<=2;$i++) {
                    DB::insert('roles_users', array('role_id', 'user_id'))
                        ->values(array($i, $data['id']))->execute();
                }
            }

            if (!empty($data['pass']) && $data['pass'] == $data['pass_n']){

                $user = ORM::factory('User',$data['id']);
                $password = trim($data['pass']);

                $user->password = $password;
                $user->save();

            }

            $post = [
                'username'=>$data['username'],
                'email'   =>$data['email'],
                'phone'   =>$data['phone'],
                'role_id' =>$data['role_id'],
            ];


             DB::update('users')
                ->set($post)
                ->where('id', '=', $data['id'])
                ->execute();

            HTTP::redirect('/admin_site/main/users');

        }


        $content = View::factory('/admin_site/user_edit');

        $user = DB::select('*')
            ->where('id','=',$id)
            ->from('users')
            ->execute()
            ->as_array();

        $roles = DB::select('*')
            ->from('roles')
            ->execute()
            ->as_array();
        
        $content->roles = $roles;
        $content->user = $user;

        $this->template->content = $content;

    }

    public function action_user_delete()
    {
        if ($_POST['id']) {

            $id = (int)$_POST['id'];
            DB::delete('roles_users')->where('user_id', '=', $id)->execute();
            DB::delete('users')->where('id', '=', $id)->execute();

            echo 1;
            exit;
        }


    }

    public function action_rbac_edit()
    {
        $id = $this->request->param('id');


        if (count($_POST)>0){

             DB::delete('rbac_roles_privileges')->where('role_id', '=', $id)->execute();

            foreach ($_POST as $v) {
                DB::insert('rbac_roles_privileges', array('role_id', 'privilege_id'))
                    ->values(array($id, $v))->execute();
            }

            HTTP::redirect('/admin_site/main/users');

        }

        $content = View::factory('/admin_site/rbac_edit');

        $roles = DB::select('*')->where('id','=',$id)->from('roles')->execute()->as_array();

        $priv = DB::select('*')->from('rbac_privileges')->group_by('action')->execute()->as_array();

        foreach ($priv as $v){
            $pr[$v['group_name']][] = $v;
        }

        $priv_roles = DB::select('privilege_id')->where('role_id','=',$id)->from('rbac_roles_privileges')->execute()->as_array();

        foreach ($priv_roles as $v){
            $pr_roles[$v['privilege_id']] = $v['privilege_id'];
        }

        $content->privileges = $pr;
        $content->roles = $roles;
        $content->privileges_roles = $pr_roles;


        $this->template->content = $content;

    }

    public function action_rbac_delete()
    {
        if ($_POST['id']) {

             $id = (int)$_POST['id'];
             DB::delete('roles')->where('id', '=', $id)->execute();
             DB::delete('rbac_roles_privileges')->where('role_id', '=', $id)->execute();

             echo 1;
             exit;
        }


    }

    public function action_rbac_add()
    {
        if ($_POST) {

           $id = DB::insert('roles', array('name', 'description'))
                ->values(array($_POST['name'], $_POST['description']))->execute();

            HTTP::redirect('/admin_site/main/rbac_edit/'.$id[0]);

        }


    }


    public function action_country()
    {
        //$id = $this->request->param('id');
        $content = View::factory('/admin_site/country');
        
        if ($_POST){

            if ($_POST['id'] && $_POST['action'] == 'del') {

                $id = (int)$_POST['id'];
                DB::delete('country')->where('id', '=', $id)->execute();
                echo 1;
                exit;

            }else if ($_POST['id'] && $_POST['action'] == 'edit'){

                $id = (int)$_POST['id'];
                DB::update('country') ->set(['name'=>$_POST['name']])->where('id', '=', $id)->execute();
                echo 2;
                exit;
                
            }else if ($_POST['action'] == 'add'){

                DB::insert('country', array('name')) ->values(array($_POST['name']))->execute();

                HTTP::redirect('/admin_site/main/country/');
                
            }else if ($_POST['id'] && $_POST['action'] == 'checked'){

                DB::update('country') ->set([$_POST['name']=>$_POST['value']])->where('id', '=', $_POST['id'])->execute();

                echo 1;
                exit;

            }
            
        }
        
        $country = Model::factory('User')->country();
        $content->country = $country;
        
        $this->template->content = $content;

    }
    
    public function action_resume()
    {
        //$id = $this->request->param('id');
        $content = View::factory('/admin_site/resume');

        if ($_POST['id'] && $_POST['status']) {
            $a = 0;
            if($_POST['status'] == 'false'){
                $a = 1;
            }
            if($_POST['status'] == 'true'){
                $a = 2;
            }
            $id = (int)$_POST['id'];
            DB::update('resume') ->set(['active'=>$a])->where('id', '=', $id)->execute();
            echo 1;
            exit;

        } else if ($_POST['send_email']) {

            $url = URL::site(NULL, 'http');

            $str = explode(',',$_POST['send_email']);
         
            $subject = 'Уважаемый '. $str[0] .' Вам письмо по поводу вашего резюме с сайта '.$url;

            $from = 'admin@'.parse_url($url, PHP_URL_HOST);
            //$body = __($message, array(':reset_token_link' => URL::site('user/reset?reset_token=' . $user->reset_token . '&reset_email=' . $_POST['reset_email'], TRUE), ':reset_link' => URL::site('user/reset', TRUE), ':reset_token' => $user->reset_token, ':username' => $user->username));

            $message_swift = Email::send('support', $subject, $_POST['text'], $from, $str[1]);

            if ($message_swift){
                $message = 'Ваше письмо успешно отправлено!';
            }else{
                $message = 'Произошла ошибка, Ваше письмо не отправлено!';
            }
        }

        $query = DB::select('resume.*','users.username','users.email','users.phone','users.img','users.age','users.emp_applic','users.profession','users.residence')
            ->join('users','left')
            ->on('users.id', '=', 'resume.user_id')
            ->from('resume')
            ->order_by('created','desc')
            ->execute()
            ->as_array();
        
        $content->list = $query;
        $content->message =  $message;

        $this->template->content = $content;

    }


    public function action_resume_delete()
    {
        if ($_POST['id']) {

            $id = (int)$_POST['id'];
            DB::delete('resume')->where('id', '=', $id)->execute();
            DB::delete('resume_proff')->where('resume_id', '=', $id)->execute();

            echo 1;
            exit;
        }


    }



    public function action_goods_edit()
    {
        $id = $this->request->param('id');
        $content = View::factory('/admin_site/goods_edit');

        $news = ORM::factory('data')->where('id', '=', $id)->find();

        $sql = "SELECT (c.category) FROM categories c JOIN data d ON c.id=d.cat WHERE d.id='$id'";

        $res = DB::query(Database::SELECT, $sql)
            ->param(':id', (int)$id)
            ->execute();
        $cat = $res->as_array();

        $content->cat = $cat;
        $content->news = $news;

        $this->template->content = $content;

    }


} // End Main