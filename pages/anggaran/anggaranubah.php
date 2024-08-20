<div id="atas" class="row">
    <div class="col">
        <div class="row">
            <div class="col-md-6">
                <h3>Ubah Anggaran</h3>
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
    if (isset($_POST['simpan_button'])) {
        $id = $_POST['id'];
        $keterangan = $_POST['keterangan'];
        $nominal = $_POST['nominal'];
        $jenis = $_POST['jenis'];
        $karyawan_id = $_SESSION['karyawan_id'];

        $insertSQL = "UPDATE anggaran SET karyawan_id='$karyawan_id', keterangan='$keterangan', nominal='$nominal', jenis='$jenis' WHERE id='$id'";

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
                Data berhasil diubah
            </div>
            <meta http-equiv='refresh' content='2;url=?page=anggarandata'>
    <?php
        }
    }

    $id = $_GET['id'];
    $selectSQL = "SELECT * FROM anggaran WHERE id='$id'";
    $result = mysqli_query($koneksi, $selectSQL);
    if (!$result || mysqli_num_rows($result) == 0) {
        echo "<meta http-equiv='refresh' content='0;url=?page=anggarandata'>";
    } else {
        $row = mysqli_fetch_assoc($result);
    }
    ?>
</div>
<div id="bawah" class="row mt-3">
    <div class="col">
        <div class="card my-card">
            <form action="" method="post">
                <div class="mb-3 col-3">
                    <label for="id">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required value="<?= $row['tanggal'] ?>" disabled>
                </div>
                <div class="mb-3">
                    <label>Keterangan</label>
                    <textarea class="form-control" name="keterangan" required><?= $row['keterangan'] ?></textarea>
                </div>
                <div class="mb-3">
                    <label>Nominal</label>
                    <input type="number" class="form-control" name="nominal" value="<?= $row['nominal'] ?>" required>
                </div>
                <div class="mb-3">
                    <label>Jenis</label>
                    <select class="form-select" name="jenis" id="">
                        <option value=""></option>
                        <?php
                        if ($row['jenis'] == 'Uang Masuk') {
                            $m = 'selected';
                            $k = '';
                        } else {
                            $m = '';
                            $k = 'selected';
                        }
                        ?>
                        <option value="Uang Masuk" <?= $m ?>>Uang Masuk</option>
                        <option value="Uang Keluar" <?= $k ?>>Uang Keluar</option>
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