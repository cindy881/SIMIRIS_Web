<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Simiris | SIM Inventaris</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|
  Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|
  Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="vendor/font-awsome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/login.css">

    <!-- =======================================================
  * Template Name: Green - v4.9.1
  * Template URL: https://bootstrapmade.com/green-free-one-page-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto">
                <a href="index.php?hal=home"><i class="bi bi-box-seam-fill" style="color: #5cb874;"></i> Simiris</a>
            </h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->

            <nav id="navbar" class="navbar">
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
    <main id="main">
        <div class="wrapper bg-white">
            <div class="h2 text-center"><i class="bi bi-box-seam-fill" style="color: #5cb874;"></i></div>
            <div class="h4 text-muted text-center pt-2">Enter your login details</div>
            <form action="controller_user.php" method="POST" class="pt-3">
                <div class="row justify-content-center">
                    <div class="form-group py-2">
                        <div class="input-field">
                            <i class="bi bi-person p-1" style="font-size: 1.25rem;"></i>
                            <input type=" text" placeholder="Enter your Username" name="username" required class="">
                        </div>
                    </div>
                    <div class="form-group py-1 pb-2">
                        <div class="input-field"> <i class="bi bi-lock p-1" style="font-size: 1.25rem;"></i>
                            <input type="password" placeholder="Enter your Password" name="password" required class=""> <button class="btn bg-white text-muted"> <span class="far fa-eye-slash"></span> </button>
                        </div>
                    </div>
                    <div class="d-flex align-items-start">
                        <button type="submit" class="btn btn-block col-12 text-center my-3">Log in</button>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>



</html>