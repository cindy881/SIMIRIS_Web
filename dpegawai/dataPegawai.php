<?php
$model = new Pegawai();
$data_peg = $model->dataPegawai();
?>
<section id="peg" class="peg" style="background-color: #f8f9fa;">
    <div class="container shadow p-5" style="background-color: #fff; border-radius: 10px;">

        <div class="section-title">
            <h2>Data Pegawai</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-9">
                <a class="btn btn-sm text-light mb-3" style="background-color: #5cb874;" href="index.php?hal=forms/pegawai">
                    Tambah <i class="bi bi-plus-lg fs-7"></i>
                </a>
                <table class="table table-sm table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Departemen</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_peg as $row) {
                        ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $row['nip_pegawai'] ?></td>
                                <td><?= $row['nama_pegawai'] ?></td>
                                <td><?= $row['nama_departemen'] ?></td>
                                <td>
                                    <a href="index.php?hal=dpegawai/dataPegawai_detail&id=<?= $row['id_pegawai'] ?>">
                                        <button type="button" class="btn btn-info btn-sm" title="Detail Pegawai">
                                            <i class="bi bi-eye-fill text-light"></i>
                                        </button>
                                    </a>
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