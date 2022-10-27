<?php
/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=dbinv_kantor;host=localhost';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo 'Sukses Koneksi database';
} catch (PDOException $e) {
    echo 'Terjadi kesalahan saat koneksi/query dgn sebab ' . $e->getMessage();
}
