<?php

include("./include/header.php");
include("./session_chk.php");

if ($_GET['proc'] == 'add') {
    $school_name = "";
    $img_school = "";
    $address = "";
    $telephone = "";
    $_GET['school_id'] = "";
} else {
    $SQL = "SELECT * FROM schools WHERE school_id='" . $_GET['school_id'] . "'";
    $sql = mysqli_query($conn, $SQL);
    $rec = mysqli_fetch_array($sql);
    $school_name = $rec['school_name'];
    $img_school = $rec['img_school'];
    $address = $rec['address'];
    $telephone = $rec['tell'];
}
?>
<!-- Page Wrapper -->
<div style="padding:10px;color:black">
    <h3>SCHOOL</h3>
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
                        <form method="post" action="proc_school.php" enctype="multipart/form-data" id="frm_school">
                            <input type="hidden" name="proc" id="proc" value="<?php echo $_GET['proc']; ?>">
                            <input type="hidden" name="school_id" id="school_id" value="<?php echo $_GET['school_id']; ?>">
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">SCHOOL NAME</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="school_name" name="school_name" aria-describedby="emailHelp" placeholder="SCHOOL NAME" value="<?php echo $school_name ?>">
                                </div>
                            </div>
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">ADDRESS</label>
                                </div>
                                <div class="col-sm-5">
                                <textarea class="form-control" id="address" name ="address" rows="3" placeholder="ADDRESS"><?php echo $address?></textarea>
                                </div>
                            </div>
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">TELEPHONE</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="telephone" name="telephone" aria-describedby="emailHelp" placeholder="TELEPHONE" value="<?php echo $telephone ?>">
                                </div>
                            </div>
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">รูปภาพประกอบ</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="file" class="form-control-file" id="file_upload" name="file_upload" value="<?php echo $img_hero;?>">
                                </div>
                            </div>
                            <center>
                                <button type="button" onclick ="savedata()" class="btn btn-primary">บันทึก</button>
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
    function savedata() {
        if ($('#school_name').val() == "") {
            Swal.fire(
                'กรุณากรอกชื่อสถานศึกษา',
                '',
                'warning'
            )
        } else if ($('#address').val() == "") {
            Swal.fire(
                'กรุณากรอกที่อยู่',
                '',
                'warning'
            )
        }else if ($('#telephone').val() == "") {
            Swal.fire(
                'กรุณากรอกเบอร์ศัพท์',
                '',
                'warning'
            )
        }else {
            if ($('#proc').val() == 'add') {
                if ($('#file_upload').val() == "") {
                    Swal.fire(
                        'กรุณาเพิ่มรูปภาพสถานศึกษา',
                        '',
                        'warning'
                    )
                } else {
                    $('#frm_school').submit()
                }
            }else{
                $('#frm_school').submit()
            }
        }
    }
</script>