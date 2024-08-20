<style type="text/css">
    table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    th {
        border: 1px solid;
        padding: 8px;
        text-align: center;
        background-color: #ddd;
    }

    td {
        border: 1px solid;
        padding: 8px;
    }

    td.angka {
        text-align: right;
    }


    td.garisbawah {
        text-align: center;
        border-bottom: 1px solid;
        padding-bottom: 6px;
    }

    td.info {
        border: 0px;
        padding: 2px;
    }

    td.tebal {
        font-weight: bold;
    }

    td.spasi-ttd {
        border: 0px;
        height: 32px;
    }

    .center {
        height: 100px;
    }

    .judul {
        font-size: 20px;
        font-weight: bold;
        display: table;
        margin: 0 auto;
    }
</style>
<table>
    <colgroup>
        <col style="width: 100%">
    </colgroup>
    <tbody>
        <tr>
            <td class="info garisbawah">
                <img style="height: 100px;" src="../assets/images/kop.jpg" alt="">
            </td>
        </tr>
    </tbody>
</table>
<br>
<div style="text-align: center;">
    <span class="judul">Rekapitulasi Karyawan</span>
</div>
<br>
<br>
<table>
    <colgroup>
        <col style="width: 10%" class="angka">
        <col style="width: 30%">
        <col style="width: 30%">
        <col style="width: 20%">
        <col style="width: 10%">
    </colgroup>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pemasok</th>
            <th>Contact Person</th>
            <th>Nomor HP</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        <?php
        session_start();
        $sql = "SELECT  YEAR(tanggal) tahun, MONTH(tanggal) bulan, K.id, K.nama_karyawan, COUNT(*) qty FROM karyawan K
            LEFT JOIN barang_masuk BM ON BM.karyawan_id = K.id
            GROUP BY karyawan_id, tahun, bulan";

        $sql = "SELECT YEAR(tanggal) tahun, K.id, K.nama_karyawan, COUNT(*) qty FROM karyawan K
            LEFT JOIN barang_masuk BM ON BM.karyawan_id = K.id
            GROUP BY karyawan_id, tahun";

        $sql = "SELECT K.*, COUNT(*) as qty FROM karyawan K
            LEFT JOIN barang_masuk BM ON BM.karyawan_id = K.id
            GROUP BY K.id";
        $resultSet = mysqli_query($koneksi, $sql);

        $no = 1;
        while ($row = mysqli_fetch_assoc($resultSet)) {

        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nama_karyawan'] ?></td>
                <td><?= $row['nomor_hp'] ?></td>
                <td><?= $row['email'] ?></td>
                <td class="angka"><?= ucwords($row['level']) ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<br>
<br>
<table>
    <colgroup>
        <col style="width: 70%">
        <col style="width: 30%">
    </colgroup>
    <tbody>
        <tr>
            <td class="info"></td>
            <td class="info">Banjarbaru, <?= tanggalIndonesia(date("Y-m-d")) ?></td>
        </tr>
        <tr>
            <td rowspan="1" class="spasi-ttd"></td>
        </tr>
        <tr>
            <td class="info"></td>
            <td class="info"><?= $_SESSION['nama_karyawan'] ?></td>
        </tr>
    </tbody>
</table>