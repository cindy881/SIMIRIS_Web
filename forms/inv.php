<?php
$obj_kat = new Kategori();
$data_kat = $obj_kat->dataKategori();
?>
<section id="invForm" class="invForm p-5" style="background-color: #f8f9fa;">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card shadow p-5" style="background-color: #fff; border-radius: 10px;">

                <a href="index.php?hal=dinv/dataInv">
                    <i class="bi bi-arrow-left fs-3" style="color: #5cb874;"></i>
                </a>

                <div class="section-title">
                    <h2>Input Data Barang</h2>
                </div>

                <form action="controller_inv.php" method="POST" class="row justify-content-center">
                    <div class="col">
                        <div class="mb-3 row">
                            <label for="inputKode" class="col-sm-2 col-form-label">Kode</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputKode" name="kode_barang" value="" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNama" name="nama_barang" value="" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputKat" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" name="fk_kategori_barang" required>
                                    <option selected>-- Pilih Kategori --</option>
                                    <?php
                                    foreach ($data_kat as $kat) {
                                    ?>
                                        <option value="<?= $kat['id_kategori'] ?>"><?= $kat['nama_kategori'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputStok" class="col-sm-2 col-form-label">Stok</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="inputStok" name="stok_barang" value="">
                            </div>
                        </div>
                        <button type=" submit" name="proses" value="simpan" class="btn btn-md text-white col-12 mt-3" style="background-color: #5cb874;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>