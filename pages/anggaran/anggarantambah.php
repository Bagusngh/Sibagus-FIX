<div id="atas" class="row">
    <div class="col">
        <div class="row">
            <div class="col-md-6">
                <h3>Tambah Anggaran</h3>
            </div>
            <div class="col-md-6">
                <a href="?page=anggarandata" class="btn btn-primary btn-sm float-end">
                    <i class="fa fa-arrow-circle-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
<div id="tengah">
    <?php
    date_default_timezone_set('Asia/jakarta');
    if (isset($_POST['simpan_button'])) {
        $keterangan = $_POST['keterangan'];
        $nominal = $_POST['nominal'];
        $jenis = $_POST['jenis'];
        $karyawan_id = $_SESSION['karyawan_id'];
        $tanggal = date("Y-m-d");
        $jam = date('H:i:s');

        $insertSQL = "INSERT INTO anggaran SET karyawan_id='$karyawan_id', keterangan='$keterangan', nominal='$nominal', jenis='$jenis', tanggal='$tanggal', jam='$jam'";

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
            <meta http-equiv='refresh' content='2;url=?page=anggarandata'>
    <?php
        }
    }
    ?>
</div>
<div id="bawah" class="row mt-3">
    <div class="col">
        <div class="card my-card">
            <form action="" method="post">
                <div class="mb-3 col-3">
                    <label for="id">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required value="<?= date("Y-m-d") ?>" disabled>
                </div>
                <div class="mb-3">
                    <label>Keterangan</label>
                    <textarea class="form-control" name="keterangan" required></textarea>
                </div>
                <div class="mb-3">
                    <label>Nominal</label>
                    <input type="number" class="form-control" name="nominal" required>
                </div>
                <div class="mb-3">
                    <label>Jenis</label>
                    <select class="form-select" name="jenis" id="">
                        <option value=""></option>
                        <option value="Uang Masuk">Uang Masuk</option>
                        <option value="Uang Keluar">Uang Keluar</option>
                    </select>
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