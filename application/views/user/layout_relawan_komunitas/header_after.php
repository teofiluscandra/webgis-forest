
<!-- header -->
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>">LaskarHijau.org</a>
        </div>
        
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
               <!--  <li data-toggle="modal" data-target="#myModal"><a href="#myModal">Tambah Data Penanaman</a></li> -->
                <li class="dropdown">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> <?php echo ucfirst($this->session->userdata('username')); ?> <span class="caret"></span></a>
                    <ul id="g-account-menu" class="dropdown-menu" role="menu">
                        <li><a href="<?php echo base_url('login/logout'); ?>"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
                    </ul>
                </li>
                
            </ul>
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /Header -->