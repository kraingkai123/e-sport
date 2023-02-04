<?php
include("./include/header.php")

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
                    <button type="button" class="btn btn-primary" onclick="linkmenu('add_team.php?proc=add')"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มข้อมูล</button>
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <table id="table_id" class="display" width="100%">
                            <thead style="color:black;align:center">
                                <tr>
                                    <td width='40%' align="center">TEAM NAME</td>
                                    <td width='40%' align="center">SCHOOL</td>
                                    <td width='20%' align="center">IMAGE</td>
                                    <td width='10%' align="center">จัดการ</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $SQL = "SELECT * FROM teams ORDER BY team_id DESC";
                                $sql = mysqli_query($conn, $SQL);
                                while ($rec = mysqli_fetch_array($sql)) {

                                ?>
                                    <tr>
                                        <td><?php echo $rec['team_name']; ?></td>
                                        <td><?php echo get_shcool_name($rec['school_id']) ?></td>
                                        <td>
                                            <img src="./img/team/<?php echo $rec['img_team']; ?>" class="rounded mx-auto d-block" alt="..." width="200px" height="200px">
                                        </td>
                                        <td>

                                            <button type="button" class="btn btn-warning" onclick="linkmenu('add_team.php?proc=edit&team_id=<?php echo $rec['team_id']; ?>')"><i class="fa fa-pencil-square" aria-hidden="true"></i>แก้ไข</button>
                                            <?php
                                            $COUNT = check_count("SELECT COUNT(1) as c FROM players WHERE team_id='" . $rec['team_id'] . "'");
                                            if ($COUNT == 0) {
                                            ?>
                                                <button type="button" class="btn btn-danger" onclick="deldata('proc_team.php?proc=del','team_id=<?php echo $rec['team_id']; ?>')"><i class="fa fa-times" aria-hidden="true"></i> ลบ</button>
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