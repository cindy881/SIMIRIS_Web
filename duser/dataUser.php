<?php
$model = new User();
$data_user = $model->dataUser();

$sesi = $_SESSION['USER'];
if (isset($sesi) && $sesi['role'] == 'Admin') {
?>
    <section id="user" class="user" style="background-color: #f8f9fa;">
        <div class="container shadow p-5" style="background-color: #fff; border-radius: 10px;">

            <div class="section-title">
                <h2>Data User</h2>
            </div>

            <div class="row justify-content-center">
                <div class="col-8">
                    <!-- <a class="btn btn-md text-light mb-2" style="background-color: #5cb874;" href="index.php?hal=forms/pegawai">
                    Tambah <i class="bi bi-plus-lg fs-7"></i>
                </a> -->
                    <table class="table table-sm table-striped table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data_user as $row) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $no ?></th>
                                    <td>
                                        <img src="<?= $row['foto'] ?>" style="width: 5rem;" alt="">
                                    </td>
                                    <td><?= $row['username'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['role'] ?></td>
                                    <td>
                                        <form action=" controller_user.php" method="POST">
                                            <button type="submit" class="btn btn-danger btn-sm" name="proses" value="hapus" onclick="return confirm('Anda Yakin Data akan diHapus?')" title="Hapus Pegawai">
                                                <i class="bi bi-trash text-light" aria-hidden="true"></i>
                                            </button>
                                            <input type="hidden" name="idx" value="<?= $row['id'] ?>">
                                        </form>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
<?php
} else {
    echo '<script>alert("Anda Terlarang Akses Halaman Ini!!!");history.back();</script>';
}
?>