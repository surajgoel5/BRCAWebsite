<?php
/**
 * Created by PhpStorm.
 * User: mew
 * Date: 12/24/16
 * Time: 3:25 PM
 */
include_once "auth.php";
?>
<!DOCTYPE html>
<!-- saved from url=(0034)https://oauth.iitd.ac.in/index.php -->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://oauth.iitd.ac.in/favicon.ico" type="image/x-icon">
    <title>BRCA</title>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
</head>

<body cz-shortcut-listen="true">
<style>
    body{
        background: lightgray;
    }
</style>

    <!-- Static navbar -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" target="_blank" href="http://brca.iitd.ac.in/">BRCA</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="javascript:location.href='home.php'">Home</a></li>
                    <?php if (!empty($post)&&!$faculty){ ?>
                        <li><a href="javascript:location.href='createevent.php'">Create event</a></li>
                        <li><a href="javascript:location.href='budget.php'">Budget</a></li>
                    <?}?>
                    <?php if (!empty($post)&&$gsec){ ?>
                    <li><a href="javascript:location.href='secys.php'">Edit Secys</a></li>
                    <li><a href="javascript:location.href='noti.php'">Notifications
                        <?php if($unread!="0"){
                            ?>
                            <span class="badge"><?=$unread?></span>
                        <?}?>
                        </a></li>
                    <? }
                    ?>
                    <?php if ($faculty){ ?>
                        <li><a href="javascript:location.href='approvals.php'">Approvals</a></li>
                    <?}?>
                    <li><a href="javascript:location.href='profile.php'">Profile</a></li>
                        <li><a href="javascript:location.href='contact.php'">Contact Us</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <div class="navbar-form navbar-right"  >
                        <div style="float: left;padding-right:2vw;padding-top: 0vh;font-size:1.5vw;">
                            Hi <?php echo $id->name; ?>,
                        </div>
                        <button type="button" class="btn btn-success" name="doit" onclick="logout()">Logout</button>
                    </div>                  </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>
    <style>#SELECT_1 {
            background-position: 92% 50%;
            height: 40px;
            vertical-align: middle;
            width: 165px;
            -webkit-appearance: none;
            -webkit-background-clip: padding-box;
            -webkit-locale: en;
            -webkit-perspective-origin: 80px 20px;
            -webkit-transform-origin: 80px 20px;
            background: rgb(255, 255, 255) url(http://dominiquedecooman.com/sites/all/themes/ddc/images/select-arrow.png) no-repeat scroll 92% 50% / auto padding-box padding-box;
            border: 3px solid rgb(239, 239, 239);
            font: normal normal normal 13px/normal Arial, sans-serif;
            margin: 0px;
            padding: 5px 25px 5px 15px;
            -webkit-border-after: 3px solid rgb(239, 239, 239);
            -webkit-border-before: 3px solid rgb(239, 239, 239);
            -webkit-border-end: 3px solid rgb(239, 239, 239);
            -webkit-border-start: 3px solid rgb(239, 239, 239);
        }
    </style>
<script type="text/javascript">
    function logout() {
        document.cookie = 'login' +
            '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
        location.href='index.php';
    }
</script>