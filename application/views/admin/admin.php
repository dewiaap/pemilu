<html>
<head>
<title></title>
<link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css">
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
      <li><a href="<?=base_url();?>pemilwa/bpm">Calon BPM</a></li>
      <li class="active"><a href="<?=base_url();?>pemilwa/admin">Admin</a></li>
      <li><a href="<?=base_url();?>pemilwa/logout">Logout</a></li>
    </ul>
  </div>
</nav>
    <h3>Data Admin</h3>
    <a href="<?=base_url()?>pemilwa/viewaddadmin"><button>tambah</button></a>
    <br>
    <?php if ($this->session->flashdata('pesan')!=null): ?>
	<div class="alert" role="alert" style="display:none;"><?= $this->session->flashdata('pesan');?></div>
	<?php endif?>
    <table border="1">
    <tr>
    <th>Nama Admin</th>
    <th>Username</th>
    <th>Aksi</th>
    </tr>
    <?php foreach($admin as $a){?>
    <tr>
    <td><?= $a->nama_admin?></td>
    <td><?= $a->username?></td>
    <td><a href="<?=base_url()?>pemilwa/deleteadmin/<?= $a->id_admin?>"><button>hapus</button></a> | <a href="<?=base_url()?>/pemilwa/viewupdateadmin/<?= $a->id_admin?>"><button>update</button></a></td>
    </tr>
    <?php }?>
    </table>
</body>
</html>