<?php 
// koneksi ke database
$mysqli = new mysqli("localhost", "root", "", "snacksore");

// ambil data dari tabel 
$result = mysqli_query($mysqli, "SELECT * FROM promo");

// tutup koneksi jika ada error
// if (!$result) {
//     die("Query Error: " . mysqli_error($mysqli));
// }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
  <body>
    <div
      class="header flex justify-between items-center border-y-8 border-[#2B1B09] bg-[#FFF6F0] p-4"
    >
      <ul class="w-1/3">
        <li><img class="w-24 h-24" src="images/logo.svg" alt="" /></li>
      </ul>
      <ul class="w-1/3">
        <li>
          <p class="text-4xl text-center uppercase">
            FOLLOW AND GET 10% OFF FOR YOUR FIRST PURCHASE
          </p>
        </li>
      </ul>
      <ul class="flex w-1/3 justify-end">
        <li>
          <a href="">
            <img src="images/facebook.svg" alt="" />
          </a>
        </li>
        <li>
          <a href="">
            <img src="images/twitter.svg" alt="" />
          </a>
        </li>
        <li>
          <a href="">
            <img src="images/instagram.svg" alt="" />
          </a>
        </li>
        <li>
          <a href="">
            <img src="images/youtube.svg" alt="" />
          </a>
        </li>
        <li>
          <a href="">
            <img src="images/tiktok.svg" alt="" />
          </a>
        </li>
        <li>
          <a href="">
            <img src="images/linkein.svg" alt="" />
          </a>
        </li>
      </ul>
    </div>

    <div class="h-1/3 flex justify-center flex-col">
      <img class="h-80 my-8" src="images/hero_logo.svg" alt="" />
      <div class="flex justify-center gap-x-14 my-8">
        <a class="text-3xl font-bold uppercase text-[#4D3223]" href="beranda.php"
          >Beranda</a
        >
        <a class="text-3xl font-bold uppercase text-[#4D3223]" href="index.php">menu</a>
        <a class="text-3xl font-bold uppercase text-[#4D3223]" href="promo.php"
          >promo</a
        >
        <a class="text-3xl font-bold uppercase text-[#4D3223]" href="alamat.php"
          >store</a
        >
        <a class="text-3xl font-bold uppercase text-[#4D3223]" href="about.php"
          >about us</a
        >
      </div>
    </div>

    <div
      class="bg-no-repeat bg-cover flex flex-col justify-around items-center p-12"
      style="background-image: url('images/background.svg')"
    >

    <h1 class="text-4xl font-extrabold my-4 text-[#F3D3B5] text-center">
        Promo
      </h1>
  
      <div class="flex flex-wrap justify-center items-center gap-x-16 gap-y-8 ">
      <?php while($row = mysqli_fetch_assoc($result)): ?>
                <div class="container h-96 w-56">
                    <div class="h-full w-full bg-[#F3D3B5] p-3 rounded-lg">
                        <div class="gambar">
                            <img src="images/<?php echo $row['gambar']; ?>" alt="">
                        </div>
                        <div class="harga">
                            <h1 class="text-md text-center p-3 line-through font-extrabold text-red-600">
                                <?php echo $row['harga_lama']; ?>
                            </h1>
                        </div>
                        <div class="harga">
                            <h1 class="text-md text-center p-1 font-extrabold">
                                <?php echo $row['harga_baru']; ?>
                            </h1>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
    </div>
</div>
    <div class="w-full h-[400px] bg-[#2B1B09] border-t-8 border-white">
      <h1 class="text-6xl font-extrabold my-4 text-[#F5D79B] text-center">
        Back to Top
      </h1>
      <div
        class="flex justify-center items-start w-full bg-[#2B1B09] text-[#F5D79B]"
      >
        <div class="w-[400px] flex flex-col justify-start items-center">
          <h1 class="text-center text-2xl font-semibold mb-4">
            SNACKSORE <br />
            Cookies
          </h1>
          <a class="text-xl font-medium" href="index.php">BERANDA</a>
          <a class="text-xl font-medium" href="menu.php">MENU</a>
          <a class="text-xl font-medium" href="promo.php">PROMO</a>
          <a class="text-xl font-medium" href="alamat.php">STORE</a>
          <a class="text-xl font-medium" href="about.php">ABOUT US</a>
        </div>

        <div class="w-[400px] flex flex-col justify-start items-center">
          <h1 class="text-center text-2xl font-semibold mb-10">HELP <br /></h1>
          <a class="text-xl font-medium" href="kebijakan_privasi.php">KEBIJAKAN PRIVASI</a>
          <a class="text-xl font-medium" href="kebijakan_pengembalian.php">KEBIJAKAN PENGEMBALIAN</a>
          <a class="text-xl font-medium" href="">SYARAT DAN KETENTUAN</a>
          <a class="text-xl font-medium" href="adminpanel/login.php">LOGIN ADMIN</a>
        </div>

        <div class="w-[400px] flex flex-col justify-start items-center">
          <h1 class="text-center text-2xl font-semibold mb-10">
            GET CONNECTED
          </h1>
          <a class="text-xl font-medium" href="https://www.instagram.com/snacksore1?igsh=OHg2Y2JtZTl2NWU3"
            ><img src="images/footer_instagram.svg" alt=""
          /></a>
        </div>
      </div>
    </div>
  </body>
</html>
