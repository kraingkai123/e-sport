<?php
include("./include/header.php");

if ($_GET['proc'] == 'add') {
    $match_id = "";
    $time = "";
    $date = "";

    $tour_id = "";
} else {
    $SQL = "SELECT * FROM match_details WHERE m_detail_id='" . $_GET['match_id'] . "'";
    $sql = mysqli_query($conn, $SQL);
    $rec = mysqli_fetch_array($sql);
    $match_id = $rec['match_id'];
    $time = $rec['time'];
}
?>
<!-- Page Wrapper -->
<div style="padding:10px;color:black">
    <h3>ADD GAME</h3>
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
                        <form method="post" action="proc_game.php">
                            <input type="hidden" name="proc" id="proc" value="<?php echo $_GET['proc']; ?>">
                            <input type="hidden" name="match_id" id="match_id" value="<?php echo $_GET['match_id']; ?>">
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">MATCH</label>
                                </div>
                                <div class="col-sm-4">
                                    <?php
                                    $SQL = "SELECT * FROM matchs WHERE match_id='" . $_GET['match_id'] . "'";
                                    $sql = mysqli_query($conn, $SQL);
                                    $rec = mysqli_fetch_array($sql);
                                    $PLAY_TEAM = get_team($rec['team_A']) . " พบกับ " . get_team($rec['team_B']);
                                    echo $PLAY_TEAM; ?>
                                </div>
                            </div>
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">MATCH NAME</label>
                                </div>
                                <div class="col-sm-4">
                                    <?php
                                    $SQL2 = "SELECT * FROM match_details WHERE m_detail_id='" . $_GET['m_detail_id'] . "'";
                                    $sql2 = mysqli_query($conn, $SQL2);
                                    $rec2 = mysqli_fetch_array($sql2);
                                    echo $rec2['match_name'];
                                    ?>
                                </div>
                            </div>
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">TEAM</label>
                                </div>
                                <div class="col-sm-4">
                                    <?php
                                    foreach ($array_team as $key => $value) {
                                        if($key =="A"){
                                            $value_team = $rec['team_A'];
                                        }else{
                                            $value_team = $rec['team_B'];
                                        }
                                    ?>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="<?php echo $value_team;?>">
                                            <label class="form-check-label" for="inlineRadio1"><?php echo $value?></label>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>

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
        $('#table_id').DataTable();

    });

    function add_data(proc) {
        $.ajax({
            url: "proc_game.php",
            async: false,
            method: 'post',
            data: {
                proc: proc,
                play_time: $("#play_time").val(),
                match_id: '<?php echo $_GET['match_id']; ?>'
            },
            success: function(json) {
                location.reload()
            }
        });
    }

    function savef(val, m_detail_id) {
        $.ajax({
            url: "proc_game.php",
            async: false,
            method: 'post',
            data: {
                proc: 'finshed',
                status: val,
                m_detail_id: m_detail_id,
                match_id: '<?php echo $_GET['match_id']; ?>'
            },
            success: function(json) {
                location.reload()
            }
        });
    }
</script>