<?php
    require_once 'core/init.php';
    $user = new User();
    if($user->isLoggedIn())
        //Redirect::to('index.php');
      echo '<script>window.location.href="index.php"</script>';
    if(Input::exists())
    {
        if(Tokens::check(Input::get('token')))
        {
            $validate = new Validate();
            $validation = $validate->check($_POST, array(
                'password' => array(
                    'required' => true,
                    'min' => 8
                ),
                'confirmPassword' => array(

                    'required' => true,
                    'matches' => 'password'
                ),
                'name' => array(
                    'required' => true,
                    'max' => 50
                ),
                'contact' => array (
                    'required' => true,
                    'min' => 10,
                    'max' => 10
                ),
                'email' => array('required'=>true),
                'school' => array('required'=>true),
                'city' => array('required' => true)
            ));
            if($validation->passed())
            {
                $salt = Hash::salt(32);

                try
                {
                    $user->create(array(
                        'name' => Input::get('name'),
                        'email' => Input::get('email'),
                        'password' => Hash::make(Input::get('password'), $salt),
                        'salt' => $salt,
                        'contact' => Input::get('contact'),
                        'school' => Input::get('school'),
                        'city' => Input::get('city'),
                        'avtar' => Input::get('emotion') ? Input::get('emotion') : 1
                    ));
                }
                catch(Exception $e)
                {
                    die($e->getMessage());
                }

                Session::flash('home', 'You have been successfully registered');
                //Redirect::to('index.php');
                echo'<script> alert( "Log in to Continue");</script>';
                echo '<script>window.location.href="login.php"</script>';
            }
            else
            {
                echo "<ul class='list-group'>";
                foreach($validation->errors() as $error)
                {
                    echo '<li class="list-group-item">'.$error.'</li>';
                }
                echo "<a href='index.php' class='btn btn-danger btn-md'>Click here to go back</a>";
            }
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registeration</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<style>
			.input-hidden {
  position: absolute;
  left: -9999px;
}

input[type=radio]:checked + label>img {
  border: 1px solid #fff;
  box-shadow: 0 0 3px 3px #090;
}

/* Stuff after this is only to make things more pretty */
input[type=radio] + label>img {
  border: 1px dashed #444;
  width: 150px;
  height: 150px;
  transition: 500ms all;
}

input[type=radio]:checked + label>img {
  transform: 
    rotateZ(-10deg) 
    rotateX(10deg);
}

	</style>
</head>
<body>
	<form method="post" action="" class="form-horizontal" id="form" style="margin-top:30px;margin-left:35%;">
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Name</label>
    <div class="col-xs-4">
      <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
    <div class="col-xs-4">
      <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email"><span id="email"></span>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
    <div class="col-xs-4">
      <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="confirmPassword" class="col-sm-2 control-label">Confirm Password</label>
    <div class="col-xs-4">
      <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="Confirm Password"><span id="pass"></span>
    </div>
  </div>
  <div class="form-group">
    <label for="Institute" class="col-sm-2 control-label">Institue</label>
    <div class="col-xs-4">
      <input type="text" name="school" class="form-control" id="Institute" placeholder="Enter your Institue">
    </div>
  </div>

  <div class="form-group">
    <label for="contact"  class="col-sm-2 control-label">Contact Number</label>
    <div class="col-xs-4">
      <input type="text" name="contact" class="form-control" id="contact" placeholder="Enter your contact number"><span id="err"></span>
    </div>
  </div>
  <div class="form-group">
    <label for="city" class="col-sm-2 control-label">City</label>
    <div class="col-xs-4">
      <input type="text" name="city" class="form-control" id="city" placeholder="Enter your city">
    </div>
  </div>
  <b>choose your avatar:</b><br><br>
      <div style="margin-left:70px;">
          <input
      			  type="radio" name="emotion"
      			  id="sad" class="input-hidden" value="1" />
      			<label for="sad">
      			  <img
      			    src="images/img.png"
      			    alt="ash" />
      			</label>

      			<input
      			  type="radio" name="emotion"
      			  id="happy" class="input-hidden" value="2" />
      			<label for="happy">
      			  <img
      			    src="images/misty.png"
      			    alt="misty" /></div>
  <div class="form-group" style="margin-top:40px;margin-left:35px;">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary" id="button" >Register</button>
    </div>
  </div>
        <input type="hidden" name="token" value="<?php echo escape(Tokens::generate()); ?>" />
</form>
  <script type="text/javascript" src="scripts/jquery.min.js"></script>
  <script type="text/javascript" src="scripts/style.js"></script>
</body>
</html>