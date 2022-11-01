<?php
$obj_asal = new Asal();
$data_asal = $obj_asal->dataAsal();

$obj_pda = new Pengadaan();

// EDIT DATA
$idedit = $_REQUEST['idedit'];
$pda = !empty($idedit) ? $obj_pda->getPengadaan($idedit) : array();
?>
<section id="invForm" class="invForm p-5" style="background-color: #f8f9fa;">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card shadow p-5" style="background-color: #fff; border-radius: 10px;">

                <a href="index.php?hal=dpengadaan/dataPengadaan">
                    <i class="bi bi-arrow-left fs-3" style="color: #5cb874;"></i>
                </a>

                <div class="section-title">
                    <h2>Input Pengadaan</h2>
                </div>

                <form action="controller_pengadaan.php" method="POST" class="row justify-content-center">
                    <div class="col">
                        <div class="mb-3 row">
                            <label for="inputKode" class="col-sm-3 col-form-label">Kode</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputKode" name="kode_pengadaan" value="<?= $pda['kode_pengadaan'] ?>" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputTgl" class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="inputTgl" name="tgl_pengadaan" value="<?= $pda['tgl_pengadaan'] ?>" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputAsal" class="col-sm-3 col-form-label">Asal Pengadaan</label>
                            <div class="col-sm-9">
                                <select class="form-select" aria-label="Default select example" name="fk_asal_pengadaan" required>
                                    <option selected>-- Pilih Asal Pengadaan --</option>
                                    <?php
                                    foreach ($data_asal as $asal) {
                                        $selected = $pda['fk_asal_pengadaan'] == $asal['id_asal'] ? 'selected' : '';
                                    ?>
                                        <option value="<?= $asal['id_asal'] ?>" <?= $selected ?>><?= $asal['nama_asal'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" name="proses" value="ubah" class="btn btn-warning btn-md text-white col-12 mt-3">Ubah</button>
                        <input type="hidden" name="idx" value="<?= $idedit ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>