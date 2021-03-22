<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style2.css">
    <title>Login</title>
    <style type="text/css">
      body{
        background-image:url('assets/image/filkom.png');
      }
    </style>
</head>

<body>

    <?php
    if($this->session->flashdata('error')) {
        echo $this->session->flashdata('error');
    }
    ?>
   <form method="post" action="<?= base_url('login/process'); ?>">
   <div class="container">
   <h2 class="text-center">Log In</h2>
        <div class="row">
              <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                  <input class="form-control input-lg" type="text" name="username" placeholder="NIM" maxlength="40" minlength="1" autofocus="" required value="<?php if(isset($username1)){echo $username1;} ?>">
              </div>
              <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 column">
                  <input class="form-control input-lg" type="password" name="password" required placeholder="Password" maxlength="40" minlength="1" autocomplete="off">
              </div>
              <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-7 col-sm-offset-3 column">
                  <button class="btn btn-primary btn-block" type="submit" id="submit" name="login">Masuk!</button>
              </div>
          </div>
        </div>
    </form>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

