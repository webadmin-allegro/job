<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Resume extends Controller_Common {


    protected $_table	= 'resume';

    public function before()
    {
        parent::before();

      //  if (!Auth::instance()->logged_in())   HTTP::redirect('/user/login');


    }


        public function action_index()
    {

        $content = View::factory('/pages/list_resume');

        $list = Model::factory('Resume')->get_all_resume();

        $list['list'] = $list[0]['id']>0 ? $list : false;

        $country = Model::factory('User')->country('resume_page');
        $category = Model::factory('Category')->get_table();
        $experience= Model::factory('Category')->get_experience();
        $education_type= Model::factory('Category')->get_education_type(true);

            if ($this->request->post()){

                $obj = new Security();
                $post = $obj->xss_clean($this->request->post());

                foreach ($post as $k=>$v) $this->filters['resume_post'][$k] = (int)$v;

                $list = Model::factory('category')->get_category(null,$this->_table,$this->filters);
            }

        $content->list = $list;
        $content->country = $country;
        $content->category = $category;
        $content->experience = $experience;
        $content->education_type = $education_type;

        $this->template->content = $content;
    }


    public function action_cv()
    {
        $id = $this->request->param('id');

        $content = View::factory('/pages/resume');

        $list = Model::factory('Resume')->get_resume_id($id);

        $education_type= Model::factory('Category')->get_education_type(true);


        if ($list && $list[0]['id']>0){
            $content->list =  $list;
        }else{
            HTTP::redirect('/resume');
        }

        $content->education_type = $education_type;
        $this->template->content = $content;
    }

    public function action_edit()
    {
        if (!Auth::instance()->logged_in()) {

            HTTP::redirect('/user/login');

        }
        $id = $this->request->param('id');

        $content = View::factory('/pages/edit_resume');

        $list = Model::factory('Resume')->get_resume_id($id);

        if ($list && $list[0]['id']>0){
            $content->list =  $list;
        }else{
            HTTP::redirect('/resume');
        }


        $this->template->content = $content;
    }

    public function action_preview()
    {
        if ($_POST){
            Session::instance()->set("sess_", $_POST);
            echo 1;
            exit;
        }

        $list = Session::instance()->get("sess_");
        
        if (!$list) {
            HTTP::redirect('/resume');
        }
        
        $content = View::factory('/pages/preview');
        $education_type= Model::factory('Category')->get_education_type(true);
        $content->education_type = $education_type;
        $content->list =  $list;
        Session::instance()->delete("sess_");
        $this->template->content = $content;

    }

    public function action_proff_ajax()
    {
        if ($_POST['id']){
            $category = Model::factory('Category')->get_table((int)$_POST['id']);
            foreach ($category as $c){
                $arr[$c['id']][] = $c['name'];
            }
            echo json_encode($arr);
            exit;
        }

    }


    public function action_add()
    {

        if (!Auth::instance()->logged_in()) {

              HTTP::redirect('/user/login');

        }

        $content = View::factory('/pages/add_resume');
        $errors = false;

        if ($this->request->post() && count($this->request->post()) > 0)
        {
            $obj = new Security();
            $post = $obj->xss_clean($this->request->post());
            $valid = new Validation($post);

            $valid->rule('username', 'not_empty', array(':value'))
                   ->rule('location', 'not_empty')
                   ->rule('position', 'not_empty')
                   ->rule('education', 'not_empty')
                   ->rule('country', 'not_empty')
                   ->rule('employment', 'not_empty')
                   ->rule('wage', 'not_empty')
                   ->rule('desc', 'max_length', array(':value', 500))
                   ->rule('age', 'not_empty');
            $valid->rules('csrf', array(
                    array('not_empty'),
                    array('Security::check'),
            ));

           // $val = Helper_MyUrl::ValidArr([$post['education']]);

            if ($valid->check()) {

                $userM = ORM::factory('User',(int)$post['id']);

                if ($userM){

                    $file = $this->upload($userM->email);

                    $userM->username = $post['username'];
                    $userM->age = $post['age'];
                    $userM->residence = $post['location'];
                    if ($file)   $userM->img = $file;
                    $userM->save();
                }

                $data = [
                    'user_id'   => (int)$userM->id,
                    'position'  => $post['position'],
                    'education' => serialize($post['education']),
                    'education_type' => (int)$post['education']['type'][0],
                    'category_id'  => (int)$post['profession_id'][0],
                    'employment_id'  => (int)$post['employment'],
                    'wage'      => (int)$post['wage'],
                    'curr_id'   => (int)$post['curr'],
                    'wage_desc' => $post['wage_desc']?:null,
                    'country_id'=> (int)$post['country'],
                    'active'    => 0,
                    'experience'=> serialize($post['experience']),
                    'description'      => $post['desc']?:null,
                    'created'   => date('U'),
                ];

                $last_id = DB::insert('resume', array_keys($data) )->values($data)->execute();

                for ($i=0;$i<count($post['profession_id'])-1;$i++){ $p = $i+1;
                    DB::insert('resume_proff', ['category_id','experience_id','resume_id'] )
                        ->values([(int)$post['profession_id'][$p],$post['experience_id'][$i]?(int)$post['experience_id'][$i]:1,$last_id[0]])->execute();
                }

                HTTP::redirect('/user');

            } else {
                $errors = $valid->errors('contact');
            }
        }

        $country = Model::factory('User')->country('resume_page');
        $category = Model::factory('Category')->get_table();
        $employment= Model::factory('Category')->get_employment();
        $curr = Model::factory('Category')->get_curr();
        $experience= Model::factory('Category')->get_experience();
        $education_type= Model::factory('Category')->get_education_type();

        $content->country = $country;
        $content->category = $category;
        $content->employment = $employment;
        $content->curr = $curr;
        $content->experience = $experience;
        $content->errors = $errors;
        $content->education_type = $education_type;

        if (Auth::instance()->get_user()->emp_applic != 1){
            $message = 'Если хотите добавить резюме, зарегистрируйтесь как соискатель !';
            $this->template->content = View::factory('/pages/message')->bind('message', $message);
        }else{
            $this->template->content = $content;
        }

    }

    public function action_hidden_resume()
    {
        $post = $this->request->post();
        $user = Auth::instance()->get_user();

        if ($post['id'] && $user){

            if ($post['action'] == 'del'){
                DB::delete('resume')->where('id', '=',(int)$post['id'])->and_where('user_id', '=', $user->id)->execute();
                DB::delete('resume_proff')->where('resume_id', '=', (int)$post['id'])->execute();
                echo 1;
                exit;
            }
            if ($post['action'] == 'hidden' && $post['rel']){
                if ($post['rel'] == 3) $rel = 1;
                if ($post['rel'] == 1) $rel = 3;
                DB::update('resume')->set(array('active' => $rel))->where('id', '=',(int)$post['id'])->and_where('user_id', '=', $user->id)->execute();
                echo 1;
                exit;
            }

        }
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
