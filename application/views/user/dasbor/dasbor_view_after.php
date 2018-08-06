<div class="container">
	<?php $nama = ucfirst($this->session->userdata('nama')); ?>
    <h1 class="text-center">Selamat Datang, <?php echo $nama ?></h1>
    <script>
  sweetAlert("<?php echo "Anda Telah Memasukkan Data Penanaman" ?>");
  </script>
</div>