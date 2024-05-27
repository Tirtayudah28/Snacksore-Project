<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
  </head>
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
      style="background-image: url('images/bg24.png')"
    >
    <h1 class="text-3xl font-extrabold text-white text-center">
        Sejarah SNACKSORE
      </h1>

      <div class="flex justify-center items-center gap-x-16 ">
        <div class="container h-96 w-60 pl-32">
            <div class="h-full w-52 bg-[#EEA663] p-3 rounded-lg">
               <img src="images/owner.png " alt="">
               <p class="text-center p-2 font-serif  text-xxl font-bold text-gray-700">Pojo Sakti</p>
               
            </div>
            
        </div>
        <br/>
          <h2 class="text-white font-serif text-justify ml-7 text-xl">Ini Sejarah Berdirinya SNACKSORE, yang lahir dari ide saya yaitu Pojo Sakti. <br/>
            Dulu, ketika kontrak kerja saya di Jerman berakhir, saya dihadapkan pada pilihan sulit: kembali ke kampung halaman tanpa pekerjaan yang pasti atau mencoba sesuatu yang baru. 
            Saya memutuskan untuk memanfaatkan keahlian kuliner saya dengan mendirikan toko kue rumahan. Meskipun awalnya hanya ide sederhana untuk membantu perekonomian, dengan promosi di media sosial, toko kue rumahan saya mulai diminati banyak orang. 
            Orderan pun datang bertubi-tubi, membuat saya terkejut dengan omset yang berhasil saya raih. Dari situlah, toko kue rumahan itu tumbuh menjadi bisnis yang sukses, bahkan memungkinkan saya untuk mempekerjakan lebih banyak orang dan memberikan kontribusi positif bagi perekonomian keluarga mereka. 
            Cerita ini menunjukkan bahwa sebuah ide sederhana dapat menjadi bagian dari sejarah, mengubah nasib seseorang, dan membantu membangun fondasi bagi masa depan yang lebih cerah.</h2>
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
