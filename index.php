<?php 
// koneksi ke database
$mysqli = new mysqli("localhost", "root", "", "snacksore");

// ambil data dari tabel 
$result = mysqli_query($mysqli, "SELECT * FROM menukue");

// tutup koneksi jika ada error
// if (!$result) {
//     die("Query Error: " . mysqli_error($mysqli));
// }
?>
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="style.css">
        <title>Document</title>
    </head>
    <body>
        <div class="header flex justify-between items-center border-y-8 border-[#2B1B09] bg-[#FFF6F0] p-4">
            <ul class="w-1/3">
                <li><img class="w-24 h-24" src="images/logo.svg" alt="" /></li>
            </ul>
            <ul class="w-1/3">
                <li>
                    <p class="text-4xl text-center uppercase">
                        FOLLOW AND GET 10% OFF FOR YOUR FIRST PURCHASE
                    </p>
                </li>
            </ul>
            <ul class="flex w-1/3 justify-end">
                <li><a href=""><img src="images/facebook.svg" alt="" /></a></li>
                <li><a href=""><img src="images/twitter.svg" alt="" /></a></li>
                <li><a href=""><img src="images/instagram.svg" alt="" /></a></li>
                <li><a href=""><img src="images/youtube.svg" alt="" /></a></li>
                <li><a href=""><img src="images/tiktok.svg" alt="" /></a></li>
                <li><a href=""><img src="images/linkedin.svg" alt="" /></a></li>
            </ul>
        </div>

        <div class="h-1/3 flex justify-center flex-col">
            <img class="h-80 my-8" src="images/hero_logo.svg" alt="" />
            <div class="flex justify-center gap-x-14 my-8">
                <a class="text-3xl font-bold uppercase text-[#4D3223]" href="beranda.php">Beranda</a>
                <a class="text-3xl font-bold uppercase text-[#4D3223]" href="index.php">Menu</a>
                <a class="text-3xl font-bold uppercase text-[#4D3223]" href="promo.php">Promo</a>
                <a class="text-3xl font-bold uppercase text-[#4D3223]" href="alamat.php">Store</a>
                <a class="text-3xl font-bold uppercase text-[#4D3223]" href="about.php">About Us</a>
            </div>
        </div>

        <div class="bg-no-repeat bg-cover flex flex-col justify-around items-center p-12" style="background-image: url('images/background.svg')">
            <img src="images/logo_snacksore.svg" alt="" />

            <div class="flex flex-wrap justify-center items-center gap-x-16 gap-y-8">
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <div class="container h-96 w-56">
                        <div class="bg-white w-full h-3/6 rounded-md bg-no-repeat bg-cover relative" style="margin-top: 30px; background-image: url('images/<?php echo $row["foto"]; ?>')">
                            <img src="images/logo_small.svg" class="absolute -left-6 -top-6" alt="" />
                        </div>
                        <div class="h-2/6">
                            <h1 class="text-[#F5D79B] text-xl font-semibold">
                                <label><?php echo $row['nama']; ?></label>
                            </h1>
                            <h1 class="text-[#F5D79B] text-xl font-semibold">
                                <label><?php echo $row['harga']; ?>/GR </label>
                            </h1>
                        </div>
                        <a class="bg-[#F5D79B] px-4 py-2 rounded-full uppercase w-full font-medium floating-link no-hover" href="https://api.whatsapp.com/send?phone=+6282160784719&text=Halo%20Apakah%20Anda%20ada?">Pesan Sekarang</a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>

        <div class="w-full h-[400px] bg-[#2B1B09] border-t-8 border-white">
            <h1 class="text-6xl font-extrabold my-4 text-[#F5D79B] text-center">
                Back to Top
            </h1>
            <div class="flex justify-center items-start w-full bg-[#2B1B09] text-[#F5D79B]">
                <div class="w-[400px] flex flex-col justify-start items-center">
                    <h1 class="text-center text-2xl font-semibold mb-4">
                        SNACKSORE <br />
                        Cookies
                    </h1>
                    <a class="text-xl font-medium" href="beranda.php">BERANDA</a>
                    <a class="text-xl font-medium" href="index.php">MENU</a>
                    <a class="text-xl font-medium" href="promo.php">PROMO</a>
                    <a class="text-xl font-medium" href="alamat.php">STORE</a>
                    <a class="text-xl font-medium" href="about.php">ABOUT US</a>
                </div>

                <div class="w-[400px] flex flex-col justify-start items-center">
                    <h1 class="text-center text-2xl font-semibold mb-10">HELP <br /></h1>
                    <a class="text-xl font-medium" href="kebijakan_privasi.php">KEBIJAKAN PRIVASI</a>
                    <a class="text-xl font-medium" href="kebijakan_pengembalian.php">KEBIJAKAN PENGEMBALIAN</a>
                    <a class="text-xl font-medium" href="">SYARAT DAN KETENTUAN</a>
                    <a class="text-xl font-medium" href="adminpanel/login.php">LOGIN</a>
                </div>

                <div class="w-[400px] flex flex-col justify-start items-center">
                    <h1 class="text-center text-2xl font-semibold mb-10">
                        GET CONNECTED
                    </h1>
                    <a class="text-xl font-medium" href="https://www.instagram.com/snacksore1?igsh=OHg2Y2JtZTl2NWU3">
                        <img src="images/footer_instagram.svg" alt="" />
                    </a>
                </div>
            </div>
        </div>
    </body>
    </html>
