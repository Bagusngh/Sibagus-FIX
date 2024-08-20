<div id="atas" class="row mb-3">
    <div class="col">
        <div class="row">
            <div class="col-md-6">
                <h3>Ubah Data Barang Keluar</h3>
            </div>
            <div class="col-md-6">
                <a href="?page=barangkeluardata" class="btn btn-primary float-end">
                    <i class="fa fa-arrow-circle-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
<div id="tengah">
    <div class="col">
        <?php
        if (isset($_POST['simpan_button'])) {
            $tanggal = $_POST['tanggal'];
            $id = $_GET['id'];
            $nama_pemohon = $_POST['nama_pemohon'];
            $nama_barang = $_POST['nama_barang'];
            $kode_barang = $_POST['kode_barang'];

            $updateSQL = "UPDATE barang_keluar SET tanggal='$tanggal', 
                nama_pemohon='$nama_pemohon'
                WHERE id=$id";
            $result = mysqli_query($koneksi, $updateSQL);
            if (!$result) {
        ?>
                <div class="alert alert-danger" role="alert">
                    <i class="fa fa-exclamation-circle"></i>
                    <?= mysqli_error($koneksi) ?>
                </div>
            <?php
            } else {
                // $lastInsertedId = mysqli_insert_id($koneksi);

                // Insert into barang_keluar_detail
                // $updateDetailSQL = "UPDATE barang_keluar_detail SET 
                // jumlah=$jumlah
                // WHERE barang_id=$kode_barang";

                // $resultDetail = mysqli_query($koneksi, $updateDetailSQL);

            ?>
                <div class="alert alert-success" role="alert">
                    <i class="fa fa-check-circle"></i>
                    Data berhasil diubah
                </div>
                <meta http-equiv='refresh' content='2;url=?page=barangkeluardata'>
        <?php
            }
        }

        $id = $_GET['id'];
        $selectSQL = "SELECT
        bkd.*,
        bk.*,
        b.kode_barang AS 'Kode Barang',
        b.nama_barang AS 'Nama Barang',
        b.merk,
        b.tipe,
        b.satuan
    FROM
        barang_keluar bk
    JOIN
        barang b ON bk.kode_barang = b.kode_barang
    JOIN
        barang_keluar_detail bkd ON bk.kode_barang = bkd.barang_id
    WHERE
        bk.id = $id;
    ";
        $result = mysqli_query($koneksi, $selectSQL);
        if (!$result || mysqli_num_rows($result) == 0) {
            echo "<meta http-equiv='refresh' content='0;url=?page=barangkeluardata'>";
        } else {
            $row = mysqli_fetch_assoc($result);
        }
        ?>
    </div>
