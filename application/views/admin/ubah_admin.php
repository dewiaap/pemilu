<html>
<head>
<title></title>
</head>
<body>
    <h1>Tambah Admin</h1>
    <form action="<?=base_url()?>pemilwa/updateadmin" method="post">
    <label for="nama_admin">Nama Admin</label>
    <input type="text" name="nama_admin" id="nama_admin" value="<?=$admin->nama_admin?>">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" value="<?=$admin->username?>">
    <label for="password">Password</label>
    <input type="hidden" name="id_admin" value="<?=$admin->id_admin?>">
    <input type="password" name="password" id="password" disabled>
    <input type="checkbox" id="cek-pass">
    <input type="submit" value="Simpan">
    </form>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$('#cek-pass').on('click', ()=>{
        if($('#cek-pass').is(':checked')) $("#password").prop('disabled', false);
        else $("#password").prop('disabled', true);
    })
</script>
</html>