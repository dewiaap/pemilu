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
    <h1 class="mt-5">Tambah Paslon</h1>
    <p class="lead">Silahkan Daftarkan Identitas Anda</p>
    <hr/>
    <form action="<?=base_url()?>pemilwa/addpaslon" method="post" enctype="multipart/form-data">
    <div class="form-group row">
      <label for="nama_pasangan" class="col-sm-2 col-form-label">Nama Pasangan</label>
      <div class="col-sm-10">
        <input type="text" name="nama_pasangan" id="nama_pasangan" class="form-control" placeholder="Masukkan Nama" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
      <div class="col-sm-10">
        <input type="file" name="gambar" id="gambar">
      </div>
    </div>
    <hr/>
    <div class="form-group row">
      <label for="nim_ketua" class="col-sm-2 col-form-label">NIM Ketua</label>
      <div class="col-sm-10">
        <input type="text" name="nim_ketua" id="nim_ketua" class="form-control" placeholder="Masukkan NIM Ketua" required> 
      </div>
    </div>
    <div class="form-group row">
      <label for="id_prodi_ketua" class="col-sm-2 col-form-label">Prodi Ketua</label>
      <div class="col-sm-10">
        <select name="id_prodi_ketua" id="id_prodi_ketua" required class="form-control">
        <?php foreach($prodi as $p){?>
        <option value="<?=$p->id_prodi?>"><?=$p->prodi?></option>
        <?php } ?>
        </select>
      </div>
    </div>
    <hr/>
    <div class="form-group row">
      <label for="nim_wakil" class="col-sm-2 col-form-label">NIM Wakil</label>
      <div class="col-sm-10">
        <input type="text" name="nim_wakil" id="nim_wakil" class="form-control" placeholder="Masukkan NIM Wakil Ketua" required> 
      </div>
    </div>
    <div class="form-group row">
      <label for="id_prodi_wakil" class="col-sm-2 col-form-label">Prodi Wakil</label>
      <div class="col-sm-10">
        <select name="id_prodi_wakil" id="id_prodi_wakil" required class="form-control">
        <?php foreach($prodi as $p){?>
        <option value="<?=$p->id_prodi?>"><?=$p->prodi?></option>
        <?php } ?>
        </select>
      </div>
    </div>
    <hr/>
    <div class="form-group row">
    <label for="visi" class="col-sm-2 col-form-label">Visi</label>
    <div class="col-sm-10">
    <textarea name="visi" id="visi" cols="130" rows="10" required></textarea>
    </div>
  </div>
  <hr/>
  <div class="form-group row">
    <label for="misi" class="col-sm-2 col-form-label">Misi</label>
    <div class="col-sm-10">
    <textarea name="misi" id="misi" cols="130" rows="10" required></textarea>
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
