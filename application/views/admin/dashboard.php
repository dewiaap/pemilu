<html>
<head>
<title></title>
</head>
<body>
    <h1>Dashboard</h1>
    <p>Total Keseluruhan Mahasiswa : <?= $pemilih_all?></p>
    <p>Total Mahasiswa yang Telah Memilih :<?= $pemilih_done?></p>
    <p>Total Mahasiswa yang Telah Memilih Berdasarkan Prodi:</p>
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