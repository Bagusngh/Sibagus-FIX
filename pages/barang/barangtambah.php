<div id="atas" class="row mb-3">
    <div class="col">
        <div class="row">
            <div class="col-md-6">
                <h3>Tambah Data Barang</h3>
            </div>
            <div class="col-md-6">
                <a href="?page=barangdata" class="btn btn-primary float-end">
                    <i class="fa fa-arrow-circle-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
<div id="tengah">
    <div class="col">
        <?php
        date_default_timezone_set('Asia/Jakarta');
        if (isset($_POST['simpan_button'])) {
            $nama_barang = $_POST['nama_barang'];
            $merk = $_POST['merk'];
            $kode_barang = $_POST['kode_barang'];
            $qty = $_POST['qty'];
            $tipe = $_POST['tipe'];
            $satuan = $_POST['satuan'];
            $checkSQL = "SELECT * FROM barang WHERE nama_barang = '$nama_barang'";
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
                $insertSQL = "INSERT INTO barang SET nama_barang='$nama_barang', 
                merk='$merk',
                kode_barang='$kode_barang',
                tipe='$tipe',
                qty='$qty',
                satuan='$satuan',
                record='" . date('Y-m-d H:i:s') . "'";
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
                    <meta http-equiv='refresh' content='2;url=?page=barangdata'>
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
                    <label for="kode_barang">Kode Barang</label>
                    <input type="text" class="form-control" name="kode_barang" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" required>
                </div>
                <div class="mb-3">
                    <label for="merk">Merk</label>
                    <input type="text" class="form-control" name="merk" required>
                </div>
                <div class="mb-3">
                    <label for="satuan">Qty</label>
                    <input type="number" class="form-control" name="qty" required>
                </div>
                <div class="mb-3">
                    <label for="satuan">Satuan</label>
                    <input type="text" class="form-control" name="satuan" required>
                </div>
                <div class="mb-3">
                    <label for="satuan">Deskripsi (Tipe/ Speksifikasi)</label>
                    <textarea class="form-control" name="tipe" required></textarea>
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