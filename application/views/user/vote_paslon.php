<html>

<head>
    <title></title>
</head>

<body>
    <h2>Paslon BEM</h2>
	<form method="post" action="<?=base_url()?>pemilwa/add_vote_paslon">
    <ul>
    	<?php foreach ($bem as $b) { ?>
        
            <li>
                <img src="<?= base_url() ?>/assets/image/paslon/<?= $b->gambar ?>">
                <p>nama pasangan : <?= $b->nama_pasangan ?></p>
                <p>prodi ketua : <?= $prodi[$b->id_prodi_ketua - 1]->prodi ?> & </p>
                <p>prodi wakil : <?= $prodi[$b->id_prodi_wakil - 1]->prodi ?></p>
                <!-- kalo bisa dibuat drop down untuk visi misi, kalo nggak ya dihapus gakpapa atau gimana -->
                <p>visi : <?= $b->visi ?></p>
                <p>misi : <?= $b->misi ?>
                <br>
                <input type="radio" name="dipilih" value="<?= $b->no_urut ?>">Pilih
            </li>
    	<?php } ?>
		<input type="submit">
        </ul>
	</form>


</body>

</html>
