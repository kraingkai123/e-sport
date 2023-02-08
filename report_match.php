<?php

include("./include/header.php");
include("./session_chk.php");
if (empty($_POST['tour_id'])) {
    $_POST['tour_id'] = "";
}
if (empty($_POST['match_id'])) {
    $_POST['match_id'] = "";
}
?>
<style>
    @media print {
        button {
            display: none;
        }

    }
</style>
<!-- Page Wrapper -->
<div style="padding:10px;color:black">
    <h3>REPORT TEAM</h3>
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
                        
                    </div>
                    <div class="container-fluid">
                        <center>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> search</button>
                            <button type="button" class="btn btn-success" onclick="print_div()"><i class="fa fa-print" aria-hidden="true"></i> print</button>
                            <button type="button" class="btn btn-danger float-right ml-2" onclick="history.back()">ย้อนกลับ</button>
                        </center>

                    </div>

                    <br>
                    <!-- Main Content -->
                    <div id="content">

                        <!-- Begin Page Content -->
                        <div class="container-fluid" id="div_report">
                            <center>
                                <h3>รายงานสถิติผลการแข่งขัน/จำนวนการแข่งขัน</h3>
                            </center>
                            <table id="table_id" class="display" width="100%" border="1">
                                <thead style="color:black;align:center">
                                    <tr>
                                        <td width='25%' align="center">ชื่อ Tornament</td>
                                        
                                        <td width='20%' align="center">ชื่อ TEAM</td>
                                        <td width='20%' align="center">จำนวนที่แข่ง</td>
                                        <td width='20%' align="center">WIN/LOSS</td>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $filter = "";
                                    if (!empty($_POST['tour_id'])) {
                                        $filter .= " AND tournaments.tour_id='" . $_POST['tour_id'] . "'";
                                    }
                                    $SQL_TEAM = "select matchs.tour_id,team_id,matchs.match_id,match_details.m_detail_id FROM tournaments
                                   INNER JOIN matchs ON matchs.tour_id=tournaments.tour_id
                                   INNER JOIN match_details ON match_details.match_id = matchs.match_id
                                   INNER JOIN frm_team ON frm_team.match_id = matchs.match_id
                                   WHERE 1=1 $filter
                                  
                                    ";
                                    $sql = mysqli_query($conn, $SQL_TEAM);
                                    $num  = mysqli_num_rows($sql);
                                    while ($rec = mysqli_fetch_array($sql)) {

                                    ?>
                                        <tr rowspan="<?php echo $num ?>">

                                            <td><?php echo get_tourname($rec['tour_id']); ?></td>
                                            
                                            <td><?php echo get_team($rec['team_id']); ?></td>
                                            <td><?php
                                                $sql_count = "SELECT COUNT(team_id) as c FROM frm_team WHERE match_id='" . $rec['match_id'] . "' GROUP BY team_id,match_id";
                                                $query_count = mysqli_query($conn, $sql_count);
                                                $rec_count = mysqli_fetch_array($query_count);
                                                echo $rec_count['c'];
                                                ?></td>
                                            <td>
                                                <?php
                                                $sql_count = "SELECT COUNT(1) as c FROM summary 
                                                     INNER JOIN match_details ON match_details.m_detail_id=summary.m_detail_id WHERE team_win='" . $rec['team_id'] . "' 
                                                     AND summary.m_detail_id='" . $rec['m_detail_id'] . "'";
                                                $query_count = mysqli_query($conn, $sql_count);
                                                $rec_count1 = mysqli_fetch_array($query_count);
                                                echo $rec_count1['c'] . "/" . ($rec_count['c'] - $rec_count1['c']);

                                                ?>
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