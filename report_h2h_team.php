<?php
session_start();
if(!$_SESSION['username']){
    header("location: index.php");
    exit;
}
include("./include/header.php");
if (empty($_POST['team_id'])) {
    $_POST['team_id'] = "";
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
    <h3>REPORT TEAM H2H</h3>
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
                            <label for="exampleInputEmail1">TEAM</label>
                        </div>
                        <div class="col-sm-4">
                            <select class="js-example-basic-single" id="team_id" name="team_id" style="width: 50%" onchange="get_match(this.value)">
                                <option value="">SELECT TEAM</option>
                                <?php
                                $SQL = "SELECT * FROM teams ";
                                $query = mysqli_query($conn, $SQL);
                                if ($query) {
                                    while ($rec_tour = mysqli_fetch_array($query)) {
                                ?>
                                        <option value="<?php echo $rec_tour['team_id']; ?>" <?php echo $rec_tour['team_id'] == $_POST['team_id'] ? "selected" : ""; ?>><?php echo $rec_tour['team_name'] ?></option>
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
                                <h3>รายงานสถิติ H2H แต่ละทีม</h3>
                            </center>
                            <table id="table_id" class="display" width="100%" border="1">
                                <thead style="color:black;align:center">
                                    <tr>
                                        <td width='40%' align="center">TEAM NAME</td>
                                        <td width='30%' align="center">SCHOOL</td>
                                        <td width='10%' align="center">KILL/DEATH/ASSIST</td>
                                        <td width='10%' align="center">KDA</td>
                                    </tr>
                                    <!-- (kill+assist) / death -->
                                </thead>
                                <tbody>
                                    <?php
                                    $filter = "";
                                    if (!empty($_POST['team_id'])) {
                                        $filter .= " AND team_id='" . $_POST['team_id'] . "'";
                                    }
                                    $SQL_TEAM = "SELECT match_player_details.player_id,match_player_details.team_id,sum(kills) as sum_kill,sum(death) as sum_death,sum(assist) as sum_assist FROM match_player_details 
                                    WHERE 1=1 $filter
                                     GROUP BY team_id;;
                                  
                                    ";
                                    $sql = mysqli_query($conn, $SQL_TEAM);
                                    $num  = mysqli_num_rows($sql);
                                    while ($rec = mysqli_fetch_array($sql)) {

                                    ?>
                                        <tr rowspan="<?php echo $num ?>">
                                            <td><?php echo get_team($rec['team_id']); ?></td>
                                            <td><?php echo get_shcool_name('', $rec['team_id']); ?></td>
                                            <td align="center"><?php
                                                                echo $rec['sum_kill'] . "/" . $rec['sum_death'] . '/' . $rec['sum_assist'];
                                                                ?></td>
                                            <td align="center">
                                                <?php
                                                echo number_format(($rec['sum_kill'] + $rec['sum_assist']) / $rec['sum_death'], 2);

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