<?php

include('./include/connect.php');
if ($_GET['proc'] != "") {
    $_POST['proc'] = "";
}
if ($_POST['proc'] == 'add') {
    $sql = "INSERT INTO matchs (team_A,team_B,date,tour_id) VALUES ('" . $_POST['team_A'] . "','" . $_POST['team_B'] . "','" . date2db($_POST['play_date']) . "','" . $_POST['tour_id'] . "')";

    if (mysqli_query($conn, $sql)) {
        $last_id = " select last_insert_id() as id";
        $result = mysqli_query($conn, $last_id);
        $row = mysqli_fetch_assoc($result);
        $re_id = preg_replace('/\s+/', '_', $row['id']);

        $sql = "INSERT INTO frm_team (team_id,match_id) VALUE ('" . $_POST['team_A'] . "','" . $re_id . "')";
        mysqli_query($conn, $sql);
        $sql = "INSERT INTO frm_team (team_id,match_id) VALUE ('" . $_POST['team_B'] . "','" . $re_id . "')";
        mysqli_query($conn, $sql);
    } else {
        echo mysqli_error($conn);
        exit;
    }
} else if ($_POST['proc'] == "edit") {
    $sql = "UPDATE matchs SET team_A='" . $_POST['team_A'] . "',team_B='" . $_POST['team_B'] . "',tour_id='" . $_POST['tour_id'] . "',date='" . date2db($_POST['play_date']) . "' WHERE match_id='" . $_POST['match_id'] . "'";
    if (mysqli_query($conn, $sql)) {
        mysqli_query($conn,"DELETE FROM frm_team  WHERE match_id='" . $_POST['match_id'] . "'");
        $sql = "INSERT INTO frm_team (team_id,match_id) VALUE ('" . $_POST['team_A'] . "','" . $re_id . "')";
        mysqli_query($conn, $sql);
        $sql = "INSERT INTO frm_team (team_id,match_id) VALUE ('" . $_POST['team_B'] . "','" . $re_id . "')";
        mysqli_query($conn, $sql);
    } else {
        echo mysqli_error($conn);
        exit;
    }
} else if ($_GET['proc'] == "del") {
    $sql = "DELETE FROM matchs WHERE match_id='" . $_GET['match_id'] . "'";
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