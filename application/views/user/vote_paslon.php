<html>
<head>
    <title></title>
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/style.css">

    <style type="text/css">
      body{
        background-image:url('<?=base_url();?>assets/image/Astronomy.jpg');
      }
    </style>
  </head>


<body>
<!-- <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Pemilwa 2021</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="<?=base_url();?>pemilwa">Home</a></li>
        <li class="active"><a href="<?=base_url();?>pemilwa/vote_paslon">Voting</a></li>
      <li><a href="<?=base_url();?>pemilwa/logout">logout</a></li>
    </ul>
  </div>
</nav> -->
<div id="kontainer">
        <div class="row">
            <div class="col-sm-12 text-center" id="TempatTulisan">
                <h1 id="Selamat"><img class="hidden-xs hidden-sm" src="assets/image/poros1.png">Selamat Datang di Website Pemilwa 2021<img class="hidden-xs hidden-sm" src="assets/image/ub1.png"></h1>
                <h4 id="Tulisan">"Silahkan Tentukan Pilihan Anda!"</h4></div>
        </div>

<div class="container">
<h3>Pasangan Calon BEM</h3>
<form method="post" action="<?=base_url()?>pemilwa/add_vote_paslon">
<div class="box" id="databem">
      
<div class="row">
<?php foreach ($bem as $b) { ?>
              <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
              <img src="<?= base_url() ?>/assets/image/paslon/<?= $b->gambar ?>">
              </div>
              <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 column">
                <h5 id="pasangan"> <?= $b->nama_pasangan ?></h5>
              </div>
              <div class="col-lg-11 col-lg-offset-1 col-md-6 col-md-offset-3 col-sm-7 col-sm-offset-3 column">
                  <p id="prodi"> <?= $prodi[$b->id_prodi_ketua - 1]->prodi ?> & <?= $prodi[$b->id_prodi_wakil - 1]->prodi ?></p>
              </div>
          </div>		
        <h5 id="pasangan">Visi</h5>
        <p><?= $b->visi?></p>
        <h5 id="pasangan">Misi</h5>
        <p><?= $b->misi?></p>
        <?php }?>
              <div>
                <input type="radio" name="dipilih" value="<?= $b->no_urut ?>" required>
              
              </div>
</div>

<div class="box" id="databem">
      
<div class="row">
<?php foreach ($bem as $b) { ?>
              <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
              <img src="<?= base_url() ?>/assets/image/paslon/<?= $b->gambar ?>">
              </div>
              <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 column">
                <h5 id="pasangan"> <?= $b->nama_pasangan ?></h5>
              </div>
              <div class="col-lg-11 col-lg-offset-1 col-md-6 col-md-offset-3 col-sm-7 col-sm-offset-3 column">
                  <p id="prodi"><?= $prodi[$b->id_prodi_ketua - 1]->prodi ?> & <?= $prodi[$b->id_prodi_wakil - 1]->prodi ?></p>
              </div>
              <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-7 col-sm-offset-3 column">
              </div>
          </div>		
        <h5 id="pasangan">Visi</h5>
        <p><?= $b->visi?></p>
        <h5 id="pasangan">Misi</h5>
        <p><?= $b->misi?></p>
        <?php }?>
              <div>
                <input type="radio" name="dipilih" value="<?= $b->no_urut ?>" required>
              </div>
</div>

<div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-7 col-sm-offset-3 column">
  <button class="btn btn-primary" type="submit" id="submit" name="Vote">Vote!</button> 
</div>
</form>
</div>
</body>

</html>

