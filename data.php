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
        document.location='input';
    </script>";
}else {
    echo "<script>
        alert('edit data Gagal!');
        document.location='input';
    </script>";
}
} else{
  // data akan disimpan
  $simpan = mysqli_query($koneksi, " INSERT INTO pelanggan (pppoe, nama, ip_router, alamat, username, tgl_pasang, paket, telpon) value ('$_POST[pppoe]','$_POST[nama]','$_POST[ip_router]','$_POST[alamat]','$_POST[username]','$_POST[tgl_pasang]','$_POST[paket]','$_POST[telpon]')");
  // uji jika sukses
  if($simpan){
      echo "<script>
          alert('simpan data Sukses!');
          document.location='input';
      </script>";
  }else {
      echo "<script>
          alert('simpan data Gagal!');
          document.location='input';
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
        document.location='input';
    </script>";
}else {
    echo "<script>
        alert('hapus data Gagal!');
        document.location='input';
    </script>";
}
}

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>DATA PELANGGAN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body class="allbody">
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
            <a class="tombol btn btn-primary btn-open-popup" onclick="togglePopup()">Daftar</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->
    <!-- awal container -->
    <div class="container mt-4">
      <!-- awal row input -->
      <div class="row">
        <div class="col-md-7 mx-auto">
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
                    <option value="<?= $vpaket?>">value="<?= $vpaket?>"</option>
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
                  <button class="btn-close-popup btn-danger" onclick="togglePopup()">tutup</button>
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
      <!-- akhir row input -->
      <!-- awal table -->
      <div class="card text-center mt-4">
        <div class="card-header bg-info">DATA PELANGGAN</div>
        <div class="card-body">
          <div class="col-md-4 mx-auto">
            <form method="POST">
              <div class="input-grub mb-3">
                <input type="text" name="cari" class="form-control" placeholder="masukan kata kunci" />
                <button class="btn btn-primary" name="bcari" type="submit">cari</button>
              </div>
            </form>
          </div>
          <table class="table table-striped table-hover table-bordered">
            <tr>
              <th>no.</th>
              <th>pppoe</th>
              <th>nama</th>
              <th>ip_router</th>
              <th>alamat</th>
              <th>username</th>
              <th>tanggal pasang</th>
              <th>paket</th>
              <th>telpon</th>
              <th>aksi</th>
            </tr>
            <?php
            //persiapan tampilan data
            $no = 1;
            $tampil = mysqli_query($koneksi,"SELECT * FROM pelanggan order by pppoe desc");
            while($data = mysqli_fetch_array($tampil)):

            ?>
            <tr>
              <td><?=$no++?></td>
              <td><?=$data['pppoe']?></td>
              <td><?=$data['nama']?></td>
              <td><?=$data['ip_router']?></td>
              <td><?=$data['alamat']?></td>
              <td><?=$data['username']?></td>
              <td><?=$data['tgl_pasang']?></td>
              <td><?=$data['paket']?></td>
              <td><?=$data['telpon']?></td>
              <td>
                <a href="input?hal=edit&id=<?=$data['pppoe']?>" class="btn btn-warning">edit</a>
                <a href="input?hal=hapus&id=<?=$data['pppoe']?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin akan hapus data ini?')">hapus</a>
              </td>
            </tr>
            <?php endwhile; ?>
          </table>
        </div>
        <div class="card-footer text-body-secondary bg-info"></div>
      </div>
    </div>
    <!-- akhir table -->

    <!-- akhir container -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
      function togglePopup() {
        document.getElementById("popupOverlay").classList.toggle("show");
      }
    </script>
  </body>
</html>
