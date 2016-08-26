<?php
	session_start();
	$GLOBALS['config'] = array(
		'mysql' => array(

			'host' => '127.0.0.1',
			'username' => 'root',
			'password' => 'Iiahtth',

			'db' => 'infotsav'
		),
		'remember' => array(
			'cookie_name' => 'hash',
			'cookie_expiry' => 604800
		),
		'session' => array(
			'session_name' => 'user',
			'token_name' => 'token'
		)
	);
	try{
		spl_autoload_register(function($class) {
			require_once 'classes/'.$class.'.php';
			require_once 'functions/sanitize.php';
		});
	}
	catch(Exception $e){
		try{
			spl_autoload_register(function($class) {
				require_once '../classes/'.$class.'.php';
			});
			require_once '../functions/sanitize.php';
		}
		catch(Exception $ep){
			echo $ep->getMessage();
		}
	}
	
	if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists('session/session_name'))
	{
		$hash = Cookie::get(Config::get('remember/cookie_name'));
		$hashCheck = DB::getInstance()->get(
						'users_sessions',
						array('hash', '=', $hash)
					);
		if($hashCheck->count())
		{
			$user = new User($hashCheck->first()->user_id);
			$user->login();
		}
	}
?>
