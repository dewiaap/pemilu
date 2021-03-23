<html>

<head>
    <title></title>
</head>

<body>
    <h2>Paslon BEM</h2>
	<form method="post" action="<?= base_url() ?>pemilwa/add_vote_bpm">
    <ul>
    <?php foreach ($bpm as $b) { ?>
        <li>
            <p><img src="<?= base_url() ?>/assets/image/bpm/<?= $b->gambar ?>"></p>
            <p><?= $b->nama_lengkap ?></p>        
            <p><?= $prodi[$b->id_prodi - 1]->prodi ?></p>
            <!-- kalo bisa dibuat drop down untuk visi misi, kalo nggak ya dihapus gakpapa atau gimana -->
            <p><?= $b->visi ?></p>
            <p><?= $b->misi ?></p>
            <input type="radio" name="dipilih" value="<?= $b->no_urut ?>">Pilih
        </li>
    <?php } ?>
		<input type="submit">
        </ul>
    </form>


</body>

</html>
