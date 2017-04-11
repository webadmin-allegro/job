<?php defined('SYSPATH') or die('No direct script access.');
 
abstract class Controller_Common extends Controller_Template {
 
 
	public $error=array();
    public $message=array();

    public $template = 'home';

    public function before()
    {   
		// header("Cache-Control: no-store, no-cache, max-age=0, post-check=0, pre-check=0");
        // header("Pragma: no-cache");
        // header("Content-Type: text/html;charset=utf-8");
		// header('X-Powered-By: FIRE');

        $this->main_config = Kohana::$config->load('main');
		
        parent::before();
		
        View::set_global(array(
        'title' => !isset($this->title)?$this->main_config->get('title'):$this->title,
	    'keywords' => !isset($this->keywords)?$this->main_config->get('keywords'):$this->keywords,
        'description' => !isset($this->description)?$this->main_config->get('description'):$this->description
         )); 
		 
    }
	
	public function error($error) {
      if (is_array($error)) {
       foreach ($error as $errors) {
        if (is_array($errors)) {
        return self::error($errors);
        }
       $this->error[]=$errors;
       }
      } else {
      return $this->error[]=$error;
      }
    }
 
    public function message($message) {
      if (is_array($message)) {
       foreach ($message as $messages) {
       $this->message[]=$messages;
       }
      } else {
      return $this->message[]=$message;
      }
    }


	
	public function after()
    {
    View::set_global(array(
    'error' => $this->error,
    'message' => $this->message
    ));

        parent::after();
    }
 
} // End Common
