

<?php 
    require "session.php";
    require "../koneksi.php";
    
    $id = $_GET['q'];

    $query = mysqli_query($con, "SELECT * FROM promo WHERE id='$id'");
    $data = mysqli_fetch_array($query);

    if(isset($_POST['editbtn'])) {
        $harga_lama = htmlspecialchars($_POST['harga_lama']);
        $harga_baru = htmlspecialchars($_POST['harga_baru']);

        if ($_FILES['gambar']['size'] > 0) {
            $gambar = $_FILES['gambar']['name'];
            $gambar_tmp = $_FILES['gambar']['tmp_name'];
            $target_dir = "../img/";
            $target_file = $target_dir . basename($gambar);

            if (move_uploaded_file($gambar_tmp, $target_file)) {
                $queryUpdate = "UPDATE promo SET harga_lama='$harga_lama', harga_baru='$harga_baru', gambar='$target_file' WHERE id='$id'";
                if(mysqli_query($con, $queryUpdate)) {
                    header("Location: promo.php?q=$id");
                    exit();
                } else {
                    echo "<div class='alert alert-danger mt-3' role='alert'>Gagal melakukan update promo.</div>";
                }
            } else {
                echo "<div class='alert alert-danger mt-3' role='alert'>Gagal mengupload foto.</div>";
            }
        } else {
            $queryUpdate = "UPDATE promo SET harga_lama='$harga_lama', harga_baru='$harga_baru' WHERE id='$id'";
            if(mysqli_query($con, $queryUpdate)) {
                header("Location: promo.php?q=$id");
                exit();
            } else {
                echo "<div class='alert alert-danger mt-3' role='alert'>Gagal melakukan update promo.</div>";
            }
        }
    }

    if(isset($_POST['deletebtn'])){
        $queryDelete = mysqli_query($con, "DELETE FROM promo WHERE id='$id'");
        
        if($queryDelete){
            ?>
            <meta http-equiv="refresh" content="2; url=promo.php" />
            <?php
        }
        else{
            echo mysqli_error($con);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail menu</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
</head>
<style>
    body {
        margin-bottom: 5rem;
    }
    .form-container {
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .menu-img {
        width: 100%;
        max-width: 200px;
        height: auto;
        border-radius: 5px;
    }
</style>
<body>
    <?php require "navbar.php";?>
    <div class="container mt-5">
        <h2 class="mb-4">Detail Promo</h2> 
        <div class="row">
            <div class="col-md-6">
                <div class="form-container">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="gambar">Foto</label>
                            <input class="form-control" type="file" id="gambar" name="gambar">
                            <img src="<?php echo $data['gambar']; ?>" class="mt-3 menu-img" alt="gambar Menu">
                        </div>
                        <div class="mb-3">
                            <label for="harga_lama">Harga Asli</label>
                            <input type="text" name="harga_lama" id="_harga_lama" class="form-control" value="<?php echo $data['harga_lama']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="harga_baru">Harga Promo</label>
                            <input type="text" name="harga_baru" id="harga_baru" class="form-control" value="<?php echo $data['harga_baru']; ?>">
                        </div>
                        <div class="mt-5 d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary mr-2" name="editbtn">Update</button>
                            <button type="submit" class="btn btn-danger ml-2" name="deletebtn">Delete</button>
                            <a href="menu.php" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    if(isset($_POST['deletebtn'])) {
        ?>
        <div class="container mt-3 col-md-6">
            <div class="alert alert-primary" role="alert">
                Menu Berhasil Dihapus
            </div>
        </div>
        <?php
    }
    ?>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
<!-- <body>
    <?php require "navbar.php";?>
    <div class="container mt-5">
        <h2>Detail Promo</h2> 
        <div class="col-12 col-md-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="gambar">Foto</label>
                    <input class="form-control" type="file" id="gambar" name="gambar">
                    <img src="<?php echo $data['gambar']; ?>" class="mt-3 img-fluid" alt="gambar Menu">
                </div>
                <div>
                    <label for="menu_lama">Harga Asli</label>
                    <input type="text" name="harga_lama" id="harga_lama" class="form-control" value="<?php echo $data['harga_lama']; ?>">
                </div>
                <div>
                    <label for="harga_baru">Harga Promo</label>
                    <input type="text" name="harga_baru" id="harga_baru" class="form-control" value="<?php echo $data['harga_baru']; ?>">
                </div>
                <div class="mt-5 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" name="editbtn">Update</button>
                    <a href="promo.php" class="btn btn-primary">Kembali</a>
                    <button type="submit" class="btn btn-danger" name="deletebtn">Delete</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    if(isset($_POST['deletebtn'])) {
        ?>
        <div class="container mt-3 col-md-6">
            <div class="alert alert-primary" role="alert">
                Menu Berhasil Dihapus
            </div>
        </div>
        <?php
    }
    ?>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body> -->
</html>
