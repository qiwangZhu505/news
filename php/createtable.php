<?php
/*
include("sqlconnect.php");
  $sql="CREATE table yaowen(
      id int primary key,
      title varchar(50) not null,
      news_type varchar(10),
      article text not null,
      img char(225),
      first_time datetime,
      click int,
      com_count int
  )";
  if(mysqli_query($conn,$sql)){
      echo "数据表yaowen创建成功";
  }else{
      echo "创建数据表报错：",mysqli_error($conn);
  }
  mysqli_close($conn);

  include("sqlconnect.php");
  $sql="CREATE table comment(
      id int primary key,
      username varchar(20),
      articleid smallint(6),
      pl_text text not null,
      pl_time datetime
  )";
  if(mysqli_query($conn,$sql)){
      echo "评论表创建成功";
  }else
  {
      echo "创建数据表错误",mysqli_error($conn);
  }
  mysqli_close($conn);
*/
include("sqlconnect.php");
$sql="CREATE table admin(
    email int primary key,
    username varchar(20),
    pw varchar(30)
)";
if(mysqli_query($conn,$sql)){
    echo "管理员表创建成功";
}else
{
    echo "创建数据表错误",mysqli_error($conn);
}
mysqli_close($conn);
?>

  