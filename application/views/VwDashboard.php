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
    <!-- bootstrap-wysiwyg -->
    <link href="<?php echo base_url('assets/'); ?>vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="<?php echo base_url('assets/'); ?>build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php $this->load->view('VwSidebar');?>

        <!-- top navigation -->
        <?php $this->load->view('VwHeader');?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div>
            <h1></h1>
            <h4></h4>
          </div>
          <div class="">
            <div class="row top_tiles">
              <!-- <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12"> -->
              <div class="animated flipInY col-lg-8">
                <div class="tile-stats">
                  <div class="icon"></div>
                  <div class="count">Selamat Datang <?php echo $this->session->userdata('nama_user')?></div>
                  <h3>Dalam Sistem <i>Distributed Encryption</i></h3>
                  <?php
                  if($this->session->userdata('last_login_user') != NULL){
                    echo '<p>Anda Terakhir Masuk Ke Sistem Pada '.$this->session->userdata('last_login_user').'</p>';
                  }else{
                    echo '<p>Semoga Anda Menyukai Aplikasi Ini</p>';
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php $this->load->view('VwFooter');?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/'); ?>vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets/'); ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/'); ?>vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('assets/'); ?>vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="<?php echo base_url('assets/'); ?>vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="<?php echo base_url('assets/'); ?>vendors/google-code-prettify/src/prettify.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('assets/'); ?>build/js/custom.min.js"></script>

  </body>
</html>