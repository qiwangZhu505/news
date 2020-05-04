<?php
header("refresh:1,url='../resource/admin_login.html'");
  include("sqlconnect.php");
  $email=$_POST["email"];
  $name=$_POST["name"];
  $password=$_POST["password"];
  $sql="INSERT into administrator(email,username,pw) VALUES('$email','$name','$password')";
  if (mysqli_query($conn, $sql)) {
    echo "<script>alert('管理员注册成功')</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>