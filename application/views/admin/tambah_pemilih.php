<html>
<head>
<style>

</style>

<title></title>
<link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css">

</head>
    <body class="d-flex flex-column h-100">
    <!-- Page Content -->
<main role="main" class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Tambah Pemilih</h1>
    <p class="lead">Silahkan Daftarkan Identitas Anda</p>
    <hr size="10px">
    <form action="<?=base_url()?>pemilwa/addpemilih" method="post" enctype="multipart/form-data">
    <div class="form-group row">
      <label for="NIM" class="col-sm-2 col-form-label">NIM</label>
      <div class="col-sm-10">
        <input type="text" name="NIM" id="NIM" class="form-control" placeholder="Masukkan NIM" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="password" class="col-sm-2 col-form-label">Password</label>
      <div class="col-sm-10">
        <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password" required> 
      </div>
    </div>
    <hr/>
    <div class="form-group row">
      <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
      <div class="col-sm-10">
        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Masukkan Nama Lengkap" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="id_prodi" class="col-sm-2 col-form-label">Prodi</label>
      <div class="col-sm-10">
        <select name="id_prodi" id="id_prodi" required>
        <?php foreach($prodi as $p){?>
        <option value="<?=$p->id_prodi?>"><?=$p->prodi?></option>
        <?php } ?>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="angkatan" class="col-sm-2 col-form-label">Angkatan</label>
      <div class="col-sm-10">
        <input type="text" name="angkatan" id="angkatan" class="form-control" placeholder="Masukkan Tahun Angkatan" required>
      </div>
    </div>
    
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary" name="register">Simpan</button>
    </div>
  </div>
</form>
  </div>
</main>
</body>

</html>
