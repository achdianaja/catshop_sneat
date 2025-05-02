
<div><?= $this->session->flashdata('msg') ?></div>

<div class="card">
	<h5 class="card-header d-flex justify-content-between align-items-center">
		Cat List
		<a href="<?= site_url('cats230012/add') ?>" class="btn btn-primary">Add New Cat</a>
	</h5>
	<div class="table-responsive text-nowrap">
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Name</th>
					<th>Photo</th>
					<th>Type</th>
					<th>Gender</th>
					<th>Age (Month)</th>
					<th>Price</th>
					<th>Status</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody class="table-border-bottom-0">
				<?php foreach($cats as $cat): ?>
				<tr>
					<td><?= $i++ ?></td>
					<td><?= $cat->name_230012 ?></td>
					<td>
						<img src="<?= base_url('uploads/cats/' . $cat->cats_photo_230012) ?>" height="70" width="auto" alt="Cat Photo">
					</td>
					<td><?= $cat->type_230012 ?></td>
					<td><?= $cat->gender_230012 ?></td>
					<td><?= $cat->age_230012 ?></td>
					<td><?= 'Rp ' . number_format($cat->price_230012, 0, ',', '.') ?></td>	<td>
						<?php if ($cat->sold_230012 == 1): ?>
							<span class="badge bg-label-danger">SOLD</span>
						<?php else: ?>
							<span class="badge bg-label-success">AVAILABLE</span>
						<?php endif; ?>
					</td>
					<td>
						<div class="dropdown">
							<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
								<i class="icon-base bx bx-dots-vertical-rounded"></i>
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="<?= site_url('cats230012/edit/' . $cat->id_230012) ?>">
									<i class="icon-base bx bx-edit-alt me-1"></i> Edit
								</a>
								<a class="dropdown-item" href="<?= site_url('cats230012/delete/' . $cat->id_230012) ?>"
									onclick="return confirm('Are you sure you want to delete this cat?')">
									<i class="icon-base bx bx-trash me-1"></i> Delete
								</a>
								<?php if ($cat->sold_230012 == 0): ?>
									<a class="dropdown-item" href="<?= site_url('sales230012/sale/' . $cat->id_230012) ?>">
										<i class="icon-base bx bx-cart me-1"></i> Mark as Sold
									</a>
								<?php endif; ?>
							</div>
						</div>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<div class="my-3">
	<?= $pagination ?>
</div>
