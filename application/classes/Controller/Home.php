<?php  defined('SYSPATH') or die('No direct script access.');
 
class Controller_Home extends Controller_Common {

      public function action_index()
	  {

          $content = View::factory('/pages/main');
          $news = Model::factory('category')->get_table();

          $content->list = $news;
          $this->template->content = $content;
      }


}

//End Page