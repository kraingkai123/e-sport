<?php session_start(); ?>
<!DOCTYPE html>
<html lang="th">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>เข้าสู่ระบบ | RoV Match Center</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans+Thai:300,400,500,600,700" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/app-ui.css" rel="stylesheet">

</head>

<body class="login-page">

    <main class="login-layout">
        <div class="login-shell">
            <section class="login-brand" aria-label="RoV Match Center">
                <div class="login-brand-copy">
                    <span class="login-kicker">COMPETITION RECORDS</span>
                    <h1>RoV<br>Match Center</h1>
                    <p>ระบบสถิติการแข่งขัน</p>
                </div>
                <img src="img/login.png" alt="RoV Arena of Valor">
                <span class="login-season">MATCH OPERATIONS</span>
            </section>

            <section class="login-panel" aria-labelledby="login-title">
                <div class="login-panel-inner">
                    <span class="login-panel-mark"><i class="fas fa-trophy" aria-hidden="true"></i> MATCH DESK</span>
                    <h2 id="login-title">เข้าสู่ระบบ</h2>
                    <p class="login-intro">ยินดีต้อนรับกลับ</p>

                    <form id="login_form" class="login-form" onsubmit="login(event)">
                        <div class="form-group">
                            <label for="Username">ชื่อผู้ใช้</label>
                            <input type="text" class="form-control" id="Username" name="username" placeholder="กรอกชื่อผู้ใช้" autocomplete="username" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="user_password">รหัสผ่าน</label>
                            <input type="password" class="form-control" id="user_password" name="password" placeholder="กรอกรหัสผ่าน" autocomplete="current-password" required>
                        </div>
                        <p id="login_error" class="login-error" role="alert" aria-live="polite"></p>
                        <button type="submit" id="login_submit" class="btn btn-primary btn-block login-submit">
                            <span>เข้าสู่ระบบ</span>
                            <i class="fas fa-arrow-right" aria-hidden="true"></i>
                        </button>
                    </form>

                    <p class="login-caption">ระบบรายงานสถิติการแข่งขัน RoV</p>
                </div>
            </section>
        </div>
    </main>

    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Please enter your login and password!</p>

                                <form class="user">
                                    <div class="form-outline form-white mb-4">
                                        <input type="text" class="form-control form-control-user" id="Username_legacy" aria-describedby="emailHelp" placeholder="Enter Username">
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="password" class="form-control form-control-user" id="user_password_legacy" placeholder="Password">
                                    </div>

                                    <a href="#" class="btn btn-outline-light btn-lg px-5" onclick="login()">
                                        Login
                                    </a>


                                </form>



                                <!-- <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p> -->

                                <!-- <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button> -->

                                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                    <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                </div>

                            </div>

                            <!-- <div>
                                <p class="mb-0">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Sign Up</a>
                                </p>
                            </div> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="Username" aria-describedby="emailHelp" placeholder="Enter Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="user_password" placeholder="Password">
                                        </div>

                                        <a href="#" class="btn btn-primary btn-user btn-block" onclick="login()">
                                            Login
                                        </a>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div> -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/func.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
<script>
    function login(event) {
        if (event) {
            event.preventDefault();
        }

        const username = $('#Username').val().trim();
        const password = $('#user_password').val();
        const submitButton = $('#login_submit');
        const errorMessage = $('#login_error');

        errorMessage.text('');
        if (!username || !password) {
            errorMessage.text('กรุณากรอกชื่อผู้ใช้และรหัสผ่าน');
            return;
        }

        submitButton.prop('disabled', true).html('<i class="fas fa-spinner fa-spin" aria-hidden="true"></i> กำลังเข้าสู่ระบบ');

        $.ajax({
            url: "check_login.php",
            method: 'post',
            data: {
                username: username,
                password: password
            },
            success: function(data) {
                if ($.trim(String(data)) === '1') {
                    window.location.href = 'home.php';
                } else {
                    errorMessage.text('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');
                }
            },
            error: function() {
                errorMessage.text('ไม่สามารถเชื่อมต่อระบบได้ กรุณาลองอีกครั้ง');
            },
            complete: function() {
                submitButton.prop('disabled', false).html('<span>เข้าสู่ระบบ</span><i class="fas fa-arrow-right" aria-hidden="true"></i>');
            }
        });
    }
</script>