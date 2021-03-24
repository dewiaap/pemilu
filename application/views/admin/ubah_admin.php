<html>
<head>
<title></title>
<link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css">

</head>
    <body class="d-flex flex-column h-100">
    <!-- Page Content -->
<main role="main" class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Update Data Admin</h1>
    <p class="lead">Silahkan Daftarkan Identitas Anda</p>
    <hr/>
    <form action="<?=base_url()?>pemilwa/updateadmin" method="post">
    <div class="form-group row">
      <label for="nama_admin" class="col-sm-2 col-form-label">Nama Admin</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nama_admin" name="nama_admin" placeholder="Masukkan Nama Admin" value="<?=$admin->nama_admin?>" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="username" class="col-sm-2 col-form-label">Username</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" value="<?=$admin->username?>" required>
      </div>
    </div>
  <div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="hidden" name="id_admin" value="<?=$admin->id_admin?>" required   >
      <input type="password" class="form-control" name="password" placeholder="Masukkan Password" id="password" disabled required>
      <input type="checkbox" id="cek-pass">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
    </div>
  </div>
</form>
  </div>
</main>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$('#cek-pass').on('click', ()=>{
        if($('#cek-pass').is(':checked')) $("#password").prop('disabled', false);
        else $("#password").prop('disabled', true);
    })
</script>
</html>
