<?php

include("./include/header.php");
include("./session_chk.php");

if ($_GET['proc'] == 'add') {
    $team_name = "";
    $img_team = "";
    $school_id = "";
    $_GET['team_id'] = "";
} else {
    $SQL = "SELECT * FROM teams WHERE team_id='" . $_GET['team_id'] . "'";
    $sql = mysqli_query($conn, $SQL);
    $rec = mysqli_fetch_array($sql);
    $team_name = $rec['team_name'];
    $img_team = $rec['img_team'];
    $school_id = $rec['school_id'];
}
?>
<!-- Page Wrapper -->
<div style="padding:10px;color:black">
    <h3>TEAM</h3>
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
                        <form method="post" action="proc_team.php" enctype="multipart/form-data" id="frm_team">
                            <input type="hidden" name="proc" id="proc" value="<?php echo $_GET['proc']; ?>">
                            <input type="hidden" name="team_id" id="team_id" value="<?php echo $_GET['team_id']; ?>">
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">TEAM NAME</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="team_name" name="team_name" aria-describedby="emailHelp" placeholder="TEAM NAME" value="<?php echo $team_name ?>">
                                </div>
                            </div>
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">SCHOOL</label>
                                </div>
                                <div class="col-sm-5">
                                    <select class="js-example-basic-single" name="school_id" style="width: 50%">
                                        <?php
                                        $SQL = "SELECT * FROM schools ORDER BY school_name ASC ";
                                        $query = mysqli_query($conn, $SQL);
                                        if ($query) {
                                            while ($rec_tour = mysqli_fetch_array($query)) {
                                        ?>
                                                <option value="<?php echo $rec_tour['school_id']; ?>" <?php echo $rec_tour['school_id'] == $school_id ? "selected" : ""; ?>><?php echo $rec_tour['school_name'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">IMAGE</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="file" class="form-control-file" id="file_upload" name="file_upload" value="<?php echo $img_hero; ?>">
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
        $('.js-example-basic-single').select2();
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
        if ($('#team_name').val() == "") {
            Swal.fire(
                'กรุณากรอกชื่อ TEAM',
                '',
                'warning'
            )
        } else {
            if ($('#proc').val() == 'add') {
                if ($('#file_upload').val() == "") {
                    Swal.fire(
                        'กรุณาเพิ่มรูปภาพทีม',
                        '',
                        'warning'
                    )
                } else {
                    $('#frm_team').submit()
                }
            }else{
                $('#frm_team').submit()
            }
        }
    }
</script>