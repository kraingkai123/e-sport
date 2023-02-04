<?php
include("./include/header.php");

if ($_GET['proc'] == 'add') {
    $fname = "";
    $lname = "";
    $telephone = "";
    $position = "9";
    $_GET['user_id'] = "";
    $username1 = "";
    $password1 = "";
    $readonly = "";
    $_GET['chk'] = '';
} else {
    $SQL = "SELECT * FROM users WHERE user_id='" . $_GET['user_id'] . "'";
    $sql = mysqli_query($conn, $SQL);
    $rec = mysqli_fetch_array($sql);
    $fname = $rec['fname'];
    $lname = $rec['lname'];
    $telephone = $rec['tell'];
    $position = $rec['position_id'];
    $password1 = base64_decode($rec['password']);
    $username1 = $rec['username'];
    $readonly = "readonly";
    if (empty($_GET['chk'])) {
        $_GET['chk'] = '';
    }
}
?>
<!-- Page Wrapper -->
<div style="padding:10px;color:black">
    <h3>USER</h3>
</div>
<div class="card ">
    <div class="card-body">
        <div id="wrapper">

            <!-- Content Wrapper -->

            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <form method="post" action="proc_user.php">
                            <input type="hidden" name="proc" id="proc" value="<?php echo $_GET['proc']; ?>">
                            <input type="hidden" name="user_id" id="user_id" value="<?php echo $_GET['user_id']; ?>">
                            <input type="hidden" name="chk" id="chk" value="<?php echo $_GET['chk']; ?>">
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">USERNAME</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" <?php echo $readonly; ?> class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="USERNAME" value="<?php echo $username1 ?>" onchange="check_username(this.value)">
                                </div>
                            </div>
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">PASSWORD</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp" placeholder="PASSWORD" value="<?php echo $password1 ?>">
                                </div>
                            </div>
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">FIRSTNAME</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="fname" name="fname" aria-describedby="emailHelp" placeholder="FIRSTNAME" value="<?php echo $fname ?>">
                                </div>
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">LASTNAME</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="lname" name="lname" aria-describedby="emailHelp" placeholder="LASTNAME" value="<?php echo $lname ?>">
                                </div>
                            </div>
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">TELEPHONE</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="tell" name="tell" aria-describedby="emailHelp" placeholder="TELEPHONE" value="<?php echo $telephone ?>">
                                </div>
                            </div>
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">POSITION</label>
                                </div>
                                <div class="col-sm-5">
                                    <?php
                                    if ($_SESSION['permission'] == 0) {
                                        foreach ($array_permiss as $key => $value) {
                                    ?>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="position_id" id="position_id" value="<?php echo $key ?>" <?php echo $key == $position ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="inlineRadio1"><?php echo $value ?></label>
                                            </div>
                                    <?php
                                        }
                                    } else {
                                        echo $array_permiss[$position];
                                    }
                                    ?>
                                </div>
                            </div>
                            <center>
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                            </center>
                        </form>
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
            </div>
        </div>


    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->

<?php
include("./include/footer.php");
?>
<script>
    $(document).ready(function() {
        $('#start_date').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'dd/mm/yyyy'
        });
        $('#end_date').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'dd/mm/yyyy'
        });
    });

    function check_username(username) {
        $.ajax({
            url: "./ajax/check_username.php",
            async: false,
            method: 'post',
            data: {
                username: username,
            },
            success: function(data) {
                if (data == true) {
                    Swal.fire(
                        'Username ของคุณถูกใช้งานแล้ว',
                        '',
                        'error'
                    )
                }
            }
        });
    }
</script>