         <?php $nama = ucfirst($this->session->userdata('nama')); ?>

         <?php if (!$this->session->userdata('nomor_telp')) { ?>

		<div class="callout callout-warning">

                <h4>Lengkapi Data!</h4>

                <p>Anda belum melengkapi data. Lengkapi di <a href="<?php echo base_url(); ?>user/relawan/update_relawan/<?php echo $this->session->userdata('id') ?>">sini.</a></p>

              </div>

         <?php 	} ?>

    		

    		<h1 class="text-center">Selamat Datang, <?php echo $nama ?></h1>

    		<h2 class="text-center">Terimakasih Sudah Menjadi Koordinator Relawan <?php echo $tanam->nama_komunitas; ?></h2>

    		<h3 class="text-center">Unduh file APK untuk pemetaan pada HP Android anda</h3>

    		<br>
            
    		<center><a href="<?php echo base_url(); ?>user/dasbor_relawan/download_apk" class="btn btn-primary btn-lg text-center">Unduh APK</a></center>
            <h5 class="text-center">Jika di lapangan tidak ada sinyal seluler, maka pemetaan dilakukan menggunakan GPS Garmin</h5>
            <h5 class="text-center">Latitude adalah Garis Lintang, sedangkan Longitude adalah Garis Bujur. Format data koordinat menggunakan Latitude dan Longitude</h5>
            <h5 class="text-center">Akurasi adalah tingkat akurasi GPS. Semakin kecil angka akurasi, semakin baik.</h5>
			<br>

			<br>

			<center><img src="<?php echo base_url(); ?>assets/logo/logo.png" alt="Logo"></center>

			<br>

			<br>

			<h5 class="text-center">Masih binggung? Ikuti tata cara pada menu <a href="<?php echo base_url(); ?>user/relawan/bantuan">Bantuan</a></h5>

			



