<?php
require_once 'core/init.php';
$user = new User();

if($user->isLoggedIn()){
  Redirect::to('index.php');
  echo '<script>window.location.href="index.php"</script>';
}
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
      print_r($remember);
      $login = $user->login(Input::get('email'),Input::get('password'), $remember);
      
      if($login)
      {
        Session::put('user', Input::get('email'));

        Redirect::to('index.php');
         echo '<script>window.location.href="index.php"</script>';
      }
      else
      {
        Redirect::to('login.php?error');
        echo '<script>window.location="login.php?error"</script>';
      }
//        echo'<script> alert( "Username - Password Combination is incorrect");</script>';
//      echo "<a href='index.php' class='btn btn-danger btn-lg'>Click here to Go Back</a>";
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
      body, .login-page {
        background: url("images/bgnl.jpg") no-repeat;
        background-size: cover;
      }

      .login-box
      {
        width: 35%;
        min-height: 400px;
      }
      
      .login-logo
      {
        font-family: SilkscreenBold;
        font-size: 38px;
      }
      .login-logo a {
        color: #fff;
      }

      .login-box-msg
      {
        font-size: 18px;
      }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="index.php"><b>INFOTSAV </b>2K16</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg" id="msg-box">Login here</p>
        <form action="" method="post">
          <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control" placeholder="Email" required autocomplete="off">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required autocomplete="off">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox" name="remember"> Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
            </div><!-- /.col -->
          </div>
          <input type="hidden" name="token" value="<?php echo escape(Tokens::generate()); ?>" />
        </form>

        <a href="register.php" class="text-center">Not Registered Yet? Register Here</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="scripts/jquery.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="scripts/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="css/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
    <?php
    if(isset($_GET['error'])){

    ?>
    <script>
      $("#password").parent().addClass("has-error");
      $("#msg-box").parent().addClass("has-error");
      $("#msg-box").addClass("text-error").text("Invalid Username or Password");
    </script>
    <?php
    }
    ?>
  </body>
</html>
