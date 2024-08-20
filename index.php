<!-- based on: https://www.youtube.com/watch?v=CMwzLURK-rQ -->
<?php
session_start();
if (!isset($_SESSION["nama_karyawan"])) {
    echo "<meta http-equiv='refresh' content='0;url=login.php'>";
}

if (isset($_POST["logout_button"])) {
    session_unset();
    echo "<meta http-equiv='refresh' content='0;url=login.php'>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="assets/images/remove-logo.png">
    <link rel="stylesheet" href="plugins/bootstrap-5.2.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="plugins/fontawesome-free-6.4.2-web/css/all.min.css" />
    <link rel="stylesheet" href="plugins/datatables-1.13.7/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="assets/css/custom.css" />

    <script src="plugins/jquery-3.7.1/jquery.slim.min.js"></script>
    <!-- SweetAlert -->
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <script>
        function pesanToast(pesan) {
            pesan = pesan ? pesan : "Berhasil simpan data"
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: true,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: pesan
            });
        }

        function konfirmasi(url) {
            title = 'Yakin ingin dihapus?'
            text = "Data yang sudah dihapus tidak akan bisa dikembalikan"

            Swal.fire({
                title: title,
                text: text,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            })
        }
    </script>


    <title>SI BAGUS - Sistem Bon Barang Untuk Tata Usaha</title>
</head>

<body>
    <?php include_once "libraries/koneksi.php" ?>
    <div class="d-flex" id="wrapper">
        <?php include "components/sidebar.php" ?>
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <?php include "components/nav.php" ?>
            <div class="container-fluid px-4">
                <?php include "routes.php" ?>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

    <!-- Datatables -->
    <script src="plugins/datatables-1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            new DataTable('#example');
        });
    </script>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

    <!-- JavaScript Bundle with Popper -->
    <script src="plugins/bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>