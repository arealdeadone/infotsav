<?php
/**
 * Created by PhpStorm.
 * User: ARVIND
 * Date: 16-Aug-16
 * Time: 10:50 AM
 */
require_once 'core/init.php';

$user = new User();

if(!$user->isLoggedIn())
    Redirect::to('index.php');

$db = DB::getInstance();
$res = $db->query("SELECT `score`,`name`,`school`,`avtar`,`user_id` FROM `user_score` INNER JOIN `users` ON `user_score`.`user_id`=`users`.`id` ORDER BY `score` DESC",array());
$rows = $res->results();

if(isset($_GET['api']))
{
    header('Content-Type: application/json');
    $needed = "";
    foreach($rows as $index => $row){
        if($row->user_id == $user->data()->id){
            $needed = array('pos' => $index+1, 'score' => $row->score);
            break;
        }
    }
    echo json_encode($needed);
    die();
}
?>
<!doctype html>

<html>
<head>
    <title>Infotsav 2K16 | ABV IIITM</title>
    <meta name="description" content="Infotsav Annual Techno-Managerial Fest ABV IIITM">
    <meta name="keywords" content="Infotsav, ABV IIITM, techfest, Techno, Managerial, Techno-Managerial, Events, Coding, Robofiesta, Robotics, Qiuz">
    <meta property="og:image" content="shareImg.png" />
<<<<<<< HEAD
<<<<<<< HEAD
    <link rel="SHORTCUT ICON" href="favicon.png">
=======
    <link rel="SHORTCUT ICON" href="favicon.ico">
>>>>>>> 36e619b23cf335f7df6d199ac3dc0a5e2a4103f4
=======
    <link rel="SHORTCUT ICON" href="favicon.ico">
>>>>>>> master
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

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

    body
    {
        background: url('images/bgnl.jpg') no-repeat;
        background-size: cover;
        font-family: SilkscreenBold;
    }

    .table
    {
        opacity:0.8;
        -webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        border-radius: 20px;
        margin-top: 30px;
    }
    .table-bordered, .table-responsive,.table-striped{
        -webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        border-radius: 20px;
    }
    h2
    {
        color: #fff;
    }
</style>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-3"></div>
            <div class="col-xs-6 text-center">
                <h2>CURRENT LEADERBOARD</h2>
            </div>
            <div class="col-xs-3"></div>
        </div>
        <div class="row">
            <div class="col-xs-1"></div>
            <div class="col-xs-10">
                <table class="table table-striped table-bordered table-responsive table-inverse">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Score</th>
                        <th>Institute/School/College</th>
                    </tr>
                    <?php
                    foreach($rows as $pos => $row){
                        if($row->user_id === $user->data()->id)
                        {
                            if($pos == 0)
                                echo '<tr class="success">';
                            else
                                echo "<tr class='info'>";
                        }
                        else
                            echo '<tr>';
                        $lbpos = $pos+1;
                        echo "<td>{$lbpos}</td><td>{$row->name}</td><td>$row->score</td><td>$row->school</td></tr>";
                    }
                    ?>
                </table>
            </div>
            <div class="col-xs-1"></div>
        </div>
    </div>
</body>
</html>
