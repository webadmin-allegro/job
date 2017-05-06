<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Category extends Controller_Common {

    protected $_tableR = 'resume';
    protected $filters = [];

    public function action_index()
    {
        $id = $this->request->param('id');
        $this->filters['category'] = $_GET['filter']?:false;
        $this->filters['experience'] = $_GET['ex']?:false;
        $content = View::factory('/pages/category');

        $arr = Model::factory('category')->get_category($id,$this->filters);

        $content->arr = $arr;
        $this->template->content = $content;

    }

}