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
  <!-- iCheck -->
  <link href="<?php echo base_url('assets/'); ?>vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- bootstrap-wysiwyg -->
  <link href="<?php echo base_url('assets/'); ?>vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
  <!-- Select2 -->
  <link href="<?php echo base_url('assets/'); ?>vendors/select2/dist/css/select2.min.css" rel="stylesheet">
  <!-- Switchery -->
  <link href="<?php echo base_url('assets/'); ?>vendors/switchery/dist/switchery.min.css" rel="stylesheet">
  <!-- starrr -->
  <link href="<?php echo base_url('assets/'); ?>vendors/starrr/dist/starrr.css" rel="stylesheet">
  <!-- bootstrap-daterangepicker -->
  <link href="<?php echo base_url('assets/'); ?>vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
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
        <div class="">
          <div class="clearfix"></div>
          <div class="row">   
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><?php echo $this->pageTitle;?></h2>
                  <div class="nav navbar-right">
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <?php if (validation_errors() != "") {
                    echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'.validation_errors().'</div>';
                  }?>
                  <br />
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  action="<?php echo base_url().'key/prosubah';?>" method="post">
                    <input name="id_user_key" type="hidden" class="form-control" placeholder="ID Kunci" value="<?php echo $key[0]['id_user_key'];?>">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kunci Lama</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="name_user_key" type="text" class="form-control" placeholder="Nama Kunci Lama" value="<?php echo $key[0]['name_user_key'];?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kunci Baru</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="name_user_key1" type="text" class="form-control" placeholder="Nama Kunci Baru" value="<?php if(validation_errors() != ""){echo set_value('name_user_key1');}else{echo $key[0]['name_user_key'];}?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Dibuat</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="name_user_key" type="text" class="form-control" placeholder="Tanggal Dibuat" value="<?php echo $key[0]['gen_date_user_key'];?>" readonly>
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="button" class="btn btn-danger" <?php echo 'onclick="location.replace(\''.base_url().'key\')"'; ?>><i class="glyphicon glyphicon-remove"></i> Batal</button>
                        <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Simpan Perubahan</button>
                      </div>
                    </div>
                  </form>
                </div>
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
  <!-- bootstrap-progressbar -->
  <script src="<?php echo base_url('assets/'); ?>vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url('assets/'); ?>vendors/iCheck/icheck.min.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="<?php echo base_url('assets/'); ?>vendors/moment/min/moment.min.js"></script>
  <script src="<?php echo base_url('assets/'); ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap-wysiwyg -->
  <script src="<?php echo base_url('assets/'); ?>vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
  <script src="<?php echo base_url('assets/'); ?>vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
  <script src="<?php echo base_url('assets/'); ?>vendors/google-code-prettify/src/prettify.js"></script>
  <!-- jQuery Tags Input -->
  <script src="<?php echo base_url('assets/'); ?>vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
  <!-- Switchery -->
  <script src="<?php echo base_url('assets/'); ?>vendors/switchery/dist/switchery.min.js"></script>
  <!-- Select2 -->
  <script src="<?php echo base_url('assets/'); ?>vendors/select2/dist/js/select2.full.min.js"></script>
  <!-- Parsley -->
  <script src="<?php echo base_url('assets/'); ?>vendors/parsleyjs/dist/parsley.min.js"></script>
  <!-- Autosize -->
  <script src="<?php echo base_url('assets/'); ?>vendors/autosize/dist/autosize.min.js"></script>
  <!-- jQuery autocomplete -->
  <script src="<?php echo base_url('assets/'); ?>vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
  <!-- starrr -->
  <script src="<?php echo base_url('assets/'); ?>vendors/starrr/dist/starrr.js"></script>

  <!-- PNotify -->
  <script src="<?php echo base_url('assets/'); ?>vendors/pnotify/dist/pnotify.js"></script>
  <script src="<?php echo base_url('assets/'); ?>vendors/pnotify/dist/pnotify.buttons.js"></script>
  <script src="<?php echo base_url('assets/'); ?>vendors/pnotify/dist/pnotify.nonblock.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="<?php echo base_url('assets/'); ?>build/js/custom.min.js"></script>

</body>
</html>
