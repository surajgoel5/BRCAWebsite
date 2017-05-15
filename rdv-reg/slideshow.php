<?php
/**
 * Created by PhpStorm.
 * User: mew
 * Date: 4/10/17
 * Time: 9:30 PM
 */
include_once "auth.php";
$eventID = $_GET["id"];
?>
<!DOCTYPE html>
<html>
<head>
    <script src="js/jquery.js"></script>
    <script src="js/uikit.js"></script>
    <script src="js/components/slideshow.js"></script>
    <link rel="stylesheet" href="css/uikit.css" />
    <link rel="stylesheet" href="css/components/slideshow.css" />
    <link rel="stylesheet" href="css/components/slidenav.css" />
</head>
<body>
<div data-uk-slideshow="{autoplay:true,kenburns:true}" class="uk-align-center uk-margin uk-width-1-1">
    <div class="uk-slidenav-position">
        <ul class="uk-slideshow uk-overlay-active">
            <?php
            $q = $con->query("SELECT path from cv_images where eventID = '$eventID'");
            while($val=$q->fetch_array()){?>
            <li>
                <img alt="" src="<?=$val[0]?>" >
            </li>
<?
            }
            ?>
        </ul>
        <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
        <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
        <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
            <li data-uk-slideshow-item="0"><a href=""></a></li>
            <li data-uk-slideshow-item="1"><a href=""></a></li>
        </ul>
    </div>
</div>
</body>
</html>