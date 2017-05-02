<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Category extends Controller_Common {

    protected $_tableR = 'resume';

    public function action_index()
    {
        $id = $this->request->param('id');
        $filters = $this->request->param('filters')?:false;
        $content = View::factory('/pages/category');

        $arr = Model::factory('category')->get_category($id,$filters);

        $content->arr = $arr;
        $this->template->content = $content;

    }

}