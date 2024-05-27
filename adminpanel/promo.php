<?php 
require "session.php";
require "../koneksi.php";

$queryPromo = mysqli_query($con, "SELECT * FROM promo");
$jumlahPromo = mysqli_num_rows($queryPromo);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <style>
        body {
            padding-bottom: 5rem;
            background-color: #f8f9fa;
        }
        .form-box {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .table thead th {
            border-top: none;
        }
        .menu-img {
            width: 50px;
            height: auto;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="../adminpanel" style="text-decoration: none;" class="text-muted"><i class="fas fa-home"></i> Home </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Promo</li>
            </ol>
        </nav>

        <div class="my-5 col-12 col-md-6 mx-auto">
            <div class="form-box">
                <h3 class="mb-4">Tambah Promo</h3>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="foto" class="form-label">Masukkan Foto</label>
                        <input class="form-control" type="file" id="foto" name="foto" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga_lama" class="form-label"> Harga Asli</label>
                        <input type="text" id="harga_lama" name="harga_lama" placeholder="Input Harga Asli" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga_baru" class="form-label"> Harga Promo</label>
                        <input type="text" id="harga_baru" name="harga_baru" placeholder="Input Harga Promo" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary form-control" type="submit" name="simpan_menu">Simpan</button>
                    </div>
                </form>

                <?php 
                if (isset($_POST['simpan_promo'])) {
                    $harga_lama = htmlspecialchars($_POST['harga_lama']);
                    $harga_baru = htmlspecialchars($_POST['harga_baru']);
                    $gambar = $_FILES['gambar']['name'];
                    $gambar_tmp = $_FILES['gambar']['tmp_name'];

                    // Validasi file upload
                    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
                    $gambar_extension = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));
                    $new_gambar_name = uniqid() . '.' . $gambar_extension;

                    if (in_array($gambar_extension, $allowed_extensions)) {
                        $target_dir = "../img/";
                        $target_file = $target_dir . $new_gambar_name;

                        if (move_uploaded_file($gambar_tmp, $target_file)) {
                            // Check if menu already exists
                            $stmt = $con->prepare("SELECT * FROM promo WHERE harga_lama=? OR harga_baru=? OR gambar=?");
                            $stmt->bind_param("sss", $harga_lama, $harga_baru, $target_file);
                            $stmt->execute();
                            $queryExist = $stmt->get_result();
                            $jumlahExist = $queryExist->num_rows;

                            if ($jumlahExist > 0) {
                                echo "<div class='alert alert-warning mt-3' role='alert'>harga_lama, harga_baru, atau foto sudah ada!</div>";
                            } else {
                                // Insert new menu
                                $stmt = $con->prepare("INSERT INTO promo (gambar, harga_lama, harga_baru) VALUES (?, ?, ?)");
                                $stmt->bind_param("sss", $target_file, $harga_lama, $harga_baru);

                                if ($stmt->execute()) {
                                    echo "<div class='alert alert-success mt-3' role='alert'>Promo berhasil ditambahkan!</div>";
                                    echo '<meta http-equiv="refresh" content="1;url=promo.php">';
                                } else {
                                    echo "<div class='alert alert-danger mt-3' role='alert'>Terjadi kesalahan saat menambahkan promo.</div>";
                                }
                            }

                            $stmt->close();
                        } else {
                            echo "<div class='alert alert-danger mt-3' role='alert'>Gagal mengupload foto.</div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger mt-3' role='alert'>Format file tidak valid. Hanya JPG, JPEG, PNG, dan GIF yang diperbolehkan.</div>";
                    }
                }
                ?>
            </div>
        </div>

        <div class="mt-5">
            <h2>Menu List</h2>
        </div>

        <div class="table-responsive mt-3">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Gambar</th>
                        <th>Harga_lama</th>
                        <th>Harga_baru</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if ($jumlahPromo == 0) {
                        echo "<tr><td colspan='5' class='text-center'>Data Tidak Tersedia</td></tr>";
                    } else {
                        $jumlah = 1;
                        while ($data = mysqli_fetch_array($queryPromo)) {
                            echo "<tr>";
                            echo "<td>{$jumlah}</td>";
                            echo "<td><img src='{$data['gambar']}' alt='gambar' class='gambar-img'></td>";
                            echo "<td>{$data['harga_lama']}</td>";
                            echo "<td>{$data['harga_baru']}</td>";
                            echo "<td><a href='promo-detail.php?q={$data['id']}' class='btn btn-info'><i class='fas fa-search'></i></a></td>";
                            echo "</tr>";
                            $jumlah++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>


