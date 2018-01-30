<?php
function db_connect()
{
    $link = mysql_connect("localhost", "root", "11915445");
    mysql_select_db("chat");
    return true;
}

/*create table chat(
id bigint AUTO_INCREMENT,
username varchar(20),
chatdate datetime,
msg varchar(500),
ip char(30),
primary key(id));*/
?>