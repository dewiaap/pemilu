<html>

<head>
    <title></title>
</head>

<body>
    <h2>Paslon BEM</h2>
    <?php
    echo '<ul>';
    foreach ($bem as $b) { ?>
            <li>
                <img src="<?= base_url() ?>/assets/image/paslon/<?= $b->gambar ?>">
                <p>nama pasangan : <?= $b->nama_pasangan ?></p>
                <p>prodi ketua : <?= $prodi[$b->id_prodi_ketua - 1]->prodi ?> & </p>
                <p>prodi wakil : <?= $prodi[$b->id_prodi_wakil - 1]->prodi ?></p>
                <!-- kalo bisa dibuat drop down untuk visi misi, kalo nggak ya dihapus gakpapa atau gimana -->
                <p>visi : <?= $b->visi ?></p>
                <p>misi : <?= $b->misi ?>
                <form method="post" action="<?=base_url()?>pemilwa/vote_paslon">
                    <input type="radio" name="dipilih" value="<?= $b->no_urut ?>">
                    <input type="submit" name="dipilih">Pilih
                </form>
                <p>
            </li>
    <?php } ?>
    </ul>


</body>

</html>