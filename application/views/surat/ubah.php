<html>
	<head>
		<title>Form Tambah</title>
	</head>
	<body>
		<div style="margin-left:20%">
     <div class="w3-container">
     <h1>Arsip Surat >> Edit Arsip Surat</h1>
     
      <p>
			Catatan :
		<ol>
			<ul>Gunakan file berformat PDF</ul>
		</ol></p>
		</div>
		<!-- Menampilkan Error jika validasi tidak valid -->
		<div style="color: red;"><?php echo validation_errors(); ?></div>

        <div class="w3-container">
		<?php echo form_open('surat/ubah'); ?>
        <table cellpadding='8'>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $surat['id']; ?>">
                <tr>   
                    <div class="form-group">
                        <td><label for="nama">Nomor Surat</label></td>
                        <td><input type="text" name="no_surat" class="form-control" id="no_surat" value="<?= $surat['no_surat']; ?>"></td>
                        <td><small class="form-text text-danger"><?= form_error('no_surat'); ?></small></td>
                    </div>
                </tr>
                <tr>
                    <div class="form-group">
                        <td><label for="kategori">Kategori</label></td>
                        <td><select class="form-control" id="kategori" name="kategori">
                            <?php foreach( $kategori as $k ) : ?>
                            <?php if( $k == $surat['kategori'] ) : ?>
                                <option value="<?= $k; ?>" selected><?= $k; ?></option>
                            <?php else : ?>
                                <option value="<?= $k; ?>"><?= $k; ?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </select></td>
                    </div>
                </tr>
                <tr>
                    <div class="form-group">
                        <td><label for="judul_surat">Judul</label></td>
                        <td><input type="text" name="judul_surat" class="form-control" id="judul_surat" value="<?= $surat['judul_surat']; ?>"></td>
                        <td><small class="form-text text-danger"><?= form_error('judul_surat'); ?></small></td>
                    </div>
                </tr>
                <tr>
                    <div class="form-group">
                        <td><label for="waktu">Waktu Pengarsipan</label></td>
                        <td><input type="text" name="waktu" class="form-control" id="waktu" value="<?= $surat['waktu']; ?>"></td>
                        <td><small class="form-text text-danger"><?= form_error('waktu'); ?></small></td>
                    </div>
                </tr>
                <tr>
                    <div class="form-group">
                        <td><label for="file">File</label></td>
                        <td><input type="file" name="file" class="form-control" id="file" value="<?= $surat['file']; ?>"></td>
                        <td><small class="form-text text-danger"><?= form_error('file'); ?></small></td>
                    </div>
                </tr>                 
                <tr>
                    <td><button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button></td>
                </tr>
            </form>
        </table>
			
		<?php echo form_close(); ?>
		</div>
	</body>
</html>
