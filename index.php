<?php
session_start();
include_once 'koneksi.php';
include_once 'models/User.php';
include_once 'models/Kategori.php';
include_once 'models/Inventaris.php';
include_once 'models/Departemen.php';
include_once 'models/Pegawai.php';
include_once 'models/Asal.php';
include_once 'models/Pengadaan.php';
include_once 'models/PengadaanDetail.php';
include_once 'models/Peminjaman.php';
include_once 'models/PeminjamanDetail.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
include_once 'layouts/head.php';
?>

<body>

  <?php
  include_once 'layouts/nav.php';
  ?>
  <main id="main">
    <?php
    // error_reporting(0);
    $hal = $_REQUEST['hal'];
    if (!empty($hal)) {
      include_once $hal . '.php';
    } else {
      include_once 'home.php';
    }
    ?>
  </main>
  <?php
  include_once 'layouts/footer.php';
  ?>
</body>

</html>