<?php 
  session_start();
  include_once 'php/class.child.php';
  include_once 'php/class.view.php';
  $control = new Control();
  $user = new User();
  $view = new View();
  if ($control->get_session())
  {
    header("location:akun.php");
  }
  if (isset($_POST['submit']))
  {
    extract($_POST);
    $register = $user->reg_user($name,$username,$password,$email);
    if ($register)
    {
      // Registrasi Berhasil
      echo "<div style='text-align:center' style='color:white' >Registrasi Berhasil <a href='login.php'>Click here</a> to login</div>";
    }
    else
    {
      // Registrasi Gagal
      echo "<META http-equiv='refresh' content='2;Home.php#'>";
      echo "<div style='text-align:center' style='color:white' >Registrasi Gagal. Email atau Username sudah terpakai silahkan coba lagi.</div>";
    }
  }
  if (isset($_GET['tgt']))
  {
    $view->Hyperlink($_GET['tgt']);
  } 
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
    .jumbotron h1 {word-wrap: break-word;}
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary" style="background:linear-gradient(245deg, #242348 0%, #5a55aa);
    background-color:#184e8e;">
      <div class="container">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#mainNav">
        <span class="navbar-toggler-icon"></span>
        </button> 
        <div class="collapse navbar-collapse" id="mainNav">
          <div class="navbar-nav">
            <a class="nav-item nav-link active" href="#">Home</a>
            <a class="nav-item nav-link" href="#mainDaftar">Daftar</a>
            <a class="nav-item nav-link" href="home.php?tgt=login">Masuk</a>
          </div>
        </div>
      </div>
    </nav>
      <div class="jumbotron jumbotron-fluid bg-primary text-white text-center" style="background:linear-gradient(245deg, #242348 0%, #5a55aa);
      background-color:#184e8e;">
        <div class="container">
        <h1 class="display-4">Manajemen Keuangan</h1>
        <h2 class="display-7">Aplikasi Kelola keuangan Keluarga</h2>
        <p class="lead d-none d-sm-block">Bukan hanya bisnis yang memerlukan perencanaan yang matang, keuangan juga membutuhkan perencanaan. Dengan memiliki rencana keuangan, Anda dapat lebih mudah mengelola dan menjaga keuangan dalam menjalankan keluarga. Untuk itu, Anda harus memiliki laporan keuangan yang jelas dan akurat, sehingga dapat menghindari terjadinya risiko kerugian. Sebuah rencana keuangan yang sederhana seperti membuat arus kas yang terperinci juga dapat membantu Anda mengetahui kondisi keuangan yang sedang Anda jalankan
        </p>
        </div>
      </div>
      <div class="container text-muted">
        <div class="row">
          <div class="col-md-8 col-lg-4">
            <div class="card">
              <img src="img/easy.png" class="card-img-top img-fluid"/>
              <div class="card-body">
                <h3 class="card-title">Mudah Digunakan</h3>
                <p class="card-text">Aplikasi ini dirancang untuk memudahkan pengguna dalam pengoperasian aplikasi dikehidupan sehari hari</p>
              </div>
            </div>
          </div>
        <div class="col-md-8 col-lg-4">
          <div class="card">
            <img src="img/responsive.png" class="card-img-top img-fluid"/>
            <div class="card-body">
              <h3 class="card-title">Responsif</h3>
              <p class="card-text">Aplikasi ini dirancang untuk tampil dalam segala jenis ukuran layar dan perangkat pengguna dikehidupan sehari hari</p>
            </div>
          </div>
        </div>
        <div class="col-md-8 col-lg-4">
          <div class="card">
            <img src="img/stats.png" class="card-img-top img-fluid"/>
            <div class="card-body">
              <h3 class="card-title">Stat mengagumkan</h3>
              <p class="card-text">aplikasi ini dirancang menampilkan statistik dengan tampilan yang mengagumkan dan tidak membosankan</p>
            </div>
          </div>
        </div>
        </div>
      </div>
      <div class="container">
        <h2 class="display-4 text-center py-5 my-4" id="mainDaftar">Daftar Sekarang</h2>
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <div class="card card-outline-secondary">
              <div class="card-body">
                <form class="form" action="" method="post" name="reg">
                <div class="form-group">
                  <label for="fullname">Nama Lengkap</label>
                  <input class="form-control" type="text" id="fullname" name="name" placeholder="Nama Lengkap" required />
                </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input class="form-control" type="text" id="username" name="username" placeholder="Username" required />
                </div>
                <div class="form-group">
                  <label for="username">Email</label>
                  <input class="form-control" type="email" id="emailinput" name="email" placeholder="Email" required />
                </div>
                <div class="form-group">
                  <label for="username">Kata Sandi</label>
                  <input class="form-control" type="password" id="password" name="password" placeholder="Kata Sandi" required />
                </div>
                <div class="form-group">
                  <label for="username">Konfirmasi Kata Sandi</label>
                  <input class="form-control" type="password" id="confirm_password" name="password2" placeholder="Konfirmasi Kata Sandi" required />
                </div>
                <div class="form-group">
                  <input class="btn btn-success btn-lg float-right" type="submit" name="submit" value="Daftar" onclick="return(submitreg());">
                </div>
                <p>Sudah punya<a href="login.php"> Akun?!<a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br><br><br><br><br>
      <nav class="navbar navbar-expand-sm navbar-dark bg-primary" style="background:linear-gradient(245deg, #242348 0%, #5a55aa);
background-color:#184e8e;">
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"s crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
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
