<?php

include("./include/header.php");
include("./session_chk.php");

?>
<!-- Page Wrapper -->
<div class="container-fluid page-heading">
    <div>
        <span class="page-kicker">INSIGHTS</span>
        <h1>รายงานและสถิติ</h1>
        <p>สรุปข้อมูลการแข่งขันและผลงาน</p>
    </div>
</div>
<div class="card menu-page-shell">
    <div class="card-body">
        <div id="wrapper">

            <!-- Content Wrapper -->

            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Content Row -->
                        <div class="row menu-grid">
                            <!-- Earnings (Monthly) Card Example -->
                            <?php
                            $i = 0;
                            foreach ($array_menu_admin_report['MENU'] as $key => $value) {
                            ?>

                                <div class="col-xl-3 col-md-6 mb-4">
                                    <a class="menu-card-link" href="<?php echo htmlspecialchars($value['url'], ENT_QUOTES, 'UTF-8'); ?>">
                                    <div class="card menu-card h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class=" font-weight-bold text-primary text-uppercase mb-1">
                                                        <?php echo htmlspecialchars($value['name'], ENT_QUOTES, 'UTF-8'); ?></div>

                                                </div>
                                                <div class="col-auto">
                                                    <?php echo $value['icon'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
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