<?php
/**
 * Created by PhpStorm.
 * User: mew
 * Date: 3/11/17
 * Time: 12:33 PM
 */
include_once "navbar.php";
$mode = $_GET['mode'];
$d=$con->query("SELECT * from `cv_profile` where entryno='$entry_no'");
$dd = $d->fetch_assoc();
$name = $dd["name"];
$phone = $dd["phone"];
$email = $dd["email"];
$pic = $dd["profile_pic"];
if(!isset($pic))
    $pic = "images/default-profile-picture.png";
$phoneP = $_POST["phone"];
$emailP = $_POST["email"];
$nameP = $_POST["name"];
if($_FILES['image']["tmp_name"]!="") {
    $errors = array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
    $home = "/var/www/brca/http/html";
    $expensions = array("jpeg", "jpg", "png");
    if (in_array($file_ext, $expensions) === false) {
        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
    }

    if (empty($errors) == true && is_null($dd)) {
        $file_path = "/images/profile/" . $entry_no . "_" . md5($file_name) . "." . $file_ext;
        move_uploaded_file($file_tmp, $home . $file_path);
        $file_name = addslashes($file_name);
        $con->query("INSERT INTO `cv_profile` (entryno,phone,email,name,profile_pic) VALUES ('$entry_no','$phoneP','$emailP','$nameP','$file_path')");
    } else if(empty($errors) == true){
        $con->query("UPDATE `cv_profile` set profile_pic='$file_path' where entryno='$entry_no'");
    } else {
        print_r($errors);
    }
    if(isset($_POST["email"]))
    {
        $con->query("UPDATE `cv_profile` set phone='$phoneP',email='$emailP',name='$nameP' where entryno='$entry_no'");
    }
}

if($mode){
?>
<div class="container">
    <div class="jumbotron">
    <h1>Profile</h1>
        <form action="profile.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?=$email?>">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" value="<?=$phone?>">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?=$name?>">
            </div>
            <div class="form-group">
                <input type="file" name="image" id="image">
                <p class="help-block">Upload your profile picture here.</p>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form></div>
<?}
else{
    ?>
    <div class="uk-container uk-margin-medium-top">
        <div class="uk-width-1-2@m uk-grid-margin uk-first-column">
        <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin uk-grid">
            <div class="uk-card-media-left uk-cover-container uk-first-column">
                <img src="<?=$pic?>" onerror="this.onerror=null;this.src='images/default-profile-picture.png';" alt="profile pic">
            </div>
                <div>
                    <div class="uk-card-header">
                        <h1>Profile</h1>
                    </div>
                    <div class="uk-card-body">
                        <dl class="dl-horizontal">
                            <dt>Name</dt>
                            <dd><?=$name?></dd>
                            <dt>Email</dt>
                            <dd><?=$email?></dd>
                            <dt>Phone</dt>
                            <dd><?=$phone?></dd>
                        </dl>
                        <button class="btn-success btn" onclick="location.href='profile.php?mode=1';">Edit profile</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer style="text-align:center;font-size:2.5vh;padding-top:3vh;padding-bottom:3vh;" class="jumbotron">
        Implemented By BRCA team for IIT Delhi
    </footer>
    <?
}




