
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Daftar Pohon</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('pohon/add'), 'Tambah Pohon', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('pohon/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th>No</th>
		    <th>Nama Pohon</th>
		    <th>Jenis Pohon</th>
		    <th>Icon</th>
		    <th>Aksi</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($pohon_data as $pohon)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $pohon->nama_pohon ?></td>
		    <td><?php echo $pohon->jenis_pohon ?></td>
		    <td><?=img($pohon->nama_gambar)?></td>
		    <td style="text-align:center">
			<?php 
			echo anchor(site_url('pohon/edit/'.$pohon->id_pohon),'Update','class="btn btn-sm btn-warning"'); 
			echo " "; 
			echo anchor(site_url('pohon/delete/'.$pohon->id_pohon),'Delete','class="btn btn-sm btn-danger" onclick="javasciprt: return confirm(\'Apakah Anda Yakin ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>