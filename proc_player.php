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
    if (!empty($_FILES['file_upload']['name'])) {
        //$_FILES คำสั่งอ่านค่าจากการอัพโหลด
        $old_filename = $_FILES['file_upload']['name'];
        //$new_filename = $_FILES['fileUpload']['name'];
        ///----
        list($txt, $ext) = explode(".", $old_filename);
        $new_file_name = date("YmdHis") . rand(0, 99999999) . "." . $ext;
        //ตั้งชื่อใหม่
        copy($_FILES['file_upload']['tmp_name'], "img/player/" . $new_file_name); //copy ภาพไปใส่ในโฟลเดอร์ upload
         $sql = "INSERT INTO players (ingame_name,fname,lname,nick_name,tell,team_id,img_player)
          VALUES ('" . $_POST['ingame_name'] . "','" . $_POST['fname'] . "','" . $_POST['lname'] . "',
          '" . $_POST['nick_name'] . "','" . $_POST['tell'] . "','" . $_POST['team_id'] . "','" . $new_file_name . "')";

        if (mysqli_query($conn, $sql)) {
        } else {
            echo mysqli_error($conn);
            exit;
        }
    }
} else if ($_POST['proc'] == "edit") {

    if (!empty($_FILES['file_upload']['name'])) {
        $SQL = "SELECT img_player FROM players WHERE player_id='" . $_POST['player_id'] . "'";
        $query = mysqli_query($conn, $SQL);
        $rec = mysqli_fetch_array($query);
        unlink("img/player/".$rec['img_player']);
        //$_FILES คำสั่งอ่านค่าจากการอัพโหลด
        $old_filename = $_FILES['file_upload']['name'];
        //$new_filename = $_FILES['fileUpload']['name'];
        ///----
        list($txt, $ext) = explode(".", $old_filename);
        $new_file_name = date("YmdHis") . rand(0, 99999999) . "." . $ext;
        //ตั้งชื่อใหม่
        copy($_FILES['file_upload']['tmp_name'], "img/player/" . $new_file_name); //copy ภาพไปใส่ในโฟลเดอร์ upload
         $sql = "UPDATE players SET 
         ingame_name='".$_POST['ingame_name']."',fname='".$_POST['fname']."',
         lname='".$_POST['lname']."',nick_name='".$_POST['nick_name']."',
         tell='".$_POST['tell']."',team_id='".$_POST['team_id']."',
         img_player='".$new_file_name."' WHERE player_id='".$_POST['player_id']."'";

        if (mysqli_query($conn, $sql)) {
        } else {
            echo mysqli_error($conn);
            exit;
        }
    }else{
        $sql = "UPDATE players SET 
        ingame_name='".$_POST['ingame_name']."',fname='".$_POST['fname']."',
        lname='".$_POST['lname']."',nick_name='".$_POST['nick_name']."',
        tell='".$_POST['tell']."',team_id='".$_POST['team_id']."'
        WHERE player_id='".$_POST['player_id']."'";

        if (mysqli_query($conn, $sql)) {
        } else {
            echo mysqli_error($conn);
            exit;
        }
    }
} else if ($_GET['proc'] == "del") {
    $SQL = "SELECT img_player FROM players WHERE player_id='" . $_GET['player_id'] . "'";
    $query = mysqli_query($conn, $SQL);
    $rec = mysqli_fetch_array($query);
    unlink("img/player/".$rec['img_player']);
    $sql = "DELETE FROM players WHERE player_id='" . $_GET['player_id'] . "'";
    if (mysqli_query($conn, $sql)) {
    } else {
        echo mysqli_error($conn);
        exit;
    }
}
?>

<form id="form_back" name="form_back" method="post" action="player.php">

</form>
<script language="JavaScript">
    form_back.submit();
</script>