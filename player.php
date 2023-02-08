<?php

include("./include/header.php");
include("./session_chk.php");

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

                    <br>
                    <div class="container-fluid">
                        <button type="button" class="btn btn-primary" onclick="linkmenu('add_player.php?proc=add')"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มข้อมูล</button>
                        <button type="button" class="btn btn-info float-right ml-2" onclick="history.back()">ย้อนกลับ</button>
                    </div>
                    <br>

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <table id="table_id" class="display" width="100%">
                            <thead style="color:black;align:center">
                                <tr>
                                    <td width='20%' align="center">GAME NAME</td>
                                    <td width='20%' align="center">PLAYER NAME</td>
                                    <td width='10%' align="center">NICKNAME</td>
                                    <td width='10%' align="center">TELEPHONE</td>
                                    <td width='20%' align="center">IMAGE PLAYER</td>
                                    <td width='10%' align="center">TEAM</td>
                                    <td width='10%' align="center">จัดการ</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $SQL = "SELECT * FROM players ORDER BY player_id DESC";
                                $sql = mysqli_query($conn, $SQL);
                                while ($rec = mysqli_fetch_array($sql)) {

                                ?>
                                    <tr>
                                        <td><?php echo $rec['ingame_name']; ?></td>
                                        <td><?php echo $rec['fname'] . '  ' . $rec['lname']; ?></td>
                                        <td><?php echo $rec['nick_name']; ?></td>
                                        <td><?php echo $rec['tell']; ?></td>
                                        <td>
                                            <img src="./img/player/<?php echo $rec['img_player']; ?>" class="rounded mx-auto d-block" alt="..." width="150px" height="200px">
                                        </td>
                                        <td><?php echo get_team($rec['team_id']) ?></td>

                                        <td>

                                            <button type="button" class="btn btn-warning" onclick="linkmenu('add_player.php?proc=edit&player_id=<?php echo $rec['player_id']; ?>')"><i class="fa fa-pencil-square" aria-hidden="true"></i>แก้ไข</button>
                                            <?php
                                            $COUNT = check_count("SELECT COUNT(1) as c FROM match_player_details WHERE player_id='" . $rec['player_id'] . "'");
                                            if ($COUNT == 0) {
                                            ?>
                                                <button style="margin: top 1px;" type="button" class="btn btn-danger" onclick="deldata('proc_player.php?proc=del','player_id=<?php echo $rec['player_id']; ?>')"><i class="fa fa-times" aria-hidden="true"></i> ลบ</button>
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
        $('#table_id').DataTable();
    });
</script>