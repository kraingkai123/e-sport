<?php
include('./include/connect.php');
if($_GET['proc'] !=""){
    $_POST['proc']="";
}
if ($_POST['proc'] == 'add') {
   $sql = "INSERT INTO matchs (team_A,team_B,date,tour_id) VALUES ('" . $_POST['team_A'] . "','" . $_POST['team_B'] . "','" . date2db($_POST['play_date']) . "','" . $_POST['tour_id'] . "')";

    if (mysqli_query($conn, $sql)) {
    } else {
        echo mysqli_error($conn);
        exit;
    }
} else if ($_POST['proc'] == "edit") {
    $sql = "UPDATE matchs SET team_A='" . $_POST['team_A'] . "',team_B='" . $_POST['team_B'] . "',tour_id='" . $_POST['tour_id'] . "',date='" . date2db($_POST['play_date']) . "' WHERE match_id='" . $_POST['match_id'] . "'";
    if (mysqli_query($conn, $sql)) {
    } else {
        echo mysqli_error($conn);
        exit;
    }
}else if($_GET['proc']=="del"){
    $sql = "DELETE FROM matchs WHERE match_id='".$_GET['match_id']."'";
    if (mysqli_query($conn, $sql)) {
    } else {
        echo mysqli_error($conn);
        exit;
    }
}
?>

<form id="form_back" name="form_back" method="post" action="match.php">
		
	</form>
	<script language="JavaScript">
		form_back.submit();
	</script>