<?php

include("./include/header.php");
include("./session_chk.php");

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
    <h3>ADD PLAYER</h3>
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
                        <form method="post" action="proc_detail_match.php" id="frm_detail">
                            <input type="hidden" name="proc" id="proc" value="<?php echo $_GET['proc']; ?>">
                            <input type="hidden" name="match_id" id="match_id" value="<?php echo $_GET['match_id']; ?>">
                            <input type="hidden" name="m_detail_id" id="m_detail_id" value="<?php echo $_GET['m_detail_id']; ?>">

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
                                        if ($key == "A") {
                                            $value_team = $rec['team_A'];
                                        } else {
                                            $value_team = $rec['team_B'];
                                        }
                                    ?>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="team_id" id="team_id" value="<?php echo $value_team; ?>" onclick="get_player(this.value)">
                                            <label class="form-check-label" for="inlineRadio1"><?php echo $value ?></label>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">PLAYER</label>
                                </div>
                                <div class="col-sm-2">
                                    <div id="show_player"><span style="color:red">Plase select team</span></div>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">HERO</label>
                                </div>
                                <div class="col-sm-2">
                                    <select class="js-example-basic-single" name="hero" style="width: 70%" onchange="get_img(this.value);">
                                        <option>plase select</option>
                                        <?php
                                        $SQL = "SELECT * FROM heros WHERE  hero_id NOT IN(SELECT hero_id FROM match_player_details WHERE m_detail_id ='" . $_GET['m_detail_id'] . "') ";
                                        $query = mysqli_query($conn, $SQL);
                                        if ($query) {
                                            while ($rec_tour = mysqli_fetch_array($query)) {
                                        ?>
                                                <option value="<?php echo $rec_tour['hero_id']; ?>"><?php echo $rec_tour['hero_name'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <div id="show_img"></div>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">LANE</label>
                                </div>
                                <div class="col-sm-2">
                                    <select class="js-example-basic-single" name="lane" style="width: 70%">
                                        <option>plase select</option>
                                        <?php
                                        $SQL = "SELECT * FROM lanes ";
                                        $query = mysqli_query($conn, $SQL);
                                        if ($query) {
                                            while ($rec_tour = mysqli_fetch_array($query)) {
                                        ?>
                                                <option value="<?php echo $rec_tour['lane_id']; ?>"><?php echo $rec_tour['name_lane'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">KILL</label>
                                </div>
                                <div class="col-sm-1">
                                    <input type="text" class="form-control" id="kill" name="kill" placeholder="KILL">
                                </div>
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">DEATH</label>
                                </div>
                                <div class="col-sm-1">
                                    <input type="text" class="form-control" id="death" name="death" placeholder="DEATH">
                                </div>
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">ASSIST</label>
                                </div>
                                <div class="col-sm-1">
                                    <input type="text" class="form-control" id="assist" name="assist" placeholder="ASSIST">
                                </div>
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">GOLD</label>
                                </div>
                                <div class="col-sm-1">
                                    <input type="text" class="form-control" id="gold" name="gold" placeholder="GOLD">
                                </div>
                            </div>
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">MVP</label>
                                </div>
                                <div class="col-sm-1">
                                    <input type="text" class="form-control" id="mvp" name="mvp" placeholder="MVP">
                                </div>
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">ATK</label>
                                </div>
                                <div class="col-sm-1">
                                    <input type="text" class="form-control" id="atk" name="atk" placeholder="ATK">
                                </div>
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">DEFENSE</label>
                                </div>
                                <div class="col-sm-1">
                                    <input type="text" class="form-control" id="defense" name="defense" placeholder="DEFENSE">
                                </div>
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">TEAM FIGHT</label>
                                </div>
                                <div class="col-sm-1">
                                    <input type="text" class="form-control" id="teme_fight" name="teme_fight" placeholder="TEAM FIGHT">
                                </div>

                            </div>
                            <center>
                                <button type="submit" class="btn btn-primary" onclick="add_data('add')"><i class="fa fa-pencil-square" aria-hidden="true"></i>บันทึก</button>
                                <button type="button" class="btn btn-info float-right ml-2" onclick="history.back()">ย้อนกลับ</button>
                            </center>
                        </form>
                        <hr>
                        <h3>TEAM : <?php echo get_team($rec['team_A']) ?> </h3>
                        <table id="table_id" class="display" width="100%" border="1" style="border-color: black;">
                            <thead style="color:black;align:center">
                                <tr>
                                    <td width='10%' align="center">NO.</td>
                                    <td width='20%' align="center">PLAYER</td>
                                    <td width='15%' align="center">HERO</td>
                                    <td width='5%' align="center">LANE</td>
                                    <td width='5%' align="center">KILL</td>
                                    <td width='5%' align="center">DEATH</td>
                                    <td width='5%' align="center">ASSIST</td>
                                    <td width='5%' align="center">GOLD</td>
                                    <td width='5%' align="center">MVP</td>
                                    <td width='5%' align="center">ATK</td>
                                    <td width='5%' align="center">DEFENSE</td>
                                    <td width='5%' align="center">TEAM FIGHT</td>
                                    <td width='10%'></td>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $SQL = "SELECT * FROM match_player_details WHERE m_detail_id='" . $_GET['m_detail_id'] . "' AND team_id='" . $rec['team_A'] . "' ORDER BY p_detail_id ASC";
                                $sql = mysqli_query($conn, $SQL);
                                $i = 1;
                                while ($rec2 = mysqli_fetch_array($sql)) {

                                ?>
                                    <tr>
                                        <td align="center"><?php echo $i ?></td>
                                        <td><?php echo get_nickname($rec2['player_id']); ?></td>
                                        <td><?php echo get_hero($rec2['hero_id']); ?></td>
                                        <td><?php echo get_lane($rec2['lane_id']); ?></td>
                                        <td><?php echo $rec2['kills']; ?></td>
                                        <td><?php echo $rec2['death']; ?></td>
                                        <td><?php echo $rec2['assist']; ?></td>
                                        <td><?php echo $rec2['gold']; ?></td>
                                        <td><?php echo $rec2['mvp']; ?></td>
                                        <td><?php echo $rec2['atk']; ?></td>
                                        <td><?php echo $rec2['def']; ?></td>
                                        <td><?php echo $rec2['team_fight']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-danger" onclick="deldata('proc_detail_match.php?proc=del','m_detail_id=<?php echo $_GET['m_detail_id']; ?>','match_id=<?php echo $_GET['match_id'] ?>','p_detail_id=<?php echo $rec2['p_detail_id']; ?>')"><i class="fa fa-times" aria-hidden="true"></i> ลบ</button>
                                        </td>
                                    </tr>
                                <?php $i++;
                                } ?>
                            </tbody>
                        </table>
                        <hr>
                        <h3>TEAM : <?php echo get_team($rec['team_B']) ?> </h3>
                        <table id="table_id2" class="display" width="100%" border="1" style="border-color: black;">
                            <thead style="color:black;align:center">
                                <tr>
                                    <td width='10%' align="center">NO.</td>
                                    <td width='20%' align="center">PLAYER</td>
                                    <td width='15%' align="center">HERO</td>
                                    <td width='5%' align="center">LANE</td>
                                    <td width='5%' align="center">KILL</td>
                                    <td width='5%' align="center">DEATH</td>
                                    <td width='5%' align="center">ASSIST</td>
                                    <td width='5%' align="center">GOLD</td>
                                    <td width='5%' align="center">MVP</td>
                                    <td width='5%' align="center">ATK</td>
                                    <td width='5%' align="center">DEFENSE</td>
                                    <td width='5%' align="center">TEAM FIGHT</td>
                                    <td width='10%'></td>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $SQL = "SELECT * FROM match_player_details WHERE m_detail_id='" . $_GET['m_detail_id'] . "' AND team_id='" . $rec['team_B'] . "' ORDER BY p_detail_id ASC";
                                $sql = mysqli_query($conn, $SQL);
                                $i = 1;
                                while ($rec2 = mysqli_fetch_array($sql)) {

                                ?>
                                    <tr>
                                        <td align="center"><?php echo $i ?></td>
                                        <td><?php echo get_nickname($rec2['player_id']); ?></td>
                                        <td><?php echo get_hero($rec2['hero_id']); ?></td>
                                        <td><?php echo get_lane($rec2['lane_id']); ?></td>
                                        <td><?php echo $rec2['kills']; ?></td>
                                        <td><?php echo $rec2['death']; ?></td>
                                        <td><?php echo $rec2['assist']; ?></td>
                                        <td><?php echo $rec2['gold']; ?></td>
                                        <td><?php echo $rec2['mvp']; ?></td>
                                        <td><?php echo $rec2['atk']; ?></td>
                                        <td><?php echo $rec2['def']; ?></td>
                                        <td><?php echo $rec2['team_fight']; ?></td>
                                        <td>

                                            <button type="button" class="btn btn-danger" onclick="deldata('proc_detail_match.php?proc=del','m_detail_id=<?php echo $_GET['m_detail_id']; ?>','match_id=<?php echo $_GET['match_id'] ?>','p_detail_id=<?php echo $rec2['p_detail_id']; ?>')"><i class="fa fa-times" aria-hidden="true"></i> ลบ</button>
                                        </td>
                                    </tr>
                                <?php $i++;
                                } ?>
                            </tbody>
                        </table>
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
        $('#table_id2').DataTable();
    });

    function add_data(proc) {
        $('#frm_detail').val()
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

    function get_img(id) {
        $.ajax({
            url: "./ajax/get_image_hero.php",
            async: false,
            method: 'post',
            data: {
                id: id,
            },
            success: function(json) {
                $('#show_img').html(json);
            }
        });
    }

    function get_player(id) {
        $.ajax({
            url: "./ajax/get_list_player.php",
            async: false,
            method: 'post',
            data: {
                id: id,
                m_detail_id: '<?php echo $_GET['m_detail_id']; ?>'
            },
            success: function(json) {
                $('#show_player').html(json);
                $('.js-example-basic-single').select2();
            }
        });
    }
</script>