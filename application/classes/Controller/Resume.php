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

        if ($this->request->post() && count($this->request->post()) > 0)
        {
            $obj = new Security();
            $post = $obj->xss_clean($this->request->post());
            $valid = new Validation($post);

            $valid->rule('username', 'not_empty', array(':value'))
                   ->rule('location', 'not_empty')
                   ->rule('age', 'not_empty');
            $valid->rules('csrf', array(
                    array('not_empty'),
                    array('Security::check'),
            ));

            if ($valid->check()) {
                var_dump($post);
                exit();
            }else
            {
                var_dump( $valid->errors('contact'));
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

        $this->template->content = $content;
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
