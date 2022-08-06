<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a class="site_title"><img src="<?php echo base_url('assets/'); ?>images/logo48.png"/>&nbsp;&nbsp;<span>DistEncrypt</span></a>
    </div>
    <div class="clearfix"></div>
    <br />
    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <ul class="nav side-menu">
          <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-home"></i> Dasbor </a></li>
        </ul>
        <ul class="nav side-menu">
          <li><a><i class="fa fa-database"></i> Manajemen Kunci <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?php echo base_url('key');?>">Lihat Semua Kunci</a></li>
              <li><a href="<?php echo base_url('key/tambah');?>">Buat Kunci Baru</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav side-menu">
          <li><a><i class="fa fa-money"></i> Manajemen Berkas <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?php echo base_url('file');?>">Lihat Semua Berkas</a></li>
              <li><a href="<?php echo base_url('file/tambah');?>">Buat Berkas Baru</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav side-menu">
          <li><a><i class="fa fa-money"></i> Monitoring Pekerjaan <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?php echo base_url('jobs');?>">Lihat Semua Pekerjaan</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
<!-- /sidebar menu -->
  </div>
</div>