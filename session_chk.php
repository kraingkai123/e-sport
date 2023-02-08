<?php
session_start();
if (!$_SESSION["user_id"]) {  //check session
    echo '<script>window.location.href="index.php"</script>'; //echo "ไม่พบผู้ใช้กระโดดกลับไปหน้า login form ";
}
?>