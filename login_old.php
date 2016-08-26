<?php
    require_once 'core/init.php';
    $user = new User();
    if($user->isLoggedIn())
        Redirect::to('index.php');
    if(($username = Session::get('user')))
        Redirect::to('index.php');
        if(Input::exists())
        {
            if(Tokens::check(Input::get('token')))
            {
                $validate = new Validate();
                $validation = $validate->check(array(
                    'email' => array('required' => true),
                    'password' => array('required' => true)
                ));
                if($validation->passed())
                {
                    $remember = Input::get('remember');
                    $login = $user->login(Input::get('email'),Input::get('password'), $remember);
                    if($login)
                    {
                        Session::put('user', Input::get('email'));
                        Redirect::to('index.php');
                    }
                    else
                        echo'<p> Username - Password Combination is incorrect</p>';
                    echo "<a href='index.php' class='btn btn-danger btn-lg'>Click here to Go Back</a>";
                }
                else
                {
                    foreach($validation->errors() as $error)
                    {
                        echo '<h3>'.$error.'</h3>';
                        echo "<a href='index.php' class='btn btn-danger btn-lg'>Click here to Go Back</a>";
                    }
                }
            }
        }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
	<link href="css/bootstrap.min.css"  rel="stylesheet" media="screen">
</head>
<body>
	<form method="post" action="" class="form-horizontal" style="margin-top:200px;margin-left:35%;">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-xs-3">
      <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-xs-3">
      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="remember"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    <p class="link"><a href="registration.php">Not registered. Register Now...</a></p>
    </div>
  </div>
        <input type="hidden" name="token" value="<?php echo escape(Tokens::generate()); ?>" />
</form>
	
</body>
</html>