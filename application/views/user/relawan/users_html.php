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
        <h2>Daftar Koordinator Yang Terdaftar</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama Lengkap</th>
            <th>Nomor KTP</th>
            <th>Nomor Telp</th>
            <th>Email</th>		
            </tr><?php
            $start = 0;
            foreach ($relawan_data as $relawan)
            {
                ?>
                <tr>
            <td><?php echo ++$start ?></td>
            <td><?php echo $relawan->username ?></td>
            <td><?php echo $relawan->nama_lengkap ?></td>
             <td><?php echo $relawan->nomor_ktp ?></td>
             <td><?php echo $relawan->nomor_telp ?></td>
             <td><?php echo $relawan->email ?></td>
                <?php
            }
            ?>
        </table>
    </body>
</html>