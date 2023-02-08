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

                        <!-- Content Row -->
                        <div class="row">
                            <!-- Earnings (Monthly) Card Example -->
                            <?php
                            $i = 0;
                            foreach ($array_menu_admin_report['MENU'] as $key => $value) {
                            ?>

                                <div class="col-xl-3 col-md-6 mb-4" onclick="linkmenu('<?php echo $value['url']; ?>')">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class=" font-weight-bold text-primary text-uppercase mb-1">
                                                        <?php echo $value['name'] ?></div>

                                                </div>
                                                <div class="col-auto">
                                                    <?php echo $value['icon'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php
                                $i++;
                            } ?>
                        </div>
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