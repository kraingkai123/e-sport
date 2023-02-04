<?php
include('./include/connect.php');
if ($_GET['proc'] != "") {
    $_POST['proc'] = "";
}
if ($_POST['proc'] == 'add') {
    $sql = "INSERT INTO `match_player_details` (`hero_id`, `player_id`, `kills`, `assist`, `death`
    , `gold`, `mvp`, `atk`, `def`, `team_fight`, `m_detail_id`, `lane_id`, `team_id`)
     VALUES ('".$_POST['hero']."', '".$_POST['player_id']."', 
     '".$_POST['kill']."','".$_POST['assist']."', '".$_POST['death']."'
     , '".$_POST['gold']."', '".$_POST['mvp']."',  '".$_POST['atk']."',  '".$_POST['defense']."', 
     '".$_POST['teme_fight']."', '".$_POST['m_detail_id']."', '".$_POST['lane']."', '".$_POST['team_id']."');";

    if (mysqli_query($conn, $sql)) {
    } else {
        echo mysqli_error($conn);
        exit;
    }
} else if ($_GET['proc'] == "del") {
    $sql = "DELETE FROM match_player_details WHERE p_detail_id='" . $_GET['p_detail_id'] . "'";
    if (mysqli_query($conn, $sql)) {
        $_POST['m_detail_id'] = $_GET['m_detail_id'];
        $_POST['match_id'] = $_GET['match_id'];
    } else {
        echo mysqli_error($conn);
        exit;
    }
}
?>

<form id="form_back" name="form_back" method="post" action="add_game_detail.php?proc=add&m_detail_id=<?php echo $_POST['m_detail_id'] ?>&match_id=<?php echo $_POST['match_id'];?>">

</form>
<script language="JavaScript">
    form_back.submit();
</script>