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
    <span class="judul">Tanda Terima</span>
</div>
<?php

$id = $_GET['id'];

$selectSQL = "SELECT BM.*,P.nama_pemasok, K.nama_karyawan FROM barang_masuk BM
        LEFT JOIN karyawan K ON BM.karyawan_id=K.id
        LEFT JOIN pemasok P ON BM.pemasok_id=P.id WHERE BM.id=$id";
$result = mysqli_query($koneksi, $selectSQL);
if (!$result || mysqli_num_rows($result) == 0) {
    echo "<meta http-equiv='refresh' content='0;url=?page=barangmasukdata'>";
} else {
    $row = mysqli_fetch_assoc($result);
}

$selectSQLDetail = "SELECT BMD.*, B.nama_barang, B.merk, B.tipe, B.satuan 
        FROM barang_masuk_detail BMD 
        LEFT JOIN barang B ON BMD.barang_id = B.kode_barang
        WHERE BMD.barang_masuk_id=$id";
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
        <td class="info">No Bukti</td>
        <td class="info">:</td>
        <td class="info"><?= $row['no_bukti'] ?></td>
    </tr>
    <tr>
        <td class="info">Karyawan</td>
        <td class="info">:</td>
        <td class="info"><?= $row['nama_karyawan'] ?></td>
    </tr>
</table>
<br>
<table>
    <colgroup>
        <col style="width: 10%" class="angka">
        <col style="width: 40%">
        <col style="width: 20%">
        <col style="width: 10%">
        <col style="width: 10%">
        <col style="width: 10%">
    </colgroup>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
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
                <td><?= $rowDetail['nama_barang'] ?></td>
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
            <td class="info"><?= $row['nama_karyawan'] ?></td>
        </tr>
    </tbody>
</table>