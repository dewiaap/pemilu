<html>
<head>
<title></title>
<link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css">

</head>
    <body class="d-flex flex-column h-100">
    <!-- Page Content -->
<main role="main" class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Update Pemilih</h1>
    <p class="lead">Silahkan Daftarkan Identitas Anda</p>
    <hr size="10px">
    <form action="<?=base_url()?>pemilwa/updatepemilih" method="post" enctype="multipart/form-data">
    <div class="form-group row">
      <label for="NIM" class="col-sm-2 col-form-label">NIM</label>
      <div class="col-sm-10">
        <input type="text" name="NIM" id="NIM" class="form-control" value="<?=$pemilih->nim?>" readonly="readonly">
      </div>
    </div>
    <div class="form-group row">
      <label for="password" class="col-sm-2 col-form-label">Password</label>
      <div class="col-sm-10">
        <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password" required disabled> 
        <input type="checkbox" id="cek-pass">
      </div>
    </div>
    <hr/>
    <div class="form-group row">
      <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
      <div class="col-sm-10">
        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Masukkan Nama Lengkap" value="<?=$pemilih->nama_lengkap?>" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="id_prodi" class="col-sm-2 col-form-label">Prodi</label>
      <div class="col-sm-10">
      <select name="id_prodi" id="id_prodi">
        <?php foreach($prodi as $p){?>
        <option value="<?=$p->id_prodi?>"<?php if($p->id_prodi == $pemilih->id_prodi){echo "selected";}?>><?=$p->prodi?></option>
        <?php } ?>
      </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="angkatan" class="col-sm-2 col-form-label">Angkatan</label>
      <div class="col-sm-10">
        <input type="text" name="angkatan" id="angkatan" class="form-control" placeholder="Masukkan Tahun Angkatan" value="<?=$pemilih->angkatan?>" required>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$('#cek-pass').on('click', ()=>{
        if($('#cek-pass').is(':checked')) $("#password").prop('disabled', false);
        else $("#password").prop('disabled', true);
    })
</script>
</html>
