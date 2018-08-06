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
                      <?php echo ucfirst($this->session->userdata('username'))?> - Administrator
                      <small>User pengelola data master</small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                   <div class="pull-left">
                      <a href="<?php echo base_url('user/admin/password/'.$this->session->userdata('id')) ?>" class="btn btn-default btn-flat">Ubah Password</a>
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
              <a href="<?php echo base_url('user/dasbor'); ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            
            <li class="treeview">
              <a href="#">
                <span>Data Koordinator</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="<?php echo base_url(); ?>user/relawan/create"><i class="fa fa-plus-circle"></i>Tambah Koordinator</a></li>
                <li class=""><a href="<?php echo base_url(); ?>user/relawan"><i class="fa fa-users"></i>Daftar Koordinator</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <span>Data Penanaman</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="<?php echo base_url(); ?>penanaman_baru/create"><i class="fa fa-plus-circle"></i>Tambah Penanaman</a></li>
                <li class=""><a href="<?php echo base_url(); ?>penanaman_baru/"><i class="fa fa-map-marker"></i>Daftar Penanaman</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <span>Data Pohon</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="<?php echo base_url(); ?>pohon/add"><i class="fa fa-plus-circle"></i>Tambah Pohon</a></li>
                <li class=""><a href="<?php echo base_url(); ?>pohon"><i class="fa fa-tree"></i>Daftar Pohon</a></li>
              </ul>
            </li>

            <li>
              <a href="<?php echo base_url(); ?>petak">
                <i class="fa fa-edit"></i> <span>Data Petak</span>
              </a>
            </li>
            
            <li>
              <a href="<?php echo base_url(); ?>penanaman_baru/konfirmasi">
                <i class="fa fa-check-circle"></i> <span>Konfirmasi</span>
              </a>
            </li>
            
            <li>
              <a href="<?php echo base_url(); ?>update">
                <i class="fa fa-tree"></i> <span>Update Data Pohon</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <span>Grafik Penanaman</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="<?php echo base_url(); ?>grafik/buah_2016"><i class="fa fa-area-chart"></i>Grafik Penanaman Buah</a></li>
                <li class=""><a href="<?php echo base_url(); ?>grafik/kayu_2016"><i class="fa fa-area-chart"></i>Grafik Penanaman Pohon Kayu</a></li>
                <li class=""><a href="<?php echo base_url(); ?>grafik/bambu_2016"><i class="fa fa-area-chart"></i>Grafik Penanaman Bambu</a></li>
                <li class=""><a href="<?php echo base_url(); ?>grafik/mati_2016"><i class="fa fa-area-chart"></i>Grafik Pohon Mati</a></li>
              </ul>
            </li>
           <li>
              <a href="<?php echo base_url(); ?>pendaftaran">
                <i class="fa fa-thumbs-up"></i> <span>Pendaftaran</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
