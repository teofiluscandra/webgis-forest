
  <body class="skin-green fixed">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="http://laskarhijau.org" class="logo">Laskar Hijau</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url(); ?>assets/logo/logo.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo ucfirst($this->session->userdata('username'))?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url(); ?>assets/logo/logo.png" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo ucfirst($this->session->userdata('username'))?> - Koordinator Relawan
                      <a href="<?php echo base_url('user/relawan/profil/'.$this->session->userdata('id')) ?>" class="btn btn-default">Profile</a>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url('user/relawan/password/'.$this->session->userdata('id')) ?>" class="btn btn-default btn-flat">Ubah Password</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url('login/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url(); ?>assets/logo/logo.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo ucfirst($this->session->userdata('username'))?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
              <a href="<?php echo base_url('user/dasbor_relawan'); ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>

            <li>
              <a href="<?php echo base_url('relawan_komunitas') ?>">
                <i class="fa fa-users"></i> <span>Daftar Relawan</span>
              </a>
            </li>

            <li>
              <a href="<?php echo base_url('relawan_komunitas/konfirmasi') ?>">
                <i class="fa fa-check-square-o"></i> <span>Konfirmasi Penanaman</span>
              </a>
            </li>
            
            <li>
              <a href="<?php echo base_url('penanaman_relawan/buat/'.$penanaman->id_penanaman) ?>">
                <i class="fa fa-pagelines"></i> <span>Pemetaan Pohon</span>
              </a>
            </li>



             <li>
              <a href="<?php echo base_url('user/relawan/bantuan') ?>">
                <i class="fa fa-info"></i><span>Bantuan</span>
              </a>
            </li>
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
