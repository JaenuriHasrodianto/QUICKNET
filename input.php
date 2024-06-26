<?php
//koneksi database
$server = "localhost";
$user = "root";
$password = "";
$database = "quicknet";

//buat koneksi
$koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));

// jika tombol simpan diklik
if (isset($_POST['bsimpan'])) {

// t edit
if (isset($_GET['hal']) == "edit") {
  $edit = mysqli_query($koneksi, "UPDATE pelanggan SET nama = '$_POST[nama]', ip_router = '$_POST[ip_router]', alamat = '$_POST[alamat]', username = '$_POST[username]', tgl_pasang = '$_POST[tgl_pasang]', paket = '$_POST[paket]', telpon = '$_POST[telpon]' where pppoe = '$_GET[id]'");
  // uji jika sukses
  if($edit){
    echo "<script>
        alert('edit data Sukses!');
        document.location='daftar.php';
    </script>";
}else {
    echo "<script>
        alert('edit data Gagal!');
        document.location='daftar.php';
    </script>";
}
} else{
  // data akan disimpan
  $simpan = mysqli_query($koneksi, " INSERT INTO pelanggan (pppoe, nama, ip_router, alamat, username, tgl_pasang, paket, telpon) value ('$_POST[pppoe]','$_POST[nama]','$_POST[ip_router]','$_POST[alamat]','$_POST[username]','$_POST[tgl_pasang]','$_POST[paket]','$_POST[telpon]')");
  // uji jika sukses
  if($simpan){
      echo "<script>
          alert('simpan data Sukses!');
          document.location='daftar.php';
      </script>";
  }else {
      echo "<script>
          alert('simpan data Gagal!');
          document.location='daftar.php';
      </script>";
  }
}
}
  

// variabel
$vpppoe = "";
$vnama = "";
$vip_router = "";
$valamat = "";
$vusername = "";
$vtgl_pasang = "";
$vpaket = "";
$vtelpon = "";

// tombol edit dan hapus
if (isset($_GET['hal'])) {
// tombol edit
if ($_GET['hal'] == "edit") {
  // menampilkan data yg mau di edit
$tampil = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE pppoe = '$_GET[id]'");
$data = mysqli_fetch_array($tampil);
if ($data) {
  $vpppoe = $data['pppoe'];
  $vnama = $data['nama'];
  $vip_router = $data['ip_router'];
  $valamat = $data['alamat'];
  $vusername = $data['username'];
  $vtgl_pasang = $data['tgl_pasang'];
  $vpaket = $data['paket'];
  $vtelpon = $data['telpon'];
}
} else if ($_GET['hal'] == "hapus") {
    $hapus = mysqli_query($koneksi, "DELETE FROM pelanggan WHERE pppoe = '$_GET[id]' ");
  if($hapus){
    echo "<script>
        alert('hapus data Sukses!');
        document.location='daftar.php';
    </script>";
}else {
    echo "<script>
        alert('hapus data Gagal!');
        document.location='daftar.php';
    </script>";
}
}

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />input

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
    <div class="container">
      <div class="col-md-5 mx-auto">
        <div class="fw-bold fs-3">
          <h5 >SILAHKAN MASUKAN DATA ANDA UNTUK MENDAFTAR</h5>
        </div>
    </div>
      <!-- awal form -->
      <div class="row">
        <div class="col-md-5 mx-auto">
          <!-- awal card input -->
          <div class="card overlay-container" id="popupOverlay">
            <div class="popup-box">
              <div class="card-header bg-info" style="color: green"><marquee behavior="alternate" direction="alternate">INPUT DATA PELANGGAN</marquee></div>
               <div class="card-body">
              <!-- awal form input -->
                <form method="POST">
                <div class="mb-3">
                  <label class="form-label" for="pppoe">pppoe</label>
                  <input type="text" name="pppoe" value="<?= $vpppoe?>" class="form-control" placeholder="pppoe" id="pppoe" />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="nama">nama</label>
                  <input type="text" name="nama" value="<?= $vnama?>" class="form-control form-input" placeholder="nama" id="nama" />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="i[_router">ip_router</label>
                  <input type="text" name="ip_router" value="<?= $vip_router?>" class="form-control form-input" placeholder="ip_router" id="ip_router" />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="alamat">alamat</label>
                  <input type="text" name="alamat" value="<?= $valamat?>" class="form-control form-input" placeholder="alamat" id="alamat"/>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="username">username</label>
                  <input type="text" name="username" value="<?= $vusername?>" class="form-control form-input" placeholder="username" id="username"/>
                </div>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="tgl_pasang">tanggal pasang</label>
                  <input type="date" name="tgl_pasang" value="<?= $vtgl_pasang?>" class="form-control form-input" placeholder="masukkan tanggal" id="tgl_pasang"/>
                </div>
                
                <div class="mb-3">
                  <label class="form-label" for="paket">Paket</label>
                  <select class="form-select  form-input" name="paket" id="paket" >
                    <option value="<?= $vpaket?>"><?= $vpaket?></option>
                    <option value="Rp100.000">Rp100.000</option>
                    <option value="Rp150.000">Rp150.000</option>
                    <option value="Rp200.000">Rp200.000</option>
                    <option value="request">request</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="telpon">telpon</label>
                  <input type="text" name="telpon" value="<?= $vtelpon?>" class="form-control form-input" placeholder="masukkan no hp" id="telpon"/>
                </div>
                
                <div class="text-center">
                  <hr />
                  <button class="btn btn-primary btn-submit" name="bsimpan" type="submit">simpan</button>
                  <button class="btn btn-warning" name="breset" type="reset">reset</button>
                </div>
                </form>
              <!-- akhir form input -->
            </div>
            </div>
            <div class="card-footer bg-info mt-5"></div>
          </div>
          <!-- akhir card input -->
        </div>
      </div>
      <!-- akhir form -->
    

      
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