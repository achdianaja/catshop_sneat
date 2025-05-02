<div class="card mb-6">
	<div class="card-body">
		<div class="row mb-6">
			<div class="col-md-12 align-items-center">
				<label class="form-label" for="cat-photo">Cat Photo</label>
				<div id="cat-photo">
					<img src="<?= base_url('uploads/cats/' . $cat->cats_photo_230012) ?>"
						alt="Photo of <?= $cat->name_230012 ?>" class="img-fluid" />
				</div>
			</div>
		</div>
		<div class="row mb-6">
			<div class="col-md-6">
				<label class="form-label" for="cat-id">Cat ID</label>
				<p class="form-control-plaintext" id="cat-id"><strong>ID:</strong> <?= $cat->id_230012 ?></p>
			</div>
			<div class="col-md-6">
				<label class="form-label" for="cat-name">Cat Name</label>
				<p class="form-control-plaintext" id="cat-name"><strong>Name:</strong> <?= $cat->name_230012 ?></p>
			</div>
		</div>
		<div class="row mb-6">
			<div class="col-md-6">
				<label class="form-label" for="cat-type">Cat Type</label>
				<p class="form-control-plaintext" id="cat-type"><strong>Type:</strong> <?= $cat->type_230012 ?></p>
			</div>
			<div class="col-md-6">
				<label class="form-label" for="cat-price">Cat Price</label>
				<p class="form-control-plaintext" id="cat-price"><strong>Price:</strong>
					Rp<?= number_format($cat->price_230012, 2) ?></p>
			</div>
		</div>

	</div>
</div>

<div style="color: red;"><?= validation_errors() ?></div>
<div><?= $this->session->flashdata('msg') ?></div>

<div class="card">
	<div class="card-header d-flex justify-content-between align-items-center">
		<h5 class="mb-0">Cat Sale Form</h5>
		<small class="text-body float-end">Fill the details</small>
	</div>
	<div class="card-body">
		<form action="" method="POST">
			<div class="mb-6">
				<label class="form-label" for="customer-name">Customer Name</label>
				<input type="text" class="form-control" id="customer-name" name="customer_name_230012"
					placeholder="Enter customer name" />
			</div>
			<div class="mb-6">
				<label class="form-label" for="customer-address">Customer Address</label>
				<textarea class="form-control" id="customer-address" name="customer_address_230012"
					placeholder="Enter customer address"></textarea>
			</div>
			<div class="mb-6">
				<label class="form-label" for="customer-phone">Customer Phone</label>
				<input type="text" class="form-control" id="customer-phone" name="customer_phone_230012"
					placeholder="Enter customer phone" />
			</div>
			<input type="submit" class="btn btn-primary" name="submit" value="Sale">
		</form>
	</div>
</div>
