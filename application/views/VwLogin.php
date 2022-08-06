<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php echo $this->pageTitle;?> | Distributed Encryption UI</title>

  <!-- Bootstrap -->
  <link href="<?php echo base_url('assets/'); ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url('assets/'); ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo base_url('assets/'); ?>vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="<?php echo base_url('assets/'); ?>vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?php echo base_url('assets/'); ?>build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
  <div class="login_wrapper">
    <div class="animate form login_form">
      <section class="login_content">
        <img src="<?php echo base_url('assets/'); ?>images/logo96.png"/>
        <p style="font-weight: bold; font-size: 12pt;">Distributed Encryption System</p>
        <form action="<?php echo base_url().'login/doLogin';?>" method="post">
          <h1>Login Pengguna</h1>
          <div>
            <input name="id_user" type="text" class="form-control" placeholder="ID Pengguna" required="true" />
          </div>
          <div>
            <input name="pass_user" type="password" class="form-control" placeholder="Sandi" required="true" />
          </div>
          <div>
            <input style="width: 100%; margin: 0 auto;" type="submit" name="submit" class="btn btn-default submit" value="Masuk" />
            <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
          </div>

          <div class="clearfix"></div>

          <div class="separator">
            <div class="clearfix"></div>
            <div>
              <p>OwnDev ©2021</p>
            </div>
          </div>
        </form>
      </section>
    </div>
  </div>
</body>
</html>
