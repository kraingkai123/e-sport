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
        copy($_FILES['file_upload']['tmp_name'], "img/hero/" . $new_file_name); //copy ภาพไปใส่ในโฟลเดอร์ upload
         $sql = "INSERT INTO heros (hero_name,img_hero) VALUES ('" . $_POST['hero_name'] . "','" . $new_file_name . "')";

        if (mysqli_query($conn, $sql)) {
        } else {
            echo mysqli_error($conn);
            exit;
        }
    }
} else if ($_POST['proc'] == "edit") {

    if (!empty($_FILES['file_upload']['name'])) {
        $SQL = "SELECT img_hero FROM heros WHERE hero_id='" . $_POST['hero_id'] . "'";
        $query = mysqli_query($conn, $SQL);
        $rec = mysqli_fetch_array($query);
        unlink("img/hero/".$rec['img_hero']);
        //$_FILES คำสั่งอ่านค่าจากการอัพโหลด
        $old_filename = $_FILES['file_upload']['name'];
        //$new_filename = $_FILES['fileUpload']['name'];
        ///----
        list($txt, $ext) = explode(".", $old_filename);
        $new_file_name = date("YmdHis") . rand(0, 99999999) . "." . $ext;
        //ตั้งชื่อใหม่
        copy($_FILES['file_upload']['tmp_name'], "img/hero/" . $new_file_name); //copy ภาพไปใส่ในโฟลเดอร์ upload
         $sql = "UPDATE heros SET hero_name='".$_POST['hero_name']."',img_hero='".$new_file_name."' WHERE hero_id='".$_POST['hero_id']."'";

        if (mysqli_query($conn, $sql)) {
        } else {
            echo mysqli_error($conn);
            exit;
        }
    }else{
        echo $sql = "UPDATE heros SET hero_name='".$_POST['hero_name']."' WHERE hero_id='".$_POST['hero_id']."'";

        if (mysqli_query($conn, $sql)) {
        } else {
            echo mysqli_error($conn);
            exit;
        }
    }
} else if ($_GET['proc'] == "del") {
    $SQL = "SELECT img_hero FROM heros WHERE hero_id='" . $_GET['hero_id'] . "'";
    $query = mysqli_query($conn, $SQL);
    $rec = mysqli_fetch_array($query);
    unlink("img/hero/".$rec['img_hero']);
    $sql = "DELETE FROM heros WHERE hero_id='" . $_GET['hero_id'] . "'";
    if (mysqli_query($conn, $sql)) {
    } else {
        echo mysqli_error($conn);
        exit;
    }
}
?>

<form id="form_back" name="form_back" method="post" action="hero.php">

</form>
<script language="JavaScript">
    form_back.submit();
</script>