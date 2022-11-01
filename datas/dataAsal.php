<?php
$model = new Asal();
$data_as = $model->dataAsal();
?>
<section id="kat" class="kat" style="background-color: #f8f9fa;">
    <div class="container shadow p-5" style="background-color: #fff; border-radius: 10px;">

        <div class="section-title">
            <h2>Daftar Asal Pengadaan</h2>
        </div>


        <div class="row justify-content-center">
            <div class="col-5">
                <a class="btn btn-sm text-white mb-3" style="background-color: #5cb874;" href="index.php?hal=forms/asal">
                    Tambah <i class="bi bi-plus-lg fs-7"></i>
                </a>
                <table class="table table-sm table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Jenis Asal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_as as $row) {
                        ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $row['nama_asal'] ?></td>
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