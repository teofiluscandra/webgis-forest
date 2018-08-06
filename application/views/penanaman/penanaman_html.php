<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Data Penanaman</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
        <th>No</th>
		<th>Nama Komunitas</th>
		<th>Tanggal Tanam</th>
		<th>Nama Koordinator</th>
		<th>Nama Pohon</th>
		<th>Nama Petak</th>
		<th>Status</th>
		<th>Jumlah Pohon</th>
		
            </tr><?php
            foreach ($penanaman_data as $penanaman_baru)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $penanaman_baru->nama_komunitas ?></td>
		      <td><?php echo $penanaman_baru->tgl_tanam ?></td>
		      <td><?php echo $penanaman_baru->nama_lengkap ?></td>
		      <td><?php echo $penanaman_baru->nama_pohon ?></td>
		      <td><?php echo $penanaman_baru->nama_petak ?></td>
		      <td><?php if ($penanaman_baru->status == 0){
                echo "Belum Diinput";
            } 
            elseif ($penanaman_baru->status == 1) {
                echo "Belum Terkonfirmasi";
            } elseif ($penanaman_baru->status == 2) {
                echo "Terkonfirmasi";
            } elseif ($penanaman_baru->status == 3) {
                echo "Reject";
            }?></td>
		      <td><?php echo $penanaman_baru->jumlah ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>