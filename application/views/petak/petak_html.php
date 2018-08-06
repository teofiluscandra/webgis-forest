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
        <h2>Daftar Petak Lahan Konservasi Laskar Hijau</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Petak</th>
		<th>Luas Petak</th>
		<th>Deskripsi</th>
		
            </tr><?php
            foreach ($petak_data as $petak)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $petak->nama_petak ?></td>
		      <td><?php echo $petak->luas_petak ?></td>
		      <td><?php echo $petak->deskripsi ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>