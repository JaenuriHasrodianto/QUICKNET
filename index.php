<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet" />

    <!-- my css -->
    <link rel="stylesheet" href="style.css" />

    <title>QuickNet Ambulu</title>
  </head>
  <body id="Home">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <img src="img/Logo QuickNet.png" width="130" height="50" class="d-inline-block align-top" alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-link active" href="index.php">Home</a>
            <a class="nav-link" href="#">Paket</a>
            <a class="nav-link" href="input.php">Fitur</a>
            <a class="nav-link" href="#">About Us</a>
            <a class="tombol btn btn-primary btn-open-popup" href="input.php" onclick="togglePopup()">Daftar</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->

    <!-- jumbootron -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">
          Get work done <span>faster</span><br />
          and <span>better</span> with our Network
        </h1>
        <a href="daftar.php" class="btn btn-primary tombol">Our List</a>
      </div>
    </div>
    <!-- akhir jumbootron -->
    <!-- container  -->
    <div class="cintainer">
      <!-- info panel -->
      <div class="row justify-content-center">
        <div class="col-10 info-panel">
          <div class="row">
            <div class="col-lg">
              <img src="img/paketnormal.png" alt="personal" class="float-left" />
              <h4>Paket Rp. 100.000</h4>
              <p>Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="col-lg">
              <img src="img/hires.png" alt="hires" class="float-left" />
              <h4>24 jam</h4>
              <p>Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="col-lg">
              <img src="img/security.png" alt="security" class="float-left" />
              <h4>24 jam</h4>
              <p>Lorem ipsum dolor sit amet.</p>
            </div>
          </div>
        </div>
      </div>
      <!-- akhir info panel -->

      <!-- workingspace -->
      <div class="row workingspace">
        <div class="col-lg-6">
          <img src="img/g1.jpg" alt="workingspace" class="img-fluid" />
        </div>
        <div class="col-lg-5">
          <h3><span>Koneksi cepat</span> untuk <span>kerja cepat</span></h3>
          <p>Koneksi internet anda pasti menentukan kualitas kerja anda!</p>
          <a href="#home" class="btn btn-primary">Lihat</a>
        </div>
      </div>
      <!-- form database -->
      
      <!-- akhir from database -->

      <!-- akhir workingspace -->

      <!-- testimonial -->
      <section class="testimonial">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <h5>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Distinctio, nisi! Veniam, consequatur!</h5>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-6 justify-content-center d-flex">
            <figure class="figure">
              <img src="img/img1.png" class="figure-img img-fluid rounded-circle" alt="test1" />
            </figure>
            <figure class="figure">
              <img src="img/img2.png" class="figure-img img-fluid rounded-circle utama" alt="test2" />
              <figcaption class="figure-caption">
                <h5>Sunny Ye</h5>
                <p>Designer</p>
              </figcaption>
            </figure>
            <figure class="figure">
              <img src="img/img3.png" class="figure-img img-fluid rounded-circle" alt="test3" />
            </figure>
          </div>
        </div>
      </section>
      <!-- akhir tesmonial -->
    </div>
    <!-- tutup container -->
    <!-- footer -->
    <footer class="footer justify-content-center bg-primary">
      <p>@Copyright <a href="https://jaenurihasrodianto.github.io/" class="text-white">JH</a></p>
    </footer>
    <!-- akhir footer -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script>
      function togglePopup() {
        document.getElementById("popupOverlay").classList.toggle("show");
      }
    </script>

  </body>
</html>