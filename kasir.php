<?php 
session_start();
session_regenerate_id(true);
require_once "config/koneksi.php";


$queryDetail = "SELECT * FROM penjualan";
$result = $koneksi->query($queryDetail);
$no = 1;
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
            <a href="#"><?php  ?></a>
            <a style="border: 2px;" class="btn btn-outline-primary rounded-button"
                onclick="return confirm('Apakah Anda Yakin untuk Log-Out?')" href="controller/logout.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <!-- Garis vertikal untuk simbol power -->
                    <line x1="12" y1="2" x2="12" y2="12"></line>
                    <!-- Lingkaran di sekitar garis -->
                    <path d="M16.24 7.76a6 6 0 1 1-8.48 0"></path>
                </svg>
            </a>
        </div>
    </nav>
    <div class="container justify-content-center position-absolute" style="margin-top: 200px; margin-left: 250px">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
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
                            <table class=" table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Transaksi</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Struk Pembayaran</th>
                                        <th>Status Pembayaran</th>
                                        <th>Settings</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($result->num_rows > 0): ?>
                                            <?php while($row = $result->fetch_assoc()): ?>
                                                <tr class="text-center">
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo htmlspecialchars($row['kode_transaksi']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['tanggal_transaksi']); ?></td>
                                                    <td>Sudah</td>
                                                    <td>Sudah dibayar ya</td>
                                                    <td>
                                                        <!-- Tambahkan tombol atau link untuk mengedit atau menghapus transaksi -->
                                                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                                        <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                            <?php else: ?>
                                            <tr>
                                                <td colspan="6" class="text-center">Tidak ada data</td>
                                            </tr>
                                        <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>

        </div>
    </div>
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>