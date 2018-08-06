	<body>
	<h1>Tambah Pohon</h1>

		<?php if(validation_errors() || isset($error)) : ?>
			<div class="alert alert-danger" role="alert" align="center">
				<?=validation_errors()?>
				<?=(isset($error)?$error:'')?>
			</div>
		<?php endif; ?>
	
		<form method="post" enctype="multipart/form-data">	
	
		 <div class="form-group">
		    <label for="userfile">Icon Pohon</label>
		    <input type="file" class="form-control" name="userfile">
		  </div>

		  <div class="form-group">
		    <label for="nama_pohon">Nama Pohon</label>
		    <input type="text" class="form-control" name="nama_pohon" value="">
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
	</body>
	