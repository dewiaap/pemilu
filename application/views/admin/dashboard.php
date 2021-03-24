<html>
<head>
<title></title>
</head>
<link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css">
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Admin Pemilwa 2021</a>
    </div>
    <ul class="nav navbar-nav">
    <li class="active"><a href="<?=base_url();?>pemilwa/dashboard">Dashboard</a></li>
      <li><a href="<?=base_url();?>pemilwa/pemilih">Pemilih</a></li>
      <li><a href="<?=base_url();?>pemilwa/paslon">Paslon BEM</a></li>
      <li><a href="<?=base_url();?>pemilwa/bpm">Calon BPM</a></li>
      <li><a href="<?=base_url();?>pemilwa/admin">Admin</a></li>
      <li><a href="<?=base_url();?>pemilwa/logout">logout</a></li>
    </ul>
  </div>
</nav>
    <h2>Selamat Datang di Web Administrator Pemilwa 2021</h2>
    <!-- yang dibawah ini jadiin card ya rum -->
    <p>Total Mahasiswa : <?= $pemilih_all?></p>
    <p>Total Suara digunakan :<?= $pemilih_done?></p>
    <p>Total Suara digunakan Berdasar prodi:</p>
    <?php for($i=0;$i<count($prodi);$i++){?>
    <p><?= $nama_prodi[$i]?> : <?= $prodi[$i]?></p>
    <?php }?>
    <p>Total Perolehan Suara Paslon:</p>
    <?php for($i=0;$i<count($paslon);$i++){?>
    <p><?= $nama_paslon[$i]?> : <?= $paslon[$i]?></p>
    <?php }?>
    <p>Total Perolehan Suara Calon BPM:</p>
    <?php for($i=0;$i<count($bpm);$i++){?>
    <p><?= $nama_bpm[$i]?> : <?= $bpm[$i]?></p>
    <?php }?>
</body>
</html>