<div id="atas" class="row mb-3">
    <div class="col">
        <div class="row">
            <div class="col-md-6">
                <h3>Penempatan Detail</h3>
            </div>
            <div class="col-md-6">
                <a href="?page=penempatandata" class="btn btn-primary float-end">
                    <i class="fa fa-arrow-circle-left"></i> Kembali
                </a>
                <a href="report/kartuinventaris.php?id=<?= $_GET['id'] ?>" class="btn btn-success float-end me-1" target="_blank">
                    <i class="fa fa-print"></i> Kartu Inventaris
                </a>
            </div>
        </div>
    </div>
</div>
<div id="tengah">
    <div class="col">
        <?php
        if (isset($_POST['tambah_button'])) {
            $kode_id = $_POST['kode_id'];
            $ruang_id = $_GET['id'];

            $insert = "INSERT INTO inventaris_ruang SET kode_id=$kode_id,
                ruang_id=$ruang_id";

            $result = mysqli_query($koneksi, $insert);
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
                    Data berhasil ditambah
                </div>
        <?php
            }
        }

        if (isset($_POST['delete_button'])) {
            $inventaris_ruang_id = $_POST["inventaris_ruang_id"];
            $deleteSQL = "DELETE FROM inventaris_ruang WHERE id=$inventaris_ruang_id";
            $result = mysqli_query($koneksi, $deleteSQL);
        }

        $id = $_GET['id'];

        $selectSQL = "SELECT * FROM ruang WHERE id=$id";
        $result = mysqli_query($koneksi, $selectSQL);
        if (!$result || mysqli_num_rows($result) == 0) {
            echo "<meta http-equiv='refresh' content='0;url=?page=barangmasukdata'>";
        } else {
            $row = mysqli_fetch_assoc($result);
        }

        $selectBarang = "SELECT IR.*, B.nama_barang, B.merk, B.tipe, BK.nama_pemohon FROM inventaris_ruang IR LEFT JOIN barang_keluar_detail BKD ON BKD.id = IR.kode_id LEFT JOIN barang_keluar BK ON BK.id = BKD.barang_keluar_id LEFT JOIN barang B ON BKD.barang_id = B.kode_barang WHERE IR.ruang_id=$id ORDER BY IR.id DESC";
        // $selectSQLDetail = "SELECT IR.*, K.kode, B.nama_barang, B.merk, B.tipe, BM.nama_pemohon 
        //     FROM inventaris_ruang IR
        //     LEFT JOIN kode K ON IR.kode_id = K.id
        //     LEFT JOIN barang_keluar BM ON BMD.barang_keluar_id = BM.id
        //     LEFT JOIN barang_keluar_detail BMD ON K.barang_keluar_detail_id = BMD.id
        //     LEFT JOIN barang B ON BMD.barang_id = B.kode_barang 
        //     WHERE IR.ruang_id=$id ORDER BY nama_barang, kode";
        $resultDetail = mysqli_query($koneksi, $selectBarang);

        $selectBarang = "SELECT * FROM barang_keluar BK LEFT JOIN barang_keluar_detail BKD ON BKD.barang_keluar_id = BK.id LEFT JOIN barang B ON BKD.barang_id = B.kode_barang ORDER BY BK.id DESC";
        // $selectBarang = "SELECT K.*, IR.kode_id, B.nama_barang, B.merk, B.tipe
        //         FROM kode K 
        //         LEFT JOIN inventaris_ruang IR ON IR.kode_id = K.id 
        //         LEFT JOIN barang_keluar_detail BMD ON K.barang_keluar_detail_id = BMD.id
        //         LEFT JOIN barang B ON BMD.barang_id = B.kode_barang
        //         WHERE IR.kode_id IS NULL AND K.barang_masuk_detail_id='0'
        //         ORDER BY kode ASC";
        $resultBarang = mysqli_query($koneksi, $selectBarang);

        ?>
    </div>
</div>
<div id="bawah" class="row">
    <div class="col">
        <div class="card px-3 py-3">
            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="id">ID</label>
                        <input type="text" class="form-control" value="<?= $row['id'] ?>" readonly>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="mb-3">
                        <label for="id">Nama Ruang</label>
                        <input type="text" class="form-control" value="<?= $row['nama_ruang'] ?>" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="bawah_detail" class="row mt-3">
    <div class="col">
        <div class="card px-3 py-3">
            <form action="" method="post">
                <div class="row">
                    <div class="col">
                        Pilih Barang Keluar
                        <div class="input-group">
                            <select class="form-select" name="kode_id">
                                <?php
                                while ($rowBarang = mysqli_fetch_assoc($resultBarang)) {
                                    $id = $rowBarang['id'];
                                    $select = "SELECT * FROM inventaris_ruang WHERE kode_id='$id'";
                                    $result = mysqli_query($koneksi, $select);
                                    $row = mysqli_fetch_assoc($result);
                                    if ($row == NULL) {

                                ?>
                                        <option value="<?= $rowBarang['id'] ?>"><?= $rowBarang['nama_barang'] . " | " . $rowBarang['jumlah'] . " | " . $rowBarang['nama_pemohon'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            <button type="submit" class="btn btn-success" type="button" name="tambah_button">
                                <i class="fa fa-plus-circle"></i> Tambah
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="tabel" class="row mt-3">
    <div class="col">
        <div class="card my-card">
            <table class="table bg-white rounded shadow-sm table-hover" id="example" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Kode</th>
                        <th>Nama Barang</th>
                        <th>Merk</th>
                        <th>Tipe</th>
                        <th>Pemohon</th>
                        <th class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($rowDetail = mysqli_fetch_assoc($resultDetail)) {
                    ?>
                        <tr class="align-middle">
                            <td class="text-center"><?= $no++ ?></td>
                            <td>
                                <?php
                                $kode = $rowDetail['kode_id'];
                                $select = "SELECT * FROM kode WHERE barang_keluar_detail_id='$kode'";
                                $result = mysqli_query($koneksi, $select);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo $row['kode'] . "<br>";
                                }
                                ?>
                            </td>
                            <td><?= $rowDetail['nama_barang'] ?></td>
                            <td><?= $rowDetail['merk'] ?></td>
                            <td><?= $rowDetail['tipe'] ?></td>
                            <td><?= $rowDetail['nama_pemohon'] ?></td>
                            <td class="text-center">
                                <div class="row">
                                    <form action="" method="post">
                                        <input type="hidden" name="inventaris_ruang_id" value=" <?= $rowDetail['id'] ?>">
                                        <button type="submit" name="delete_button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>