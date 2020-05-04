<?php
$add_news_message = isset($_POST["message"])? htmlspecialchars($_POST['message']) :'';
include("sqlconnect.php");
session_start();
if(!empty($_SESSION["acc"]))
$session=$_SESSION["acc"];
if(!empty($_POST['message'])){
    $sub_time= date("Y-m-d H:i:s");
    $article_id=$_GET["articleid"];
    $message_=$_POST["message"];
    $sql="INSERT into comment(username,articleid,pl_text,pl_time)
    VALUES('$session','$article_id','$add_news_message','$sub_time')";
    $res=mysqli_query($conn,$sql);
};
$article_id=$_GET["articleid"];
$pl_count=mysqli_query($conn,"UPDATE yaowen set com_count=com_count+1 where id=$article_id");

if(!empty($_GET["articleid"])){
    $article_id=$_GET["articleid"];
    $sql="UPDATE yaowen set click=click-1 where id=$article_id";
    $resul=mysqli_query($conn,$sql);
}

mysqli_close($conn);
$url = 'news_single.php?articleid='.$_GET['articleid'];
header("Location:$url");
?>