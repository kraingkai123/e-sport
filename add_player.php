<?php

include("./include/header.php");
include("./session_chk.php");

if ($_GET['proc'] == 'add') {
    $_GET['player_id'] = "";
    $ingame_name = "";
    $fname = "";
    $lname = "";
    $nick_name = "";
    $telephone = "";
    $team_id = "";
} else {
    $SQL = "SELECT * FROM players WHERE player_id='" . $_GET['player_id'] . "'";
    $sql = mysqli_query($conn, $SQL);
    $rec = mysqli_fetch_array($sql);
    $ingame_name = $rec['ingame_name'];
    $fname = $rec['fname'];
    $lname = $rec['lname'];
    $nick_name = $rec['nick_name'];
    $telephone = $rec['tell'];
    $team_id = $rec['team_id'];
}
?>
<!-- Page Wrapper -->
<div style="padding:10px;color:black">
    <h3>PLAYER</h3>
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
                        <form method="post" action="proc_player.php" enctype="multipart/form-data" id="frm_player">
                            <input type="hidden" name="proc" id="proc" value="<?php echo $_GET['proc']; ?>">
                            <input type="hidden" name="player_id" id="player_id" value="<?php echo $_GET['player_id']; ?>">
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">NAME (IN GAME)</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control req" id="ingame_name" name="ingame_name" aria-describedby="emailHelp" placeholder="NAME (IN GAME)" value="<?php echo $ingame_name ?>">
                                </div>
                            </div>
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">FIRSTNAME</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control req" id="fname" name="fname" aria-describedby="emailHelp" placeholder="FIRSTNAME" value="<?php echo $fname ?>">
                                </div>
                            </div>
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">LASTNAME</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control req" id="lname" name="lname" aria-describedby="emailHelp" placeholder="LASTNAME" value="<?php echo $lname ?>">
                                </div>
                            </div>
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">NICKNAME</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control req" id="nick_name" name="nick_name" aria-describedby="emailHelp" placeholder="NICKNAME" value="<?php echo $nick_name ?>">
                                </div>
                            </div>
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">TELEPHONE</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control req" id="tell" name="tell" aria-describedby="emailHelp" placeholder="TELEPHONE" value="<?php echo $nick_name ?>">
                                </div>
                            </div>
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">TEAM</label>
                                </div>

                                <div class="col-sm-5">
                                    <select class="js-example-basic-single req" name="team_id" style="width: 50%" placeholder='TEAM'>
                                        <?php
                                        $SQL = "SELECT * FROM teams ORDER BY team_name ASC ";
                                        $query = mysqli_query($conn, $SQL);
                                        if ($query) {
                                            while ($rec_tour = mysqli_fetch_array($query)) {
                                        ?>
                                                <option value="<?php echo $rec_tour['team_id']; ?>" <?php echo $rec_tour['team_id'] == $team_id ? "selected" : ""; ?>><?php echo $rec_tour['team_name'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">IMAGE PLAYER</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="file" class="form-control-file" id="file_upload" name="file_upload" value="<?php echo $img_hero; ?>" placeholder='IMAGE PLAYER'>
                                </div>
                            </div>
                            <center>
                                <button type="button" class="btn btn-primary" onclick="savedata()">บันทึก</button>
                                <button type="button" class="btn btn-danger" onclick="history.back()">ย้อนกลับ</button>
                            </center>
                            <br>
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
        var i = 0;
        $(".req").each(function(index) {
            if ($(this).val() == "") {
                var text = $(this).attr("placeholder")
                Swal.fire(
                    'กรุณากรอก' + text,
                    '',
                    'warning'
                )
            i++
                return false
            }
        });
        if (i == 0) {
            if ($('#proc').val() == 'add') {
                if ($('#file_upload').val() == "") {
                    Swal.fire(
                        'กรุณาเพิ่มรูปภาพ PLAYER',
                        '',
                        'warning'
                    )
                } else {
                    $('#frm_player').submit()
                }
            } else {
                $('#frm_player').submit()
            }
        }

        /*   */
    }
</script>