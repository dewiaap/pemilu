<!-- <html>
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
</html> -->
<div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                        Data Admin
                        </h1>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <a class="btn btn-success float-right" href="<?=base_url()?>pemilwa/viewaddadmin">Tambah Admin</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        <th>Nama Admin</th>
    <th>Username</th>
    <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($admin as $a){?>
    <tr>
    <td><?= $a->nama_admin?></td>
    <td><?= $a->username?></td>
    <td>
    <a data-placement="bottom" class="btn btn-warning" rel="tooltip" title="Edit" href="<?= base_url();?>pemilwa/viewupdateadmin/<?= $a->id_admin?>"><i class="fa fa-pencil"></i></a>
		<a data-placement="bottom" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus?')" href="<?= base_url();?>pemilwa/deleteadmin/<?= $a->id_admin?>" rel="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
    </td>
    </tr>
    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
				<footer><p>All right reserved. Template by: <a href="<?=base_url();?>http://webthemez.com">WebThemez</a></p></footer>
</div>
<script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>