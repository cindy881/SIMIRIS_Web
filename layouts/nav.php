<?php
$sesi = $_SESSION['USER'];
?>
<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto">
            <a href="index.php?hal=home">
                <i class="bi bi-box-seam-fill" style="color: #5cb874;"></i> Simiris
            </a>
        </h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->

        <nav class="navbar navbar-expand-sm">
            <div class="container-fluid collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?hal=home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?hal=layouts/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?hal=layouts/contact">Contact</a>
                    </li>
                    <?php
                    if (!isset($sesi)) { //---------jika belum/gagal login-----------
                    ?>
                        <li>
                            <a class="getstarted scrollto" href="login.php">Login</a>
                        </li>
                    <?php
                    } else { //---------jika berhasil login-----------
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?hal=dinv/dataInv">Inventaris</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?hal=dpegawai/dataPegawai">Pegawai</a>
                        </li>
                        <?php
                        if ($sesi['role'] == 'Admin') { //---------hanya untuk admin----------
                        ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Kelola Data
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="index.php?hal=dpengadaan/dataPengadaan">Data Pengadaan</a></li>
                                    <li><a class="dropdown-item" href="index.php?hal=dpeminjaman/dataPeminjaman">Data Peminjaman</a></li>
                                    <li><a class="dropdown-item" href="index.php?hal=duser/dataUser">Data User</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li class="dropdown-item fw-bold">Lain-lain</li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="index.php?hal=datas/dataDept">Daftar Departemen</a></li>
                                    <li><a class="dropdown-item" href="index.php?hal=datas/dataKat">Daftar Kategori Barang</a></li>
                                    <li><a class="dropdown-item" href="index.php?hal=datas/dataAsal">Daftar Asal Pengadaan</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?= $sesi['foto'] ?>" alt="" style="border-radius: 20px; max-width:2rem;">
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item fw-bold" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </ul>
            </div>
        </nav>

    </div>
</header><!-- End Header -->