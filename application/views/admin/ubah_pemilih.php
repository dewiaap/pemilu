<html>
<head>
<title></title>
</head>
<body>
    <h1>Ubah Pemilih</h1>
    <form action="<?=base_url()?>pemilwa/updatepemilih" method="post" enctype="multipart/form-data">
    <label for="nim">NIM</label>
    <input type="text" name="nim" id="nim" value="<?=$pemilih->nim?>" readonly="readonly">
    <br><label for="password">Password</label>
    <input type="password" name="password" id="password" disabled>
    <input type="checkbox" id="cek-pass">
    <br><label for="nama_lengkap">Nama Lengkap</label>
    <input type="text" name="nama_lengkap" id="nama_lengkap" value="<?=$pemilih->nama_lengkap?>">
    <br><label for="id_prodi">Prodi</label>
    <select name="id_prodi" id="id_prodi">
    <?php foreach($prodi as $p){?>
    <option value="<?=$p->id_prodi?>"<?php if($p->id_prodi == $pemilih->id_prodi){echo "selected";}?>><?=$p->prodi?></option>
    <?php } ?>
    </select>
    <br><label for="angkatan">Angkatan</label>
    <input type="text" name="angkatan" id="angkatan" value="<?=$pemilih->angkatan?>">
    <br><input type="submit" value="Simpan">
    </form>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$('#cek-pass').on('click', ()=>{
        if($('#cek-pass').is(':checked')) $("#password").prop('disabled', false);
        else $("#password").prop('disabled', true);
    })
</script>
</html>