
    <body>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Pendaftaran</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('pendaftaran/create'), 'Tambah', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('pendaftaran/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="10px">No</th>
		    <th>Nama</th>
		    <th>Nama Komunitas</th>
		    <th>Tanggal</th>
		    <th>No Telp</th>
		    <th>Email</th>
		    <th>Alamat</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($pendaftaran_data as $pendaftaran)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $pendaftaran->nama ?></td>
		    <td><?php echo $pendaftaran->nama_komunitas ?></td>
		    <td><?php echo $pendaftaran->tanggal ?></td>
		    <td><?php echo $pendaftaran->no_telp ?></td>
		    <td><?php echo $pendaftaran->email ?></td>
		    <td><?php echo $pendaftaran->alamat ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
            echo anchor(site_url('pendaftaran/read/'.$pendaftaran->id_pendaftaran),'Read','class="btn btn-sm btn-success"'); 
            echo " ";
            echo anchor(site_url('pendaftaran/update/'.$pendaftaran->id_pendaftaran),'Update','class="btn btn-sm btn-warning"'); 
            echo " ";
			echo anchor(site_url('pendaftaran/delete/'.$pendaftaran->id_pendaftaran),'Delete','class="btn btn-sm btn-danger" onclick="javasciprt: return confirm(\'Apakah Anda Yakin ?\')"'); 
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
