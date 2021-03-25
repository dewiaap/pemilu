<html>
<head>
<title></title>
<link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css">

</head>
    <body class="d-flex flex-column h-100">
    <!-- Page Content -->
<main role="main" class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Update Data Calon BPM</h1>
    <p class="lead">Silahkan Daftarkan Identitas Anda</p>
    <hr/>
    <form action="<?=base_url()?>pemilwa/updatebpm" method="post" enctype="multipart/form-data">
    <div class="form-group row">
    <input type="hidden" name="no_urut" value=<?=$calon->no_urut?>>
    </div>
    <div class="form-group row">
      <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
      <div class="col-sm-10">
        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Masukkan Nama Lengkap" value=<?=$calon->nama_lengkap?> required>
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
      <label for="nim" class="col-sm-2 col-form-label">NIM</label>
      <div class="col-sm-10">
        <input type="text" name="nim" id="nim" class="form-control" placeholder="NIM" value=<?=$calon->nim?> required> 
      </div>
    </div>
    <div class="form-group row">
      <label for="id_prodi" class="col-sm-2 col-form-label">Prodi</label>
      <div class="col-sm-10">
      <select name="id_prodi" id="id_prodi" class="form-control">
        <?php foreach($prodi as $p){?>
        <option value="<?=$p->id_prodi?>"<?php if($p->id_prodi == $calon->id_prodi){echo "selected";}?>><?=$p->prodi?></option>
        <?php } ?>
      </select>
      </div>
    </div>
    <hr/>
    <div class="form-group row">
    <label for="visi" class="col-sm-2 col-form-label">Visi</label>
    <div class="col-sm-10">
    <textarea name="visi" id="visi" cols="130" rows="10" required><?=$calon->visi?></textarea>
    </div>
  </div>
  <hr/>
  <div class="form-group row">
    <label for="misi" class="col-sm-2 col-form-label">Misi</label>
    <div class="col-sm-10">
    <textarea name="misi" id="misi" cols="130" rows="10" required><?=$calon->misi?></textarea>
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
