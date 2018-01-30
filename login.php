<?php
require_once('dbconnect.php');
db_connect();
session_start();
    if($_POST['submit']){
        $user=$_POST['user'];
        if($user==""){
            echo "<script>alert('请输入用户名');window.location.href='login.html'</script>";

        }else{
            $_SESSION['user']=$user;
            $dt = date("Y-m-d H:i:s");
            $msg="{$user}加入了聊天室";
            $sql="insert into chat(USERNAME,CHATDATE,MSG,IP) values('系统消息','{$dt}','{$msg}','{$ip}')";

            $result = mysql_query($sql);
            echo "<script>window.location.href='index.php?user={$user}';</script>";
        }
    }
?>
