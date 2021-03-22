<html>
<head>
<title></title>
</head>
<body>
    <h1>Tambah Pemilih</h1>
    <form action="<?=base_url()?>pemilwa/addpemilih" method="post" enctype="multipart/form-data">
    <label for="nim">NIM</label>
    <input type="text" name="nim" id="nim">
    <br><label for="password">Password</label>
    <input type="password" name="password" id="password">
    <br><label for="nama_lengkap">Nama Lengkap</label>
    <input type="text" name="nama_lengkap" id="nama_lengkap">
    <br><label for="id_prodi">Prodi</label>
    <select name="id_prodi" id="id_prodi">
    <?php foreach($prodi as $p){?>
    <option value="<?=$p->id_prodi?>"><?=$p->prodi?></option>
    <?php } ?>
    </select>
    <br><label for="angkatan">Angkatan</label>
    <input type="text" name="angkatan" id="angkatan">
    <br><input type="submit" value="Simpan">
    </form>
</body>
</html>