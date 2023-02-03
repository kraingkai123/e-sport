<?php
include("./include/header.php")

?>
<!-- Page Wrapper -->
<div style="padding:10px;color:black" ><h3>เมนู</h3></div>
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
                        <table id="table_id" class="display">
                            <thead style="color:black">
                                <tr>
                                    <th>ชื่อ Tornament</th>
                                    <th>วันที่เริ่มต้น</th>
                                    <th>วันที่สิ้นสุด</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                               <tr>
                                <td>thai</td>
                                <td>2-2</td>
                                <td>2-2</td>
                                <td>
                                <button type="button" class="btn btn-warning"><i class="fa fa-pencil-square" aria-hidden="true"></i>แก้ไข</button>
                                <button type="button" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> ลบ</button>
                                </td>
                               </tr>
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