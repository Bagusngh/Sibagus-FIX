<div id="atas" class="row">
    <div class="col">
        <div class="row">
            <div class="col-md-6">
                <h3>Data Anggaran</h3>
            </div>
            <div class="col-md-6">
                <a href="?page=anggarantambah" class="btn btn-success float-end">
                    <i class="fa fa-plus-circle"></i> Tambah
                </a>
                <!-- <a href="report/rekapitulasibarang.php" class="btn btn-primary float-end me-1" target="_blank">
                    <i class="fa fa-print"></i> Rekapitulasi
                </a> -->
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
    $resultSet = mysqli_query($koneksi, "SELECT * FROM anggaran ORDER BY tanggal DESC, jam DESC");
    ?>
</div>
<div id="bawah" class="row mt-3">
    <div class="col">
        <div class="card my-card">
            <table class="table bg-white rounded shadow-sm table-hover" id="example" width="100%">
                <thead>
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th width="10%" class="text-center">Tanggal</th>
                        <th width="15%" class="text-center">Jenis</th>
                        <th width="25%">Keterangan</th>
                        <th width="20%" class="text-center">Nominal</th>
                        <th width="25%" class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    $masuk = 0;
                    $keluar = 0;
                    while ($row = mysqli_fetch_assoc($resultSet)) {
                        if ($row['jenis'] == 'Uang Masuk') {
                            $span = '<span class="badge bg-success">UANG MASUK</span>';
                            $masuk += $row['nominal'];
                        } else {
                            $span = '<span class="badge bg-danger">UANG KELUAR</span>';
                            $keluar += $row['nominal'];
                        }
                        $no++;
                    ?>
                        <tr>
                            <td class="text-center"><?= $no ?></td>
                            <td class="text-center"><?= $row['tanggal'] ?></td>
                            <td class="text-center"><?= $span ?></td>
                            <td><?= $row['keterangan'] ?></td>
                            <td class="text-center">Rp. <?= number_format($row['nominal'], 0, ",", ".") ?></td>
                            <td class="text-center">
                                <a href="?page=anggaranubah&id=<?= $row['id'] ?>" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <a href="#" onclick="konfirmasi('?page=anggaranhapus&id=<?= $row['id'] ?>');" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    $total = $masuk - $keluar;
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-center"><b>Sisa Anggaran</b></td>
                        <td class="text-center"><b>Rp. <?= number_format($total, 0, ",", ".") ?></b></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>