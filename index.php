<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

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
                                        <input type="text" class="form-control form-control-user" id="Username" aria-describedby="emailHelp" placeholder="Enter Username">
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="password" class="form-control form-control-user" id="user_password" placeholder="Password">
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
    function login() {
        $.ajax({
            url: "check_login.php",
            async: false,
            method: 'post',
            data: {
                username: $('#Username').val(),
                password: $('#user_password').val()
            },
            success: function(data) {
                if (data == true) {
                    linkmenu('home.php')
                } else {
                    Swal.fire(
                        'รหัสผ่านของคุณไม่ถูกต้อง',
                        '',
                        'error'
                    )
                }
            }
        });
    }
</script>