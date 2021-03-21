<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <?php
    if($this->session->flashdata('error')) {
        echo $this->session->flashdata('error');
    }
    ?>
    <form method="post" action="<?= base_url('login/process'); ?>">
        <div class="container">
            <label for="nim"><b>NIM</b></label>
            <input type="text" name="nim" required>

            <label for="password"><b>Password</b></label>
            <input type="password"  name="password" required>

            <button type="submit">Login</button>
        </div>

    </form>
</body>

</html>
