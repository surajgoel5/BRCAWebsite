<?php
/**
 * Created by PhpStorm.
 * User: mew
 * Date: 12/24/16
 * Time: 3:25 PM
 */
include_once "auth.php";
if($id->name=="")
    $id->name = "Anon";

function modDate($date){
    $date = explode("-", $date);
    $date = date("d M", mktime(0,0,0,$date[1], $date[2], $date[0]));
    return $date;
}

$d=$con->query("SELECT * from `cv_profile` where entryno='$entry_no'");
$d = $d->fetch_assoc();
if(isset($d['profile_pic'])&&$d['profile_pic']!='')
    $profile_pic = $d['profile_pic'];
else
    $profile_pic = "images/default-profile-picture.png";
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
    <link rel="stylesheet" href="css/uikit.min.css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
</head>

<body cz-shortcut-listen="true">
<style>
    html {
        height: 100%;
    }
    body {
        min-height: 100%;
    }    body{
        background: radial-gradient(gainsboro,ghostwhite);
    }
</style>

    <!-- Static navbar -->
        <nav class="uk-navbar-container" uk-navbar>
            <div class="uk-navbar-left">
                <a class="uk-logo uk-navbar-item" target="_blank" href="http://brca.iitd.ac.in/">BRCA</a>
                <ul class="uk-navbar-nav">
                    <li class="uk-active"><a href="javascript:location.href='home.php'">Home</a></li>
                    <?php if (!empty($post)&&!$faculty){ ?>
                        <li class="uk-active"><a href="javascript:location.href='createevent.php'">Create event</a></li>
                        <li class="uk-active"><a href="javascript:location.href='budget.php'">Budget</a></li>
                    <?}?>
                    <?php if (!empty($post)&&$gsec){ ?>
                    <li class="uk-active"><a href="javascript:location.href='secys.php'">Edit Secys</a></li>
                    <li class="uk-active"><a href="javascript:location.href='noti.php'">Notifications &nbsp
                        <?php if($unread!="0"){
                            ?>
                            <span class="uk-badge">1<?=$unread?></span>
                        <?}?>
                        </a></li>
                    <? }
                    ?>
                    <?php if ($faculty){ ?>
                        <li class="uk-active"><a href="javascript:location.href='approvals.php'">Approvals</a>
                    <?php if ($faculty){ ?>
                        <?php if ($gsec){ ?>
                            <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li><a href="javascript:location.href='approvalB.php'">Budget</a></li>
                                <li><a href="javascript:location.href='approvals.php'">Events</a></li>
                            </ul>
                        </div>
                        <?}?>
                    <?}?>
                        </li>
                    <?}?>
                    <li class="uk-active"><a href="javascript:location.href='profile.php'">Profile</a></li>
                    <li class="uk-active"><a href="javascript:location.href='contact.php'">Contact Us</a></li>
                </ul>
            </div>

            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav">
                    <li class="uk-active">
                        <a href="#">Hi, <?php echo $id->name; ?></a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li><img src="<?=$profile_pic?>"><a href="profile.php"><span uk-icon="icon: user" ></span> Profile</a></li>
                                <li><a href="#" onclick="logout()"><span uk-icon="icon: sign-out" ></span> Sign Out</a></li>
                            </ul>
                        </div
                    </li>
                </ul>
            </div>
        </nav>
<script type="text/javascript">
    function logout() {
        document.cookie = 'login' +
            '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
        location.href='index.php';
    }
</script>