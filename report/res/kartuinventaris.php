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
    <span class="judul">Kartu Inventaris</span>
</div>
<?php
session_start();
$id = $_GET['id'];

$selectSQL = "SELECT * FROM ruang WHERE id=$id";
$result = mysqli_query($koneksi, $selectSQL);
$row = mysqli_fetch_assoc($result);

$selectSQLDetail = "SELECT IR.*, B.nama_barang, B.merk, B.tipe, BK.nama_pemohon FROM inventaris_ruang IR LEFT JOIN barang_keluar_detail BKD ON BKD.id = IR.kode_id LEFT JOIN barang_keluar BK ON BK.id = BKD.barang_keluar_id LEFT JOIN barang B ON BKD.barang_id = B.kode_barang WHERE IR.ruang_id=$id ORDER BY IR.id DESC";
$resultDetail = mysqli_query($koneksi, $selectSQLDetail);
?>
<br>
<table>
    <tr>
        <td class="info">Ruang</td>
        <td class="info">:</td>
        <td class="info tebal"><?= $row['nama_ruang'] ?></td>
    </tr>
</table>
<br>
<table>
    <colgroup>
        <col style="width: 5%" class="angka">
        <col style="width: 30%">
        <col style="width: 20%">
        <col style="width: 10%">
        <col style="width: 15%">
        <col style="width: 20%">
    </colgroup>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Merk</th>
            <th>Tipe</th>
            <th>Pemohon</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $no = 1;
        while ($rowDetail = mysqli_fetch_assoc($resultDetail)) {

        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td>
                    <?php
                    $kode = $rowDetail['kode_id'];
                    $select = "SELECT * FROM kode WHERE barang_keluar_detail_id='$kode'";
                    $result = mysqli_query($koneksi, $select);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['kode'] . "<br>";
                    }
                    ?>
                </td>
                <td><?= $rowDetail['nama_barang'] ?></td>
                <td><?= $rowDetail['merk'] ?></td>
                <td><?= $rowDetail['tipe'] ?></td>
                <td><?= $rowDetail['nama_pemohon'] ?></td>
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
            <td class="info"><?= $_SESSION['nama_karyawan'] ?></td>
        </tr>
    </tbody>
</table>