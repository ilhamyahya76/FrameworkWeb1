<html>
<head>
</head>
<body>
	<?php echo (isset($message))? : "";?>
 
	<?php echo form_open('blog/tambah', array('enctype'=>'multipart/form-data')); ?>
 
	<table>
				<tr>
					<td>Title</td>
					<td>:</td>
					<td><input type="text" name="title" value=""></td>
				</tr>
				<tr>
					<td>Artikel</td>
					<td>:</td>
					<td><input type="textarea" name="artikel" value=""></td>
				</tr>
				<tr>
					<td>Artikel Pendek</td>
					<td>:</td>
					<td><input type="text" name="arpen" value=""></td>
				</tr>
				<tr>
					<td>Gambar</td>
					<td>:</td>
					<td><input type="file" name="input_gambar"></td>
				</tr>
				<tr>
					<td colspan="3"><input type="submit" name="submit" value="simpan"></td>
				</tr>
	</table>
</body>
</html>