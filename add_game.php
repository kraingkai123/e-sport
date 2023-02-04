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
                                    <input type="text" id="match_name" name="match_name" class="form-control" placeholder="MATCH NAME" tabindex="0">
                                </div>
                            </div>
                            <div class="form-group  row">
                                <div class="col-sm-1">
                                    <label for="exampleInputEmail1">เวลา</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" id="play_time" class="form-control" placeholder="TIME PLAY" tabindex="0">
                                </div>
                            </div>
                            <button type="button" class="btn btn-success" onclick="add_data('add')"><i class="fa fa-pencil-square" aria-hidden="true"></i>เพิ่ม</button>
                            <table id="table_id" class="display" width="100%" border="1" style="border-color: black;">
                                <thead style="color:black;align:center">
                                    <tr>
                                        <td width='10%' align="center">ลำดับ</td>
                                        <td width='30%' align="center">ชื่อ Match</td>
                                        <td width='20%' align="center">เวลา</td>
                                        <td width='20%' align="center">ผลการแข่งขัน</td>
                                        <td width='20%'>จัดการ</td>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $SQL = "SELECT * FROM match_details WHERE match_id='" . $_GET['match_id'] . "'ORDER BY m_detail_id ASC";
                                    $sql = mysqli_query($conn, $SQL);
                                    $i=1;
                                    while ($rec = mysqli_fetch_array($sql)) {

                                    ?>
                                        <tr>
                                            <td align="center"><?php echo $i ?></td>
                                            <td><?php echo $rec['match_name']; ?></td>
                                            <td><?php echo $rec['time']; ?></td>
                                            <td>
                                                <?php
                                                $SQL1 = "SELECT * FROM matchs WHERE match_id='" . $_GET['match_id'] . "'";
                                                $sql2 = mysqli_query($conn, $SQL1);
                                                $rec1 = mysqli_fetch_array($sql2);
                                                ?>
                                                <div class="form-check">
                                                    <input <?php echo $rec['status'] == $rec1['team_A'] ? "checked" : "" ;?> class="form-check-input" type="radio" name="rdo_status[<?php echo $rec['m_detail_id']?>" id="rdo_status1" value="<?php echo $rec1['team_A']; ?>" onclick="savef(this.value,'<?php echo $rec['m_detail_id'];?>');">
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        <?php echo get_team($rec1['team_A']); ?>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input <?php echo $rec['status'] == $rec1['team_B'] ? "checked" : "" ;?> class="form-check-input" type="radio" name="rdo_status[<?php echo $rec['m_detail_id']?>" id="rdo_status2" value="<?php echo $rec1['team_B']; ?>" onclick="savef(this.value,'<?php echo $rec['m_detail_id'];?>');">
                                                    <label class="form-check-label" for="exampleRadios2">
                                                        <?php echo get_team($rec1['team_B']); ?>
                                                    </label>
                                                </div>
                                            </td>
                                            <td><button type="button" class="btn btn-danger" onclick="linkmenu('proc_game.php?proc=del&m_detail_id=<?php echo $rec['m_detail_id'];?>&match_id=<?php echo $_GET['match_id'];?>')"><i class="fa fa-times" aria-hidden="true"></i> ลบ</button></td>
                                        </tr>
                                    <?php $i++;} ?>
                                </tbody>
                            </table>
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
                match_id: '<?php echo $_GET['match_id']; ?>',
                match_name :$('#match_name').val()
            },
            success: function(json) {
                location.reload()
            }
        });
    }
    function savef(val,m_detail_id){
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