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
            FOLLOW AND GET 10% OFF FOR YOUR FIRST PURCHASE
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
        <hr size="3">
  
    <div class="bg-no-repeat bg-cover flex flex-col justify-around items-center p-6">
      <div class="flex justify-center items-start gap-x-16">
        <div class="container h-96 w-56">
            <div class="h-full w-80 p-3">
               <a class="text-xl items-start p-1 font-bold ">Alamat Store: </a><br/>
               <a class="text-xl items-start p-1 underline">Jl. Swadana No.13, Dalu 10 B, Kec. Tj. Morawa, Kabupaten Deli Serdang, Sumatera Utara 20362</a>
               <br/>
               <br/>
               <a class="text-xl font-medium" href="https://www.instagram.com/snacksore1?igsh=OHg2Y2JtZTl2NWU3"
               ><img class="w-15 h-20" src="images/logo ig baru.png" alt="" /></a>
            </div>

          
         
        </div>
        <div class="container h-420 w-610">
            <div class="p-2 text-right ml-40">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.0829154232006!2d98.80927229999999!3d3.5683938999999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303137d37822b281%3A0xdd6eb7f96c2a15df!2sSnack%20Sore%20Sakti!5e0!3m2!1sid!2sid!4v1714656476131!5m2!1sid!2sid" width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade "></iframe>

            </div>
         
        </div>

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
