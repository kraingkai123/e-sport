<?php
include('./include/connect.php');
if($_GET['proc'] !=""){
    $_POST['proc']="";
}
if ($_POST['proc'] == 'add') {
    $sql = "INSERT INTO tournaments (tour_name,start_date,end_date) VALUES ('" . $_POST['tour_name'] . "','" . date2db($_POST['start_date']) . "','" . date2db($_POST['end_date']) . "')";

    if (mysqli_query($conn, $sql)) {
    } else {
        echo mysqli_error($conn);
        exit;
    }
} else if ($_POST['proc'] == "edit") {
    $sql = "UPDATE tournaments SET tour_name='" . $_POST['tour_name'] . "',start_date='" . date2db($_POST['start_date']) . "',end_date='" . date2db($_POST['end_date']) . "' WHERE tour_id='" . $_POST['tour_id'] . "'";
    if (mysqli_query($conn, $sql)) {
    } else {
        echo mysqli_error($conn);
        exit;
    }
}else if($_GET['proc']=="del"){
    $sql = "DELETE FROM tournaments WHERE tour_id='".$_GET['tour_id']."'";
    if (mysqli_query($conn, $sql)) {
    } else {
        echo mysqli_error($conn);
        exit;
    }
}
?>
<form id="form_back" name="form_back" method="post" action="tornament.php">
		
	</form>
	<script language="JavaScript">
		form_back.submit();
	</script>