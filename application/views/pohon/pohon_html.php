<!doctype html>
<html>
    <head>
        <title>Daftar Pohon</title>
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
        <h2>Daftar Pohon</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Pohon</th>
		<th>Jenis Pohon</th>
		<th>Icon</th>
		
            </tr><?php
            foreach ($pohon_data as $pohon)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pohon->nama_pohon ?></td>
		      <td><?php echo $pohon->jenis_pohon ?></td>
		      <td><?=img($pohon->nama_gambar)?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>