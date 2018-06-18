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

	<?php echo form_open('user/login'); ?>

	<?php if($this->session->flashdata('login_failed')): ?>
          <?php echo '<div class="alert alert-danger">'.$this->session->flashdata('login_failed').'</div>'; ?>
    <?php endif; ?>
	<table>
				<tr>
					<td>Username</td>
					<td>:</td>
					<td><input type="text" name="username"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td>:</td>
					<td><input type="password" name="password"></td>
				</tr>
				<td>
				<p>Level</p>
				<input type="radio" name="level" value="1">
				<label>admin</label>
				<input type="radio" name="level" value="2">
				<label>user</label>
				</td>
				<tr>
					<td colspan="3"><input type="submit" name="submit" value="simpan"></td>
				</tr>
	</table>
</body>
</html>