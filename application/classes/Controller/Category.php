<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Category extends Controller_Common {

    protected $_tableR = 'resume';

    public function action_index()
    {
        $id = $this->request->param('id');
        $content = View::factory('/pages/category');
        $arr = Model::factory('resume')->get_category($id);

        $content->arr = $arr;
        $this->template->content = $content;

    }

}