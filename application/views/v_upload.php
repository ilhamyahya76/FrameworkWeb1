<html>
<head>
<link href="<?php echo base_url(). '/assets/vendor/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(). '/assets/vendor/font-awesome/css/font-awesome.min.css' ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(). '/assets/vendor/simple-line-icons/css/simple-line-icons.css' ?>" rel="stylesheet">


</head>
<body>
	<?php echo (isset($message))? : "";?>
 	
 	<?php    
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
	?>

 	<?php echo validation_errors(); ?>

	<?php echo form_open_multipart('blog/tambah'); ?>
	<table>
				<tr>
					<td>Title</td>
					<td>:</td>
					<td><input type="text" name="title" value="<?php echo set_value('title') ?>"></td>
				</tr>
				<tr>
					<td>author</td>
					<td>:</td>
					<td><input type="text" name="author" value="<?php echo set_value('author') ?>"></td>
				</tr>
				<tr>
					<td>Artikel</td>
					<td>:</td>
					<td><input type="textarea" name="artikel" value="<?php echo set_value('artikel') ?>"></td>
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
					<td>Sumber</td>
					<td>:</td>
					<td><input type="text" name="sumber" value=""></td>
				</tr>
				<tr>
					<td>Kategori</td>
					<td>:</td>
						<td><select name="cat_id" required>
							<option value="">Pilih Kategori</option>
							<?php foreach($categories as $category): ?>
							<option value="<?php echo $category->id; ?>"><?php echo $category->cat_name; ?></option>
							<?php endforeach; ?>
						</select>
						</td>
				</tr>
				<tr>
					<td colspan="3"><input type="submit" name="submit" value="simpan"></td>
				</tr>
	</table>
</body>
</html>