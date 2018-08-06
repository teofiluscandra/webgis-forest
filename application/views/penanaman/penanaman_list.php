    <body>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Daftar Penanaman</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('penanaman_baru/create'), 'Tambah Penanaman', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('penanaman_baru/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th>No</th>
		    <th>Nama Komunitas</th>
		    <th>Tanggal Tanam</th>
		    <th>Nama Koordinator</th>
		    <th>Nama Pohon</th>
		    <th>Nama Petak</th>
		    <th>Status</th>
		    <th>Jumlah</th>
            <th>Jumlah Saat Ini</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($penanaman_baru_data as $penanaman_baru)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $penanaman_baru->nama_komunitas ?></td>
		    <td><?php if ($penanaman_baru->tgl_tanam) {
                ?><span class="label label-success"><?php echo $newDateString = date_format(date_create_from_format('Y-m-d', $penanaman_baru->tgl_tanam), 'd-m-Y') ; ?></span> 
            <?php } else {
                echo '<span class="label label-warning">Belum</span>';
                } ?> </td>
		    <td><?php echo $penanaman_baru->nama_lengkap ?></td>
		    <td><?php echo $penanaman_baru->nama_pohon ?></td>
		    <td><?php echo $penanaman_baru->nama_petak ?></td>
		    <td><?php if ($penanaman_baru->status == 0){
                echo '<span class="label label-warning">Belum Input</span>';
            } 
            elseif ($penanaman_baru->status == 1) {
                echo '<span class="label label-info">Belum Terkonfirmasi</span>';
            } elseif ($penanaman_baru->status == 2) {
                echo '<span class="label label-success">Terkonfirmasi</span>';
            } elseif ($penanaman_baru->status == 3) {
                echo '<span class="label label-danger">Reject</span>';
            }?></td>
		    <td><?php echo $penanaman_baru->jumlah ?></td>
            <td><?php echo $penanaman_baru->jumlahinput ?></td>
		    <td style="text-align:center">
			<?php 
            if ($penanaman_baru->status !=3) {
			echo anchor(site_url('penanaman_baru/update/'.$penanaman_baru->id_penanaman),'Update','class="btn btn-sm btn-warning"'); 
            } else {
                echo anchor(site_url('penanaman_baru/update/'.$penanaman_baru->id_penanaman),'Update','class="btn btn-sm btn-warning disabled"'); 
            } 
			echo " "; 
            if ($penanaman_baru->status != 2 && $penanaman_baru->status !=3) {
                echo anchor(site_url('penanaman_baru/delete/'.$penanaman_baru->id_penanaman),'Delete','class="btn btn-sm btn-danger" onclick="javasciprt: return confirm(\'Apakah Anda Yakin ?\')"'); 
            } else {
			echo anchor(site_url('penanaman_baru/delete/'.$penanaman_baru->id_penanaman),'Delete','class="btn btn-sm btn-danger" disabled onclick="javasciprt: return confirm(\'Apakah Anda Yakin ?\')"'); 
			}?>
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
    </body>
