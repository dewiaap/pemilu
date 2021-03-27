<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/style3.css">
    <link rel="icon" href="<?=base_url()?>assets/image/poros1.png">
    <title>Login</title>
    <style type="text/css">
      body{
        background-image:url('<?=base_url();?>assets/image/filkom.png');
      }
    </style>
</head>

<body>
   <form method="post" action="<?= base_url('login/signin'); ?>">
   <div class="container">
   <h2 class="text-center">Log In</h2>
        <div class="row">
              <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                  <input class="form-control input-lg" type="text" name="username" placeholder="NIM atau username" maxlength="40" minlength="1" autofocus="" required>
              </div>
              <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 column">
                  <input class="form-control input-lg" type="password" name="password" required placeholder="Password" maxlength="40" minlength="1">
              </div>
              <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-7 col-sm-offset-3 column">
                  <button class="btn btn-primary btn-block" type="submit" id="submit" name="login">Masuk!</button>
              </div>
          </div>
        </div>
    </form>
    <script src="<?=base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?=base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

