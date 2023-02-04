<?php
include("./include/header.php")

?>
<!-- Page Wrapper -->
<div style="padding:10px;color:black" ><h3>LANES</h3></div>
<div class="card ">
    <div class="card-body">
        <div id="wrapper">

            <!-- Content Wrapper -->

            <div id="content-wrapper" class="d-flex flex-column">
           
                <!-- Main Content -->
                <div id="content">
                <button type="button" class="btn btn-primary" onclick="linkmenu('add_lane.php?proc=add')"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มข้อมูล</button>
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <table id="table_id" class="display" width="100%">
                            <thead style="color:black;align:center" >
                                <tr >
                                    <td width='50%' align="center">LANE NAME</td>
                                    <td width='50%' align="center">จัดการ</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $SQL = "SELECT * FROM lanes ORDER BY lane_id ASC";
                                    $sql=mysqli_query($conn,$SQL);
                                    while($rec = mysqli_fetch_array($sql)){
  
                                ?>
                               <tr>
                                <td><?php echo $rec['name_lane'];?></td>
                                <td>
                                <button type="button" class="btn btn-warning" onclick="linkmenu('add_lane.php?proc=edit&lane_id=<?php echo $rec['lane_id'];?>')"><i class="fa fa-pencil-square" aria-hidden="true"></i>แก้ไข</button>
                                
                                <?php 
                                $COUNT = check_count("SELECT COUNT(1) as c FROM match_player_details WHERE lane_id='".$rec['lane_id']."'");
                                if($COUNT == 0){
                                    ?>
                                    <button type="button" class="btn btn-danger" onclick="deldata('proc_lane.php?proc=del&lane_id=<?php echo $rec['lane_id'];?>')"><i class="fa fa-times" aria-hidden="true"></i> ลบ</button>
                                    <?php
                                }
                                ?>
                                </td>
                               </tr>
                               <?php }?>
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
    $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>