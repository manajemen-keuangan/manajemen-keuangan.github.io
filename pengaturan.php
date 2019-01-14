<?php 
  session_start();
  include_once 'php/class.child.php';
  include_once 'php/class.view.php';
  $control = new Control();
  $user = new User();  
  $view = new View();
  $id = $_SESSION['id'];
  $parent = $_SESSION['parent'];
  if (!$control->get_session())
  {
    header("location:login.php");
  }
  if (isset($_GET['q']))
  {
    $control->user_logout();
    header("location:login.php");
  }
  if (isset($_GET['tgt']))
  {
    $view->Hyperlink($_GET['tgt']);
  }
  if (isset($_POST['submit']))
  { 
    extract($_POST);   
    $change = $user->change_pass($id,$pass,$c_pass1);
    if ($change) 
    {
      // Ganti Password Berhasil
      echo "<div style='text-align:center' style='color:white' >Password berhasil diubah</div>";
    }
    else
    {
      // Ganti Password Gagal
      echo "<div style='text-align:center' style='color:white' >Password lama salah</div>";
    }
  }
  if (isset($_POST['submitp']))
  { 
    extract($_POST);   
    $change = $user->change_profile($id,$name,$username,$email);
    if ($change) 
    {
      // Ganti Profil Berhasil
      echo "<div style='text-align:center' style='color:white' >Profil berhasil diubah </div>";
    }
    else
    {
      // Ganti Profil Gagal
      echo "<div style='text-align:center' style='color:white' >Username atau Email sudah digunakan</div>";
    }
  }
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
      <li class="nav-item">
        <?php
          $view->tampil_nav($parent);
        ?>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pengaturan.php?tgt=statistik">Statistik</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Pengaturan</a>
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
  <div class="d-md-flex align-items-center h-md-100 p-5 justify-content-center">
    <div class="card w-25">
      <div class="card-body">
        <button type="button" class="btn btn-primary btn-lg btn-block" type="submit" data-toggle="modal" data-target="#exampleModalCenter_profile">Atur Profile</button>
        <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModalCenter_password">Ganti Kata Sandi</button>
        <button onclick="location.href='pengaturan.php?q=logout'" type="button" class="btn btn-danger btn-lg btn-block">Keluar</button>
    </div>
  </div>
  </div>
  </div>
  <div class="modal fade" id="exampleModalCenter_profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Perbaharui profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form" action="" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="username">Nama Lengkap</label>
            <input class="form-control" type="text" name="name" id="name" placeholder="Nama Lengkap"/>
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username" id="username" placeholder="Username"/>
          </div>
          <div class="form-group">
            <label for="username">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="Email"/>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input class="btn btn-primary" type="submit" name="submitp" value="Perbaharui">
        </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModalCenter_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">ganti kata sandi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form" action="" method="post" name="chg">
        <div class="modal-body">
          <div class="form-group">
            <label for="username">Kata Sandi lama</label>
            <input class="form-control" type="password" id="kata_sandi_lama" name="pass" placeholder="Kata sandi lama"/>
          </div>
          <div class="form-group">
            <label for="username">Kata Sandi baru</label>
            <input class="form-control" type="password" id="kata_santi_baru" name="c_pass1" placeholder="Kata sandi baru" required/>
          </div>
        <div class="form-group">
          <label for="username">Konfirmasi Kata Sandi baru</label>
          <input class="form-control" type="password" id="kata_santi_baru" name="c_pass2"  placeholder="konfirmasi Kata sandi baru" required/>
        </div>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input class="btn btn-primary" type="submit" name="submit" value="Perbaharui" onclick="return(submitreg());">
        </div>
        </form>
      </div>
    </div>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript">
      function submitreg()
      {
        var form = document.chg; 
        if (form.c_pass1.value != form.c_pass2.value) 
        {
          alert("Password tidak sama.");
          return false;
        }
      }
      </script>
  </body>
</html>
