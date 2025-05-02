<div class="card">
<h5 class="card-header d-flex justify-content-between align-items-center">
		User List
		<a href="<?= site_url('user230012/add') ?>" class="btn btn-primary">Add New User</a>
	</h5>
	<div class="table-responsive text-nowrap">
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Username</th>
					<th>Usertype</th>
					<th>Fullname</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody class="table-border-bottom-0">
				<?php foreach ($users as $user): ?>
				<tr>
					<td><?= $i++ ?></td>
					<td><?= $user->username_230012 ?></td>
					<td><?= $user->usertype_230012 ?></td>
					<td><?= $user->fullname_230012 ?></td>
					<td>
						<div class="dropdown">
							<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
								<i class="icon-base bx bx-dots-vertical-rounded"></i>
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="<?= site_url('user230012/edit/' . $user->id_230012) ?>">
									<i class="icon-base bx bx-edit-alt me-1"></i> Edit
								</a>
								<a class="dropdown-item" href="#" onclick="return confirm('Are you sure you want to delete this User?') ? window.location.href='<?= site_url('user230012/delete/' . $user->id_230012) ?>' : false;">
									<i class="icon-base bx bx-trash me-1"></i> Delete
								</a>
								<a class="dropdown-item" href="<?= site_url('user230012/reset_password/' . $user->id_230012) ?>">
									<i class="icon-base bx bx-reset me-1"></i> Reset Password
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
