<html>
<head>
<title></title>
</head>
<body>
    <h1>Pemilwa</h1>
    <h2>Paslon BEM</h2>
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
    
        <h2>Calon BPM</h2>
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