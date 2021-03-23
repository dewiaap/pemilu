<html>
<head>
<title></title>
</head>
<body>
    <h1>Tambah Paslon</h1>
    <form action="<?=base_url()?>pemilwa/addpaslon" method="post" enctype="multipart/form-data">
    <label for="nama_pasangan">Nama Pasangan</label>
    <input type="text" name="nama_pasangan" id="nama_pasangan">
    <br><label for="gambar">Gambar</label>
    <input type="file" name="gambar" id="gambar">
    <br><label for="nim_ketua">Nim Ketua</label>
    <input type="text" name="nim_ketua" id="nim_ketua" required>
    <br><label for="id_prodi_ketua">Prodi Ketua</label>
    <select name="id_prodi_ketua" id="id_prodi_ketua" required>
    <?php foreach($prodi as $p){?>
    <option value="<?=$p->id_prodi?>"><?=$p->prodi?></option>
    <?php } ?>
    </select>
    <br><label for="nim_wakil">Nim Wakil</label>
    <input type="text" name="nim_wakil" id="nim_wakil" required>
    <br><label for="id_prodi_wakil">Prodi Wakil</label>
    <select name="id_prodi_wakil" id="id_prodi_wakil" required>
    <?php foreach($prodi as $p){?>
    <option value="<?=$p->id_prodi?>"><?=$p->prodi?></option>
    <?php } ?>
    </select>
    <br><label for="visi">Visi</label>
    <textarea name="visi" id="visi" cols="30" rows="10" required></textarea>
    <br><label for="misi">Misi</label>
    <textarea name="misi" id="misi" cols="30" rows="10" required></textarea>
    <br><input type="submit" value="Simpan">
    </form>
</body>
</html>