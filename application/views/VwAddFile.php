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
                  <form id="upload-form" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Berkas</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="file" name="file" type="file" class="form-control" placeholder="Pilih Berkas">
                        <div class="progress">
                          <div id="pg-bar" class="progress-bar progress-bar-striped active" role="progressbar" style="width: 0%" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div id="target-layer"></div>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <button id="btn-unggah" type="submit" class="btn btn-info"><i class="glyphicon glyphicon-upload"></i> Unggah</button>
                      </div>
                    </div>
                  </form>
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url().'file/prostambah';?>" method="post">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kunci</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input id="filename" name="filename" type="hidden">
                        <select id="id_user_key" name="id_user_key" class="form-control">
                          <option value="">Pilih Kunci....</option>
                        </select>
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="button" class="btn btn-danger" <?php echo 'onclick="location.replace(\''.base_url().'file\')"'; ?>><i class="glyphicon glyphicon-remove"></i> Batal</button>
                        <button type="reset" class="btn btn-primary"><i class="glyphicon glyphicon-refresh"></i> Reset</button>
                        <button id="submit" type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Proses</button>
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('.progress').hide();
      $('#pg-bar').hide();
      $('#target-layer').hide();
      $('#submit').prop('disabled', true);
      $.ajax({
        type: 'GET',
        url: '<?php echo base_url('key/getallkeybyuserajax/'.$this->session->userdata('id_user'))?>',
        dataType: "json",
        async: true,
        success: function(res) {
          res.forEach(function(item){
            var sel = document.getElementById('id_user_key');
            var opt = document.createElement('option');
            opt.appendChild( document.createTextNode(item['name_user_key']));
            opt.value = item['id_user_key'];
            sel.appendChild(opt);
          });
        }
      });
      $('#upload-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
          xhr: function() {
            var xhr = new window.XMLHttpRequest();         
            xhr.upload.addEventListener("progress", function(element) {
              if (element.lengthComputable) {
                var percentComplete = Math.round((element.loaded / element.total) * 100);
                $("#pg-bar").width(percentComplete + '%');
                $("#pg-bar").html(percentComplete+'%');
              }
            }, false);
            return xhr;
          },
          type: 'POST',
          url: '<?php echo base_url('file/uploadfile')?>',
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData:false,
          dataType:'json',
          beforeSend: function(){
            $('.progress').show();
            $('#file').hide();
            $('#btn-unggah').hide();
            $('#pg-bar').show();
            $("#pg-bar").width('0%');
          },
          success: function(json){
            $('.progress').hide();
            $('#target-layer').show();
            var ret = json.split('|');
            if(ret[0] == 'error'){
              $('#target-layer').html('<p>'+ret[1]+' Terjadi Masalah Saat Unggah File. Ulangi Kembali Proses Unggah</p>');
            }else{
              $('#target-layer').html('<p>Proses Unggah <b>'+ret[1]+'</b> Berhasil. Pilih Kunci Dan Tekan Tombol Simpan Untuk Melanjutkan Proses.</p>');
              $('#filename').val(ret[1]);
              $('#submit').prop('disabled', false);
            }
          },
          error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
          }
        });
      });  
    });
  </script>

</body>
</html>
