<?php 
session_start();
require "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <style>
        body {
            background-image: url('../images/background.svg');
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .main {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .login-box {
            width: 500px;
            padding: 40px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<div class="main">
    <div class="login-box">
        <form action="" method="post">
            <div>
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <div>
                <button class="btn btn-success form-control mt-3" type="submit" name="loginbtn">Login</button>
            </div>
        </form>
    </div>
    <div class="mt-3" style="width: 500px;">
        <?php 
        if(isset($_POST['loginbtn'])){
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            // Menggunakan prepared statements untuk mencegah SQL injection
            $stmt = $con->prepare("SELECT * FROM users WHERE username=?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $countdata = $result->num_rows;
            $data = $result->fetch_assoc();
            
            if($countdata > 0){
                if (password_verify($password, $data['password'])) {
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['login'] = true;
                    header('Location: index.php');
                    exit;
                } else {
                    echo '<div class="alert alert-warning" role="alert">Password salah</div>';
                }
            } else {
                echo '<div class="alert alert-warning" role="alert">Akun tidak tersedia</div>';
            }

            // Menutup statement
            $stmt->close();
        }
        ?>
    </div>
</div>
</body>
</html>
