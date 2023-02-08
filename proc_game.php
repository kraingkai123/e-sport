<?php
session_start();
if(!$_SESSION['username']){
    header("location: index.php");
    exit;
}
include('./include/connect.php');
if($_GET['proc'] !=""){
    $_POST['proc']="";
}
if ($_POST['proc'] == 'add') {
   $sql = "INSERT INTO match_details (time,match_id,match_name) VALUES ('" . $_POST['play_time'] . "','" . $_POST['match_id'] . "','".$_POST['match_name']."')";

    if (mysqli_query($conn, $sql)) {
    } else {
        echo mysqli_error($conn);
        exit;
    }
} else if($_GET['proc']=="del"){
     $sql = "DELETE FROM match_details WHERE m_detail_id='".$_GET['m_detail_id']."'";
     mysqli_query($conn,"DELETE  FROM summary WHERE m_detail_id='".$_POST['m_detail_id']."'");
    $_POST['match_id'] =$_GET['match_id'];
    if (mysqli_query($conn, $sql)) {
    } else {
        echo mysqli_error($conn);
        exit;
    }
}else if($_POST['proc']=='finshed'){
    mysqli_query($conn,"DELETE  FROM summary WHERE m_detail_id='".$_POST['m_detail_id']."'");
    $sql2 = "UPDATE match_details SET status ='".$_POST['status']."' WHERE m_detail_id='" . $_POST['m_detail_id'] . "'";
    mysqli_query($conn, $sql2);
    $sql = "INSERT INTO summary (team_win,m_detail_id) VALUES('".$_POST['status']."','".$_POST['m_detail_id']."')";
    if (mysqli_query($conn, $sql)) {
    } else {
        echo mysqli_error($conn);
        exit;
    }
}
?>

<form id="form_back" name="form_back" method="post" action="add_game.php?proc=add&&match_id=&match_id=<?php echo $_POST['match_id']?>">
		
	</form>
	<script language="JavaScript">
		form_back.submit();
	</script>