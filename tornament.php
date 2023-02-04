<?php
include("./include/header.php")

?>
<!-- Page Wrapper -->
<div style="padding:10px;color:black" ><h3>ทัวนาเม้น</h3></div>
<div class="card ">
    <div class="card-body">
        <div id="wrapper">

            <!-- Content Wrapper -->

            <div id="content-wrapper" class="d-flex flex-column">
           
                <!-- Main Content -->
                <div id="content">
                <button type="button" class="btn btn-primary" onclick="linkmenu('add_tornament.php?proc=add')"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มข้อมูล</button>
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <table id="table_id" class="display" width="100%">
                            <thead style="color:black;align:center" >
                                <tr >
                                    <td width='50%' align="center">ชื่อ Tornament</td>
                                    <td width='20%' align="center">วันที่เริ่มต้น</td>
                                    <td width='20%' align="center">วันที่สิ้นสุด</td>
                                    <td width='10%' align="center">จัดการ</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $SQL = "SELECT * FROM tournaments ORDER BY start_date ASC";
                                    $sql=mysqli_query($conn,$SQL);
                                    while($rec = mysqli_fetch_array($sql)){
  
                                ?>
                               <tr>
                                <td><?php echo $rec['tour_name'];?></td>
                                <td><?php echo db2date($rec['start_date']);?></td>
                                <td><?php echo db2date($rec['end_date']);?></td>
                                <td>
                                <button type="button" class="btn btn-warning" onclick="linkmenu('add_tornament.php?proc=edit&tour_id=<?php echo $rec['tour_id'];?>')"><i class="fa fa-pencil-square" aria-hidden="true"></i>แก้ไข</button>
                                <button type="button" class="btn btn-danger" onclick="linkmenu('proc_tournament.php?proc=del&tour_id=<?php echo $rec['tour_id'];?>')"><i class="fa fa-times" aria-hidden="true"></i> ลบ</button>
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