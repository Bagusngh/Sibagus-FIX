<div id="atas" class="row mb-3">
    <div class="col">
        <div class="row">
            <div class="col-md-6">
                <h3>Barang Masuk Kode</h3>
            </div>
            <div class="col-md-6">
                <a href="?page=barangmasukdetail&id=<?= $_GET['id'] ?>" class="btn btn-primary float-end">
                    <i class="fa fa-arrow-circle-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
<div id="tengah">
    <div class="col">
        <?php

        $id = $_GET['id'];
        $detail_id = $_GET['detail_id'];

        $selectSQL = "SELECT BM.*,P.nama_pemasok, K.nama_karyawan FROM barang_masuk BM
        LEFT JOIN pemasok P ON BM.pemasok_id=P.id
        LEFT JOIN karyawan K ON BM.karyawan_id=K.id WHERE BM.id=$id";
        $result = mysqli_query($koneksi, $selectSQL);
        if (!$result || mysqli_num_rows($result) == 0) {
            echo "<meta http-equiv='refresh' content='0;url=?page=barangmasukdata'>";
        } else {
            $row = mysqli_fetch_assoc($result);
        }

        $selectSQLDetail = "SELECT BMD.*, B.nama_barang, B.merk, B.tipe, B.satuan 
        FROM barang_masuk_detail BMD 
        LEFT JOIN barang B ON BMD.barang_id = B.kode_barang
        WHERE BMD.id=$detail_id";
        $resultDetail = mysqli_query($koneksi, $selectSQLDetail);
        $rowDetail = mysqli_fetch_assoc($resultDetail);


        $selectSQLKode = "SELECT * FROM kode WHERE barang_masuk_detail_id=" . $rowDetail["id"];
        $resultKode = mysqli_query($koneksi, $selectSQLKode);

        ?>
    </div>
</div>
<div id="bawah" class="row">
    <div class="col">
        <div class="card px-3 py-3">
            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="id">Tanggal</label>
                        <input type="text" class="form-control" value="<?= $row['tanggal'] ?>" readonly>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="mb-3">
                        <label for="id">No Bukti</label>
                        <input type="text" class="form-control" value="<?= $row['no_bukti'] ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="id">Karyawan </label>
                        <input type="text" class="form-control" value="<?= $row['nama_karyawan'] ?>" readonly>
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
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label for="id">Barang</label>
                            <input type="text" class="form-control" value="<?= $rowDetail['nama_barang'] . " | " . $rowDetail["merk"] . " | " . $rowDetail["tipe"] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" value="<?= $rowDetail['jumlah'] ?>" readonly>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="tabel" class="row mt-3">
    <div class="col">
        <table class="table bg-white rounded shadow-sm  table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode</th>
                    <th>Stiker</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;


                while ($rowKode = mysqli_fetch_assoc($resultKode)) {
                ?>
                    <tr class="align-middle">
                        <td><?= $no++ ?></td>
                        <td><?= $rowKode['kode'] ?></td>
                        <td>
                            <a href="report/stiker.php?kode=<?= $rowKode['kode'] ?>" class="btn btn-primary btn-sm float-end me-1" target="_blank">
                                <i class="fa fa-print"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>