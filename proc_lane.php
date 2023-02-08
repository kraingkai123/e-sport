<?php
session_start();
if(!$_SESSION['username']){
    header("location: index.php");
    exit;
}
include('./include/connect.php');
if ($_GET['proc'] != "") {
    $_POST['proc'] = "";
}
if ($_POST['proc'] == 'add') {
    $sql = "INSERT INTO lanes (name_lane) VALUES ('" . $_POST['name_lane'] . "')";

    if (mysqli_query($conn, $sql)) {
    } else {
        echo mysqli_error($conn);
        exit;
    }
} else if ($_POST['proc'] == 'edit') {

    $sql = "UPDATE lanes  SET name_lane='" . $_POST['name_lane'] . "' WHERE lane_id='" . $_POST['lane_id'] . "'";

    if (mysqli_query($conn, $sql)) {
    } else {
        echo mysqli_error($conn);
        exit;
    }
} else if ($_GET['proc'] == "del") {
    $sql = "DELETE FROM lanes WHERE lane_id='" . $_GET['lane_id'] . "'";
    if (mysqli_query($conn, $sql)) {
    } else {
        echo mysqli_error($conn);
        exit;
    }
}
?>

<form id="form_back" name="form_back" method="post" action="setup_lan.php">

</form>
<script language="JavaScript">
    form_back.submit();
</script>