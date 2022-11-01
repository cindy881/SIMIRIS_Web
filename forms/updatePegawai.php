<?php
$obj_dept = new Departemen();
$data_dept = $obj_dept->dataDepartemen();

$obj_peg = new Pegawai();

// EDIT DATA
$idedit = $_REQUEST['idedit'];
$peg = !empty($idedit) ? $obj_peg->getPegawai($idedit) : array();
?>
<section id="pegawaiForm" class="pegawaiForm p-5" style="background-color: #f8f9fa;">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card shadow p-5" style="background-color: #fff; border-radius: 10px;">

                <a href="index.php?hal=dpegawai/dataPegawai">
                    <i class="bi bi-arrow-left fs-3" style="color: #5cb874;"></i>
                </a>

                <div class="section-title">
                    <h2>Input Data Pegawai</h2>
                </div>

                <form action="controller_pegawai.php" method="POST" class="row justify-content-center">
                    <div class="col">
                        <div class="mb-3 row">
                            <label for="inputNip" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="inputNip" name="nip_pegawai" value="<?= $peg['nip_pegawai'] ?>" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNama" name="nama_pegawai" value="<?= $peg['nama_pegawai'] ?>" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNama" name="email_pegawai" value="<?= $peg['email_pegawai'] ?>" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputDept" class="col-sm-2 col-form-label">Departemen</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" name="fk_departemen_pegawai" required>
                                    <option selected>-- Pilih Departemen --</option>
                                    <?php
                                    foreach ($data_dept as $dept) {
                                        $selected = $peg['fk_departemen_pegawai'] == $dept['id_departemen'] ? 'selected' : '';
                                    ?>
                                        <option value="<?= $dept['id_departemen'] ?>" <?= $selected ?>><?= $dept['nama_departemen'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputRole" class="col-sm-2 col-form-label">Role</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" name="role_pegawai" required>
                                    <option selected><?= $peg['role_pegawai'] ?></option>
                                    <option value="Admin">Admin</option>
                                    <option value="Staff">Staff</option>
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