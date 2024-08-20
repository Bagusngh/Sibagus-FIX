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
                <img style="height: 100px;" src="../assets/images/Kop.jpg" alt="">
            </td>
        </tr>
    </tbody>
</table>
<br>
<div style="text-align: center;">
    <span class="judul">Tanda Keluar</span>
</div>
<?php

$id = $_GET['id'];

$selectSQL = "SELECT BM.*,B.* FROM barang_keluar BM
        LEFT JOIN barang B ON BM.kode_barang=B.kode_barang WHERE BM.kode_barang='$id'";
$result = mysqli_query($koneksi, $selectSQL);
if (!$result || mysqli_num_rows($result) == 0) {
    echo "<meta http-equiv='refresh' content='0;url=?page=barangkeluardata'>";
} else {
    $row = mysqli_fetch_assoc($result);
}

$selectSQLDetail = "SELECT BMD.*, B.nama_barang, B.merk, B.satuan 
        FROM barang_keluar_detail BMD 
        LEFT JOIN barang B ON BMD.barang_id = B.kode_barang
        WHERE BMD.barang_id='$id'";
$resultDetail = mysqli_query($koneksi, $selectSQLDetail);
?>
<br>
<br>
<table>
    <tr>
        <td class="info">Tanggal</td>
        <td class="info">:</td>
        <td class="info"><?= $row['tanggal'] ?></td>
    </tr>
    <tr>
        <td class="info">Nama Barang</td>
        <td class="info">:</td>
        <td class="info"><?= $row['nama_barang'] ?></td>
    </tr>
    <tr>
        <td class="info">Nama Pemohon</td>
        <td class="info">:</td>
        <td class="info"><?= $row['nama_pemohon'] ?></td>
    </tr>
</table>
<br>
<table>
    <colgroup>
        <col style="width: 10%" class="angka">
        <col style="width: 40%">
        <col style="width: 30%">
        <col style="width: 20%">
    </colgroup>
    <thead>
        <tr>
            <th>No</th>
            <th>Merk</th>
            <th>Qty</th>
            <th>Satuan</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $no = 1;
        while ($rowDetail = mysqli_fetch_assoc($resultDetail)) {

        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $rowDetail['merk'] ?></td>
                <td class="angka"><?= $rowDetail['jumlah'] ?></td>
                <td><?= $rowDetail['satuan'] ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
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
            <td class="info"><?= $row['nama_pemohon'] ?></td>
        </tr>
    </tbody>
</table>