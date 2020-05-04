<?php
header("refresh:0.1;url=admin.php");
include("sqlconnect.php");
$conn->query("set names'utf8'");
$conn->set_charset('utf8_general_ci');

$img_location="../upload/".$_FILES["file"]["name"];
move_uploaded_file($_FILES["file"]["tmp_name"],$img_location);


$add_news_type = isset($_POST["add_news_type"])? htmlspecialchars($_POST['add_news_type']) :'';
$sub_time= date("Y-m-d H:i:s");

if($_POST["news_title"]==""){
    echo "<script>alert('标题不能为空')</script>";
}else if($_POST["news_article"]==""){
    echo "<script>alert('内容不能为空')</script>";
}else if($add_news_type==""){
    echo "<script>alert('请选择新闻所属板块')</script>";
}else{
    $sql="INSERT into yaowen(title,article,img,news_type,first_time)
    VALUES('$_POST[news_title]','$_POST[news_article]','$img_location','$add_news_type','$sub_time')";
    $result=mysqli_query($conn,$sql);
    if ($result) {
           echo "<script>alert('新闻发布成功')</script>";
    } else {
         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>