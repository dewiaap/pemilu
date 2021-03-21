<html>
<head>
<title></title>
</head>
<body>
    <h1>Tambah Admin</h1>
    <form action="<?=base_url()?>pemilwa/addadmin" method="post">
    <label for="nama_admin">Nama Admin</label>
    <input type="text" name="nama_admin" id="nama_admin">
    <label for="username">Username</label>
    <input type="text" name="username" id="username">
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    <input type="submit" value="Simpan">
    </form>
</body>
</html>