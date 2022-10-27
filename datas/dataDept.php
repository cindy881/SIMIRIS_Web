<?php
$model = new Departemen();
$data_dept = $model->dataDepartemen();
?>
<section id="dept" class="dept" style="background-color: #f8f9fa;">
    <div class="container shadow p-5" style="background-color: #fff; border-radius: 10px;">

        <div class="section-title">
            <h2>Daftar Departemen</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-7">
                <table class="table table-sm table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_dept as $row) {
                        ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $row['nama_departemen'] ?></td>
                                <td>
                                    <a href="">
                                        <i class="bi bi-eye-fill"></i>
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