<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新闻页面</title>
    <link type="text/css" rel="stylesheet" href="../public/css/singlePage.css">
</head>
<body>
<?php
include("sqlconnect.php");
session_start();
if(!empty($_SESSION["acc"])){
    $session=$_SESSION["acc"];
}
if(!empty($_GET["articleid"])){
    $article_id=$_GET["articleid"];
    $sql="UPDATE yaowen set click=click+1 where id=$article_id";
    $resul=mysqli_query($conn,$sql);
}

?>
<div class="body">
    <div class="top">       
        <div class="top_center">                               <!--头部图标和返回首页--> 
           <div class="top_logo">
               <a href="index.php" rel="external"><img src="../public/img/index_logo.jpg" alt="网站logo"></a>
           </div>

           <div class="top_back" id="top_back">
               <a href='index.php'>首页</a>
               <?php
              if(!empty($_SESSION["acc"]))
              {
              echo " $session";
              };
                ?>
           </div>           
        </div>       
    </div>
    <div class="article_main">                                                        <!--新闻单页内容及军情热点-->
         <table>
             <tr>
                 <td valign="top">
                     <div class="main_left">
                         <?php
                            if(!empty($_GET["articleid"])){
                                $sql="SELECT * from yaowen where id=$_GET[articleid]";
                                $result=mysqli_query($conn,$sql);
                                $row=mysqli_fetch_object($result);
                                echo "<center><h2 style='margin:5px 0 10px 0'>$row->title</h2>
                                      <div>$row->first_time</div>
                                      <div><img style='width:400px;height:300px' src='$row->img'></div></center>";
                                $article_1=htmlspecialchars_decode($row->article);
                                echo "<div style='letter-spacing:3px;padding:10px'>$article_1</div>";
                            }
                            
                         ?>
                     </div>
                     <div class="comment">
                         <div class="comment_title">&nbsp;我来说两句</div>
                         <div>
                             <form style="margin-left:10px;margin-bottom:20px" action="comment.php?articleid=<?php echo $_GET['articleid']; ?>" method="POST">
                                 <textarea name="message" rows="4" cols="110"></textarea> 
                                 <?php
                                     if(!empty($_SESSION["acc"])) {
                                            echo "<input type='submit' name='comment' value='发布'>";
                                      }else {
                                          echo "登陆后可评论";
                                      }
                                 ?>
                             </form>
                         </div>
                         <div class="comment_title">&nbsp;最新评论</div><hr>
                         <div class="message_1">
                             <div class="message_2">                                         <!--显示评论-->
                                 <?php
                                    $sql="SELECT * from comment where articleid=$_GET[articleid] order by id desc";
                                    $resu=mysqli_query($conn,$sql);
                                    while($rows=mysqli_fetch_object($resu)){
                                        echo "$rows->username:&nbsp;$rows->pl_text<br><span style='font-size:5px'>$rows->pl_time</span><br>";
                                    }
                                 ?>
                             </div>
                         </div>
                     </div>
                 </td>
                 <td valign="top">
                     <div class="main_right">
                         <h3>军情热点</h3><hr>
                         <div style="padding:0 0 10px 10px;">
                         <?php
                             $result_hot=mysqli_query($conn,"SELECT * from yaowen order by click desc");
                             $num=1;
                             $color="red";
                             while($resultHot=mysqli_fetch_object($result_hot)){
                                echo "<li style='width:320px;height:24px;overflow:hidden'>
                                <span style='background-color:$color;
                                           display:block;
                                           float:left;
                                           color:white;
                                           border-radius:4px;
                                           margin-right:10px;
                                           text-align:center;
                                           width:14px;
                                           height:14px;
                                           line-height:14px;
                                           font-size:12px;
                                           position:relative;
                                           top:4px'>
                                $num
                                </span>
                                <span><a style='color:black;height:14px;width:100%;' href='news_single.php?articleid=$resultHot->id' target='_block'>$resultHot->title</a></span>
                             </li>";
                                $num=$num+1;
                                if($num<4){
                                    $color="orange";
                                }else{
                                    $color="gray";
                                }
                                if($num>15){
                                   break;
                                }
                             }
                         ?>
                      </div>    
                     </div>
                 </td>
             </tr>
             <tr></tr>                                                       <!--可在此处添加页脚-->
         </table>
    </div>
</div>
<div class="foot">
    <div class="foot_text">@朱其旺 版权所有</div>
</div>
<?php
   if(empty($_SESSION["acc"])) {

   }
?>
</body>
</html>