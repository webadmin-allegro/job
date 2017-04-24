<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Resume extends Controller_Common {


    public function before()
    {
        parent::before();

        $this->auth = Auth::instance();

        if (!$this->auth->logged_in()) {

            HTTP::redirect('/user/login');

        }
    }


        public function action_index()
    {
        $content = View::factory('/pages/resume');

        $this->template->content = $content;
    }


    public function action_add()
    {
        $content = View::factory('/pages/resume');
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
                    'profession_id'  => implode(",",$post['profession_id']),
                    'employment_id'  => (int)$post['employment'],
                    'wage'      => (int)$post['wage'],
                    'curr_id'   => (int)$post['curr'],
                    'wage_desc' => $post['wage_desc']?:null,
                    'country_id'=> (int)$post['country'],
                    'active'    => 0,
                    'experience'=> serialize($post['experience']),
                    'desc'      => $post['desc']?:null,
                    'created'   => date('U'),
                ];

                DB::insert('resume', array_keys($data) )->values($data)->execute();

                HTTP::redirect('/user/info');

            } else {
                $errors = $valid->errors('contact');
            }
        }

        $country = Model::factory('User')->country('resume_page');
        $category = Model::factory('Category')->get_table();
        $employment= Model::factory('Category')->get_employment();
        $curr = Model::factory('Category')->get_curr();

        $content->country = $country;
        $content->category = $category;
        $content->employment = $employment;
        $content->curr = $curr;
        $content->errors = $errors;

        $this->template->content = $content;
    }

    public function action_hidden_resume()
    {
        $post = $this->request->post();
        $valid = new Validation($post);

        $valid->rules('hash', array(
            array('not_empty'),
            array('Security::check'),
        ));

        if ($post['id'] && $valid->check()){

            if ($post['action'] == 'del'){
                DB::delete('resume')->where('id', '=',$post['id'])->execute();
                echo 1;
                exit;
            }
            if ($post['action'] == 'hidden' && $post['rel']){
                if ($post['rel'] == 3) $rel = 1;
                if ($post['rel'] == 1) $rel = 3;
                DB::update('resume')->set(array('active' => $rel))->where('id', '=',$post['id'])->execute();
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
