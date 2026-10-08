
<?php
include('connect.php');
?>
<!DOCTYPE html>
<html lang="th">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ระบบรายงานสถิติการแข่งขัน RoV</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans+Thai:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/app-ui.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <a class="topbar-brand" href="home.php">
                        <span class="topbar-brand-mark"><i class="fas fa-trophy" aria-hidden="true"></i></span>
                        <span class="topbar-brand-copy">
                            <strong>ระบบรายงานสถิติการแข่งขัน RoV</strong>
                            <small>COMPETITION DESK</small>
                        </span>
                    </a>
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-sm-inline text-gray-600 small"><?php echo htmlspecialchars($_SESSION['fullname'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg" alt="" aria-hidden="true">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="add_user.php?proc=edit&user_id=<?php echo $_SESSION['user_id'];?>&chk=1">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                   ข้อมูลส่วนตัว
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" >
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    ออกจากระบบ
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->