<?php 
require "session.php";
require "../koneksi.php";

$queryMenukue = mysqli_query($con, "SELECT * FROM menukue");
$jumlahMenukue = mysqli_num_rows($queryMenukue);
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
                <li class="breadcrumb-item active" aria-current="page">Menu</li>
            </ol>
        </nav>

        <div class="my-5 col-12 col-md-6 mx-auto">
            <div class="form-box">
                <h3 class="mb-4">Tambah Menu</h3>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="foto" class="form-label">Masukkan Foto</label>
                        <input class="form-control" type="file" id="foto" name="foto" required>
                    </div>
                    <div class="mb-3">
                        <label for="menu" class="form-label">Masukkan Menu</label>
                        <input type="text" id="menu" name="menu" placeholder="Input Nama Menu" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Masukkan Harga</label>
                        <input type="text" id="harga" name="harga" placeholder="Input Harga" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary form-control" type="submit" name="simpan_menu">Simpan</button>
                    </div>
                </form>

                <?php 
                if (isset($_POST['simpan_menu'])) {
                    $menu = htmlspecialchars($_POST['menu']);
                    $harga = htmlspecialchars($_POST['harga']);
                    $foto = $_FILES['foto']['name'];
                    $foto_tmp = $_FILES['foto']['tmp_name'];

                    // Validasi file upload
                    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
                    $foto_extension = strtolower(pathinfo($foto, PATHINFO_EXTENSION));
                    $new_foto_name = uniqid() . '.' . $foto_extension;

                    if (in_array($foto_extension, $allowed_extensions)) {
                        $target_dir = "../img/";
                        $target_file = $target_dir . $new_foto_name;

                        if (move_uploaded_file($foto_tmp, $target_file)) {
                            // Check if menu already exists
                            $stmt = $con->prepare("SELECT * FROM menukue WHERE nama=? OR harga=? OR foto=?");
                            $stmt->bind_param("sss", $menu, $harga, $target_file);
                            $stmt->execute();
                            $queryExist = $stmt->get_result();
                            $jumlahExist = $queryExist->num_rows;

                            if ($jumlahExist > 0) {
                                echo "<div class='alert alert-warning mt-3' role='alert'>Menu, harga, atau foto sudah ada!</div>";
                            } else {
                                // Insert new menu
                                $stmt = $con->prepare("INSERT INTO menukue (foto, nama, harga) VALUES (?, ?, ?)");
                                $stmt->bind_param("sss", $target_file, $menu, $harga);

                                if ($stmt->execute()) {
                                    echo "<div class='alert alert-success mt-3' role='alert'>Menu berhasil ditambahkan!</div>";
                                    echo '<meta http-equiv="refresh" content="1;url=menu.php">';
                                } else {
                                    echo "<div class='alert alert-danger mt-3' role='alert'>Terjadi kesalahan saat menambahkan menu.</div>";
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
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if ($jumlahMenukue == 0) {
                        echo "<tr><td colspan='5' class='text-center'>Data Tidak Tersedia</td></tr>";
                    } else {
                        $jumlah = 1;
                        while ($data = mysqli_fetch_array($queryMenukue)) {
                            echo "<tr>";
                            echo "<td>{$jumlah}</td>";
                            echo "<td><img src='{$data['foto']}' alt='Foto' class='menu-img'></td>";
                            echo "<td>{$data['nama']}</td>";
                            echo "<td>{$data['harga']}</td>";
                            echo "<td><a href='menu-detail.php?q={$data['id']}' class='btn btn-info'><i class='fas fa-search'></i></a></td>";
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
