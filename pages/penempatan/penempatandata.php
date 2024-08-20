<div id="atas" class="row">
    <div class="col">
        <div class="row">
            <div class="col-md-6">
                <h3>Penempatan Inventaris</h3>
            </div>
            <div class="col-md-6">
                <a href="report/rekapitulasiinventaris.php" class="btn btn-primary float-end me-1" target="_blank">
                    <i class="fa fa-print"></i> Rekapitulasi Inventaris
                </a>
            </div>
        </div>
    </div>
</div>
<div id="tengah">
    <script>
        // konfirmasi()
        // pesanToast()
    </script>
    <?php
    $selectSQL = "SELECT R.*, 
        (SELECT COUNT(*) FROM inventaris_ruang WHERE ruang_id=R.id) qty
        FROM ruang R";
    $resultSet = mysqli_query($koneksi, $selectSQL);
    ?>
</div>
<div id="bawah" class="row mt-3">
    <div class="col">
        <div class="card my-card">
            <table class="table bg-white rounded shadow-sm table-hover" id="example" width="100%">
                <thead>
                    <tr>
                        <th width="10%" class="text-center">ID</th>
                        <th width="45%">Ruang</th>
                        <th width="15%" class="text-center">Jumlah Barang</th>
                        <th width="30%" class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($resultSet)) {
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $row['nama_ruang'] ?></td>
                            <td class="text-center"><?= $row['qty'] ?></td>
                            <td class="text-center">
                                <a href="?page=penempatandetail&id=<?= $row['id'] ?>" class="btn btn-sm btn-dark">
                                    <i class="fa fa-info-circle"></i> Detail
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