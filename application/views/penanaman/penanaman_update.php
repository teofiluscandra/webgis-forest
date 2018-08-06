
    <body>
        <h2 style="margin-top:0px">Form Penanaman</h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
                <label for="int">Nama Komunitas <?php echo form_error('nama_penanam') ?></label>
                <select class="input-large form-control" name="nama_penanam">
                    <option value='<?php echo $id_pendaftaran; ?>'><?php echo $nama_komunitas ?></option>
                    <?php if (count($nama_penanam)) {
                foreach ($nama_penanam as $list) {
                    echo "<option value='". $list['id_pendaftaran'] . "'>" . $list['nama_komunitas'] . "</option>";
                }
                } ?> 
                </select>
            </div>
	     <div class="form-group">
                <label for="int">Nama Koordinator <?php echo form_error('id_user') ?></label>
                <select class="input-large form-control" name="id_user" readonly="">
                    <option value='<?php echo $id_user; ?>'><?php echo $nama_lengkap ?></option>
                    <?php if (count($users)) {
                foreach ($users as $list) {

                    echo "<option value='". $list['id_user'] . "'>" . $list['nama_lengkap'] . "</option>";
                }
                } ?> 
                </select>
            </div>
	     <div class="form-group">
                <label for="int">Nama Pohon <?php echo form_error('id_pohon') ?></label>
                <select class="input-large form-control" name="id_pohon">
                    <option value='<?php echo $id_pohon; ?>'><?php echo $nama_pohon ?></option>
                    <?php if (count($pohon)) {
                foreach ($pohon as $list) {
                    echo "<option value='". $list['id_pohon'] . "'>" . $list['nama_pohon'] . "</option>";
                }
                } ?> 
                </select>
            </div>
	    <div class="form-group">
                <label for="int">Nama Petak <?php echo form_error('id_petak') ?></label>
                <select class="input-large form-control" name="id_petak" <?php if ($status == 2) {
                    echo "readonly = \"\"";
                } ?>>
                <option value='<?php echo $id_petak; ?>'><?php echo $nama_petak ?></option>
                    <?php if (count($petak)) {
                foreach ($petak as $list) {
                    echo "<option value='". $list['id_petak'] . "'>" . $list['nama_petak'] . "</option>";
                }
                } ?> 
                </select>
            </div>
            <div class="form-group">
                <label for="int">Jumlah Pohon <?php echo form_error('jumlah') ?></label>
                <input type="number" class="form-control" name="jumlah" id="jumlah" min='<?php echo $jumlah_input ?>' placeholder="Jumlah Pohon yang akan ditanam" value='<?php echo $jumlah; ?>' <?php if ($status == 2) {
                    echo "readonly = \"\"";
                } ?> />
            </div>

	    <input type="hidden" name="status" value='<?php echo $status ?>' /> 
         <input type="hidden" name="jumlahinput" value='<?php echo $jumlah_input ?>' /> 
         <input type="hidden" name="id_penanaman" value='<?php echo $id_penanaman ?>' /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('penanaman_baru') ?>" class="btn btn-default">Cancel</a>
	</form>
</html>