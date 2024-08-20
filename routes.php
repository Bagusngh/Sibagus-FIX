<?php

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = "";
}

switch ($page) {
    case "":
    case "dashboard":
        include "pages/dashboard.php";
        break;
    case "ruangdata":
        include "pages/ruang/ruangdata.php";
        break;
    case "ruangtambah":
        include "pages/ruang/ruangtambah.php";
        break;
    case "ruangubah":
        include "pages/ruang/ruangubah.php";
        break;
    case "ruanghapus":
        include "pages/ruang/ruanghapus.php";
        break;


    case "pemasokdata":
        include "pages/pemasok/pemasokdata.php";
        break;
    case "pemasoktambah":
        include "pages/pemasok/pemasoktambah.php";
        break;
    case "pemasokubah":
        include "pages/pemasok/pemasokubah.php";
        break;
    case "pemasokhapus":
        include "pages/pemasok/pemasokhapus.php";
        break;

    case "barangdata":
        include "pages/barang/barangdata.php";
        break;
    case "barangtambah":
        include "pages/barang/barangtambah.php";
        break;
    case "barangubah":
        include "pages/barang/barangubah.php";
        break;
    case "baranghapus":
        include "pages/barang/baranghapus.php";
        break;

    case "karyawandata":
        include "pages/karyawan/karyawandata.php";
        break;
    case "karyawantambah":
        include "pages/karyawan/karyawantambah.php";
        break;
    case "karyawanubah":
        include "pages/karyawan/karyawanubah.php";
        break;
    case "karyawanhapus":
        include "pages/karyawan/karyawanhapus.php";
        break;

    case "barangmasukdata":
        include "pages/barangmasuk/barangmasukdata.php";
        break;
    case "barangmasuktambah":
        include "pages/barangmasuk/barangmasuktambah.php";
        break;
    case "barangmasukubah":
        include "pages/barangmasuk/barangmasukubah.php";
        break;
    case "barangmasukhapus":
        include "pages/barangmasuk/barangmasukhapus.php";
        break;
    case "barangmasukdetail":
        include "pages/barangmasuk/barangmasukdetail.php";
        break;
    case "barangmasukdetailkode":
        include "pages/barangmasuk/barangmasukdetailkode.php";
        break;

    case "barangkeluardata":
        include "pages/barangkeluar/barangkeluardata.php";
        break;
    case "barangkeluartambah":
        include "pages/barangkeluar/barangkeluartambah.php";
        break;
    case "barangkeluarubah":
        include "pages/barangkeluar/barangkeluarubah.php";
        break;
    case "barangkeluarhapus":
        include "pages/barangkeluar/barangkeluarhapus.php";
        break;
    case "barangkeluardetail":
        include "pages/barangkeluar/barangkeluardetail.php";
        break;
    case "barangkeluardetailkode":
        include "pages/barangkeluar/barangkeluardetailkode.php";
        break;

    case "penempatandata":
        include "pages/penempatan/penempatandata.php";
        break;
    case "penempatandetail":
        include "pages/penempatan/penempatandetail.php";
        break;

    case "ubahprofil":
        include "pages/ubahprofil.php";
        break;
    case "ubahpassword":
        include "pages/ubahpassword.php";
        break;

    case "anggarandata":
        include "pages/anggaran/anggarandata.php";
        break;
    case "anggarantambah":
        include "pages/anggaran/anggarantambah.php";
        break;
    case "anggaranubah":
        include "pages/anggaran/anggaranubah.php";
        break;
    case "anggaranhapus":
        include "pages/anggaran/anggaranhapus.php";
        break;

    default:
        include "pages/404.php";
}
