<?php
	$name = '';
	$description = '';
	if (isset($category)) {
		$name = $category->name_230012;
		$description = $category->description_230012;
	}
	?>

<div class="row mb-6 gy-6">
	<div class="col-xl">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<h5 class="mb-0">Category Form</h5>
				<small class="text-body float-end">
					<a href="<?= base_url('category230012') ?>" class="btn btn-sm btn-outline-secondary">Back</a>
				</small>
			</div>
			<div class="card-body">
				<form action="" method="POST">
					<div style="color: red;"><?= validation_errors() ?></div>
					<div><?= $this->session->flashdata('msg') ?></div>
					<div class="mb-6">
						<label class="form-label" for="category-name">Name</label>
						<input type="text" class="form-control" id="category-name" name="name_230012" value="<?= $name ?>" placeholder="Enter category name" />
					</div>
					<div class="mb-6">
						<label class="form-label" for="category-description">Description</label>
						<textarea class="form-control" id="category-description" name="description_230012" placeholder="Enter category description"><?= $description ?></textarea>
					</div>
					<input type="submit" class="btn btn-primary" name="submit" value="Save">
					<button type="reset" class="btn btn-secondary">Reset</button>
				</form>
			</div>
		</div>
	</div>
</div>
