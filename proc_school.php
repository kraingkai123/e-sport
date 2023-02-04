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
        copy($_FILES['file_upload']['tmp_name'], "img/school/" . $new_file_name); //copy ภาพไปใส่ในโฟลเดอร์ upload
        $sql = "INSERT INTO schools (school_name,address,tell,img_school) VALUES ('" . $_POST['school_name'] . "','" . $_POST['address'] . "','" . $_POST['telephone'] . "','" . $new_file_name . "')";

        if (mysqli_query($conn, $sql)) {
        } else {
            echo mysqli_error($conn);
            exit;
        }
    }
} else if ($_POST['proc'] == "edit") {

    if (!empty($_FILES['file_upload']['name'])) {
        $SQL = "SELECT img_school FROM schools WHERE school_id='" . $_POST['school_id'] . "'";
        $query = mysqli_query($conn, $SQL);
        $rec = mysqli_fetch_array($query);
        unlink("img/school/" . $rec['img_school']);
        //$_FILES คำสั่งอ่านค่าจากการอัพโหลด
        $old_filename = $_FILES['file_upload']['name'];
        //$new_filename = $_FILES['fileUpload']['name'];
        ///----
        list($txt, $ext) = explode(".", $old_filename);
        $new_file_name = date("YmdHis") . rand(0, 99999999) . "." . $ext;
        //ตั้งชื่อใหม่
        copy($_FILES['file_upload']['tmp_name'], "img/school/" . $new_file_name); //copy ภาพไปใส่ในโฟลเดอร์ upload
        $sql = "UPDATE schools SET school_name='" . $_POST['school_name'] . "',address='" . $_POST['address'] . "',tell='" . $_POST['telephone'] . "',img_school='" . $new_file_name . "' WHERE school_id='" . $_POST['school_id'] . "'";

        if (mysqli_query($conn, $sql)) {
        } else {
            echo mysqli_error($conn);
            exit;
        }
    } else {
        $sql = "UPDATE schools SET school_name='" . $_POST['school_name'] . "',address='" . $_POST['address'] . "',tell='" . $_POST['telephone'] . "' WHERE school_id='" . $_POST['school_id'] . "'";

        if (mysqli_query($conn, $sql)) {
        } else {
            echo mysqli_error($conn);
            exit;
        }
    }
} else if ($_GET['proc'] == "del") {
    $SQL = "SELECT img_school FROM schools WHERE school_id='" . $_GET['school_id'] . "'";
    $query = mysqli_query($conn, $SQL);
    $rec = mysqli_fetch_array($query);
    unlink("img/hero/" . $rec['img_hero']);
    $sql = "DELETE FROM schools WHERE school_id='" . $_GET['school_id'] . "'";
    if (mysqli_query($conn, $sql)) {
    } else {
        echo mysqli_error($conn);
        exit;
    }
}
?>

<form id="form_back" name="form_back" method="post" action="school.php">

</form>
<script language="JavaScript">
    form_back.submit();
</script>