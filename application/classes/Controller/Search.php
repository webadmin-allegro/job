<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Search extends Controller_Common
{
    protected $_table = 'resume';

    public function action_index()
	{

	   $search = !empty($_REQUEST['text']) ? Database::instance()->escape(trim(strip_tags($_REQUEST['text']))) : false;
	   
	    $content = View::factory('/pages/do_search');

	  if (!$search || strlen($search) < 4)
      {
		  $messages = "Поисковый запрос не введён, либо он менее 4-х символов";

      }
      else
      {
          $messages = "Поиск по запросу -  $search";

          $sql = "SELECT r.*, users.username, users.age, users.img, users.phone, users.email, users.residence FROM ". $this->_table." r
                  JOIN users  ON users.id=r.user_id
                  WHERE r.active=1 AND MATCH(position) AGAINST($search IN BOOLEAN MODE) LIMIT 20";
          $query = DB::query(Database::SELECT, $sql)
              ->execute()->as_array();
      }


				  $this->template->title = "Поиск по запросу -  $search";
				  $content ->list = $query?:false;
                  $content ->messages = $messages;
				  $this->template->content = $content;
	}
}
