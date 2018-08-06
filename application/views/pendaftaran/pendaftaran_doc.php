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
        <h2>Pendaftaran</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		 <th>Nama</th>
            <th>Nama Komunitas</th>
            <th>Tanggal</th>
            <th>Gambaran Komunitas</th>
            <th>No Telp</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Website</th>
		
            </tr><?php
            foreach ($pendaftaran_data as $pendaftaran)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pendaftaran->nama ?></td>
            <td><?php echo $pendaftaran->nama_komunitas ?></td>
            <td><?php echo $pendaftaran->tanggal ?></td>
            <td><?php echo $pendaftaran->gambaran_komunitas ?></td>
            <td><?php echo $pendaftaran->no_telp ?></td>
            <td><?php echo $pendaftaran->email ?></td>
            <td><?php echo $pendaftaran->alamat ?></td>
            <td><?php echo $pendaftaran->website ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>