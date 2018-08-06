
        <h2>Update Data Koordinator</h2>
        <form action="<?php echo $action; ?>" method="post" style="margin : 20px">
	    <div class="form-group">
                <label for="varchar">Username <?php echo form_error('username') ?></label>
                <input type="text" class="form-control" name="username" size="70" id="username" placeholder="Masukkan Username" value="<?php echo $username; ?>" readonly="" />
            </div>
            <div class="form-group">
                <label for="varchar">Nama Lengkap<?php echo form_error('nama_lengkap') ?></label>
                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Nomor KTP<?php echo form_error('nomor_ktp') ?></label>
                <input type="number" class="form-control" name="nomor_ktp" id="nomor_ktp" placeholder="Nomor KTP" value="<?php echo $nomor_ktp; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Nomer Telepon<?php echo form_error('nomor_telp') ?></label>
                <input type="number" class="form-control" name="nomor_telp" id="nomor_telp" placeholder="Nomor Telepon" value="<?php echo $nomor_telp; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Email<?php echo form_error('email') ?></label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
            </div>
	    <div class="form-group">
                <input type="hidden" class="form-control" name="level" id="level" placeholder="level" value='2' />
            </div>
	    <div class="form-group">
        <label for="varchar">Tanggal Expired<?php echo form_error('tanggal_expired') ?></label>
                <input type="date" class="form-control" name="tanggal_expired" id="tanggal_expired" placeholder="Tambah Hari" value="<?php echo $tanggal_expired; ?>"  />
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" name="isAlready" id="isAlready" placeholder="isAlready" value='0' />
            </div>
	    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <?php if ($this->session->userdata('level') == 2) {
            echo "<a href=\"<?php echo site_url('user/dasbor_relawan') ?>\" class=\"btn btn-default\">Cancel</a>";
        } else {
            echo "<a href=\"<?php echo site_url('user/relawan') ?>\" class=\"btn btn-default\">Cancel</a>";    
            } ?> 
	    
	</form>