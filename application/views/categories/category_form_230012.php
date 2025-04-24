<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CAT SHOP 230012</title>
</head>

<body>
	<h1>CAT SHOP 230012</h1>
	<h3>CATEGORY FORM</h3>
	<hr>

	<?php
	$name = '';
	$description = '';
	if (isset($category)) {
		$name = $category->name_230012;
		$description = $category->description_230012;
	}
	?>

	<form action="" method="POST">
		<div style="color: red;"><?= validation_errors() ?></div>
		<div><?= $this->session->flashdata('msg') ?></div>
		<table>
			<tr>
				<td>Name</td>
				<td><input type="text" name="name_230012" id=""  value="<?= $name ?>"></td>
			</tr>
			<tr>
				<td>Type</td>
				<td>
					<textarea name="description_230012" id="" require><?= $description ?></textarea>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" value="SAVE" name="submit" >
					<input type="reset" value="RESET" >
				</td>
			</tr>
		</table>
	</form>
	<p><a href="<?= site_url('/category230012') ?>">CANCEL</a></p>
</body>

</html>
