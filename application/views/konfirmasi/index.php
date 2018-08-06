    <body>

        <div class="row" style="margin-bottom: 10px">

            <div class="col-md-4">

                <h2 style="margin-top:0px">Konfirmasi</h2>

            </div>

            <div class="col-md-4 text-center">

                <div style="margin-top: 4px"  id="message">

                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>

                </div>

            </div>

        </div>

        <table class="table table-bordered table-striped" id="mytable">

            <thead>

                <tr>

                    <th>No</th>

		    <th>Nama Koordinator</th>

            <th>Nama Komunitas</th>

		    <th>Tanggal Tanam</th>

		    <th>Nama Petak</th>

            <th>Nama Pohon</th>

		    <th>Jenis Pohon</th>

            <th>Status</th>

		   

		    <th>Aksi</th>

                </tr>

            </thead>

	    <tbody>

            <?php

            $start = 0;

            foreach ($penanaman_data as $penanaman)

            {

                ?>

                <tr>

		    <td><?php echo ++$start ?></td>

		    <td><?php echo $penanaman->nama_lengkap ?></td>

            <td><?php echo $penanaman->nama_komunitas ?></td>

		    <td><?php echo $penanaman->tgl_tanam ?></td>

		    <td><?php echo $penanaman->nama_petak ?></td>

            <td><?php echo $penanaman->nama_pohon ?></td>

		    <td><?php echo $penanaman->jenis_pohon ?></td>



          <td><?php if ($penanaman->status == 0){

                echo "Belum Diinput";

            } 

            elseif ($penanaman->status == 1) {

                echo '<span class="label label-danger">Belum Terkonfirmasi</span>';

            } elseif ($penanaman->status == 2) {

                echo "Terkonfirmasi";

            } elseif ($penanaman->status == 3) {

                echo "Reject";

            }?></td>

		   

		    <td style="text-align:center">

			<?php 

			echo anchor(site_url('penanaman_baru/confirm/'.$penanaman->id_penanaman),'Konfirmasi','class="btn btn-sm btn-success onclick="return confirm(\'Konfirmasi Penanaman?\')""'); 

			echo " "; 

			echo anchor(site_url('penanaman_baru/tolak/'.$penanaman->id_penanaman),'Tolak','class="btn btn-sm btn-danger" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 

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

