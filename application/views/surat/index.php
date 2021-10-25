<html>
	<head>
		<title>Arsip Surat</title>
        <style>
            .button1 {
                background-color: #FFFF00; /* Yellow */
                border: none;
                color: black;
                padding: 5px 22px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }
            .button2 {
                background-color: #0000FF; /* Blue */
                border: none;
                color: white;
                padding: 5px 22px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }
            .button3 {
                background-color: #FF0000; /* Red */
                border: none;
                color: white;
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
     <h1>Arsip Surat</h1>
      <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br> Klik "lihat" pada kolom aksi untuk menampilkan surat</p>
      </div>
     <div class="w3-container">
		
    <!-- <div align="left">Cari: <input type="text" id="surat"></div> -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                                <form action="" method="POST">
                                    <label class="col-sm-2 col-form-label"><b>Cari surat:</b></label>
                                    <input type="text" class="form-control" placeholder="Search" name="keyword">
                                    <button class="btn btn-primary btn-sm" type="submit">Cari</button>
                                    <div class="col-sm-6">
                                </form>
                            </div>
                        </div>

                            <br>
                            <?php echo $this->session->flashdata('message'); ?>
                            <div class="table-responsive pt-1">
                                <table class="table table-bordered" border='1' cellpadding='7'>
                                    <thead>
                                        <tr class="table-light">
                                            <th>Nomor Surat</th>
                                            <th>Kategori</th>
                                            <th>Judul</th>
                                            <th>Waktu Pengarsipan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($surat as $s) {
                                        ?>
                                        <tr>
                                            <td><?= $s['no_surat']; ?></td>
                                            <td><?= $s['kategori']; ?></td>
                                            <td><?= $s['judul_surat']; ?></td>
                                            <td><?= date('Y-m-d H:i', strtotime($s['waktu'])); ?></td>
                                            <td>
                                                <a href="<?php echo base_url() . 'surat/hapus/' . $s['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus arsip surat ini?');" button class="button button3"> Hapus </a>
                                                <a href="<?php echo base_url() . 'surat/download/' . $s['id']; ?>" button class="button button1"> Unduh </a>
                                                <a href="<?php echo base_url() . 'surat/detail_data/' . $s['id']; ?>" button class="button button2"> Lihat>> </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <br>
                <a href='<?php echo base_url("surat/tambah"); ?>'> <input type="button" name="btn btn-primary" value="Arsipkan Surat"></a><br><br>

            </div>
        </div>
	</body>
</html>
