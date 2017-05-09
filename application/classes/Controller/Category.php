<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Category extends Controller_Common {

    protected $_table = '';
    protected $filters = [];

    public function action_index()
    {
        $id = $this->request->param('id');
        $this->_table = $this->request->param('categories');
        $this->filters['category'] = $_GET['filter']?:false;
        $this->filters['experience'] = $_GET['ex']?:false;
        $content = View::factory('/pages/category');

        if ($this->_table) $arr = Model::factory('category')->get_category($id,$this->_table,$this->filters);

        //if (!$arr) die;
        $content->arr = $arr;
        $this->template->content = $content;

    }

}