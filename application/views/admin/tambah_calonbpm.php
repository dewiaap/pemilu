<html>
<head>
<title></title>
</head>
<body>
    <h1>Tambah Calon BPM</h1>
    <form action="<?=base_url()?>pemilwa/addbpm" method="post" enctype="multipart/form-data">
    <label for="nama_lengkap">Nama Lengkap</label>
    <input type="text" name="nama_lengkap" id="nama_lengkap">
    <br><label for="gambar">Gambar</label>
    <input type="file" name="gambar" id="gambar">
    <br><label for="nim">Nim</label>
    <input type="text" name="nim" id="nim">
    <br><label for="id_prodi">Prodi</label>
    <select name="id_prodi" id="id_prodi">
    <?php foreach($prodi as $p){?>
    <option value="<?=$p->id_prodi?>"><?=$p->prodi?></option>
    <?php } ?>
    </select>
    <br><label for="visi">Visi</label>
    <textarea name="visi" id="visi" cols="30" rows="10"></textarea>
    <br><label for="misi">Misi</label>
    <textarea name="misi" id="misi" cols="30" rows="10"></textarea>
    <br><input type="submit" value="Simpan">
    </form>
</body>
</html>