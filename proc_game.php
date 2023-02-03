<?php
include('./include/connect.php');
if($_GET['proc'] !=""){
    $_POST['proc']="";
}
if ($_POST['proc'] == 'add') {
   $sql = "INSERT INTO match_details (time,match_id) VALUES ('" . $_POST['play_time'] . "','" . $_POST['match_id'] . "')";

    if (mysqli_query($conn, $sql)) {
    } else {
        echo mysqli_error($conn);
        exit;
    }
} else if($_GET['proc']=="del"){
     $sql = "DELETE FROM match_details WHERE m_detail_id='".$_GET['m_detail_id']."'";
    $_POST['match_id'] =$_GET['match_id'];
    if (mysqli_query($conn, $sql)) {
    } else {
        echo mysqli_error($conn);
        exit;
    }
}else if($_POST['proc']=='finshed'){
    $sql = "UPDATE match_details SET status ='".$_POST['status']."' WHERE m_detail_id='" . $_POST['m_detail_id'] . "'";
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