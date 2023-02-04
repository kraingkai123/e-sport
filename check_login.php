<?php
include('./include/connect.php');
session_start();
$SQL = "SELECT * FROM users WHERE username='".$_POST['username']."' AND password ='".$_POST['password']."'";
$query = mysqli_query($conn,$SQL);
if(mysqli_num_rows($query) > 0){
    $rec = mysqli_fetch_array($query);
    $_SESSION['user_id'] = $rec['user_id'];
    $_SESSION['fullname'] = $rec['fname'].' '.$rec['lname'];
    $_SESSION['permission'] = $rec['position_id'];
    echo true;
}else{
    echo false;
}