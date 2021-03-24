<html>
<head>
<title></title>
<link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Pemilwa 2021</a>
    </div>
    <ul class="nav navbar-nav">
        <li class="active"><a href="<?=base_url();?>pemilwa">Home</a></li>
        <li><a href="<?=base_url();?>pemilwa/vote_paslon">Voting</a></li>
      <li><a href="<?=base_url();?>pemilwa/logout">logout</a></li>
    </ul>
  </div>
</nav>
    <h1>Selamat Datang di Website Pemilwa 2021</h1>
    <h2>Yuk, lihat para calon pemimpin filkom!</h2>
    <h3>Paslon BEM</h3>
    <?php 
        foreach($bem as $b){?>
        <p>nama pasangan : <?= $b->nama_pasangan?></p>
		<p>nim ketua : <?= $b->nim_ketua?></p>
		<p>nim wakil : <?= $b->nim_wakil?></p>
		<p>prodi ketua : <?= $prodi[$b->id_prodi_ketua-1]->prodi?></p>
		<p>prodi wakil : <?= $prodi[$b->id_prodi_wakil-1]->prodi?></p>
		<img src="<?=base_url()?>/assets/image/paslon/<?=$b->gambar?>">
        <p>visi : <?= $b->visi?></p>
        <p>misi : <?= $b->misi?><p>
        <?php }?>
    
        <h3>Calon BPM</h3>
    <?php 
        foreach($bpm as $b){?>
        <p>nama lengkap : <?= $b->nama_lengkap?></p>
		<p>nim : <?= $b->nim?></p>
		<p>prodi : <?= $prodi[$b->id_prodi-1]->prodi?></p>
		<img src="<?=base_url()?>/assets/image/bpm/<?=$b->gambar?>">
        <p>visi : <?= $b->visi?></p>
        <p>misi : <?= $b->misi?><p>
        <?php }?>
</body>
</html>