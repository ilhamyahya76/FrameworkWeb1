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
 	<?php echo form_open_multipart('blog/update', array(
  'class' => 'needs-validation',
  'novalidate' => ''
	)); 

	?>
	<?php foreach($user as $u){ ?>
		<table style="margin:20px auto;">
			<tr>
				<td>Title</td>
				<td>
					<input type="hidden" name="id" value="<?php echo $u->id ?>">
					<input type="text" name="title" value="<?php echo set_value('title', $u->title) ?>" required>
					<div class="invalid-feedback">
        Looks good!
      </div>
				</td>
			</tr>
			<tr>
				<td><label for="validationCustom01">Author</label></td>
				<td><input type="text" name="author" value="<?php echo $u->author ?>" required></td>

			</tr>
			<tr>
				<td>Artikel</td>
				<td><input type="text" name="artikel" value="<?php echo $u->artikel ?>" required></td>
			</tr>
			<tr>
				<td>Artikel Pendek</td>
				<td><input type="text" name="arpen" value="<?php echo $u->artikel_pendek ?>" required></td>
			</tr>
			<tr>
				<td>Gambar</td>
				<td><input type="file" name="image" value="<?php echo $u->image ?>" required></td>
			</tr>
			<tr>
				<td>Sumber</td>
				<td><input type="text" name="sumber" value="<?php echo $u->sumber ?>" required></td>
			</tr>
			<tr>
				<td>Tanggal Posting</td>
				<td><input type="text" name="tgl" value="<?php echo $u->tgl_posting ?>" required></td>
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