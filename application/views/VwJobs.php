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
  <!-- Datatables -->
  <link href="<?php echo base_url('assets/'); ?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/'); ?>vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/'); ?>vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/'); ?>vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/'); ?>vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?php echo base_url('assets/'); ?>build/css/custom.min.css" rel="stylesheet">

  <!-- My Custom Style For Printing Table -->
  <link href="<?php echo base_url('assets/'); ?>build/css/view.table.css" rel="stylesheet">

</head>

<body class="nav-md">
  <div class="container body print">
    <h2><?php echo $this->pageTitle;?></h2>
    <div class="main_container" id="print-area">
      Print Area
    </div>
  </div>
  <div class="container body no-print">
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
                    <!-- <button type="button" class="btn btn-primary" <?php //echo "onclick=\"location.replace('".base_url()."key/tambah')\""; ?>>
                      <i class="glyphicon glyphicon-plus"></i> Tambah
                    </button> -->
                    <button type="button" class="btn btn-success" onclick="prepareDataToPrint()">
                      <i class="glyphicon glyphicon-print"></i> Cetak
                    </button>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content" id="konten">
                  <?php 
                  if ($this->session->flashdata('submitted') == 'addDone') {
                    echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Data Jobs Behasil Ditambahkan.</div>';
                  } else if ($this->session->flashdata('submitted') == 'addErr1'){
                    echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Gagal Membuat ID Jobs Baru.</div>';
                  } else if ($this->session->flashdata('submitted') == 'addErr2'){
                    echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Gagal Memasukkan Data Jobs.</div>';
                  } else if ($this->session->flashdata('submitted') == 'delDone'){
                    echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Data Jobs Berhasil Dihapus</div>';
                  } else if ($this->session->flashdata('submitted') == 'delErr1'){
                    echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Gagal Menghapus Data Jobs.</div>';
                  }else if ($this->session->flashdata('submitted') == 'delErr2'){
                    echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Data Jobs Masih Dipakai Oleh Beberapa File.</div>';
                  } else if ($this->session->flashdata('submitted') == 'updDone'){
                    echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Data Jobs Berhasil Diubah.</div>';
                  } else if ($this->session->flashdata('submitted') == 'updErr1'){
                    echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Gagal Mengubah Data Jobs.</div>';
                  }
                  ?>
                  <table id="jobsTable" class="table table-striped table-bordered datatable-fixed-header">
                    <thead>
                      <tr>
                        <th class="col">ID Pekerjaan</th>
                        <th class="col">Waktu Kedatangan</th>
                        <th class="col">Waktu Eksekusi</th>
                        <th class="col">Waktu Selesai</th>
                        <th class="col">Tipe Pekerjaan</th>
                        <th class="col">ID Berkas</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($jobs as $row) {
                        echo '<tr>';
                        echo '<td>'.$row['id_jobs'].'</td>';
                        echo '<td>'.$row['date_enter_jobs'].'</td>';
                        echo '<td>'.$row['date_start_jobs'].'</td>';
                        echo '<td>'.$row['date_finish_jobs'].'</td>';
                        switch ($row['type_of_jobs']) {
                          case 0:
                            // QENC
                            echo '<td><span class="label label-info">Diantrikan Untuk Enkripsi</span></td>';
                            break;
                          case 1:
                            // PENC
                            echo '<td><span class="label label-warning">Enkripsi Sedang Dilakukan</span></td>';
                            break;
                          case 2:
                            // ENC
                            echo '<td><span class="label label-success">Berkas Telah Terenkripsi</span></td>';
                            break;
                          case 3:
                            // QDEC
                            echo '<td><span class="label label-info">Diantrikan Untuk Dekripsi</span></td>';
                            break;
                          case 4:
                            // PDEC
                            echo '<td><span class="label label-warning">Dekripsi Sedang Dilakukan</span></td>';
                            break;
                          case 5:
                            // DEC
                            echo '<td><span class="label label-danger">Berkas Telah Terdekripsi</span></td>';
                            break;
                          
                          default:
                            // code...
                            echo '<td><span class="label label-default">Pekerjaan Tidak Valid</span></td>';
                            break;
                        }
                        echo '<td>'.$row['t_user_files_id_user_files'].'</td>';
                        // echo '<td>'.$row['queue_time'].'</td>';
                        // echo '<td>'.$row['exec_time'].'</td>';
                        // echo '<td>'.$row['total_time'].'</td>';
                        echo '</tr>';
                      }
                      ?>
                    </tbody>
                  </table>
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
  <!-- iCheck -->
  <script src="<?php echo base_url('assets/'); ?>vendors/iCheck/icheck.min.js"></script>
  <!-- Datatables -->
  <script src="<?php echo base_url('assets/'); ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url('assets/'); ?>vendors/datatables.net/js/datatables-lang-id.js"></script>
  <script src="<?php echo base_url('assets/'); ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="<?php echo base_url('assets/'); ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo base_url('assets/'); ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="<?php echo base_url('assets/'); ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="<?php echo base_url('assets/'); ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="<?php echo base_url('assets/'); ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="<?php echo base_url('assets/'); ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="<?php echo base_url('assets/'); ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="<?php echo base_url('assets/'); ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url('assets/'); ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="<?php echo base_url('assets/'); ?>vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  <script src="<?php echo base_url('assets/'); ?>vendors/jszip/dist/jszip.min.js"></script>
  <script src="<?php echo base_url('assets/'); ?>vendors/pdfmake/build/pdfmake.min.js"></script>
  <script src="<?php echo base_url('assets/'); ?>vendors/pdfmake/build/vfs_fonts.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="<?php echo base_url('assets/'); ?>build/js/custom.min.js"></script>
  
  <!-- Custom JS Printing Table -->
  <script src="<?php echo base_url('assets/'); ?>build/js/print.table.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#jobsTable').DataTable( {
        "paging": false,
        "order": [[ 0, "desc" ]]
      });
      // setTimeout(function(){
      //    window.location.reload(1);
      // }, 5000);
    });
  </script>

</body>
</html>