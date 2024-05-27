<?php 
    require "session.php";
    require "../koneksi.php";

    $queryMenukue = mysqli_query($con, "SELECT * FROM menukue");
    $jumlahMenukue = mysqli_num_rows($queryMenukue);

    $queryPromo = mysqli_query($con, "SELECT * FROM promo");
    $jumlahPromo = mysqli_num_rows($queryPromo);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>

<style>
    .kotak {
        border: solid;
    }
    .summary-menu{
        background-color: #0a6b4a;
        border-radius: 10px;
    }
    .summary-promo{
        background-color: #0a516b;
        border-radius: 15px;
    }
    a {
        text-decoration: none;
        color: white;
    }
    a:hover {
        color: brown;
    }

</style>

<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-home"></i> Home
                </li>
            </ol>
        </nav>
        <h2>Halo <?php echo $_SESSION['username']; ?></h2>

        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 mb-3">
                    <div class="summary-menu p-3">
                         <div class="row">
                            <div class="col-6">
                                <i class="fa-solid fa-bowl-food fa-5x text-black-50"></i>
                                    </div>
                                <div class="col-6 text-white">
                            <a href="menu.php" class="pt-5 fs-1">Menu</a>
                            <P class="fs-3"> <?php echo $jumlahMenukue; ?> Menu</p>
                        </div>
                    </div>
                </div>
            </div>

                <div class="col-lg-4 col-md-6 col-12 mb-3">
                    <div class="summary-promo p-3">
                        <div class="row">
                            <div class="col-6">
                                <i class="fa-solid fa-tag fa-5x text-black-50"></i>
                            </div>
                            <div class="col-6 text-white">
                                <a href="promo.php" class="pt-5 fs-1">Promo</a>
                                <p class="fs-3"> <?php echo $jumlahPromo ?> Promo </p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>