<div id="atas" class="row mb-3">
    <div class="col">
        <div class="row">
            <div class="col-md-6">
                <h3>Profil</h3>
            </div>
            <div class="col-md-6">
                <a href="?page=dashboard" class="btn btn-primary float-end">
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
            $id = $_POST['id'];
            $nama_karyawan = $_POST['nama_karyawan'];
            $nomor_hp = $_POST['nomor_hp'];
            $alamat = $_POST['alamat'];
            $email = $_POST['email'];
            $updateSQL = "UPDATE karyawan SET nama_karyawan='$nama_karyawan', 
                    nomor_hp='$nomor_hp',
                    alamat='$alamat',
                    email='$email' 
                    WHERE id=$id";
            $result = mysqli_query($koneksi, $updateSQL);
            if (!$result) {
        ?>
                <div class="alert alert-danger" role="alert">
                    <i class="fa fa-exclamation-circle"></i>
                    <?= mysqli_error($koneksi) ?>
                </div>
            <?php
            }
            ?>
            <div class="alert alert-success" role="alert">
                <i class="fa fa-check-circle"></i>
                Data berhasil ditambahkan
            </div>
        <?php
        }

        $id = $_SESSION['karyawan_id'];
        $select = "SELECT * FROM karyawan WHERE id = $id";
        $result = mysqli_query($koneksi, $select);
        $row = mysqli_fetch_assoc($result);

        ?>
    </div>
</div>
<div id="bawah" class="row">
    <div class="col">
        <div class="card px-3 py-3">
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $id ?>">
                <div class="mb-3">
                    <label for="nama_karyawan">Nama Karyawan</label>
                    <input type="text" class="form-control" name="nama_karyawan" value="<?= $row['nama_karyawan'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nomor_hp">HP</label>
                    <input type="text" class="form-control" name="nomor_hp" value="<?= $row['nomor_hp'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="<?= $row['alamat'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" value="<?= $row['email'] ?>" required>
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