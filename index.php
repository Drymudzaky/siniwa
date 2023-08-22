<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Login Sistem Informasi Nilai">
  <meta name="author" content="">
  <meta name="keyword" content="">

  <title>SIM-KSK | Sistem Informasi Manajemen Klinik Spesialis Kompetensi</title>

  <!-- pemanggilan direktory file bootstrap.css -->
  <link href="admin/assets/css/bootstrap.css" rel="stylesheet">
  <!-- pemanggilan direktory file css font-->
  <link href="admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

  <!-- pemanggilan direktori file css custom template -->
  <link href="admin/assets/css/style.css" rel="stylesheet">
  <link href="admin/assets/css/style-responsive.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style>
    body {
      background-image: url(bgsiswa.jpg);
    }
  </style>
</head>

<body>

  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

  <div id="login-page">
    <div class="container">

      <form class="form-login" method="post" action="proseslogin.php">
        <h2 class="form-login-heading"> <span class="glyphicon glyphicon-lock"></span> LOGIN ADMIN</h2>
        <center>
          <h5> <span class="glyphicon glyphicon-qrcode"></span> Sistem Informasi Manajemen KSK (SIM-KSK) <span class="glyphicon glyphicon-qrcode"></span></h5>
        </center>
        <div class="login-wrap">
          <input name="username" id="username" type="input" class="form-control" autocomplete="off" placeholder="Username" required autofocus>
          <br />
          <input name="password" id="password" type="password" class="form-control" autocomplete="off" placeholder="Password" required>
          <br />
          <button class="btn btn-lg btn-info btn-block" type="submit">Sign in</button>


          <hr>
          <div class="login-social-link centered">
            <p>atau login sebagai </p>
            <a href="login.html" class="btn btn-success" type="submit"><i class="fa fa-user"></i> Mahasiswa</a>
            <a href="login-guru.php" class="btn btn-warning" type="submit"><i class="fa fa-user"></i> Dosen</a>
          </div>
          <div class="registration">
            <a href="regist.php" type="submit">Registrasi Terlebih Dahulu</a><br>
            <a href="lupa-password.php" type="submit">Lupa Password</a><br>
            <a class="" href="http://www.piksi.ac.id">
              Copyright &copy; 2023 POLITEKNIK PIKSI GANESHA
            </a>
            <br>
            <center>
              <p>Repost by <a href="https://piksi.ac.id/" title="piksi.ac.id" target="_blank">Piksi.ac.id</a></p>
            </center>
          </div>

        </div>

      </form>

    </div>
  </div>

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="admin/assets/js/jquery.js"></script>
  <script src="admin/assets/js/bootstrap.min.js"></script>

  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="admin/assets/js/jquery.backstretch.min.js"></script>
  <!-- Pemanggilan Background Login Form-->
  <script>
    $.backstretch("bgsiswa.jpg", {
      speed: 500
    });
  </script>


</body>

</html>