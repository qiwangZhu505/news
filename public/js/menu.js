$(document).ready(function(){
     $("#guofang").click(function(){
          var type=$("#guofang").attr("value");
          $.post("article_menu.php",{name:type},function(information){
               $("#main_left").html(information);
          })
          return false;
     });
     $("#shendu").click(function(){
          var type=$("#shendu").attr("value");
          $.post("article_menu.php",{name:type},function(information){
               $("#main_left").html(information);
          })
          return false;
     });
     $("#hangkong").click(function(){
          var type=$("#hangkong").attr("value");
          $.post("article_menu.php",{name:type},function(information){
               $("#main_left").html(information);
          })
          return false;
     });
     $("#junshi").click(function(){
          var type=$("#junshi").attr("value");
          $.post("article_menu.php",{name:type},function(information){
               $("#main_left").html(information);
          })
          return false;
     });
     $("#bingqi").click(function(){
          var type=$("#bingqi").attr("value");
          $.post("article_menu.php",{name:type},function(information){
               $("#main_left").html(information);
          })
          return false;
     });
     $("#zatan").click(function(){
          var type=$("#zatan").attr("value");
          $.post("article_menu.php",{name:type},function(information){
               $("#main_left").html(information);
          })
          return false;
     });

})
