<?php
include("../include/connect.php");
$SQL = "SELECT img_hero FROM heros WHERE hero_id ='".$_POST['id']."'";
$query = mysqli_query($conn,$SQL);
$rec = mysqli_fetch_array($query);
?>
 <img src="img/hero/<?php echo $rec['img_hero'];?>" class="rounded mx-auto d-block" alt="..." width="200px" height="200px">