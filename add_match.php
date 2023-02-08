<?php
session_start();
if(!$_SESSION['username']){
    header("location: index.php");
    exit;
}
include("./include/header.php");

if ($_GET['proc'] == 'add') {
    $teamA = "";
    $teamB = "";
    $date = "";
    $_GET['match_id'] = "";
    $tour_id = "";
} else {
    $SQL = "SELECT * FROM matchs WHERE match_id='" . $_GET['match_id'] . "'";
    $sql = mysqli_query($conn, $SQL);
    $rec = mysqli_fetch_array($sql);
    $teamA = $rec['team_A'];
    $teamB = $rec['team_B'];
    $date = db2date($rec['date']);
    $tour_id = $rec['tour_id'];
}
?>
<!-- Page Wrapper -->
<div style="padding:10px;color:black">
    <h3>เพิ่มข้อมูล แมต</h3>
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
                        <form method="post" action="proc_match.php">
                            <input type="hidden" name="proc" id="proc" value="<?php echo $_GET['proc']; ?>">
                            <input type="hidden" name="match_id" id="match_id" value="<?php echo $_GET['match_id']; ?>">
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">ชื่อทัวนาเม้น</label>
                                </div>
                                <div class="col-xs-12 col-sm-5">
                                    <select class="js-example-basic-single" name="tour_id" style="width: 50%">
                                        <?php
                                        $SQL = "SELECT * FROM tournaments ";
                                        $query = mysqli_query($conn, $SQL);
                                        if ($query) {
                                            while ($rec_tour = mysqli_fetch_array($query)) {
                                        ?>
                                                <option value="<?php echo $rec_tour['tour_id']; ?>" <?php echo $rec_tour['tour_id'] == $tour_id ? "selected" : ""; ?>><?php echo $rec_tour['tour_name'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">ทีม A</label>
                                </div>
                                <div class="col-sm-5">
                                    <select class="team_A" name="team_A" style="width: 50%">
                                        <?php
                                        $SQL = "SELECT * FROM teams ";
                                        $query = mysqli_query($conn, $SQL);
                                        if ($query) {
                                            while ($rec_tour = mysqli_fetch_array($query)) {
                                        ?>
                                                <option value="<?php echo $rec_tour['team_id']; ?>" <?php echo $rec_tour['team_id'] == $teamA ? "selected" : ""; ?>><?php echo $rec_tour['team_name'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">ทีม B</label>
                                </div>
                                <div class="col-sm-5">
                                    <select class="team_B" name="team_B" style="width: 50%">
                                        <?php
                                        $SQL = "SELECT * FROM teams ";
                                        $query = mysqli_query($conn, $SQL);
                                        if ($query) {
                                            while ($rec_tour = mysqli_fetch_array($query)) {
                                        ?>
                                                <option value="<?php echo $rec_tour['team_id']; ?>" <?php echo $rec_tour['team_id'] == $teamB ? "selected" : ""; ?>><?php echo $rec_tour['team_name']?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">วันที่แข่ง</label>
                                </div>
                                <div class="col-sm-5">
                                    <input id="play_date" name="play_date" class="datepicker" width="276" value="<?php echo $date ?>" />
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
        $('.js-example-basic-single').select2();
        $('#play_date').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'dd/mm/yyyy'
        });
    });

</script>