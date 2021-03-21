<html>
<head>
<title></title>
</head>
<body>
    <h1>Paslon</h1>
    <a href="<?=base_url()?>pemilwa/viewaddbpm"><button>tambah</button></a>
    <table border="1">
    <tr>
    <th>Nama Lengkap</th>
    <th>Gambar</td>
    <th>Nim</th>
    <th>Prodi</th>
    <th>Visi</th>
    <th>Misi</th>
    <th>Aksi</th>
    </tr>
    <?php foreach($bpm as $b){?>
    <tr>
    <td><?= $b->nama_lengkap?></td>
    <td><img src="<?=base_url()?>/assets/image/bpm/<?=$b->gambar?>"></td>
	<td><?= $b->nim?></td>
    <td><?= $prodi[$b->id_prodi-1]->prodi?></td>
    <td><?= $b->visi?></td>
    <td><?= $b->misi?></td>
    <td><a href="<?=base_url()?>pemilwa/deletebpm/<?= $b->no_urut?>"><button>hapus</button></a> | <a href="<?=base_url()?>/pemilwa/viewupdatebpm/<?= $b->no_urut?>"><button>update</button></a></td>
    </tr>
    <?php }?>
    </table>
</body>
</html>