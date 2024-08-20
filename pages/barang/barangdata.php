<div id="atas" class="row">
    <div class="col">
        <div class="row">
            <div class="col-md-6">
                <h3>Data Barang</h3>
            </div>
            <div class="col-md-6">
                <a href="?page=barangtambah" class="btn btn-success float-end">
                    <i class="fa fa-plus-circle"></i> Tambah
                </a>
                <a href="report/rekapitulasibarang.php" class="btn btn-primary float-end me-1" target="_blank">
                    <i class="fa fa-print"></i> Rekapitulasi Barang
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
    $resultSet = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY record DESC");
    ?>
</div>
<div id="bawah" class="row mt-3">
    <div class="col">
        <div class="card my-card">
            <table class="table bg-white rounded shadow-sm table-hover" id="example" width="100%">
                <thead>
                    <tr>
                        <th width="10%" class="text-center">No</th>
                        <th width="30%">Nama Barang</th>
                        <th width="20%">Merk</th>
                        <th width="5%" class="text-center">Jumlah</th>
                        <th width="10%" class="text-center">Satuan</th>
                        <th width="25%" class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    while ($row = mysqli_fetch_assoc($resultSet)) {
                        $no++;
                    ?>
                        <tr>
                            <td class="text-center"><?= $no ?></td>
                            <td><?= $row['nama_barang'] ?></td>
                            <td><?= $row['merk'] ?></td>
                            <td class="text-center"><?= $row['qty'] ?></td>
                            <td class="text-center"><?= $row['satuan'] ?></td>
                            <td class="text-center">
                                <a href="?page=barangubah&id=<?= $row['kode_barang'] ?>" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <a href="#" onclick="konfirmasi('?page=baranghapus&id=<?= $row['kode_barang'] ?>');" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i> Hapus
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