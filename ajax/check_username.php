<?php
include("../include/connect.php");
$SQL = "SELECT COUNT(1) as c FROM users WHERE username='".$_POST['username']."'";
$query = mysqli_query($conn,$SQL);
$rec = mysqli_fetch_array($query);
if($rec['c']> 0){
    echo true;
}else{
    echo false;
}