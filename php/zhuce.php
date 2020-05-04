<?php
    header("refresh:1;url=index.php");
    $email=$_POST["email"];
    $username=$_POST["username"];
    $password=$_POST["password"];
    $conn=mysqli_connect("localhost","root","19970715","newsdb");
    if(!$conn){
        die("Connection failed:".mysqli_connect_error());
    }

    $sql="INSERT into user(email,username,pw) values('$email','$username','$password')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('用户注册成功')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
    ?>
