<?php
    session_start();
    header("refresh:1;url=index.php");
    $email=$_POST["email"];
    $password=$_POST["password"];
    $conn=mysqli_connect("localhost","root","19970715","newsdb");
    if(!$conn){
        die("Connection failed:".mysqli_connect_error());
    }

    $sql="SELECT * from user where email='$email'";
    $res=mysqli_query($conn,$sql);
    $result=mysqli_fetch_array($res);
    if ($result) {
        if($result["pw"]==$password){
            echo "<script>alert('登录成功')</script>";
            $_SESSION['acc']=$result["username"];
        }else{
            echo "<script>alert('密码错误，请重新输入')</script>";
        }
    } else {
        echo "<script>alert('用户不存在')</script>";
    }
    mysqli_close($conn);
?>