<div id="atas" class="row mb-3">
    <div class="col">
        <div class="row">
            <div class="col-md-6">
                <h3>Ubah Data Barang Masuk</h3>
            </div>
            <div class="col-md-6">
                <a href="?page=barangmasukdata" class="btn btn-primary float-end">
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
            $tanggal = $_POST['tanggal'];
            $no_bukti = $_POST['no_bukti'];
            $karyawan_id = $_POST['karyawan_id'];

            $updateSQL = "UPDATE barang_masuk SET tanggal='$tanggal', 
                no_bukti='$no_bukti',
                karyawan_id=$karyawan_id 
                WHERE id=$id";
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
                <meta http-equiv='refresh' content='2;url=?page=barangmasukdata'>
        <?php
            }
        }

        $id = $_GET['id'];
        $selectSQL = "SELECT * FROM barang_masuk WHERE id=$id";
        $result = mysqli_query($koneksi, $selectSQL);
        if (!$result || mysqli_num_rows($result) == 0) {
            echo "<meta http-equiv='refresh' content='0;url=?page=barangmasukdata'>";
        } else {
            $row = mysqli_fetch_assoc($result);
        }
        ?>
    </div>
</div>
<div id="bawah" class="row">
    <div class="col">
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="card px-3 py-3">
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="id">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required value="<?= $row['tanggal'] ?>">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <?php
                        $hibahSelected = $row["sumber_dana"] == "Hibah" ? " selected" : "";
                        $penganggaranSelected = $row["sumber_dana"] == "Penganggaran" ? " selected" : "";
                        ?>
                        <div class="mb-3">
                            <label for="id">No Bukti</label>
                            <input type="text" name="no_bukti" class="form-control" required value="<?= $row['no_bukti'] ?>">
                        </div>
                    </div>
                </div>
                <?php
                $selectSQLPemasok = "SELECT * FROM pemasok";
                $resultSetPemasok = mysqli_query($koneksi, $selectSQLPemasok);
                ?>
                <div class="row">
                    <?php
                    $selectSQLKaryawan = "SELECT * FROM karyawan";
                    $resultSetKaryawan = mysqli_query($koneksi, $selectSQLKaryawan);
                    ?>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="id">Karyawan </label>
                            <?php
                            if ($_SESSION["level"] == "admin") {
                                $selectSQLKaryawan = "SELECT * FROM karyawan";
                                $resultSetKaryawan = mysqli_query($koneksi, $selectSQLKaryawan);
                            ?>
                                <select name="karyawan_id" id="" class="form-control">
                                    <option value="">-- Pilih --</option>
                                    <?php
                                    while ($rowKaryawan = mysqli_fetch_assoc($resultSetKaryawan)) {
                                        $selected = $rowKaryawan["id"] == $row["karyawan_id"] ? " selected" : "";
                                    ?>
                                        <option value="<?= $rowKaryawan["id"] ?>" <?= $selected ?>><?= $rowKaryawan["nama_karyawan"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            <?php
                            } else {
                            ?>
                                <input type="hidden" class="form-control" name="karyawan_id" value="<?= $_SESSION["karyawan_id"] ?>">
                                <input type="text" class="form-control" value="<?= $_SESSION["nama_karyawan"] ?>" readonly>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <button class="btn btn-success" type="submit" name="simpan_button">
                            <i class="fas fa-save"></i>
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>