<div id="atas" class="row mb-3">
    <div class="col">
        <div class="row">
            <div class="col-md-6">
                <h3>Barang Keluar Kode</h3>
            </div>
            <div class="col-md-6">
                <a href="?page=barangkeluardetail&id=<?= $_GET['id'] ?>" class="btn btn-primary float-end">
                    <i class="fa fa-arrow-circle-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
<div id="tengah">
    <div class="col">
        <?php

        $id_barang = $_GET['id'];
        $detail_id = $_GET['detail_id'];

        $selectSQL = "SELECT * FROM barang_keluar BM LEFT JOIN Barang B ON BM.kode_barang=B.kode_barang WHERE BM.kode_barang='$id_barang'";
        $result = mysqli_query($koneksi, $selectSQL);
        $row = mysqli_fetch_assoc($result);

        $selectSQLDetail = "SELECT BMD.*, B.nama_barang, B.merk, B.satuan FROM barang_keluar_detail BMD LEFT JOIN barang B ON BMD.barang_id = B.kode_barang WHERE BMD.id=$detail_id";
        $resultDetail = mysqli_query($koneksi, $selectSQLDetail);
        $rowDetail = mysqli_fetch_assoc($resultDetail);

        $selectSQLKode = "SELECT * FROM kode WHERE barang_keluar_detail_id=" . $rowDetail["id"];
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
                        <label for="id">Nama Barang</label>
                        <input type="text" class="form-control" value="<?= $row['nama_barang'] ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="id">Nama Pemohon</label>
                        <input type="text" class="form-control" value="<?= $row['nama_pemohon'] ?>" readonly>
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
                            <input type="text" class="form-control" value="<?= $row['nama_barang'] . " | " . $row["merk"] ?>" readonly>
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
        <div class="card my-card">
            <table class="table bg-white rounded shadow-sm table-hover" id="example" width="100%">
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
                                <a href="report/stikerkeluar.php?kode=<?= $rowKode['kode'] ?>" class="btn btn-primary btn-sm float-end me-1" target="_blank">
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
</div>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>