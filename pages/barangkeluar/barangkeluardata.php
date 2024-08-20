<div id="atas" class="row">
    <div class="col">
        <div class="row">
            <div class="col-md-6">
                <h3>Barang Keluar</h3>
            </div>
            <div class="col-md-6">
                <div class="col">
                    <form action="" method="post">
                        <div class="input-group">
                            <?php
                            $level = $_SESSION["level"];
                            $karyawan_id = $_SESSION["karyawan_id"];
                            $selectSQL = "SELECT YEAR(tanggal) tahun FROM barang_keluar GROUP BY tahun ORDER BY tahun DESC";
                            $resultSet = mysqli_query($koneksi, $selectSQL);
                            $default_tahun = 0;
                            ?>
                            <select class="form-select" name="tahun">
                                <?php
                                while ($row = mysqli_fetch_assoc($resultSet)) {
                                    $default_tahun = $default_tahun == 0 ? $row["tahun"] : $default_tahun;
                                    $selected = $_POST['tahun'] == $row["tahun"] ? " selected" : "";
                                ?>
                                    <option value="<?= $row['tahun'] ?>" <?= $selected ?>><?= $row['tahun'] ?></option>
                                <?php
                                }
                                $selected_tahun = !isset($_POST['tahun']) ? $default_tahun : $_POST['tahun'];
                                ?>
                            </select>
                            <button type="submit" class="btn btn-primary" type="button">
                                <i class="fa fa-filter"></i> Filter
                            </button>
                            <a href="?page=barangkeluartambah" class="btn btn-success float-end">
                                <i class="fa fa-plus-circle"></i> Tambah
                            </a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<div id="tengah">
    <?php
    if ($level == "admin") {
        $selectSQL = "SELECT
            bk.tanggal AS Tanggal,
            bk.id AS Id,
            b.kode_barang AS 'Kode Barang',
            b.nama_barang AS 'Nama Barang',
            b.satuan AS Satuan,
            bmd.jumlah AS Jumlah,
            bk.nama_pemohon AS 'Nama Pemohon'
        FROM
            barang_keluar bk
        JOIN
            barang_keluar_detail bmd ON bk.id = bmd.barang_keluar_id
        JOIN
            barang b ON bmd.barang_id = b.kode_barang
        WHERE
            YEAR(bk.tanggal) = $selected_tahun
        ORDER BY
            bk.tanggal DESC";
    } else {
        $selectSQL = "
        SELECT
            bk.tanggal AS Tanggal,
            bk.id AS Id,
            b.kode_barang AS 'Kode Barang',
            b.nama_barang AS 'Nama Barang',
            b.satuan AS Satuan,
            bmd.jumlah AS Jumlah,
            bk.nama_pemohon AS 'Nama Pemohon'
        FROM
            barang_keluar bk
        JOIN
            barang_keluar_detail bmd ON bk.id = bmd.barang_keluar_id
        JOIN
            barang b ON bmd.barang_id = b.kode_barang
        WHERE
            YEAR(bk.tanggal) = $selected_tahun AND bk.karyawan_id='$karyawan_id'
        ORDER BY
            bk.tanggal DESC
        ";
    }

    $resultSet = mysqli_query($koneksi, $selectSQL);
    ?>
</div>
<div id="bawah" class="row mt-3">
    <div class="col">
        <div class="card my-card">
            <table class="table bg-white rounded shadow-sm table-hover" id="example" width="100%">
                <thead>
                    <tr>
                        <th width="5%" class="text-center">#</th>
                        <th width="10%" class="text-center">Tanggal</th>
                        <th width="25%">Nama Barang</th>
                        <th width="10%" class="text-center">Jumlah</th>
                        <th width="25%">Nama Pemohon</th>
                        <th width="25%" class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($resultSet)) {
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $row['Tanggal'] ?></td>
                            <td><?= $row['Nama Barang'] ?></td>
                            <td class="text-center"><?= $row['Jumlah'] . ' ' . $row['Satuan'] ?></td>
                            <td><?= $row['Nama Pemohon'] ?></td>
                            <td class="text-center">
                                <a href="?page=barangkeluardetail&id=<?= $row['Id'] ?>" class="btn btn-sm btn-dark">
                                    <i class="fa fa-info-circle"></i> Detail
                                </a>
                                <a href="?page=barangkeluarubah&id=<?= $row['Id'] ?>" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <a href="#" onclick="konfirmasi('?page=barangkeluarhapus&id=<?= $row['Id'] ?>');" class="btn btn-sm btn-danger">
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

<div class="row">

</div>