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

	<?php echo form_open('category/create'); ?>
	<table>
				<tr>
					<td>Nama Category</td>
					<td>:</td>
					<td><input type="text" name="cat_name" ></td>
				</tr>
				<tr>
					<td>Deskripsi</td>
					<td>:</td>
					<td><input type="text" name="cat_description" ></td>
				</tr>
				<tr>
					<td colspan="3"><input type="submit" name="submit" value="simpan"></td>
				</tr>
	</table>
</body>
</html>