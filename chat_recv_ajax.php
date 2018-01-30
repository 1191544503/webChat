<?php
header("Content-Type:text/html;charset=utf-8");
require_once('dbconnect.php');
db_connect();
$sql = "SELECT * FROM chat order by ID";
$result = mysql_query($sql) or die('Query failed: ' . mysql_error());


$msg="<table border='0' style='font-size: 10pt;'>";
while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
{
    $msg = $msg . "<tr><td width='115px'>" . $line["chatdate"] . " </td>" .
        "<td>" . $line["username"] . ": </td>" .
        "<td>" . $line["msg"] . "</td></tr>";
}
$msg=$msg . "</table>";
echo $msg;
?>