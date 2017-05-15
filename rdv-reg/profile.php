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
$exists = $d->num_rows>0;
$dd = $d->fetch_assoc();
$name = $dd["name"];
$phone = $dd["phone"];
$email = $dd["email"];
$cgpa = $dd["cgpa"];
$pic = $dd["profile_pic"];
if(!isset($pic))
    $pic = "images/dragonslayer.jpg";
//    $pic = "images/default-profile-picture.png";
$phoneP = $_POST["phone"];
$emailP = $_POST["email"];
$nameP = $_POST["name"];
$cgpaP = $_POST["cgpa"];
if($_FILES['image']["tmp_name"]!="") {
    $errors = array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
    $home = "/var/www/brca/http/html";
    $expensions = array("jpeg", "jpg", "png", "gif");
    if (in_array($file_ext, $expensions) === false) {
        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
    }
    $file_path = "/images/profile/" . $entry_no . "_" . md5($file_name) . "." . $file_ext;
    move_uploaded_file($file_tmp, $home . $file_path);
    if (empty($errors) == true && !$exists) {
        $con->query("INSERT INTO `cv_profile` (entryno,phone,email,name,cgpa,profile_pic) VALUES ('$entry_no','$phoneP','$emailP','$nameP','$cgpaP','$file_path')");
    } else if(empty($errors) == true){
        $con->query("UPDATE `cv_profile` set profile_pic='$file_path' where entryno='$entry_no'");
    } else {
        print_r($errors);
    }
}
else if(!$exists){
    $con->query("INSERT INTO `cv_profile` (entryno,phone,email,name,cgpa) VALUES ('$entry_no','$phoneP','$emailP','$nameP','$cgpaP')");
}
else if(isset($phoneP)||isset($emailP)||isset($nameP)){
    $con->query("UPDATE `cv_profile` set phone='$phoneP',email='$emailP',name='$nameP',cgpa='$cgpaP' where entryno='$entry_no'");
    $cgpa = $cgpaP;
}
if($mode){
?>
    <div class="uk-container uk-margin-medium-top">
        <form action="profile.php" method="post" enctype="multipart/form-data">
        <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin uk-grid">
            <div class="uk-card-media-left uk-cover-container uk-first-column uk-inline">
                <img id="target" src="<?=$pic?>" onerror="this.onerror=null;this.src='images/default-profile-picture.png';" alt="profile pic" uk-cover>
                <div class="uk-margin-small-bottom uk-position-small uk-position-bottom-right uk-overlay uk-overlay-default">
                    <div uk-form-custom>
                        <input id="src" name="image" type="file">
                        <button type="button" class="uk-button uk-button-default uk-transparent">Upload Image</button>
                    </div>
                </div>
            </div>
            <div>
                <div class="uk-card-header">
                    <h1>Profile</h1>
                </div>
                <div class="uk-card-body">
                    <dl class="uk-description-list uk-description-list-divider">
                        <dd><input value="<?=$name?>" placeholder="Name" name="name" type="text" class="uk-input uk-margin"></dd>
                        <dd><input value="<?=$email?>" placeholder="Email" name="email" type="email"  class="uk-input uk-margin"></dd>
                        <dd><input value="<?=$phone?>" placeholder="Phone" name="phone" type="number" class="uk-input uk-margin"></dd>
                        <dd><input value="<?=$cgpa?>" placeholder="CGPA" name="cgpa" class="uk-input uk-margin"></dd>
                    </dl>
                    <button type="submit" class="uk-button uk-button-primary uk-button uk-width-1-1" onclick="location.href='profile.php?mode=1';">Save profile</button>
                </div>
            </div>
        </div>
        </form>
    </div>

    <script type="text/javascript">
        $(function() {
            function showImage(src, target) {
                var fr = new FileReader();
                fr.onload = function (e) {
                    target.src = this.result;
                };
                src.addEventListener("change", function () {
                    // fill fr with image data
                    fr.readAsDataURL(src.files[0]);
                });
            }

            var src = document.getElementById("src");
            var target = document.getElementById("target");
            showImage(src, target);
        })
    </script>
<?}
else{
    ?>
    <div class="uk-container uk-margin-medium-top">
        <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin uk-grid">
            <div class="uk-card-media-left uk-cover-container uk-first-column">
                <img  src="<?=$pic?>" onerror="this.onerror=null;this.src='images/default-profile-picture.png';" alt="profile pic" uk-cover>
            </div>
                <div>
                    <div class="uk-card-header">
                        <h1>Profile</h1>
                    </div>
                    <div class="uk-card-badge">
                        <?if($secy&&strlen($cgpa)==0){?>
                        <span class="uk-badge uk-label-danger">Please update your cgpa</span>
                        <?}?>
                    </div>

                    <div class="uk-card-body">
                        <dl class="uk-description-list uk-description-list-divider">
                            <dt>Name</dt>
                            <dd><?=$name?></dd>
                            <dt>Email</dt>
                            <dd><?=$email?></dd>
                            <dt>Phone</dt>
                            <dd><?=$phone?></dd>
                        </dl>
                        <button class="uk-button uk-button-primary uk-button uk-width-1-1" onclick="location.href='profile.php?mode=1';">Edit profile</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?
}
?>





