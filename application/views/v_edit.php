<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<?php foreach($user as $u){ ?>
	<form action="<?php echo base_url(). 'blog/update'; ?>" method="post">
		<table style="margin:20px auto;">
			<tr>
				<td>Nama</td>
				<td>
					<input type="hidden" name="id" value="<?php echo $u->id ?>">
					<input type="text" name="title" value="<?php echo $u->title ?>">
				</td>
			</tr>
			<tr>
				<td>Artikel</td>
				<td><input type="text" name="artikel" value="<?php echo $u->artikel ?>"></td>
			</tr>
			<tr>
				<td>Artikel Pendek</td>
				<td><input type="text" name="arpen" value="<?php echo $u->artikel_pendek ?>"></td>
			</tr>
			<tr>
				<td>Gambar</td>
				<td><input type="file" name="image" value="<?php echo $u->image ?>"></td>
			</tr>
			<tr>
				<td>Tanggal Posting</td>
				<td><input type="text" name="tgl" value="<?php echo $u->tgl_posting ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan"></td>
			</tr>
		</table>
	</form>	
	<?php } ?>
</body>
</html>