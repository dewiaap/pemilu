<html>
<head>
<title></title>
</head>
<body>
    <h1>Admin</h1>
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