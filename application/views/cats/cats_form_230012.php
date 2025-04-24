<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CAT SHOP 230012</title>
</head>

<body>
	<h1>CAT SHOP 230012</h1>
	<h3>CAT FORM</h3>
	<hr>

	<?php
	$name = '';
	$type = '';
	$gender = '';
	$age = '';
	$price = '';
	$photo = '';
	if (isset($cat)) {
		$name = $cat->name_230012;
		$type = $cat->type_230012;
		$gender = $cat->gender_230012;
		$age = $cat->age_230012;
		$price = $cat->price_230012;
		$photo = $cat->cats_photo_230012;
	}
	?>

	<div style="color: red;"><?= validation_errors() ?></div>
	<form action="" method="POST" enctype="multipart/form-data">
		<table>

			<tr>
				<td>Name</td>
				<td><input type="text" name="name_230012" id="" value="<?= $name ?>"></td>
			</tr>
			<tr>
				<td>Type</td>
				<td>
					<select name="type_230012" id="">
						<option value="" selected disabled>Choose</option>
						<?php foreach ($categories as $category) : ?>
							<option value="<?= $category->name_230012 ?>"
								<?= set_select('type_230012', $category->name_230012, $type === $category->name_230012 ? TRUE : FALSE) ?>>
								<?= $category->name_230012 ?></option>
						<?php endforeach ?>
					</select>

				</td>
			</tr>
			<tr>
				<td>Gender</td>
				<td>
					<input type="radio" name="gender_230012" value="Male" <?= $gender == 'Male' ? 'checked' : '' ?>> Male
					<input type="radio" name="gender_230012" value="Female" <?= $gender == 'Female' ? 'checked' : '' ?>> Female
				</td>
			</tr>
			<tr>
				<td>Age (Month)</td>
				<td><input type="number" name="age_230012" id="" value="<?= $age ?>"></td>
			</tr>
			<tr>
				<td>Price</td>
				<td><input type="number" name="price_230012" id="" value="<?= $price ?>"></td>
			</tr>
			<?php if (!empty($photo)) : ?>
				<tr>
					<td>Photo</td>
					<td >
						<img style="border: 1px solid green; padding: 5px;	" src="<?= base_url('uploads/cats/' . $photo) ?>" alt="Current Photo" height="auto" width="200">
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="file" name="cats_photo_230012" id="" accept="image/*"></td>
				<tr>
				<?php endif; ?>
				<tr>
					<td></td>
					<td>
						<input type="submit" value="SAVE" name="submit">
						<input type="reset" value="RESET">
					</td>
				</tr>
		</table>
	</form>
	<p><a href="<?= site_url('/cats230012') ?>">CANCEL</a></p>
</body>

</html>