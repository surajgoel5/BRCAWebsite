<?php
/**
 * Created by PhpStorm.
 * User: mew
 * Date: 12/24/16
 * Time: 3:25 PM
 */
include_once "db-info.php";
list($c_username,$cookie_hash) = explode(',',$_COOKIE['login']);
$secret_word='~Kt9az.z*^w~M.Cd';
//if (md5($c_username.$secret_word) == $cookie_hash) {
    $id = unserialize($c_username);
    $cat = $id->category;
    $kerberos = "cs5130168";//$id->user_id;
    $entry_no = "2013CS50168";//$id->uniqueiitdid;
    $q="SELECT position,assoc FROM cv_admins WHERE entryno='$entry_no' or entryno='$kerberos'";
    $r=$con->query($q);
    $post=$r->fetch_row();
    $gsec= $post[1]=="General";
    $faculty = $post[0]=="Faculty";
    $secy = $post[0]=="Secretary";
    if($gsec){
        $q = "SELECT type from cv_logs where event='unread'";
        $r = $con->query($q);
        $d=$r->fetch_row();
        $unread = $d[0];
    }
//}
//else {
//    header('Location: index.php');
//    exit;
//}
function getRealPOST() {
    $pairs = explode("&", file_get_contents("php://input"));
    $vars = array();
    foreach ($pairs as $pair) {
        $nv = explode("=", $pair);
        $name = urldecode($nv[0]);
        $value = urldecode($nv[1]);
        $vars[$name] = $value;
    }
    return $vars;
}
?>
