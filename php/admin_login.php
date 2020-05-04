 <?php
 include("sqlconnect.php");
 $email=$_POST["email"];
 $pw=$_POST["password"];

 if(empty($email)){
     echo "<script>alert('用户名不能为空')</script>";
 }else{
    $sql="SELECT * from administrator where email='$email'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_object($result);
    if(!empty($result)){
        if($row->pw==$pw){
            echo "<script>alert('登录成功')</script>";
            header("refresh:1,url=admin.php");       
        }else{
            echo "<script>alert('密码错误')</script>";
            header("refresh:1,url=../resource/admin_login.html");
        }
    }else{
        echo "<script>alert('无效账号')</script>";
        header("refresh:1,url=../resource/admin_login.html");
    }
 }
 ?>