</div>
<div id="bawah" class="row">
    <div class="col">
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="card px-3 py-3">
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="id">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required value="<?= $row['tanggal'] ?>">
                        </div>
                    </div>
                    <div class="col-md-9">

                        <div class="mb-3">
                            <label for="id">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" readonly value="<?= $row['Nama Barang'] ?>">
                            <input type="hidden" name="kode_barang" class="form-control" required value="<?= $row['Kode Barang'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="id">Nama Pemohon </label>
                            <?php
                            $nama_list = [
                                "Dr. AHMAD SUHAIMI, S.Sos,S.H.,M.H,M.M",
                                "RIZKI INTAN AMRIYANI, S.H.",
                                "MUHAMMAD HELMY FAUZIE, S.SiT",
                                "ALKAF, S.SiT, S.H.,M.M",
                                "DYAH RUSTANTI, S.Sos.",
                                "FAJAR SETIYAWAN, S.Sos",
                                "SITI MAGFIROH",
                                "EVY DIYANTI",
                                "PARIS RINALDI, S.H.",
                                "ALFISYAHRIN FIRDAUS, S.H.",
                                "MUHAMMAD R. SYA'BANA, S.H.",
                                "MUHAMMAD INDRA PRATAMA SAPUTRA , S.H.,M.H.",
                                "SITI YUNIATUN, S.H.",
                                "USHFIA MUFIDA, S.T.",
                                "ALISA, S.H.",
                                "DEDE RAHMAN, S.Tr.",
                                "DWI FAJAR WICAKSONO, S.TP",
                                "AYNANI RIFANI",
                                "M. RIAN ZAKARIA, S.H",
                                "MUHAMMAD RISKY, A.Md.",
                                "NORLATIFAH",
                                "AKHMAT PARID",
                                "FARID HIDAYAT, A.P.,S.H.",
                                "RUSMANANDA ADITYA PRATIWI, A.P.,S.H.",
                                "HARJUNANDA PUTRA, A.P.",
                                "RIO SETYA KUSUMA AJI, A.P.",
                                "AYU LESTARI, A.P.",
                                "FARIZ JORDY,S.Ak.",
                                "QONITA AMALIA SYAFURA, A.P.",
                                "FITRIA PATMAWATI, S.H.",
                                "KHAIRATUNNISA, S.H.",
                                "MUHAMMAD RIZALDY AKMAL, S.H.",
                                "SYARIFAH RAMADHANAH, S.Ak",
                                "AIN MUTHAHARA, A.Md",
                                "HANIN PANGESTI, A.Md",
                                "RAMDANI RAHMAN, A.Md",
                                "MUHAMMAD IHSAN, S.H. NI PPPK.",
                                "MUHAMMAD SANUSI, S.Kom",
                                "MARPUAH, S.E",
                                "AHMAD FAUJI, S.Kom",
                                "ASTRINDYA YORANDA",
                                "AULIA RAFIKA DEWI",
                                "DELIYANTI",
                                "MUHAMAD RIFKY",
                                "ALFINA HANDINI",
                                "DENNY PRATIWI",
                                "IMAM ARIFIN",
                                "KHAIRATUN NISA",
                                "MAEISYAROH",
                                "RATNA NINGSIH",
                                "SANIYAH HARTINA APRIL YANI",
                                "KHADIJAH",
                                "MUHAMMAD RIZKY ALDIANOOR",
                                "NUR ANNISA PUTRI",
                                "DINA RIDANI",
                                "EDI NURLISTIADI",
                                "ERWIN WIDAYANTI",
                                "ERYDA WIJAYANTI",
                                "FERDY ANGGARA",
                                "RISENNA MEGANANDA LUTVIANI",
                                "ZAHIR SAPUTERA",
                                "BAGUS NUGROHO",
                                "KARIMATUL MUNAWARAH",
                                "DANA AFIA",
                                "SITI AISYAH",
                                "DELLA RIZKY APRIANA",
                                "ACHMAD SEPTYAN",
                                "FATHUL HAIR",
                                "SELAMAT ARIF WAHIDIN",
                                "RIANTO",
                                "EDI RIYANTO",
                                "ACHMAD YADI",
                                "SUPIANOOR",
                                "MUHAMMAD FAISAL ANDRI",
                                "BAYU CANDRA PRATAMA",
                                "RURI KURNIAWAN",
                                "NONA OVELIA PRASETYO",
                                "RESTI KUSUMA PUTRI",
                                "MUHAMMAD RISWANDA ADITYA PUTERA"
                            ];

                            $nama_pemohon_to_remove = $row['nama_pemohon'];

                            // Hapus elemen dengan nama yang sesuai
                            $nama_list = array_diff($nama_list, [$nama_pemohon_to_remove]);

                            ?>
                            <select class="form-select" name="nama_pemohon" required>;
                                <option value="<?= $row['nama_pemohon'] ?>">
                                    <?= $row['nama_pemohon'] ?>
                                </option>;

                                <?php
                                foreach ($nama_list as $nama) {
                                    echo '<option value="' . $nama . '">' . $nama . '</option>';
                                }

                                echo '</select>';
                                ?>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <button class="btn btn-success" type="submit" name="simpan_button">
                            <i class="fas fa-save"></i>
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>