<div id="atas" class="row">
    <div class="col">
        <div class="row">
            <div class="col-md-6">
                <h3>Data Pemasok</h3>
            </div>
            <div class="col-md-6">
                <a href="?page=pemasoktambah" class="btn btn-success float-end">
                    <i class="fa fa-plus-circle"></i> Tambah
                </a>
                <a href="report/rekapitulasipemasok.php" class="btn btn-primary float-end me-1" target="_blank">
                    <i class="fa fa-print"></i> Rekapitulasi
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
    $resultSet = mysqli_query($koneksi, "SELECT * FROM pemasok");
    ?>
</div>
<div id="bawah" class="row mt-3">
    <div class="col">
        <div class="card my-card">
            <table class="table bg-white rounded shadow-sm table-hover" id="example" width="100%">
                <thead>
                    <tr>
                        <th width="5%" class="text-center">ID</th>
                        <th width="25%">Pemasok</th>
                        <th width="15%">Kontak</th>
                        <th width="15%" class="text-center">HP</th>
                        <th width="20%">Alamat</th>
                        <th width="20%" class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($resultSet)) {
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $row['nama_pemasok'] ?></td>
                            <td><?= $row['nama_kontak'] ?></td>
                            <td class="text-center"><?= $row['nomor_hp'] ?></td>
                            <td><?= $row['alamat'] ?></td>
                            <td class="text-center">
                                <a href="?page=pemasokubah&id=<?= $row['id'] ?>" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <a href="?page=pemasokhapus&id=<?= $row['id'] ?>" onclick="javascript: return confirm('Yakin hapus?');" class="btn btn-sm btn-danger">
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