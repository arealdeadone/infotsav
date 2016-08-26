<?php
require_once 'core/init.php';
$user = new User();
if($user->isLoggedIn())
  Redirect::to('index.php');
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
        'email' => array(
            'required'=>true,
            'unique' => 'users'
        ),
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
      Redirect::to('index.php');
      echo '<script>window.location.href="login.php"</script>';
    }
    else
    {
      echo "<script>
              alert('";
                foreach($validation->errors() as $error)
                {
                  echo escape($error).' ';
                }
              echo "');
            </script>";
    }
  }
}

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Infotsav 2K16 | ABV IIITM</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="css/iCheck/square/blue.css">
    <link rel="SHORTCUT ICON" href="favicon.png">
   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
      @font-face {
        font-family: 'SilkscreenBold';
        src: url('fonts/slkscrb-webfont.eot');
        src: url('fonts/slkscrb-webfontd41d.eot?#iefix') format('embedded-opentype'),
        url('fonts/slkscrb-webfont.woff') format('woff'),
        url('fonts/slkscrb-webfont.ttf') format('truetype'),
        url('fonts/slkscrb-webfont.svg#SilkscreenBold') format('svg');
        font-weight: normal;
        font-style: normal;

      }
      body, .register-page {
        background: url("images/bgnl.jpg") no-repeat;
        background-size: cover;
      }

      .register-box
      {
        width: 35%;
        min-height: 400px;
      }

      .register-logo
      {
        font-family: SilkscreenBold;
        font-size: 38px;
      }
      .register-logo a {
        color: #fff;
      }

      .login-box-msg
      {
        font-size: 18px;
      }
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
    </style>

  </head>
  <body class="hold-transition register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="index.php"><b>INFOTSAV </b>2K16</a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Register Here</p>
        <form action="" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="name" class="form-control" id="name" placeholder="Full name" required autocomplete="off">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" required autocomplete="off">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <span id="errorEmail"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" required autocomplete="off">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <span id="errorPass"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="Retype password" required autocomplete="off">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            <span id="errorPassword"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" name="contact" class="form-control" id="contact" placeholder="Contact Number" required autocomplete="off">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <span id="errorContact"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" name="school" class="form-control" id="Institute" placeholder="School/College/Institute Name" required autocomplete="off">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" name="city" class="form-control" id="city" placeholder="City" required autocomplete="off">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="row">
            <center><span style="font-size: 18px; font-weight: bold;">Choose Your Avatar</span></center>
          </div>
          <div class="row">
            <div class="col-xs-2"></div>
            <div class="col-xs-9">
              <!--<div class="checkbox icheck">-->
                <!--<label>-->
                  <!--<input type="checkbox"> I agree to the <a href="#">terms</a>-->
                <!--</label>-->
              <!--</div>-->
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
                        alt="misty" />
              </label>
              </div><!-- /.col -->
            <div class="col-xs-1"></div>
          </div>
          <div class="row">
            <br/>
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div><!-- /.col -->
          </div>
          <input type="hidden" name="token" value="<?php echo escape(Tokens::generate()); ?>" />
        </form>
        <a href="login.php" class="text-center">Already Registered? Login Here</a> | <a href="index.php">Home</a>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    <!-- jQuery 2.1.4 -->
    <script src="scripts/jquery.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <!--<script src="scripts/bootstrap.min.js"></script>-->
    <!-- iCheck -->
    <script src="scripts/sweetalert.min.js"></script>
    <script src="css/iCheck/icheck.min.js"></script>
    <script type="text/javascript" src="scripts/style.js"></script>
    <!--<script>-->
      <!--$(function () {-->
        <!--$('input').iCheck({-->
          <!--checkboxClass: 'icheckbox_square-blue',-->
          <!--radioClass: 'iradio_square-blue',-->
          <!--increaseArea: '20%' // optional-->
        <!--});-->
      <!--});-->
    <!--</script>-->
  </body>
</html>
