<?php
session_start();
session_regenerate_id(true);
require_once "config/koneksi.php";

$queryUser = "SELECT * FROM user";
$resultUser = $koneksi->query($queryUser);
$rowUser = $resultUser->fetch_assoc();

$queryDetail = mysqli_query($koneksi, "SELECT * FROM penjualan");

//Jika session nya isi, maka melempar ke dashboard.php
// if(empty($_SESSION['nama']) && empty($_SESSION['email'])){
//     header("Location: kasir.php");
//     exit;
// }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body style="background-image: url(image/qwerty.png); background-size:cover">
    <nav class="navbar navbar-expand-lg  sticky-top bg-transparent" style="backdrop-filter: blur(10px); z-index: 1000;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navAltMarkup"
                aria-controls="navAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                </span>
            </button>

            <div class="collapse navbar-collapse" id="navAltMarkup">
                <div class="navbar-nav mt-2 mb-2">
                    <a href=" index.php" class="nav-link text-white">Dashboard</a>
                    <a href="manageaccounts.php" class="nav-link text-white">Manage Accounts</a>
                    <a href="managebooks.php" class="nav-link text-white">Manage Books</a>
                </div>
            </div>
            <a class="nav-link text-white" href="#"><?php echo $rowUser['nama_lengkap'] ?></a>
            <a style="border: 5px;" class="btn btn-outline-primary"
                onclick="return confirm('Apakah Anda Yakin untuk Log-Out?')" href="controller/logout.php">
                <i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i>
            </a>
        </div>
    </nav>
    <div class="container justify-content-center align-items-center" style="margin-top: 70px; margin-bottom: 70px;min-height: 100vh;">
        <div class="row justify-content-center align-items-center">
            <!-- <div class="col-2"></div> -->
            <div class="col-10">
                <div class="card shadow-lg">
                    <div class="card-header text-center">
                        <h1 style="letter-spacing: -3px" class="fw-bold text-primary">Manage Kasir</h1>
                    </div>
                    <div class="card-body">
                        <div class="table table-responsive">
                            <div class="mt-2 mb-3">
                                <a href="tambah-transaction.php" class="btn btn-primary"
                                    style="border-radius: 20px">Tambah Transaksi</a>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Transaksi</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Struk Pembayaran</th>
                                        <th>Status Pembayaran</th>
                                        <!-- <th>Status Pembayaran</th> -->
                                        <th>Settings</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    while ($rowDetail = mysqli_fetch_assoc($queryDetail)): ?>
                                        <tr class="text-center">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $rowDetail['kode_transaksi'] ?></td>
                                            <td><?php echo $rowDetail['tanggal_transaksi'] ?></td>
                                            <td>Sudah</td>
                                            <td>Sudah dibayar ya</td>

                                            <td>
                                                <!-- Tambahkan tombol atau link untuk mengedit atau menghapus transaksi -->
                                                <a href="edit.php?id=<?php echo $rowDetail['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="hapus.php?id=<?php echo $rowDetail['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endwhile ?>
                                    <!-- <tr>
                                            <td colspan="6" class="text-center">Tidak ada data</td>
                                        </tr> -->

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-2"></div> -->

        </div>
    </div>
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>