         <?php $nama = ucfirst($this->session->userdata('username')); ?>

    		

            <h1 class="text-center">Selamat Datang, <?php echo $nama ?></h1>

    		<h2 class="text-center">Terimakasih Sudah Menjadi Relawan dari <?php echo $tanam->nama_komunitas; ?></h2>

    		<?php if ($this->session->userdata('level') == 3) {

    			echo "<h4 class=\"text-center\">Anda terdaftar pada koordinator : $tanam->nama_lengkap</h4>";

    		} ?>

    		<h3 class="text-center">Unduh file APK untuk pemetaan pada HP Android anda</h3>

    		<br>
            
    		<center><a href="<?php echo base_url(); ?>user/dasbor_relawan/download_apk" class="btn btn-primary btn-lg text-center">Unduh APK</a></center>

			<br>

			<br>

			<center><img src="<?php echo base_url(); ?>assets/logo/logo.png" alt="Logo"></center>

			<br>

			<br>

			<h5 class="text-center">Masih binggung? Ikuti tata cara pada menu <a href="<?php echo base_url(); ?>relawan_komunitas/bantuan">Bantuan</a></h5>



