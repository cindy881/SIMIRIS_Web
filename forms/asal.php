<section id="asalForm" class="asalForm p-5" style="background-color: #f8f9fa;">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card shadow p-5" style="background-color: #fff; border-radius: 10px;">

                <a href="index.php?hal=datas/dataAsal">
                    <i class="bi bi-arrow-left fs-3" style="color: #5cb874;"></i>
                </a>

                <div class="section-title mt-3">
                    <h2>Input Asal Pengadaan</h2>
                </div>

                <form action="controller_asal.php" method="POST" class="row justify-content-center">
                    <div class="col">
                        <div class="mb-3 row">
                            <label for="inputNama" class="col-sm-3 col-form-label">Nama Jenis</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputNama" name="nama_asal" value="" required>
                            </div>
                        </div>
                        <button type="submit" name="proses" value="simpan" class="btn btn-md text-white col-12 mt-3" style="background-color: #5cb874;">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>