<html>
<head>
<title></title>
</head>
<body>
    <h1>Paslon</h1>
    <a href="<?=base_url()?>pemilwa/viewaddpaslon"><button>tambah</button></a>
    <br>
    <?php if ($this->session->flashdata('paslon')!=null): ?>
	<div class="alert"><?= $this->session->flashdata('paslon');?></div>
	<?php endif?>
    <table border="1">
    <tr>
    <th>Nama Pasangan</th>
    <th>Gambar</td>
    <th>Nim Ketua</th>
    <th>Prodi Ketua</th>
    <th>Nim Wakil</th>
    <th>Prodi Wakil</th>
    <th>Visi</th>
    <th>Misi</th>
    <th>Aksi</th>
    </tr>
    <?php foreach($bem as $b){?>
    <tr>
    <td><?= $b->nama_pasangan?></td>
    <td><img src="<?=base_url()?>/assets/image/paslon/<?=strtolower($b->gambar)?>"></td>
	<td><?= $b->nim_ketua?></td>
    <td><?= $prodi[$b->id_prodi_ketua-1]->prodi?></td>
	<td><?= $b->nim_wakil?></td>
	<td><?= $prodi[$b->id_prodi_wakil-1]->prodi?></td>
    <td><?= $b->visi?></td>
    <td><?= $b->misi?></td>
    <td><a href="<?=base_url()?>pemilwa/deletepaslon/<?= $b->no_urut?>"><button>hapus</button></a> | <a href="<?=base_url()?>/pemilwa/viewupdatepaslon/<?= $b->no_urut?>"><button>update</button></a></td>
    </tr>
    <?php }?>
    </table>
</body>
</html>