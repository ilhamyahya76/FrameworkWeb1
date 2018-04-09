<html>
<head>
</head>
<body>
	<?php echo (isset($message))? : "";?>
 
	<?php echo form_open('deupload/tambah', array('enctype'=>'multipart/form-data')); ?>
 
	<input type="file" name="input_gambar">
	<input type="submit" name="submit" value="simpan">
</body>
</html>