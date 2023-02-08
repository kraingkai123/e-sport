<?php

include("./include/header.php");
include("./session_chk.php");

if ($_GET['proc'] == 'add') {
    $hero_name = "";
    $img_hero = "";
    $_GET['hero_id'] = "";
} else {
    $SQL = "SELECT * FROM heros WHERE hero_id='" . $_GET['hero_id'] . "'";
    $sql = mysqli_query($conn, $SQL);
    $rec = mysqli_fetch_array($sql);
    $hero_name = $rec['hero_name'];
    $img_hero = $rec['img_hero'];

}
?>
<!-- Page Wrapper -->
<div style="padding:10px;color:black">
    <h3>HERO</h3>
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
                        <form method="post" action="proc_hero.php" enctype="multipart/form-data" id="frm_hero">
                            <input type="hidden" name="proc" id="proc" value="<?php echo $_GET['proc']; ?>">
                            <input type="hidden" name="hero_id" id="hero_id" value="<?php echo $_GET['hero_id']; ?>">
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">HERO NAME</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="hero_name" name="hero_name" aria-describedby="emailHelp" placeholder="HERO NAME" value="<?php echo $hero_name ?>">
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
                                <button type="button" class="btn btn-primary" onclick="savedata()">บันทึก</button>
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
        if ($('#hero_name').val() == "") {
            Swal.fire(
                'กรุณากรอกชื่อ HERO',
                '',
                'warning'
            )
        } else {
            if ($('#proc').val() == 'add') {
                if ($('#file_upload').val() == "") {
                    Swal.fire(
                        'กรุณาเพิ่มรูปภาพ HERO',
                        '',
                        'warning'
                    )
                } else {
                    $('#frm_hero').submit()
                }
            }else{
                $('#frm_hero').submit()
            }
        }
    }
</script>