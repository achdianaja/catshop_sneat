<?php
	$username = '';
	$usertype = '';
    $fullname = '';
	if (isset($users)) {
		$username = $users->username_230012;
		$usertype = $users->usertype_230012;
        $fullname = $users->fullname_230012;
	}
	?>

<div class="row mb-6 gy-6">
	<div class="col-xl">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<h5 class="mb-0">User Form</h5>
				<small class="text-body float-end">
					<a href="<?= base_url('user230012') ?>" class="btn btn-sm btn-outline-secondary">Back</a>
				</small>
			</div>
			<div class="card-body">
				<form action="" method="POST">
					<div style="color: red;"><?= validation_errors() ?></div>
					<div class="mb-6">
						<label class="form-label" for="username_230012">Username</label>
						<input type="text" class="form-control" id="username_230012" name="username_230012"
							value="<?= $username ?>" placeholder="Enter username">
					</div>
					<div class="mb-6">
						<label class="form-label" for="usertype_230012">Usertype</label>
						<select class="form-control" id="usertype_230012" name="usertype_230012">
							<option value="Manager" <?= ($usertype == 'Manager') ? 'selected' : '' ?>>Manager</option>
							<option value="Cashier" <?= ($usertype == 'Cashier') ? 'selected' : '' ?>>Cashier</option>
						</select>
					</div>
					<div class="mb-6">
						<label class="form-label" for="fullname_230012">Fullname</label>
						<input type="text" class="form-control" id="fullname_230012" name="fullname_230012"
							value="<?= $fullname ?>" placeholder="Enter fullname">
					</div>
					<input type="submit" class="btn btn-primary" name="submit" value="Save">
					<button type="reset" class="btn btn-secondary">RESET</button>
				</form>
			</div>
		</div>
	</div>
</div>
