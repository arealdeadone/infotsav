<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div class="menu_bar_con">
    <ul class="top_menu">
        <li><a href="ownprofile.php" >My Account</a></li>
        <li><a href="undergoing.php">Undergoing Tasks</a></li>
        <li><a href="showprojects.php">Projects</a></li>
        <li><a href="packagemarket.php">Marketplace</a></li>
        <li><a href="offer.php">Offers</a></li>
        <li><a href="history.php">My History</a></li>
        <li><a href="help.php">Help</a></li>
        <?php
        session_start();
        if($_SESSION['type']=='facebook')
        {


            ?>
            <li><a href="logout.php">Logout</a></li>
            <li><p align="center"><fb:login-button autologoutlink="true" perms="email"></fb:login-button></p></li>
            <?php }
        else
        {



            ?>
            <li><a href="logout.php">Logout</a></li>
            <?php }?>

    </ul>
</div>
</body>
</html>