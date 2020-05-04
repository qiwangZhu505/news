<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>中国军事网</title>
    <link type="text/css" rel="stylesheet" href="../public/css/mainpagetop.css" media="all">
    <link type="text/css" rel="stylesheet" href="../public/css/mainpagebody.css" media="all">
    <script type="text/javascript" src="../public/js/jquery.js"></script>
    <script type="text/javascript" src="../public/js/login.js"></script>
    <script type="text/javascript" src="../public/js/lunbo.js"></script>
    <script type="text/javascript" src="../public/js/menu.js"></script>
    <script type="text/javascript" src="../public/js/search_.js"></script>
</head>
<body>
<?php
session_start();
if(!empty($_SESSION["acc"]))                             
$session=$_SESSION["acc"];                                   //传递登录信息  $session为用户名             
if(isset($_GET["link"]))
{
unset($_SESSION["acc"]);
$url = 'index.php';
header("Location:$url");
}
?>
<div>
    <div class="top_login_main">                                <!--登录模块弹出-->
        <div class="top_login_div"></div>     <!--半透明背景-->    
        <div id="login_id">                   <!--登录框-->
            <a href="#"><img id="login_close" src="../public/img/close.png"></a>
            <form action="userlogin.php" method="POST" id="user_login">
                <input type="text" class="userlogin" id="email" name="email" placeholder="请输入邮箱账号">
                <input type="password" class="userlogin" id="password" name="password" placeholder="请输入密码">
                <input type="submit" class="userloginbtn" id="user_login_btn" value="登录">
                <a href="#" id="zhuceBtn">注册</a>
            </form>
        </div>
        <div id="zhuce_div">                               <!--注册框-->
            <a href="#"><img id="zhuce_close" src="../public/img/close.png"></a>
            <form action="zhuce.php" method="POST" id="user_zhuce">
                <input type="text" class="userlogin" id="email" name="email" placeholder="请输入邮箱账号">
                <input type="text" class="userlogin" id="username" name="username" placeholder="请输入用户名">
                <input type="text" class="userlogin" id="password" name="password" placeholder="请输入密码">
                <input type="submit" class="userloginbtn" id="user_zhuce_btn" value="注册">
            </form>
        </div>
    </div>   
    <div class="top">                                              <!--头部图标和搜索框登录注册--> 
        <div class="top_center">                               
           <div class="top_logo">
               <a href="index.php" rel="external"><img src="../public/img/index_logo.jpg" alt="网站logo"></a>
           </div>
           <div class="top_search">                                                     <!--搜索框-->
                <form action="">
                    <input class="search_text" name="keyWord" type="text" id="key">
                    <a href="#"><span id="searchBox" style="padding:6px 6px 8px 6px">搜索</span></a>
                </form>
           </div>
           <div class="top_login" id="login">
               <?php
              if(!empty($_SESSION["acc"]))
              {
              //$accsql=mysqli_query($conn,"select username from acc where accid=$session;");
             // $accrow=mysqli_fetch_object($accsql);
              echo " $session
                   <a href='index.php?link=logoff'>退出</a><br><br>
                  ";
              }else{
               ?>
                <a class="a_login" href="#">登录</a>
                <?php
                }
                ?>
           </div>
        </div>       
    </div>
    <div class="menu">                                            <!--菜单导航栏-->
        <div class=menu_center>          
            <ul class="menu_title">
                <li class="menu_li">
                    <a class="menu_a" href="index.php" target="_self">首页</a>
                </li>
                <li class="menu_li">
                    <a class="menu_a" href="#" id="guofang" value="guoFang">国防</a>
                </li>
                <li class="menu_li">
                    <a class="menu_a" href="#" id="shendu" value="shenDu">深度</a>
                </li>
                <li class="menu_li">
                    <a class="menu_a" href="#" id="hangkong" value="hangKong">航空</a>
                </li>
                <li class="menu_li">
                    <a class="menu_a" href="#" id="junshi" value="junShi">军史</a>
                </li>
                <li class="menu_li">
                    <a class="menu_a" href="#" id="bingqi" value="bingQi">兵器</a>
                </li>
                <li class="menu_li">
                    <a class="menu_a" href="#" id="zatan" value="zaTan">杂谈</a>
                </li>
            </ul>
        </div>                        
    </div>
    <div class="main_out">                                         <!--新闻内容-->
      <div class="main">
        <table>                                                 
          <tr>
             <td valign="top">
                <div class="main_left" id="main_left">                                 <!--轮播和新闻内容-->
                    <h3>近期精选</h3><hr>
                    <div class="lunbo">                                    <!--轮播图-->
                        <div id="slide">
                          <ul class="pic-list">
                             <?php
                               include("sqlconnect.php");
                               $sql="SELECT *from yaowen where news_type='lunBo'";
                               $result_5=mysqli_query($conn,$sql);
                               while($rows=mysqli_fetch_object($result_5)){
                                   echo "<li style='display:block;position:relative' >
                                            <a href='news_single.php?articleid=$rows->id' target='_blank'>
                                                <img style='width:840px;height:400px' src='$rows->img'>
                                                <span>$rows->title</span>
                                            </a>
                                         </li>";
                               }
                             ?> 
                            </ul>
                            <div class="btn next">&gt;</div>
                            <div class="btn prev">&lt;</div>
                            <ul class="icon-list">
			                        <li class="active"></li>
			                        <li></li>
			                        <li></li>
                            </ul>
                        </div>
                    </div>                    
                    <h3>最新发布</h3><hr>
                    <div class="news_title">                             <!--最新新闻，按时间显示-->
                       <?php
                       include("sqlconnect.php");
                       $sql="SELECT * from yaowen order by id desc";
                       $result=mysqli_query($conn,$sql);                      
                       while($row=mysqli_fetch_object($result)){
                          if($row->news_type=="lunBo"){
                              continue;
                          }
                           echo "<div class='article_li'>
                                      <div class='article_img'><a href='news_single.php?articleid=$row->id' target='_block'>
                                         <img style='width:180px;height:120px' src='$row->img'>
                                      </a></div>
                                      <h4><a href='news_single.php?articleid=$row->id' target='_block'>$row->title</a></h4>
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
                       ?>
                    </div>
                </div>
             </td>
             <td valign="top">                                       <!--右侧军情热点-->
                <div class="main_right">                         
                      <h3>军情热点</h3><hr>
                      <div style="padding:0 0 10px 10px">
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
                                          <span><a style='color:black' href='news_single.php?articleid=$resultHot->id' target='_block'>$resultHot->title</a></span>
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
        </table>           
        </div>   
    </div> 
    <div class="foot">                                              <!--页脚-->
        <div class="foot_text">@朱其旺 版权所有</div>
    </div>              
</div>

</body>
</html>