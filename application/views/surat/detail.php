<html>
	<head>
		<title>Arsip Surat</title>

        <style>
            .button1 {
                border: 2px solid black;
                color: black;
                padding: 5px 22px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }
        </style>

	</head>
	<body>
		<!-- Page Content -->
        <div style="margin-left:20%">
            <div class="w3-container">
                <h1>Arsip Surat >> Lihat</h1>
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Nomor: <?= $surat['no_surat']; ?></h4>
                                    <h4 class="card-title">Kategori: <?= $surat['kategori']; ?></h4>
                                    <h4 class="card-title">Judul: <?= $surat['judul_surat']; ?></h4>
                                    <h4 class="card-title">Waktu Unggah: <?= date('d-m-Y H:i', strtotime($surat['waktu'])); ?></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 grid-margin stretch-card">
                            <iframe src="<?= base_url('assets/uploads/' . $surat['file']); ?>" style="border:none;" height="300px" width="100%"></iframe>
                        </div>
                        <br>
                        <a href="<?php echo base_url(); ?>" >
                            <input type="button" class="button button1" value="<<Kembali"></a>
                        <a href="<?php echo base_url() . 'surat/download/' . $surat['id']; ?>" button class="button button1" > Unduh </a>
                        <a href="<?php echo base_url() . 'surat/ubah/' . $surat['id']; ?>" button class="button button1" > Edit/Ganti File </a>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>