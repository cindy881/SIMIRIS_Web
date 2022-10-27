<?php
$id = $_REQUEST['id'];

$obj_inv = new Inventaris();
$data_inv = $obj_inv->dataPeminjaman();
$pmj_id = $obj_inv->getPeminjamanInvDetail($id);
$obj_pet = new Petugas();
$data_pet = $obj_pet->dataPetPeminjaman();
$obj_peg = new Pegawai();
$data_peg = $obj_peg->dataPegawaiPeminjaman();
?>
<section id="invForm" class="invForm p-5" style="background-color: #f8f9fa;">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card shadow p-5" style="background-color: #fff; border-radius: 10px;">

                <a href="index.php?hal=dinv/dataInv_detail&id=<?= $pmj_id['id_barang'] ?>">
                    <i class="bi bi-arrow-left fs-3" style="color: #5cb874;"></i>
                </a>

                <div class="section-title">
                    <h2>Input Peminjaman</h2>
                </div>

                <form action="dinv/peminjaman/controllerInvPeminjaman.php" method="POST" class="row justify-content-center">
                    <div class="col">
                        <div class="mb-3 row">
                            <div class="col-sm-2">
                                <label for="inputPet" class="form-label">Petugas :</label>
                                <select class="form-select" aria-label="Default select example" name="fk_petugas_peminjaman" required>
                                    <option selected>--NIP--</option>
                                    <?php
                                    foreach ($data_pet as $pet) {
                                    ?>
                                        <option value="<?= $pet['id_petugas'] ?>"><?= $pet['nip_pegawai'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-3 row">
                            <label for="inputKode" class="col-sm-3 col-form-label">Kode</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputKode" name="kode_peminjaman" value="" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputTgl" class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="inputTgl" name="tgl_peminjaman" value="" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputJml" class="col-sm-3 col-form-label">Jumlah</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="inputJml" name="jumlah_peminjaman" value="" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputBarang" class="col-sm-3 col-form-label">Inventaris</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="fk_barang_peminjaman" required>
                                    <option selected>-- Pilih Inventaris--</option>
                                    <?php
                                    foreach ($data_inv as $inv) {
                                    ?>
                                        <option value="<?= $inv['id_barang'] ?>"><?= $inv['kode_barang'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPeg" class="col-sm-3 col-form-label">Peminjam</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="fk_pegawai_peminjaman" required>
                                    <option selected>-- Pilih Pegawai --</option>
                                    <?php
                                    foreach ($data_peg as $peg) {
                                    ?>
                                        <option value="<?= $peg['id_pegawai'] ?>"><?= $peg['nip_pegawai'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" name="proses" value="simpan" class="btn btn-md text-white col-12 mt-3" style="background-color: #5cb874;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>