<html>
	<head>
		<title>Form Ubah Arsip Surat</title>
	</head>
	<body>
		<h1>Edit Arsip Surat</h1>
		<hr>

		<!-- Menampilkan Error jika validasi tidak valid -->
		<div style="color: red;"><?php echo validation_errors(); ?></div>

		<?php echo form_open("surat/ubah_surat/" . $surat->id); ?>
			<table cellpadding="8">
				<tr>
					<td>Nomor Surat</td>
					<td><input type="text" name="no_surat" value="<?php echo set_value('no_surat', $surat->no_surat); ?>" readonly></td>
				</tr>
				<tr>
					<td>Kategori</td>
					<td>
					<input type="radio" name="kategori" value="Pengumuman" <?php echo set_radio('kategori', 'pengumuman', ($surat->kategori == "Pengumuman")? true : false); ?>> Pengumuman
					<input type="radio" name="kategori" value="Undangan" <?php echo set_radio('kategori', 'undangan', ($surat->kategori == "Undangan")? true : false); ?>> undangan
					</td>
				<tr>
					<td>Judul</td>
					<td><input type="text" name="judul_surat" value="<?php echo set_value('judul_surat', $surat->judul_surat); ?>"></td>
				</tr>
				
				</tr>
				<tr>
					<td>Waktu</td>
					<td><input type="text" name="waktu" value="<?php echo set_value('waktu', $surat->waktu); ?>"></td>
				</tr>
				<tr>
					<td>File</td>
					<td><input type="file" name="file" value="<?php echo set_value('file', $surat->file); ?>"></td>
				</tr>
			</table>
				
			<hr>
			<input type="submit" name="submit" value="Ubah">
			<a href="<?php echo base_url(); ?>"><input type="button" value="Batal"></a>
		<?php echo form_close(); ?>
	</body>
</html>
