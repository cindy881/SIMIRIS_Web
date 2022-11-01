<?php
$id = $_REQUEST['id'];

$obj_inv = new Inventaris();
$data_inv = $obj_inv->getInv($id);

$obj_pmj = new Peminjaman();
$data_pmj = $obj_pmj->dataPeminjaman();
?>
<section id="invForm" class="invForm p-5" style="background-color: #f8f9fa;">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card shadow p-5" style="background-color: #fff; border-radius: 10px;">

                <a href="index.php?hal=dinv/dataInv_detail&id=<?= $id ?>">
                    <i class="bi bi-arrow-left fs-3" style="color: #5cb874;"></i>
                </a>

                <div class="section-title mt-4">
                    <h2>Input Data Peminjaman Inventaris</h2>
                </div>

                <form action="controller_invPeminjaman_detail.php" method="POST" class="row justify-content-center">
                    <div class="col">
                        <div class="mb-3 row">
                            <div class="col-sm-3">
                                <label for="inputPmj" class="form-label">Peminjaman :</label>
                                <select class="form-select" aria-label="Default select example" name="fk_peminjaman_pinjam" required>
                                    <option selected>-- Pilih Kode --</option>
                                    <?php
                                    foreach ($data_pmj as $pmj) {
                                    ?>
                                        <option value="<?= $pmj['id_peminjaman'] ?>"><?= $pmj['kode_peminjaman'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-3 row">
                            <label for="inputKode" class="col-sm-3 col-form-label">Kode Inventaris</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="fk_barang_pinjam" required>
                                    <option value="<?= $data_inv['id_barang'] ?>" selected><?= $data_inv['kode_barang'] ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputJml" class="col-sm-3 col-form-label">Jumlah Peminjaman</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="inputJml" name="jumlah_pinjam" value="" required>
                            </div>
                        </div>
                        <button type="submit" name="proses" value="simpan" class="btn btn-md text-white col-12 mt-3" style="background-color: #5cb874;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>