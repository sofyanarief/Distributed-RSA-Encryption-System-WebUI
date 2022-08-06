<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="
            <?php if(file_exists('assets/images/avatar/'.$this->session->userdata('id_user').'.png')) {
              echo base_url('assets/images/avatar/').$this->session->userdata('id_user').'.png';
            }else{
              echo base_url('assets/images/avatar/').'default.png';
            }
            ?>" alt=""><?php echo $this->session->userdata('nama_user');?>
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <!-- <li><a href="<?php echo base_url('user/detil/').$this->session->userdata('id_user'); ?>"> Profil</a></li> -->
            <li><a href="<?php echo base_url('login/doLogout'); ?>"><i class="fa fa-sign-out pull-right"></i> Keluar</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</div>