<div class="row">
	<div class="col-md-12">
		<div class="card mb-6">
			<!-- Account -->
			<div style="color: red;"><?= validation_errors() ?></div>
			<?= $this->session->flashdata('msg') ?>
			<div class="card-body">
				<div class="d-flex align-items-start align-items-sm-center gap-6 py-4">
					<img src="<?= base_url('uploads/users/' . $this->session->userdata('photo_230012')) ?>"
						alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
					<div class="button-wrapper">
						<form action="<?= site_url('auth230012/changephoto') ?>" method="post"
							enctype="multipart/form-data">
							<label for="upload" class="btn btn-outline-primary me-3 mb-4" tabindex="0">
								<span class="d-none d-sm-block">Upload new photo</span>
								<i class="icon-base bx bx-upload d-block d-sm-none"></i>
								<input type="file" id="upload" name="photo" class="account-file-input" hidden />
							</label>

							<input type="submit" name="upload" class="btn btn-primary mb-4" value="Save Change">
						</form>
						<div>Allowed JPG, GIF or PNG. Max size of 800K</div>
					</div>
				</div>
			</div>
			<!-- /Account -->
		</div>

		<div class="card mb-6">
			<div class="card-body pt-4">
				<form id="formAccountSettings" method="POST" action="<?= site_url('user230012/update_profile') ?>">
					<div class="row g-6">
						<div class="col-md-6">
							<label for="username_230012" class="form-label">Username</label>
							<input class="form-control" type="text" id="username_230012" name="username_230012"
								value="<?= $this->session->userdata('username_230012') ?>"
								placeholder="Enter your username" />
						</div>
						<div class="col-md-6">
							<label for="fullname_230012" class="form-label">Full Name</label>
							<input class="form-control" type="text" id="fullname_230012" name="fullname_230012"
								value="<?= $this->session->userdata('fullname_230012') ?>"
								placeholder="Enter your full name" />
						</div>
						<div class="col-md-6">
							<label for="usertype_230012" class="form-label">User Type</label>
							<input class="form-control" type="text" id="usertype_230012" name="usertype_230012"
								value="<?= $this->session->userdata('usertype_230012') ?>" placeholder="" disabled />
						</div>
					</div>
					<div class="mt-6">
						<input type="submit" name="submit" class="btn btn-primary me-3" value="Save Changes">
					</div>
				</form>
			</div>
		</div>
		<div class="card">
			<h5 class="card-header">Change Password</h5>
			<div class="card-body">
				<form id="formAccountDeactivation" method="POST" action="<?= site_url('auth230012/changepassword') ?>">
					<div class="mb-3">
						<label for="old_password_230012" class="form-label">Old Password</label>
						<input class="form-control" type="password" id="old_password_230012" name="old_password_230012"
							value="" placeholder="Enter your Old Password" />
					</div>
					<div class="mb-3">
						<label for="password_230012" class="form-label">New Password</label>
						<input class="form-control" type="password" id="new_password_230012" name="new_password_230012" value=""
							placeholder="Enter your New Password" />
					</div>
					<div class="mt-6">
						<input type="submit" class="btn btn-primary" name="change" value="Save Changes">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
