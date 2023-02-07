<?php
include("./include/header.php")

?>
<!-- Page Wrapper -->
<div style="padding:10px;color:black">
    <h3>HERO</h3>
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

                        <button type="button" class="btn btn-primary" onclick="linkmenu('add_hero.php?proc=add')"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มข้อมูล</button>

                        <button type="button" class="btn btn-info float-right ml-2" onclick="history.back()">ย้อนกลับ</button>

                    </div>
                    <br>

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <table id="table_id" class="display" width="100%">
                            <thead style="color:black;align:center">
                                <tr>
                                    <td width='50%' align="center">HERO NAME</td>
                                    <td width='20%' align="center">IMAGE</td>
                                    <td width='10%' align="center">จัดการ</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $SQL = "SELECT * FROM heros ORDER BY hero_name ASC";
                                $sql = mysqli_query($conn, $SQL);
                                while ($rec = mysqli_fetch_array($sql)) {

                                ?>
                                    <tr>
                                        <td><?php echo $rec['hero_name']; ?></td>
                                        <td>
                                            <img src="./img/hero/<?php echo $rec['img_hero']; ?>" class="rounded mx-auto d-block" alt="..." width="200px" height="200px">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-warning" onclick="linkmenu('add_hero.php?proc=edit&hero_id=<?php echo $rec['hero_id']; ?>')"><i class="fa fa-pencil-square" aria-hidden="true"></i>แก้ไข</button>
                                            <?php
                                            $COUNT = check_count("SELECT COUNT(1) as c FROM match_player_details WHERE hero_id='" . $rec['hero_id'] . "'");
                                            if ($COUNT == 0) {
                                            ?>
                                                <button type="button" class="btn btn-danger" onclick="deldata('proc_hero.php?proc=del&hero_id=<?php echo $rec['hero_id']; ?>')"><i class="fa fa-times" aria-hidden="true"></i> ลบ</button>
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