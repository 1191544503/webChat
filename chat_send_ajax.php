<?php
require_once('dbconnect.php');
db_connect();

$dt = date("Y-m-d H:i:s");
$msg=$_GET['msg'];
$user=$_GET['name'];
$ip = $_SERVER["REMOTE_ADDR"];

$sql="insert into chat(USERNAME,CHATDATE,MSG,IP) values('{$user}','{$dt}','{$msg}','{$ip}');";

//echo $sql;
$result = mysql_query($sql);

?>