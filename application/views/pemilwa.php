<html>
<head>
<title></title>
</head>
<body>
    <h1>Pemilwa</h1>
    <?php foreach($bem as $b){?>
    <p><?= $b->ketua?></p>
    <p><?= $b->wakil?></p>
    <p><?= $b->visi?></p>
    <p><?= $b->misi?></p>
    <?php } ?>
</body>
</html>