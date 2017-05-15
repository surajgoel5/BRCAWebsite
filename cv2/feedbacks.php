<?php
/**
 * Created by PhpStorm.
 * User: mew
 * Date: 10/17/16
 * Time: 5:48 PM
 */
include_once ('db-info.php');
$r=$con->query("SELECT * from feedback");
while($row=$r->fetch_assoc())
{
    echo $row["name"]." says ".$row["feed"];
    if($row["kerberos"]) echo "at ".$row["kerberos"];
    echo "<hr>";
}