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
<div id="kontainer">
    <div class="row">
      <div class="col-sm-12 text-center" id="TempatTulisan">
        <h1 id="Selamat"><img class="hidden-xs hidden-sm" src="<?=base_url()?>assets/image/poros1.png">Selamat Datang di Website Pemilwa 2021<img class="hidden-xs hidden-sm" src="<?=base_url()?>assets/image/ub1.png"></h1>
        <h4 id="Tulisan">"Silahkan Tentukan Pilihan Anda!"</h4>
      </div>
    </div>

    <div class="container">
      <h3>Pasangan Calon BEM</h3>
      <form method="post" action="<?=base_url()?>pemilwa/add_vote_paslon">

      <?php foreach ($bem as $b) { ?>
        <div class="box" id="databem">
          <div class="row">
          <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0">
            <img src="<?= base_url() ?>/assets/image/paslon/<?= $b->gambar ?>">
            
            <h5 id="pasangan"> <?= $b->nama_pasangan ?></h5>
            <p id="prodi"> <?= $prodi[$b->id_prodi_ketua - 1]->prodi ?> & <?= $prodi[$b->id_prodi_wakil - 1]->prodi ?></p>

            <h5 id="pasangan">Visi</h5>
            <p><?= $b->visi?></p>

            <h5 id="pasangan">Misi</h5>
            <p><?= $b->misi?></p>

            <input type="radio" name="dipilih" value="<?= $b->no_urut ?>" required>
          </div>
        </div>
        </div>
      <?php }?>

      <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-7 col-sm-offset-3 column">
        <button class="btn btn-primary" type="submit" id="submit" name="Vote">Vote!</button> 
      </div>
    </form>
  </div>
</body>

</html>

