<?php 
  session_start();
  include_once 'php/class.child.php';
  include_once 'php/class.view.php';
  $control = new Control();
  $child = new Child();
  $view = new View();
  $idparent = $_SESSION['id'];
  $parent = $_SESSION['parent'];
  if (!$control->get_session())
  {
    header("location:login.php");
  }
  if(!$parent)
  {
    header("location:keuangan.php");
  }
  if (isset($_POST['submit']))
  {
    extract($_POST);
    $register = $child->reg_user($name,$username,$password,$email,$idparent);
    if ($register) 
    {
      // Registrasi berhasil
      echo "<div style='text-align:center' style='color:white' >Registrasi Berhasil.</div>";
    } 
    else 
    {
      // Registrasi Gagal
      echo "<div style='text-align:center' style='color:white' >Registrasi Gagal. Email atau Username sudah terpakai silahkan coba lagi.</div>";
    }
  }
  echo "<div style='text-align:center' style='color:white' >'$idparent'</div>";
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
  
  <nav class="navbar navbar-expand-lg navbar-dark bg-light" style="background:linear-gradient(245deg, #242348 0%, #5a55aa);
  background-color:#184e8e">
  <a class="navbar-brand" href="#">simpen icon disini</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="pengaturan.php?tgt=Keuangan">Keuangan </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Akun</a>
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
    <button class="btn btn-outline-success" type="submit" data-toggle="modal" data-target="#exampleModalCenter">Tambah Akun</button>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Tambah Akun</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form" action="" method="post" name="reg">
          <div class="modal-body">
            <div class="form-group">
              <label for="username">Nama Lengkap</label>
              <input class="form-control" type="text" id="name" name="name" placeholder="Nama Lengkap" required/>
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input class="form-control" type="text" id="username" name="username" placeholder="Username" required/>
            </div>
            <div class="form-group">
              <label for="username">Email</label>
              <input class="form-control" type="email" id="emailinput" name="email" placeholder="Email" required/>
            </div>
            <div class="form-group">
              <label for="username">Kata Sandi</label>
              <input class="form-control" type="password" id="password" name="password" placeholder="Kata Sandi" required/>
            </div>
            <div class="form-group">
              <label for="username">Konfirmasi Kata Sandi</label>
              <input class="form-control" type="password" id="confirm_password" name="password2" placeholder="Konfirmasi Kata Sandi" required/>
            </div>
            <div class="form-group">
              <button type="submit" name = "submit" class="btn btn-success btn-lg float-right" onclick="return(submitreg());">Daftarkan</button>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
    <center>
    <table>
    <?php
      $view -> tampil_anak($idparent);
    ?>
    </table>
    </center>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script type="text/javascript">
  function submitreg()
  {
    var form = document.reg; 
    if (form.password.value != form.password2.value) 
    {
      alert("Password tidak sama.");
      return false;
    }
  }
  </script>
  </body>
</html>
