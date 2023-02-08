<?php

include("./include/header.php");
include("./session_chk.php");

if ($_GET['proc'] == 'add') {
    $name_lane = "";
    $_GET['lane_id'] = "";
} else {
    $SQL = "SELECT * FROM lanes WHERE lane_id='" . $_GET['lane_id'] . "'";
    $sql = mysqli_query($conn, $SQL);
    $rec = mysqli_fetch_array($sql);
    $name_lane = $rec['name_lane'];
}
?>
<!-- Page Wrapper -->
<div style="padding:10px;color:black">
    <h3>LANES</h3>
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
                        <form method="post" action="proc_lane.php" id="frm_lane">
                            <input type="hidden" name="proc" id="proc" value="<?php echo $_GET['proc']; ?>">
                            <input type="hidden" name="lane_id" id="lane_id" value="<?php echo $_GET['lane_id']; ?>">
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">LANE NAME</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="name_lane" name="name_lane" aria-describedby="emailHelp" placeholder="LANE NAME" value="<?php echo $name_lane ?>">
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
        if ($('#name_lane').val() == "") {
            Swal.fire(
                'กรุณากรอกชื่อ LANE',
                '',
                'warning'
            )
        } else {
            $('#frm_lane').submit()
        }
    }
</script>