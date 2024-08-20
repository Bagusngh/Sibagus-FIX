<div id="atas" class="row mb-3">
    <div class="col">
        <div class="row">
            <div class="col-md-6">
                <h3>Tambah Data Ruang</h3>
            </div>
            <div class="col-md-6">
                <a href="?page=ruangdata" class="btn btn-primary float-end">
                    <i class="fa fa-arrow-circle-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
<div id="tengah">
    <div class="col">
        <?php
        if (isset($_POST['simpan_button'])) {
            $nama_ruang = $_POST['nama_ruang'];
            $checkSQL = "SELECT * FROM ruang WHERE nama_ruang = '$nama_ruang'";
            $resultCheck = mysqli_query($koneksi, $checkSQL);
            $sudahAda = (mysqli_num_rows($resultCheck) > 0) ? true : false;
            if ($sudahAda) {
        ?>
                <div class="alert alert-danger" role="alert">
                    <i class="fa fa-exclamation-circle"></i>
                    Nama Ruang sama sudah ada
                </div>
                <?php
            } else {
                $insertSQL = "INSERT INTO ruang SET nama_ruang='$nama_ruang'";
                $result = mysqli_query($koneksi, $insertSQL);
                if (!$result) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <i class="fa fa-exclamation-circle"></i>
                        <?= mysqli_error($koneksi) ?>
                    </div>
                <?php
                } else {
                ?>
                    <div class="alert alert-success" role="alert">
                        <i class="fa fa-check-circle"></i>
                        Data berhasil ditambahkan
                    </div>
                    <meta http-equiv='refresh' content='2;url=?page=ruangdata'>
        <?php
                }
            }
        }
        ?>
    </div>
</div>
<div id="bawah" class="row">
    <div class="col">
        <div class="card px-3 py-3">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="nama_ruang">Nama Ruang</label>
                    <input type="text" class="form-control" name="nama_ruang" required>
                </div>
                <div class="col mb-3">
                    <button class="btn btn-success" type="submit" name="simpan_button">
                        <i class="fas fa-save"></i>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>