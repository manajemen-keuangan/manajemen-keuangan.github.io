<?php
  session_start();
  include_once 'php/class.child.php';
  include_once 'php/class.view.php';
  $control = new Control();
  $user = new User();
  $view = new View();
  $saldo = $_SESSION['saldo'];
  $idparent = $_SESSION['id'];
  $idparent = $_SESSION['idparent'];
  $parent = $_SESSION['parent'];
  if (!$control->get_session())
  {
    header("location:login.php");
  }
  if (isset($_GET['tgt']))
  {
    $view->Hyperlink($_GET['tgt']);
  }
  if (isset($_POST['submit']))
  { 
	 	extract($_POST);   
	  $result = $user->tambah_data($id,$keperluan,$desc,$kategori,$jml,$jml_uang,$saldo);
	  if ($result) 
    {
      // Tambah Data berhasil
      echo "<div style='text-align:center' style='color:white' >Tambah Data berhasil.</div>";
    } 
    else 
    {
      // Tambah Data gagal
      echo "<div style='text-align:center' style='color:white' > Tambah Data gagal. Saldo anda tidak mencukupi.</div>";
    }
	}
   echo "<div style='text-align:center' style='color:white' >'$id','$saldo','$idparent'</div>";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-light" style="background:linear-gradient(245deg, #242348 0%, #5a55aa);
  background-color:#184e8e">
  <a class="navbar-brand" href="#">simpen icon disini</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Keuangan <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <?php
          $view->tampil_nav($parent);
        ?>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pengaturan.php?tgt=statistik">Statistik</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pengaturan.php?tgt=pengaturan">Pengaturan</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
  <!-- SideNav slide-out button -->
  <!-- Sidebar navigation -->
<div class="container">
  <br>
<button class="btn btn-outline-success" type="submit" data-toggle="modal" data-target="#exampleModalCenter">Tambah Baru</button>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Input Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form" action="" method="post">
      <div class="modal-body">
        <div class="form-group">
          <label for="username">Keperluan</label>
          <input class="form-control" type="text" id="barang-masuk" name="keperluan" placeholder="Keperluannya apa" required/>
        </div>
        <div class="form-group">
          <label for="username">Deskripsi</label>
          <input class="form-control" type="text" id="deskripsi" name="desc" placeholder="Deskripsi" required/>
        </div>
        <div class="form-group">
          <label for="username">Kategori Keuangan</label>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="kategori" id="inlineRadio1" value="1" checked>
            <label class="form-check-label" for="inlineRadio1">Pengeluaran</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="kategori" id="inlineRadio2" value="2">
            <label class="form-check-label" for="inlineRadio2">Pemasukan</label>
          </div>
        </div>
        <div class="form-group">
          <label for="username">Jumlah</label>
          <input class="form-control" min="1"type="number" id="jumlah" name="jml" placeholder="Jumlah" required/>
        </div>
        <div class="form-group">
          <label for="username">Jumlah Uang</label>
          <input class="form-control" min="1" type="number" id="harga" name="jml_uang" placeholder="Jumlah Uang" required/>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input class="btn btn-primary" type="submit" name="submit" value="Tambah">
      </div>
      </form>
    </div>
  </div>
</div>

<h1 class="display-4 text-center">Data Keuangan</h1>
  <center>
    <table>
    <?php
      $view -> tampil_keuangan($id);
    ?>
    </table>
  </center>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
