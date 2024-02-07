<?php
session_start();
require_once 'config/koneksi.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['nim'])) {
    header("Location: login.php");
    exit();
}

// Ambil informasi mahasiswa dari database berdasarkan NIM dan status aktif
$nim = $_SESSION['nim'];

try {
    // Ambil informasi mahasiswa dari tabel mahasiswa
    $sql_mahasiswa = $con->prepare("SELECT * FROM mahasiswa WHERE nim=? AND status = 1");
    $sql_mahasiswa->bindParam(1, $nim, PDO::PARAM_STR);
    $sql_mahasiswa->execute();
    
    $mahasiswa = $sql_mahasiswa->fetch(PDO::FETCH_ASSOC);

    // Periksa apakah data mahasiswa ditemukan
    if (!$mahasiswa) {
        echo "Data mahasiswa tidak ditemukan.";
        exit();
    }

    // Ambil informasi semester aktif dari tabel semester
    $sql_semester_aktif = $con->prepare("SELECT tahun, semester FROM semester ORDER BY tahun DESC LIMIT 1");
    $sql_semester_aktif->execute();
    $semester_aktif = $sql_semester_aktif->fetch(PDO::FETCH_ASSOC);

    // Periksa apakah data semester aktif ditemukan
    if (!$semester_aktif) {
        echo "Data semester aktif tidak ditemukan.";
        exit();
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama KRS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #5a98bf;
    }

    #sidebar {
        background-color: navy;
        color: white;
        font-weight: 300; 
        height: 105vh;
        overflow-y: auto;
    }

    #main-content {
        margin-top: 20px;
        padding-left: 15px;
        padding-right: 15px;
        overflow-y: auto; 
        height: 100vh;
    }


        .container-fluid {
            padding-left: 0;
            padding-right: 0;
        }

        #sidebar {
            background-color: navy;
            color: white;
            font-weight: 300;
        }

        #sidebar a {
            color: white;
            font-weight: 300;
        }

        .student-info {
            background-color: navy;
            color: white;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .student-info p {
            margin: 5px 0;
        }

        .form-container {
            max-width: 800px;
            margin: auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        #main-content {
            margin-top: 20px;
        }

        .card-bg-custom {
            background-color: whitesmoke;
        }

        .card-form label {
            color: #343a40;
        }

        table {
            background-color: whitesmoke;
            width: 90%; /* Menyesuaikan lebar tabel */
            margin: auto; /* Memusatkan tabel di tengah */
            text-align: center; /* Mengatur teks di dalam sel ke tengah */
        }

        thead {
            background-color: navy;
            color: white;
        }

        th, td {
            padding: 10px; /* Menambahkan padding untuk sel lebih baik */
        }

        tbody {
            background-color: #f2f2f2; /* Warna latar belakang untuk baris tbody */
        }

        .btn-danger {
            color: #fff; /* Mengatur warna teks tombol menjadi putih */
        }

        /* Gaya tambahan untuk tombol di dalam sel tbody */
        .btn-danger i {
            font-size: 18px; /* Ukuran ikon */
            margin-right: 5px; /* Jarak antara ikon dan teks */
        }

        .btn-custom-width {
            width: 150px;
        }
            </style>
</head>

<body>
    <div class="container-fluid">
    <div class="row">
    <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
        <div class="position-sticky">
        <ul class="nav flex-column">
        <li class="nav-item">
    <a class="nav-link" href="halaman_utama.php"><i class="bi bi-house-door-fill"></i> 
            Home
            </a></li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php"> <i class="bi bi-box-arrow-right"></i>
                    Logout
                </a>
            </li>
                </ul>
                </div>
            </nav>

    <div id="main-content" class="col-md-9 ms-sm-auto col-lg-10 px-md-4 text-light">
    <h3 class="text-center"><i class="bi bi-mortarboard-fill"></i>Selamat Datang Di Halaman KRS</h3>

    <div class="card mt-4 card-bg-custom">
    <div class="card-body">
    <form class="student-info">
        <h3 class="card-title">Data Mahasiswa</h3>
            <div class="form-group">
            <div class="row">
            <div class="col-md-6">
                <label for="nim">NIM:</label>
                <input type="text" id="nim" name="nim" class="form-control" value="<?php echo isset($mahasiswa['nim']) ? $mahasiswa['nim'] : ''; ?>" readonly>
                </div>

            <div class="col-md-6">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-control" value="<?php echo isset($mahasiswa['nama']) ? $mahasiswa['nama'] : ''; ?>" readonly>
                </div>
                    </div>
                        </div>

            <div class="form-group">
            <div class="row">
            <div class="col-md-6">
                <label for="tahun">Tahun:</label>
                <input type="text" id="tahun" name="tahun" class="form-control" value="<?php echo isset($semester_aktif['tahun']) ? $semester_aktif['tahun'] : ''; ?>" readonly>
                    </div>

            <div class="col-md-6">
                <label for="semester">Semester:</label>
                <input type="text" id="semester" name="semester" class="form-control" value="<?php echo isset($semester_aktif['semester']) ? $semester_aktif['semester'] : ''; ?>" readonly>
            </div>
                </div>
                    </div>
                        </form>

            <div class="card mt-4 card-bg-broken-white">
            <div class="card-body">
                <h3 class="card-title text-dark">Form KRS</h3>
                <form action="krs_save.php" method="post">
            <div class="form-group">
                <label for="matakuliah" class="form-label text-dark">Daftar Mk:</label>
                <select id="matakuliah" name="matakuliah" class="form-control" required>
                    <?php
                    $x = $con->query("SELECT * FROM matakuliah WHERE semester %2 = 1");
                    while ($row = $x->fetch()) {
                        echo "<option value='{$row['nama_mk']}'>{$row['nama_mk']}</option>";
                    }
                    ?>
                        </select>
                    </div>

            <div class="form-group">
                <label for="kelas" class="form-label text-dark">Kelas:</label>
                <select id="kelas" name="kelas" class="form-control" required>
                    <?php
                    $x = $con->query("SELECT * FROM kelas");
                    while ($row = $x->fetch()) {
                        echo "<option value='{$row['kelas']}'>{$row['kelas']}</option>";
                    }
                    ?>
                </select>
                </div>
            <div class="form-group">
            <button type="submit" class="btn btn-success btn-custom-width mx-auto">Simpan</button>

                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-body">
                        <h2 class="mt-2 text-dark">Pengambilan KRS</h2>
                        <table class="table bg-whitesmoke table-bordered">
                            <thead class="text-light">
                                <tr>
                                    <th>Kode Mk</th>
                                    <th>Nama Mk</th>
                                    <th>SKS</th>
                                    <th>Kelas</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Assuming you have a table named 'pengambilan_krs'
                                $sql_krs = $con->query("SELECT * FROM krs2");

                                while ($row_krs = $sql_krs->fetch()) {
                                    echo "<tr>
                                        <td>{$row_krs['kode_mk']}</td>
                                        <td>{$row_krs['nama_mk']}</td>
                                        <td>{$row_krs['sks']}</td>
                                        <td>{$row_krs['kelas']}</td>
                                        <td>
                                            <a href='delete.php?kode_mk={$row_krs['kode_mk']}' class='btn btn-danger' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data?\")'>
                                                <i class='bi bi-trash'></i>
                                            </a>
                                        </td>
                                    </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
</body>

</html>
