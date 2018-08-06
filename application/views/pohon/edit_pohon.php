<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if($this->input->post()){
	$nama_pohon 	= set_value('nama_pohon');
	$jenis_pohon 	= set_value('jenis_pohon');
} else {
	$nama_pohon		= $image->nama_pohon;
	$jenis_pohon 	= $image->jenis_pohon;
}
?>
<title>Update Pohon</title>
<div id="container">
	<h1>Update Pohon</h1>

	<div id="body">
		<?php if(validation_errors() || isset($error)) : ?>
			<div class="alert alert-danger" role="alert" align="center">
				<?=validation_errors()?>
				<?=(isset($error)?$error:'')?>
			</div>
		<?php endif; ?>
		<?=form_open_multipart('pohon/edit/'.$image->id_pohon)?>

		  <div class="form-group">
		    <label for="userfile">Image File</label>
		    <div class="row" style="margin-bottom:5px"><div class="col-xs-12 col-sm-6 col-md-3"><?=img(['src'=>$image->nama_gambar])?></div></div>
		    <input type="file" class="form-control" name="userfile">
		  </div>

		  <div class="form-group">
		    <label for="nama_pohon">Nama Pohon</label>
		    <input type="text" class="form-control" name="nama_pohon" value="<?=$nama_pohon?>">
		  </div>
		  
		   <div class="form-group">
		    <label for="jenis_pohon">Jenis Pohon</label>
                <select class="input-large form-control" name="jenis_pohon">
                    <option value="Bambu">Bambu</option> 
                    <option value="Buah-buahan">Buah-buahan</option> 
                    <option value="Kayu-kayuan">Kayu-kayuan</option> 
                </select>
            </div>

		  <button type="submit" class="btn btn-primary">Save</button>
		  <?=anchor('pohon','Cancel',['class'=>'btn btn-default'])?>

		</form>
	</div>
</div>