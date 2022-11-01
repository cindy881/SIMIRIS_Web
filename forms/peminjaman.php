<?php
$obj_inv = new Peminjaman();
$data_inv = $obj_inv->dataPeminjaman();

$obj_peg = new Pegawai();
$data_peg = $obj_peg->dataPegawai();
?>
<section id="invForm" class="invForm p-5" style="background-color: #f8f9fa;">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card shadow p-5" style="background-color: #fff; border-radius: 10px;">

                <a href="index.php?hal=dpeminjaman/dataPeminjaman">
                    <i class="bi bi-arrow-left fs-3" style="color: #5cb874;"></i>
                </a>

                <div class="section-title">
                    <h2>Input Peminjaman</h2>
                </div>

                <form action="controller_peminjaman.php" method="POST" class="row justify-content-center">
                    <div class="col">
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