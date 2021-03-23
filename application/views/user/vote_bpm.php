<html>

<head>
    <title></title>
</head>

<body>
    <h2>Paslon BEM</h2>
    <?php
    echo '<ul>';
	<form method="post" action="<?= base_url() ?>pemilwa/vote_bpm">
    foreach ($bem as $b) { ?>
        <li>
            <img src="<?= base_url() ?>/assets/image/bpm/<?= $b->gambar ?>"></td>
            <?= $b->nama_lengkap ?></td>        
            <?= $prodi[$b->id_prodi - 1]->prodi ?></td>
            <!-- kalo bisa dibuat drop down untuk visi misi, kalo nggak ya dihapus gakpapa atau gimana -->
            <?= $b->visi ?></td>
            <?= $b->misi ?></td>
            <input type="radio" name="dipilih" value="<?= $b->no_urut ?>">
        </li>
    <?php } ?>
		<input type="submit" name="dipilih">Pilih
    </form>
    </ul>


</body>

</html>
