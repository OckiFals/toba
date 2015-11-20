<html>
<head>
	<title>data Diri</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
	<div class="wrapper">
		<div id="message">
			<h2>Data diri</h2>
            <h4>Nama</h4>
            <div class="message-body">
            	<p><?= $nama ?></p>
            </div>
            <h4>Alamat</h4>
            <div class="message-body">
            	<p><?= $alamat ?></p>
            </div>
            <h4>Jenis kelamin</h4>
            <div class="message-body">
            	<p><?= $kelamin ?></p>
            </div>
            <h4>Gol. darah</h4>
            <div class="message-body">
            	<p><?= $blood ?></p>
            </div>
            <h4>Hoby</h4>
            <div class="message-body">
            	<p><?= $hobby ?></p>
            </div>
            <h4>Keterangan</h4>
            <div class="message-body">
            	<p><?= $keterangan ?></p>
            </div>
            <h4>Photo</h4>
            <div class="message-body">
            	<img src="<?php echo base_url('uploads/' . $upload_data['file_name']); ?>" width="180" />
            </div>
           
    	</div>
	</div>
</body>
</html>