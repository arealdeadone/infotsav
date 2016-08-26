<?php
	require_once 'core/init.php';
	$user = new User();

	if($user->isLoggedIn())
	{
		$user->logout();
		if(Session::exists('spawned'))
			Session::delete('spawned');
	}
	
	Redirect::to('index.php');
	 echo '<script>window.location.href="index.php"</script>';
?>