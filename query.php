<?php
include_once 'db.php';

$sql = "SELECT * FROM users4";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

echo $row['fname']." ".$row['lname'];

$first = "sagar";
$last = "dm";
$email = "s@gmail.com";
$uid = "sdm";
$hashpwd = "sdm";
$phone = "9611587304";


$sql = "INSERT INTO users4 (fname,lname,email,u_id,pass,phone,tech) VALUES ('$first','$last','$email','$uid','$hashpwd','$phone',0)";
//$sql = "INSERT INTO images (user_id,stat,format,num) VALUES ('tdm',1,'jpg',1)"; - this works
$result = mysqli_query($conn,$sql);

$sql = "SELECT * FROM users4 WHERE u_id='$uid'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

echo $row['fname']." ".$row['lname'];




