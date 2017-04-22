<?php 
if (!Route::cache()) {

    Route::set('admin_site', 'admin_site(/<controller>(/<action>(/<id>)))')
       ->defaults(array(
       'directory'  => 'admin',
       'controller' => 'user',
       'action'     => 'login',
     ));

    Route::set('error', 'error/<action>(/<message>)', array('action' => '[0-9]++', 'message' => '.+'))
       ->defaults(array(
       'controller' => 'error',
     ));


    Route::set('user', 'user(<controller>(/<action>(/<id>)))')
        ->defaults(array(
        'controller' => 'user',
        'action'     => 'index',
    ));

    Route::set('resume', 'resume(<controller>(/<action>(/<id>)))')
        ->defaults(array(
            'controller' => 'resume',
            'action'     => 'index',
        ));

    Route::set('do_search', 'search(/<artname>)', array('artname' => '.*'))
    ->defaults(array(
    'controller'  => 'search',
    'action' => 'search',
        ));


    Route::set('static', '<action>', array('action' => 'contacts|about|gallery'))
    ->defaults(array(
    'controller' => 'static',
      ));

   Route::set('home', '(<page>)',array('page' => '[0-9]+'))
    ->defaults(array(
    'controller' => 'home',
    'action'     => 'index',
    ));

   Route::set('default', '(<controller>(/<action>(/<id>)))')
	->defaults(array(
		'controller' => 'home',
		'action'     => 'index',
	));

    Route::cache(Kohana::$environment === Kohana::PRODUCTION);    }