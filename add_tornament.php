<?php
include("./include/header.php")

?>
<!-- Page Wrapper -->
<div class="card ">
    <div class="card-body">
        <div id="wrapper">

            <!-- Content Wrapper -->

            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <form method="post" action="proc_tournament.php">
                            <div class="form-group  row">
                                <label for="exampleInputEmail1">ชื่อทัวนาเม้น</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="tour_name" name="tour_name" aria-describedby="emailHelp" placeholder="ชื่อทัวนาเม้น">
                                </div>
                            </div>
                            <div class="form-group  row">
                                <label for="exampleInputEmail1">วันเริ่มต้น</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="tour_name" name="tour_name" aria-describedby="emailHelp" placeholder="ชื่อทัวนาเม้น">
                                </div>
                            </div>
                          <center>
                          <button type="submit" class="btn btn-primary">บันทึก</button>
                          </center>
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