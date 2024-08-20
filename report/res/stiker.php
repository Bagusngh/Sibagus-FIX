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

    .judul-stiker {
        font-size: 20px;
        font-weight: bold;
        display: table;
        margin: 0 auto;
    }
</style>
<?php
session_start();
$kode = $_GET['kode'];
$sql = "SELECT K.kode, B.nama_barang, B.merk, B.tipe, BM.no_bukti, BM.tanggal FROM kode K
            LEFT JOIN barang_masuk_detail BMD ON BMD.id = K.barang_masuk_detail_id
            LEFT JOIN barang B ON B.kode_barang = BMD.barang_id
            LEFT JOIN barang_masuk BM ON BM.id = BMD.barang_masuk_id
            WHERE kode='$kode'";
$resultSet = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($resultSet);
?>
<br>
<div style="text-align: center;">
    <span class="judul-stiker"><?= $kode ?></span>
</div>
<br>
<table>
    <colgroup>
        <col style="width: 25%">
        <col style="width: 75%">
    </colgroup>
    <tr>
        <td>Tanggal</td>
        <td><?= $row['tanggal'] ?></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td><?= $row['nama_barang'] ?></td>
    </tr>
    <tr>
        <td>Merk</td>
        <td><?= $row['merk'] ?></td>
    </tr>
    <tr>
        <td>No Bukti</td>
        <td><?= $row['no_bukti'] ?></td>
    </tr>
</table>