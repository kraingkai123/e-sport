<?php


include('./include/connect.php');
$url_back="user.php";
/* if ($_GET['proc'] != "") {
    $_POST['proc'] = "";
} */

if ($_POST['proc'] == 'add') {
    $sql = "INSERT INTO users (username,password,fname,lname,tell,position_id) VALUES ('" . $_POST['username'] . "','" . base64_encode($_POST['password']) . "'
    ,'" . $_POST['fname'] . "','" . $_POST['lname'] . "','" . $_POST['tell'] . "','" . $_POST['position_id'] . "')";

    if (mysqli_query($conn, $sql)) {
    } else {
        echo mysqli_error($conn);
        exit;
    }
} else if ($_POST['proc'] == 'edit') {

    if($_SESSION['permission']==0){
        $sql = "UPDATE users  SET password='" .base64_encode($_POST['password']) . "',fname='" . $_POST['fname'] . "',lname='" . $_POST['lname'] . "',tell='" . $_POST['tell'] . "',position_id='" . $_POST['position_id'] . "'
        WHERE user_id='" . $_POST['user_id'] . "'";
    }else{
        $sql = "UPDATE users  SET password='" .base64_encode($_POST['password']) . "',fname='" . $_POST['fname'] . "',lname='" . $_POST['lname'] . "',tell='" . $_POST['tell'] . "'
        WHERE user_id='" . $_POST['user_id'] . "'";
   
    }
    if (mysqli_query($conn, $sql)) {
    } else {
        echo mysqli_error($conn);
        exit;
    }
    if($_POST['chk']==1){
        $url_back="home.php";
    }
} else if ($_GET['proc'] == "del") {
    $sql = "DELETE FROM users WHERE user_id='" . $_GET['user_id'] . "'";
    if (mysqli_query($conn, $sql)) {
    } else {
        echo mysqli_error($conn);
        exit;
    }
}
?>

<form id="form_back" name="form_back" method="post" action="<?php echo $url_back?>">

</form>
<script language="JavaScript">
    form_back.submit();
</script>