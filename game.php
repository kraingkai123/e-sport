<?php
include("./include/header.php");
if (empty($_POST['tour_id'])) {
    $_POST['tour_id'] = "";
}
if (empty($_POST['match_id'])) {
    $_POST['match_id'] = "";
}
?>
<!-- Page Wrapper -->
<div style="padding:10px;color:black">
    <h3>GAME</h3>
</div>
<div class="card ">
    <div class="card-body">
        <div id="wrapper">

            <!-- Content Wrapper -->

            <div id="content-wrapper" class="d-flex flex-column">
                <form method="post" action="">
                    <h3>SEARCH</h3>
                    <div class="form-group  row">
                        <div class="col-sm-1">
                            <label for="exampleInputEmail1">TORNAMENT</label>
                        </div>
                        <div class="col-sm-4">
                            <select class="js-example-basic-single" id="tour_id" name="tour_id" style="width: 50%" onchange="get_match(this.value)">
                                <option value="">SELECT TORNAMENT</option>
                                <?php
                                $SQL = "SELECT * FROM tournaments ";
                                $query = mysqli_query($conn, $SQL);
                                if ($query) {
                                    while ($rec_tour = mysqli_fetch_array($query)) {
                                ?>
                                        <option value="<?php echo $rec_tour['tour_id']; ?>" <?php echo $rec_tour['tour_id'] == $_POST['tour_id'] ? "selected" : ""; ?>><?php echo $rec_tour['tour_name'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-1">
                            <label for="exampleInputEmail1">MATCH</label>
                        </div>
                        <div class="col-sm-4" id="select_match">
                            <select class="js-example-basic-single" name="match_id" name="match_id" style="width: 50%">
                                <option value="">SELECT MATCH</option>
                                <?php
                                $filter2 = "";
                                if (!empty($_POST['tour_id'])) {
                                    $filter2 .= " AND tour_id ='" . $_POST['tour_id'] . "'";
                                }
                                $SQL = "SELECT * FROM matchs WHERE 1=1 $filter2";
                                $query = mysqli_query($conn, $SQL);
                                if ($query) {
                                    while ($rec_tour = mysqli_fetch_array($query)) {
                                        $PLAY_TEAM = get_team($rec_tour['team_A']) . " พบกับ " . get_team($rec_tour['team_B']);
                                ?>
                                        <option value="<?php echo $rec_tour['match_id']; ?>" <?php echo $rec_tour['match_id'] == $_POST['match_id'] ? "selected" : ""; ?>><?php echo $PLAY_TEAM ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <center>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> search</button>
                    </center>
                    <!-- Main Content -->
                    <div id="content">

                        <!-- Begin Page Content -->
                        <div class="container-fluid">
                            <table id="table_id" class="display" width="100%">
                                <thead style="color:black;align:center">
                                    <tr>
                                        <td width='45%' align="center">ชื่อ Tornament</td>
                                        <td width='20%' align="center">ชื่อ Match</td>
                                        <td width='20%' align="center">ทีมแข่ง</td>
                                        <td width='15%' align="center">จัดการ</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $filter = "";
                                    if (!empty($_POST['match_id'])) {
                                        $filter .= " AND match_details.match_id='" . $_POST['match_id'] . "'";
                                    }
                                    if (!empty($_POST['tour_id'])) {
                                        $filter .= " AND matchs.tour_id='" . $_POST['tour_id'] . "'";
                                    }
                                    $SQL = "  SELECT * FROM match_details
                                            INNER JOIN matchs ON match_details.match_id = matchs.match_id
                                            WHERE 1=1  $filter ORDER BY date ASC";
                                    $sql = mysqli_query($conn, $SQL);
                                    while ($rec = mysqli_fetch_array($sql)) {
                                        $PLAY_TEAM = get_team($rec['team_A']) . " พบกับ " . get_team($rec['team_B']);
                                    ?>
                                        <tr>

                                            <td><?php echo get_tourname($rec['tour_id']); ?></td>
                                            <td><?php echo $rec['match_name']; ?></td>
                                            <td><?php echo $PLAY_TEAM; ?></td>

                                            <td>

                                                <button type="button" class="btn btn-warning" onclick="linkmenu('add_game_detail.php?proc=add&m_detail_id=<?php echo $rec['m_detail_id']; ?>&match_id=<?php echo $rec['match_id']; ?>')"><i class="fa fa-pencil-square" aria-hidden="true"></i>แก้ไข</button>
                                                <?php
                                                $COUNT = check_count("SELECT COUNT(1) as c FROM match_player_details WHERE m_detail_id='" . $rec['m_detail_id'] . "'");
                                                if ($COUNT == 0) {
                                                ?>
                                                    <button type="button" class="btn btn-danger" onclick="linkmenu('proc_game.php?proc=del&m_detail_id=<?php echo $rec['m_detail_id']; ?>')"><i class="fa fa-times" aria-hidden="true"></i> ลบ</button>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.container-fluid -->

                    </div>
                    <!-- End of Main Content -->
                </form>
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

    function get_match(val) {
        $.ajax({
            url: "./ajax/get_match.php",
            async: false,
            method: 'post',
            data: {
                val: val,
            },
            success: function(json) {
                $('#select_match').html(json)
                $('.js-example-basic-single').select2();
            }
        });
    }
</script>