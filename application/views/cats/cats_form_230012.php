<?php 
	$name = '';
	$type = '';
	$gender = '';
	$age = '';
	$price = '';
	$photo = '';
		if(isset($cat)){
			$name = $cat->name_230012;
			$type = $cat->type_230012;
			$gender = $cat->gender_230012;
			$age = $cat->age_230012;
			$price = $cat->price_230012;
			$photo = $cat->cats_photo_230012;
		}
	?>

<div style="color: red;"><?= validation_errors() ?></div>
<div><?= $this->session->flashdata('msg') ?></div>
<div class="col-xl">
	<div class="card">
		<div class="card-header d-flex justify-content-between align-items-center">
			<h5 class="mb-0">Cat Form</h5>
			<small class="text-body float-end">
				<a href="<?= base_url('cats230012') ?>" class="btn btn-sm btn-outline-secondary">Back</a>
			</small>
		</div>
		<div class="card-body">
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="mb-6">
					<label class="form-label" for="cat-name">Name</label>
					<input type="text" class="form-control" id="cat-name" name="name_230012" value="<?= $name ?>"
						placeholder="Enter cat name" />
				</div>
				<div class="mb-6">
					<label class="form-label" for="cat-type">Type</label>
					<select class="form-control" id="cat-type" name="type_230012">
						<option value="" selected disabled>Choose</option>
						<?php foreach ($categories as $category) : ?>
						<option value="<?= $category->name_230012 ?>"
							<?= set_select('type_230012', $category->name_230012, $type === $category->name_230012 ? TRUE : FALSE) ?>>
							<?= $category->name_230012 ?>
						</option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="mb-6">
					<label class="form-label">Gender</label>
					<div>
						<input type="radio" id="gender-male" name="gender_230012" value="Male"
							<?= $gender == 'Male' ? 'checked' : '' ?>>
						<label for="gender-male">Male</label>
						<input type="radio" id="gender-female" name="gender_230012" value="Female"
							<?= $gender == 'Female' ? 'checked' : '' ?>>
						<label for="gender-female">Female</label>
					</div>
				</div>
				<div class="mb-6">
					<label class="form-label" for="cat-age">Age (Month)</label>
					<input type="number" class="form-control" id="cat-age" name="age_230012" value="<?= $age ?>"
						placeholder="Enter age in months" />
				</div>
				<div class="mb-6">
					<label class="form-label" for="cat-price">Price</label>
					<input type="number" class="form-control" id="cat-price" name="price_230012" value="<?= $price ?>"
						placeholder="Enter price" />
				</div>
				<?php if (!empty($photo)) : ?>
				<div class="mb-6">
					<label class="form-label">Current Photo</label>
					<div>
						<img style="border: 1px solid green; padding: 5px;"
							src="<?= base_url('uploads/cats/' . $photo) ?>" alt="Current Photo" height="auto"
							width="200">
					</div>
				</div>
				<div class="mb-6">
					<label class="form-label" for="cat-photo">Upload New Photo</label>
					<input type="file" class="form-control" id="cat-photo" name="cats_photo_230012" accept="image/*">
				</div>
				<?php endif; ?>
				<input type="submit" class="btn btn-primary" name="submit" value="Save">
				<button type="reset" class="btn btn-secondary">RESET</button>
			</form>
		</div>
	</div>
</div>
