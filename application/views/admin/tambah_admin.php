<html>
<head>
<style>

</style>

<title></title>
<link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css">
<link rel="icon" href="<?=base_url()?>assets/image/poros1.png">
</head>
    <body class="d-flex flex-column h-100">
    <!-- Page Content -->
<main role="main" class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Tambah Admin</h1>
    <p class="lead">Silahkan Daftarkan Identitas Anda</p>
    <hr/>
    <form action="<?=base_url()?>pemilwa/addadmin" method="post">
    <div class="form-group row">
      <label for="username" class="col-sm-2 col-form-label">Username</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
      </div>
    </div>
     <div class="form-group row">
      <label for="nama" class="col-sm-2 col-form-label">Nama</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nama_admin" name="nama_admin" placeholder="Masukkan Nama" required>
      </div>
    </div>
  <div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <a href="<?=base_url()?>pemilwa/logout" class="btn btn-success">Login</a>
      <button type="submit" class="btn btn-primary" name="register">Register</button>
    </div>
  </div>
</form>
  </div>
</main>
<footer class="footer mt-auto py-3">
  <div class="container">

  </div>
</footer>
</body>

</html>
