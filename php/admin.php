<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="../public/css/admin_.css" media="all">
    <script type="text/javascript" src="../public/js/jquery.js"></script>
    <script type="text/javascript" src="../public/js/admin.js"></script>
    <title>网站后台管理页面</title>
</head>
<body>

    <div class="body">
        <div class="top">
            <span>网站后台管理页面</span>
        </div>
        <div class="menu">                                        <!--标题选项-->
               <form action="" method="POST" class="menu_table">
                   <div>新闻管理</div>
                   <div id="news_list"><a href="#">新闻列表</a></div>
                   <div id="add_news"><a href="#">添加新闻</a></div>
               </form>
        </div>

        <div class="main">                                         <!--内容部分-->
                <div class="news_table">                           <!--新闻列表页面-->
                    <div class="news_table_top">新闻列表</div> 
                    <div class="article_list">
                        <table>
                                <tr class="tr_first">
                                    <td class="table_id">ID</td>
                                    <td class="table_title">标题</td>
                                    <td class="table_type">类别</td>
                                    <td class="table_time">发布时间</td>
                                    <td class="table_click">点击量</td>
                                    <td class="table_comment">评论数</td>
                                    <td class="table_delete">操作</td>
                                </tr>
                                <?php
                                include("sqlconnect.php");

                                if(@$_GET["link"]=="note")
                                   {
                                       if(!empty($_GET['delarticleid']))
                                           {
                                              $sql=mysqli_query($conn,"delete from yaowen where id=$_GET[delarticleid]");
                                              echo "<script>alert('删除成功')</script>";
	                                       }
                                   };
                                $articlesql=mysqli_query($conn,"select * from yaowen;");
                                while($articlerow=mysqli_fetch_object($articlesql))
	                            {    
                                    switch($articlerow->news_type){
                                        case "guoFang":$newsType="国防";
                                    break;
                                        case "shenDu":$newsType="深度";
                                    break;
                                        case "hangKong":$newsType="航空";
                                    break;
                                        case "junShi":$newsType="军史";
                                    break;
                                        case "bingQi":$newsType="兵器";
                                    break;
                                        case "zaTan":$newsType="杂谈";
                                    break;
                                        case "lunBo":$newsType="轮播";
                                    break;
                                    default:echo "无类别";
                                    }; 
                                       echo "<tr>
                                                <td>$articlerow->id</td>
                                                <td>$articlerow->title</td>
                                                <td>$newsType</td>
                                                <td>$articlerow->first_time</td>
                                                <td>$articlerow->click</td>
                                                <td>$articlerow->com_count</td> 
                                                <td><a href='admin.php?link=note&delarticleid=$articlerow->id'><img src='../public/img/delete.png'></a></td>                                              
                                             </tr>";
                                   
                                }
                                ?>
                        </table>
                    </div>

                </div>
                <div class="add_news">                              <!--新闻添加页面-->
                    <div class="add_news_top">添加新闻</div>
                    <div>
                        <form action="insert.php" method="post" class="add_news_body" enctype="multipart/form-data">
                            <div>标题: <input type="text" name="news_title" style="width:700px;height:20px"></div>
                            <div>类别:
                                <select name="add_news_type" id="" style="width: 80px;height:25px;">
                                    <option value="">选择类别</option>
                                    <option value="guoFang">国防</option>
                                    <option value="shenDu">深度</option>
                                    <option value="hangKong">航空</option>
                                    <option value="junShi">军史</option>
                                    <option value="bingQi">兵器</option>
                                    <option value="zaTan">杂谈</option>
                                    <option value="lunBo">轮播</option>
                                </select>
                            </div>
                            <div>正文:
                                <textarea name="news_article" rows="15" cols="100"></textarea>
                            </div>
                            <div>资源:
                                <input type="file" name="file">
                            </div>
                            <div><input type="submit" name="submit" value="提交"></div>
                        </form>
                    </div>
                </div>
        </div>              
    </div>

</body>
</html>