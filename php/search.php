<?php
include("sqlconnect.php");

$key = isset($_POST["name"])? htmlspecialchars($_POST['name']) :'';

  $sql="SELECT *from yaowen where title like '%$key%'";
  $result=mysqli_query($conn,$sql);
  if (mysqli_num_rows($result) < 1){
    echo '没有相关新闻，换个关键词试试吧！';
}else{
  while($row=mysqli_fetch_object($result)){
    echo "<div class='article_li'>
                 <div class='article_img'><a href='news_single.php?articleid=$row->id' target='_block'>
                        <img style='width:180px;height:120px' src='$row->img'>
                  </a></div>
                      <h4><a href='news_single.php?articleid=$row->id' target='_blank'>$row->title</a></h4>
                      <div class='time_comment'>
                      <span>$row->first_time</span>
                    <span style='float:right'>
                      <span><img style='width:20px;height:20px' src='../public/img/eye.png'></span>
                      <span>$row->click</span>
                      </span>
                      </div>
           </div>
            ";
  }
}
?>