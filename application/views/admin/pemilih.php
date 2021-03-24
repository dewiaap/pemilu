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
      <li class="active"><a href="<?=base_url();?>pemilwa/pemilih">Pemilih</a></li>
      <li><a href="<?=base_url();?>pemilwa/paslon">Paslon BEM</a></li>
      <li><a href="<?=base_url();?>pemilwa/bpm">Calon BPM</a></li>
      <li><a href="<?=base_url();?>pemilwa/admin">Admin</a></li>
      <li><a href="<?=base_url();?>pemilwa/logout">logout</a></li>
    </ul>
  </div>
</nav>
    <h3>Data Pemilih</h3>
    <a href="<?=base_url()?>pemilwa/viewaddpemilih"><button>tambah</button></a>
    <br>
    <?php if ($this->session->flashdata('pemilih')!=null): ?>
	<div class="alert"><?= $this->session->flashdata('pemilih');?></div>
	<?php endif?>
    <table border="1">
    <tr>
    <th>Nama Lengkap</th>
    <th>Nim</th>
    <th>Prodi</th>
    <th>Angkatan</th>
    <th>Status</th>
    <th>Aksi</th>
    </tr>
    <?php foreach($pemilih as $p){?>
    <tr>
    <td><?= $p->nama_lengkap?></td>
	<td><?= $p->nim?></td>
    <td><?= $prodi[$p->id_prodi-1]->prodi?></td>
    <td><?= $p->angkatan?></td>
    <td><?php if($p->no_pilihan_pasangan==null&&$p->no_pilihan_bpm==null){echo "belum memilih";}else{echo "sudah memilih";}?></td>
    <td><a href="<?=base_url()?>pemilwa/deletepemilih/<?= $p->nim?>"><button>hapus</button></a> | <a href="<?=base_url()?>/pemilwa/viewupdatepemilih/<?= $p->nim?>"><button>update</button></a></td>
    </tr>
    <?php }?>
    </table>
</body>
</html>