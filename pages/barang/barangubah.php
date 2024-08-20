<div id="atas" class="row mb-3">
    <div class="col">
        <div class="row">
            <div class="col-md-6">
                <h3>Ubah Data Barang</h3>
            </div>
            <div class="col-md-6">
                <a href="?page=barangdata" class="btn btn-primary  float-end">
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
            $nama_barang = $_POST['nama_barang'];
            $merk = $_POST['merk'];
            $satuan = $_POST['satuan'];
            $qty = $_POST['qty'];
            $tipe = $_POST['tipe'];
            $checkSQL = "SELECT * FROM barang WHERE nama_barang = '$nama_barang' AND kode_barang!='$id'";
            $resultCheck = mysqli_query($koneksi, $checkSQL);
            $sudahAda = (mysqli_num_rows($resultCheck) > 0) ? true : false;
            if ($sudahAda) {
        ?>
                <div class="alert alert-danger" role="alert">
                    <i class="fa fa-exclamation-circle"></i>
                    Nama Barang sama sudah ada
                </div>
                <?php
            } else {
                $updateSQL = "UPDATE barang SET nama_barang='$nama_barang', 
                merk='$merk',
                satuan='$satuan',
                qty='$qty',
                tipe='$tipe'
                WHERE kode_barang='$id'";
                $result = mysqli_query($koneksi, $updateSQL);
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
                    <meta http-equiv='refresh' content='2;url=?page=barangdata'>
        <?php
                }
            }
        }

        $id = $_GET['id'];
        $selectSQL = "SELECT * FROM barang WHERE kode_barang='$id'";
        $result = mysqli_query($koneksi, $selectSQL);
        if (!$result || mysqli_num_rows($result) == 0) {
            echo "<meta http-equiv='refresh' content='0;url=?page=barangdata'>";
        } else {
            $row = mysqli_fetch_assoc($result);
        }
        ?>
    </div>
</div>
<div id="bawah" class="row">
    <div class="col">
        <div class="card px-3 py-3">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="id">Kode Barang</label>
                    <input type="text" class="form-control" name="id" value="<?= $row['kode_barang'] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" value="<?= $row['nama_barang'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="merk">Merk</label>
                    <input type="text" class="form-control" name="merk" value="<?= $row['merk'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="satuan">Qty</label>
                    <input type="number" class="form-control" name="qty" value="<?= $row['qty'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="satuan">Satuan</label>
                    <input type="text" class="form-control" name="satuan" value="<?= $row['satuan'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="satuan">Deskripsi (Tipe/ Speksifikasi)</label>
                    <textarea class="form-control" name="tipe" required><?= $row['tipe'] ?></textarea>
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