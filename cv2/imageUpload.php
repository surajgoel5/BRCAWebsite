<?php
/**
 * Created by PhpStorm.
 * User: mew
 * Date: 2/18/17
 * Time: 7:34 PM
 */

include_once "auth.php";
$id = $_GET["id"];
$request=$con->query("SELECT createdby from `cv_events` where id='$id'");
$createdBy = $request->fetch_array();
$createdBy = $createdBy[0];
$auth = ($createdBy==$entry_no);
if(isset($_FILES['image'])&&$auth){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    $home="/var/www/brca/http/html";
    $expensions= array("jpeg","jpg","png");

    if(in_array($file_ext,$expensions)=== false){
        $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }

    if(empty($errors)==true){
        $file_path = "/images/events/".$id."_".md5($file_name).".".$file_ext;
        move_uploaded_file($file_tmp,$home.$file_path);
        $file_name = addslashes($file_name);
        $con->query("INSERT INTO `cv_images` (eventID,name,path,commit,lastupdated) VALUES ('$id','$file_name','$file_path','$commit',NOW())");
        echo "Success";
    }else{
        print_r($errors);
    }
    header('Location: events.php?id='.$id);
    exit;
}
