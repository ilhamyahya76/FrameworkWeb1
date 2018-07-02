<!DOCTYPE html>
<html>
<head>
<link href="<?php echo base_url(). '/assets/vendor/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(). '/assets/vendor/font-awesome/css/font-awesome.min.css' ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(). '/assets/vendor/simple-line-icons/css/simple-line-icons.css' ?>" rel="stylesheet">
</head>
<body>
	<?php    
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
	?>
 	<?php echo validation_errors(); ?>
 	<?php echo form_open_multipart('blog/update_user', array(
  'class' => 'needs-validation',
  'novalidate' => ''
	)); 

	?>
	<?php foreach($users as $u){ ?>
		<table style="margin:20px auto;">
			<tr>
				<td>Nama</td>
				<td>
					<input type="hidden" name="id" value="<?php echo $u->id ?>">
					<input type="text" name="nama" value="<?php echo $u->nama ?>" required>
					<div class="invalid-feedback">
        Looks good!
      </div>
				</td>
			</tr>
			<tr>
				<td><label for="validationCustom01">Email</label></td>
				<td><input type="email" name="email" value="<?php echo $u->email ?>" required></td>

			</tr>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" value="<?php echo $u->username ?>" required></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="text" name="password" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit"></td>
			</tr>
		</table>
	</form>	
	<?php } ?>
<!--	<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>-->
</body>
</html>