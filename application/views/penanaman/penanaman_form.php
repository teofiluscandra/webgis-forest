
    <body>
        <h2 style="margin-top:0px">Form Penanaman</h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
                <label for="varchar">Nama Komunitas <?php echo form_error('nama_penanam') ?></label>
                <br>
                <span class="text-success">Jika Komunitas belum ada pada data, daftarkan terlebih dahulu melalui tautan </span><a href="<?php echo base_url('pendaftaran/create'); ?>">disini</a>
                <select class="input-large form-control" name="nama_penanam" id="nama_penanam">
                    <option value="">Pilih Komunitas Yang Telah Terdaftar</option>
                    <?php if (count($nama_penanam)) {
                foreach ($nama_penanam as $list) {
                    echo "<option value='". $list['id_pendaftaran'] . "'>" . $list['nama_komunitas'] . "</option>";
                }
                } ?> 
                </select>
                
            </div>

	     <div class="form-group">
                <label for="int">Nama Koordinator <?php echo form_error('id_user') ?></label>
                <br>
                <span class="text-success">Jika Koordinator belum ada pada data, daftarkan terlebih dahulu melalui tautan </span><a href="<?php echo base_url('user/relawan/create'); ?>">disini</a>
                <select class="input-large form-control" name="id_user" id="id_user">
                    <option value="">Pilih Koordinator</option>
                    <?php if (count($users)) {
                foreach ($users as $list) {
                    echo "<option value='". $list['id_user'] . "'>" . $list['nama_lengkap'] . "</option>";
                }
                } ?> 
                </select>
                
            </div>
	     <div class="form-group">
                <label for="int">Nama Pohon <?php echo form_error('id_pohon') ?></label>
                <br>
                <span class="text-success">Jika pohon belum ada pada data, daftarkan terlebih dahulu melalui tautan </span><a href="<?php echo base_url('pohon/add'); ?>">disini</a>
                <select class="input-large form-control" name="id_pohon" id="id_pohon">
                    <option value="">Pilih Pohon</option>
                    <?php if (count($pohon)) {
                foreach ($pohon as $list) {
                    echo "<option value='". $list['id_pohon'] . "'>" . $list['nama_pohon'] . "</option>";
                }
                } ?> 
                </select>
                
            </div>
	    <div class="form-group">
                <label for="int">Nama Petak <?php echo form_error('id_petak') ?></label>
                <br>
                <select class="input-large form-control" name="id_petak" id="id_petak">
                    <option value="">Pilih Petak</option>
                    <?php if (count($petak)) {
                foreach ($petak as $list) {
                    echo "<option value='". $list['id_petak'] . "'>" . $list['nama_petak'] . "</option>";
                }
                } ?> 
                </select>
            </div>
            <div class="form-group">
                <label for="int">Jumlah Pohon <?php echo form_error('jumlah') ?></label>
                <br>
                <input type="number" class="form-control" name="jumlah" size="50" id="jumlah" placeholder="Jumlah Pohon yang akan ditanam" value="<?php echo $jumlah; ?>" />
            </div>

	    <input type="hidden" name="status" value='0' /> 
         <input type="hidden" name="jumlahinput" value='0' /> 
	    <button type="submit" class="btn btn-primary">Save</button> 
	    <a href="<?php echo site_url('penanaman_baru') ?>" class="btn btn-default">Cancel</a>
	</form>
     <script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#nama_penanam").select2({
                    placeholder: "Pilih Komunitas Yang Telah Terdaftar"
                });
            });
            $(document).ready(function () {
                $("#id_user").select2({
                    placeholder: "Pilih Koordinator Relawan"
                });
            });
            $(document).ready(function () {
                $("#id_pohon").select2({
                    placeholder: "Pilih Pohon"
                });
            });
            $(document).ready(function () {
                $("#id_petak").select2({
                    placeholder: "Pilih Petak"
                });
            });
        </script>
</html>