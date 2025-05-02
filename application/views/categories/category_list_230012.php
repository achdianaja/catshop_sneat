<div class="card">
	<h5 class="card-header d-flex justify-content-between align-items-center">
		Category List
		<a href="<?= site_url('category230012/add') ?>" class="btn btn-primary">Add New Category</a>
	</h5>
	<div class="table-responsive text-nowrap">
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Name</th>
					<th>Description</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody class="table-border-bottom-0">
				<?php $i = 1; foreach ($category as $category): ?>
				<tr>
					<td><?= $i++ ?></td>
					<td><?= $category->name_230012 ?></td>
					<td><?= $category->description_230012 ?></td>
					<td>
						<div class="dropdown">
							<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
								<i class="icon-base bx bx-dots-vertical-rounded"></i>
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item"
									href="<?= site_url('category230012/edit/' . $category->id_230012) ?>">
									<i class="icon-base bx bx-edit-alt me-1"></i> Edit
								</a>
								<a class="dropdown-item" href="#"
									onclick="return confirm('Are you sure you want to delete this category?') ? window.location.href='<?= site_url('category230012/delete/' . $category->id_230012) ?>' : false;">
									<i class="icon-base bx bx-trash me-1"></i> Delete
								</a>
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
