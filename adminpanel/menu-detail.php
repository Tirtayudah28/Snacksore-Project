<?php 
    require "session.php";
    require "../koneksi.php";
    
    $id = $_GET['q'];

    $query = mysqli_query($con, "SELECT * FROM menukue WHERE id='$id'");
    $data = mysqli_fetch_array($query);

    if(isset($_POST['editbtn'])) {
        $menu = htmlspecialchars($_POST['menu']);
        $harga = htmlspecialchars($_POST['harga']);

        if ($_FILES['foto']['size'] > 0) {
            $foto = $_FILES['foto']['name'];
            $foto_tmp = $_FILES['foto']['tmp_name'];
            $target_dir = "../img/";
            $target_file = $target_dir . basename($foto);

            if (move_uploaded_file($foto_tmp, $target_file)) {
                $queryUpdate = "UPDATE menukue SET nama='$menu', harga='$harga', foto='$target_file' WHERE id='$id'";
                if(mysqli_query($con, $queryUpdate)) {
                    header("Location: menu.php?q=$id");
                    exit();
                } else {
                    echo "<div class='alert alert-danger mt-3' role='alert'>Gagal melakukan update menu.</div>";
                }
            } else {
                echo "<div class='alert alert-danger mt-3' role='alert'>Gagal mengupload foto.</div>";
            }
        } else {
            $queryUpdate = "UPDATE menukue SET nama='$menu', harga='$harga' WHERE id='$id'";
            if(mysqli_query($con, $queryUpdate)) {
                header("Location: menu.php?q=$id");
                exit();
            } else {
                echo "<div class='alert alert-danger mt-3' role='alert'>Gagal melakukan update menu.</div>";
            }
        }
    }

    if(isset($_POST['deletebtn'])){
        $queryDelete = mysqli_query($con, "DELETE FROM menukue WHERE id='$id'");
        
        if($queryDelete){
            ?>
            <meta http-equiv="refresh" content="2; url=menu.php" />
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
        <h2 class="mb-4">Detail Menu</h2> 
        <div class="row">
            <div class="col-md-6">
                <div class="form-container">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="foto">Foto</label>
                            <input class="form-control" type="file" id="foto" name="foto">
                            <img src="<?php echo $data['foto']; ?>" class="mt-3 menu-img" alt="Foto Menu">
                        </div>
                        <div class="mb-3">
                            <label for="menu">Menu</label>
                            <input type="text" name="menu" id="menu" class="form-control" value="<?php echo $data['nama']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="harga">Harga</label>
                            <input type="text" name="harga" id="harga" class="form-control" value="<?php echo $data['harga']; ?>">
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
</html>
