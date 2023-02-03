<?php
include("./include/header.php");

if ($_GET['proc'] == 'add') {
    $tour_name = "";
    $start_date = "";
    $end_date = "";
    $_GET['tour_id']="";
} else {
    $SQL = "SELECT * FROM tournaments WHERE tour_id='" . $_GET['tour_id'] . "'";
    $sql = mysqli_query($conn, $SQL);
    $rec = mysqli_fetch_array($sql);
    $tour_name = $rec['tour_name'];
    $start_date = db2date($rec['start_date']);
    $end_date = db2date($rec['end_date']);
}
?>
<!-- Page Wrapper -->
<div style="padding:10px;color:black">
    <h3>เพิ่มข้อมูลทัวป์นาเม้น</h3>
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
                        <form method="post" action="proc_tournament.php">
                            <input type="hidden" name="proc" id="proc" value="<?php echo $_GET['proc']; ?>">
                            <input type="hidden" name="tour_id" id="tour_id" value="<?php echo $_GET['tour_id']; ?>">
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">ชื่อทัวนาเม้น</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="tour_name" name="tour_name" aria-describedby="emailHelp" placeholder="ชื่อทัวนาเม้น" value="<?php echo $tour_name?>">
                                </div>
                            </div>
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">วันที่เริ่มต้น</label>
                                </div>
                                <div class="col-sm-5">
                                    <input id="start_date" name="start_date" class="datepicker" width="276" value="<?php echo $start_date?>"/>
                                </div>
                            </div>
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">วันที่เริ่มต้น</label>
                                </div>
                                <div class="col-sm-5">
                                    <input id="end_date" name="end_date" class="datepicker" width="276" value="<?php echo $end_date?>"/>
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
</script>