<?php
$id = $_REQUEST['id'];

$obj_pmj = new Peminjaman();
$pmj_id = $obj_pmj->getPeminjaman($id);

$obj_peg = new Pegawai();
$data_peg = $obj_peg->getPegawaiOnPeminjaman($id);

$obj_inv = new Inventaris();
$data_inv = $obj_inv->getInvOnPeminjaman($id);
?>
<section id="detailInv" class="detailInv" style="background-color: #f8f9fa;">
    <div class="container shadow p-5" style="background-color: #fff; border-radius: 10px;">

        <a href="index.php?hal=dpeminjaman/dataPeminjaman">
            <i class="bi bi-arrow-left fs-3" style="color: #5cb874;"></i>
        </a>
        <div class="section-title">
            <h2>Detail Peminjaman</h2>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-8 pt-4">
                        <table class="table table-sm">
                            <tr>
                                <th scope="col">Kode</th>
                                <td scope="col">:</td>
                                <td scope="col"><?= $pmj_id['kode_peminjaman'] ?></td>
                            </tr>
                            <tr>
                                <th scope="col">Tanggal</th>
                                <td scope="col">:</td>
                                <td scope="col"><?= $pmj_id['tgl_peminjaman'] ?></td>
                            </tr>
                            <tr>
                                <th>
                                    <a href="index.php?hal=dpegawai/dataPegawai_detail&id=<?= $data_peg['id_pegawai'] ?>">
                                        Data Peminjam
                                    </a>
                                </th>
                            </tr>
                            <tr>
                                <th scope="col">NIP</th>
                                <td scope="col">:</td>
                                <td scope="col"><?= $pmj_id['nip_pegawai'] ?></td>
                            </tr>
                            <tr>
                                <th scope="col">Nama</th>
                                <td scope="col">:</td>
                                <td scope="col"><?= $pmj_id['nama_pegawai'] ?></td>
                            </tr>
                        </table>
                        <?php
                        if ($sesi['role'] == 'Admin') { //---------hanya untuk admin----------
                        ?>
                            <form action="controller_peminjaman.php" method="POST">
                                <a href="index.php?hal=forms/updatePeminjaman&idedit=<?= $pmj_id['id_peminjaman'] ?>">
                                    <button type="button" class="btn btn-warning btn-sm text-light col-12" title="Ubah Peminjaman">
                                        Edit <i class="bi bi-pencil-square" aria-hidden="true"></i>
                                    </button>
                                </a>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <h4 class="mt-4 mb-2 fw-bold">Daftar Inventaris</h4>
        <div class=" row justify-content-center">
            <div class="col">
                <?php
                if ($sesi['role'] == 'Admin') { //---------hanya untuk admin----------
                ?>
                    <a class="btn btn-sm text-light mb-2" style="background-color: #5cb874;" href="index.php?hal=forms/peminjamanDetail&id=<?= $pmj_id['id_peminjaman'] ?>">
                        Tambah <i class="bi bi-plus-lg fs-7"></i>
                    </a>
                <?php } ?>
                <table class="table table-sm table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th rowspan="2">NO</th>
                            <th colspan="3">Inventaris</th>
                            <th rowspan="2">Jumlah</th>
                            <th rowspan="2">AKSI</th>
                        </tr>
                        <tr>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_inv as $row) {
                        ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $row['kode_barang'] ?></td>
                                <td><?= $row['nama_barang'] ?></td>
                                <td><?= $row['nama_kategori'] ?></td>
                                <td><?= $row['jumlah_pinjam'] ?></td>
                                <td>
                                    <form action="controller_peminjaman_detail.php" method="POST">
                                        <a href="index.php?hal=dinv/dataInv_detail&id=<?= $row['id_barang'] ?>">
                                            <button type="button" class="btn btn-info btn-sm" title="Detail Inventaris">
                                                <i class="bi bi-eye-fill text-light"></i>
                                            </button>
                                        </a>
                                        <?php
                                        if ($sesi['role'] == 'Admin') { //---------hanya untuk admin----------
                                        ?>
                                            <button type="submit" class="btn btn-danger btn-sm" name="proses" value="hapus" onclick="return confirm('Anda yakin data akan dihapus?')" title="Hapus data pengadaan">
                                                <i class="bi bi-trash text-light" aria-hidden="true"></i>
                                            </button>
                                            <input type="hidden" name="idx" value="<?= $row['id_detail_pinjam'] ?>">
                                        <?php } ?>
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