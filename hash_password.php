<?php 
    require "koneksi.php";
    require "adminpanel/login.php";

    function hashPassword($password) {
        return password_hash($password, PASSWORD_BCRYPT );
    }

    if (isset($_POST['loginbtn'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
    
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    
        // Simpan ke database
        $query = mysqli_query($con, "INSERT INTO users (username, hashed_password) VALUES ('$username', '$hashed_password')");
        if ($query) {
            echo "User registered successfully";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }

?>