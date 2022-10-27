<?php
$id = $_REQUEST['id'];

$obj_inv = new Inventaris();
$data_inv = $obj_inv->dataInv();
$data_pda = $obj_inv->dataPengadaan();
$pda_id = $obj_inv->getPengadaanInvDetail($id);
?>
<section id="invForm" class="invForm p-5" style="background-color: #f8f9fa;">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card shadow p-5" style="background-color: #fff; border-radius: 10px;">

                <a href="index.php?hal=dinv/pengadaan/dataInvPengadaan_detail&id=<?= $pda_id['id_pengadaan'] ?>">
                    <i class="bi bi-arrow-left fs-3" style="color: #5cb874;"></i>
                </a>

                <div class="section-title">
                    <h2>Input Data Pengadaan Inventaris</h2>
                </div>

                <form action="controller_pengadaan_detail.php" method="POST" class="row justify-content-center">
                    <div class="col">
                        <div class="mb-3 row">
                            <div class="col-lg-2">
                                <label for="inputPet" class="form-label">Pengadaan :</label>
                                <input type="number" class="col-6 col-form-control" id="inputKode" name="fk_pengadaan_masuk" value="<?= $dpda['id_pengadaan'] ?>">
                            </div>
                        </div>
                        <hr>
                        <div class="mb-3 row">
                            <label for="inputAsal" class="col-sm-3 col-form-label">Kode Inventaris</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="fk_barang_masuk" required>
                                    <option selected>-- Pilih Kode --</option>
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
                            <label for="inputPda" class="col-sm-3 col-form-label">Jumlah Pengadaan</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="inputPda" name="jumlah_masuk" value="" required>
                            </div>
                        </div>
                        <button type="submit" name="proses" value="simpan" class="btn btn-md text-white col-12 mt-3" style="background-color: #5cb874;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>