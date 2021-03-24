<html>
<head>
<title></title>
</head><link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css">
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Admin Pemilwa 2021</a>
    </div>
    <ul class="nav navbar-nav">
    <li><a href="<?=base_url();?>pemilwa/dashboard">Dashboard</a></li>
      <li><a href="<?=base_url();?>pemilwa/pemilih">Pemilih</a></li>
      <li><a href="<?=base_url();?>pemilwa/paslon">Paslon BEM</a></li>
      <li class="active"><a href="<?=base_url();?>pemilwa/bpm">Calon BPM</a></li>
      <li><a href="<?=base_url();?>pemilwa/admin">Admin</a></li>
      <li><a href="<?=base_url();?>pemilwa/logout">logout</a></li>
    </ul>
  </div>
</nav>
    <h3>Data Calon BPM</h3>
    <a href="<?=base_url()?>pemilwa/viewaddbpm"><button>tambah</button></a>
    <br>
    <?php if ($this->session->flashdata('bpm')!=null): ?>
	<div class="alert"><?= $this->session->flashdata('bpm');?></div>
	<?php endif?>
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