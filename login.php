<?php 
  session_start();
  include_once 'php/class.child.php';
  $user = new Control();
  if ($user->get_session())
  {
    header("location:akun.php");
  }
  if (isset($_POST['submit']))
  { 
	 	extract($_POST);   
	  $login = $user->check_login($emailusername, $password);
	  if ($login) 
    {
	    // Login Berhasil
	    header("location:akun.php");
	  }
    else
    {
	    // Login Gagal
	    echo 'Username atau Password salah';
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
    @media (min-width: 768px) {
    .h-md-100 { height: 100vh; }
    }
    .btn-round { border-radius: 30px; }
    .bg-indigo { background: indigo; }
    .text-cyan { color: #35bdff; }
    </style>
<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-primary" style="background:linear-gradient(245deg, #242348 0%, #5a55aa);
  background-color:#184e8e">
    <div class="container">
      <button class="navbar-toggler" data-toggle="collapse" data-target="#mainNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mainNav">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="home.php?tgt=home">Home</a>
          <a class="nav-item nav-link active" href="#">Masuk</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="d-md-flex h-md-100 align -items-center">

<!-- First Half -->

<div class="col-md-6 p-0 h-md-100" style="background:linear-gradient(245deg, #242348 0%, #5a55aa);
background-color:#184e8e;">
    <div class="text-white d-md-flex align-items-center h-100 p-5 text-center justify-content-center d-none d-sm-block">
        <div class="logoarea pt-5 pb-5">
          <blockquote class="blockquote">
          <p class="mb-0">Hati-hatilah dengan pengeluaran kecil. Keretakan kecil dapat menenggelamkan kapal besar.</p>
          <footer class="blockquote-footer">Benjamin Franklin</footer>
        </blockquote>
        </div>
    </div>
</div>

<!-- Second Half -->

<div class="col-md-6 p-0 bg-white h-md-100 loginarea">
    <div class="d-md-flex align-items-center h-md-100 p-5 justify-content-center">
      <div class="col-md-6">
        <h1 class="display-4 txt-center">Halaman Masuk</h1>
        <p class="lead d-none d-sm-block" style="text-align: center;">Selamat datang silahkan masuk</p>
        <div class="card card-outline-secondary">
        <h4 class="card-header">Masuk</h1>
        <div class="card-body">
      <form class="form" action="" method="post" name="login">
      <div class="form-group">
        <label for="username">Email atau Username</label>
        <input class="form-control" type="text" id="emailusername" name="emailusername" placeholder="Email atau Username" />
      </div>
      <div class="form-group">
        <label for="username">Kata Sandi</label>
        <input class="form-control" type="password" id="password" name="password" placeholder="Kata Sandi"  />
      </div>
      <div class="form-group">
        <input class="btn btn-success btn-lg float-right" type="submit" name="submit" value="Masuk" onclick="return(submitlogin());">
      </div>
      <a href="home.php?tgt=reset">Lupa password<a>
    </form>
    </div>
    </div>
    </div>
</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script>
      function submitlogin() {
        var form = document.login;
        if (form.emailusername.value == "") {
          alert("Masukkan Email atau Username.");
          return false;
        } else if (form.password.value == "") {
          alert("Masukkan Password.");
          return false;
        }
      }
    </script>
  </body>
</html>
