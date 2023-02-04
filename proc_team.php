<?php
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
        copy($_FILES['file_upload']['tmp_name'], "img/team/" . $new_file_name); //copy ภาพไปใส่ในโฟลเดอร์ upload
         $sql = "INSERT INTO teams (team_name,school_id,img_team,user_id) VALUES ('" . $_POST['team_name'] . "','" . $_POST['school_id'] . "','" . $new_file_name . "','".$_SESSION['user_id']."')";

        if (mysqli_query($conn, $sql)) {
        } else {
            echo mysqli_error($conn);
            exit;
        }
    }
} else if ($_POST['proc'] == "edit") {

    if (!empty($_FILES['file_upload']['name'])) {
        $SQL = "SELECT img_team FROM teams WHERE team_id='" . $_POST['team_id'] . "'";
        $query = mysqli_query($conn, $SQL);
        $rec = mysqli_fetch_array($query);
        unlink("img/team/".$rec['img_team']);
        //$_FILES คำสั่งอ่านค่าจากการอัพโหลด
        $old_filename = $_FILES['file_upload']['name'];
        //$new_filename = $_FILES['fileUpload']['name'];
        ///----
        list($txt, $ext) = explode(".", $old_filename);
        $new_file_name = date("YmdHis") . rand(0, 99999999) . "." . $ext;
        //ตั้งชื่อใหม่
        copy($_FILES['file_upload']['tmp_name'], "img/team/" . $new_file_name); //copy ภาพไปใส่ในโฟลเดอร์ upload
         $sql = "UPDATE teams SET team_name='".$_POST['team_name']."',school_id='".$_POST['school_id']."',img_team='".$new_file_name."' WHERE team_id='".$_POST['team_id']."'";

        if (mysqli_query($conn, $sql)) {
        } else {
            echo mysqli_error($conn);
            exit;
        }
    }else{
        $sql = "UPDATE teams SET team_name='".$_POST['team_name']."',school_id='".$_POST['school_id']."' WHERE team_id='".$_POST['team_id']."'";

        if (mysqli_query($conn, $sql)) {
        } else {
            echo mysqli_error($conn);
            exit;
        }
    }
} else if ($_GET['proc'] == "del") {
    $SQL = "SELECT img_team FROM teams WHERE team_id='" . $_GET['team_id'] . "'";
    $query = mysqli_query($conn, $SQL);
    $rec = mysqli_fetch_array($query);
    unlink("img/team/".$rec['img_team']);
    $sql = "DELETE FROM teams WHERE team_id='" . $_GET['team_id'] . "'";
    if (mysqli_query($conn, $sql)) {
    } else {
        echo mysqli_error($conn);
        exit;
    }
}
?>

<form id="form_back" name="form_back" method="post" action="team.php">

</form>
<script language="JavaScript">
    form_back.submit();
</script>