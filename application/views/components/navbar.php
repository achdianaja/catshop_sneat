<nav class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme">
	<div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
		<a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
			<i class="icon-base bx bx-menu icon-md"></i>
		</a>
	</div>
	<div class="container-fluid">
		<a class="navbar-brand" href="javascript:void(0)"><?= $title ?></a>

		<ul class="navbar-nav flex-row align-items-center ms-md-auto">
			<!-- User -->
			<li class="nav-item navbar-dropdown dropdown-user dropdown">
				<a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
					<div class="avatar avatar-online">
						<img src="<?= base_url('uploads/users/' . $this->session->userdata('photo_230012')) ?>" alt
							class="w-px-40 h-auto rounded-circle" />
					</div>
				</a>
				<ul class="dropdown-menu dropdown-menu-end">
					<li>
						<div class="dropdown-item">
							<div class="d-flex">
								<div class="flex-shrink-0 me-3">
									<div class="avatar avatar-online">
										<img src="<?= base_url('uploads/users/' . $this->session->userdata('photo_230012')) ?>"
											alt class="w-px-40 h-auto rounded-circle" />
									</div>
								</div>
								<div class="flex-grow-1">
									<h6 class="mb-0"><?= $this->session->userdata('fullname_230012') ?></h6>
									<small
										class="text-body-secondary"><?= $this->session->userdata('usertype_230012') ?></small>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="dropdown-divider my-1"></div>
					</li>
					<li>
						<a class="dropdown-item" href="<?= site_url('user230012/profile') ?>">
							<i class="icon-base bx bx-user icon-md me-3"></i><span>My Profile</span>
						</a>
					</li>
					<li>
						<a class="dropdown-item" href="#">
							<i class="icon-base bx bx-cog icon-md me-3"></i><span>Settings</span>
						</a>
					</li>
					<li>
						<div class="dropdown-divider my-1"></div>
					</li>
					<li>
						<a class="dropdown-item" href="<?= site_url('auth230012/logout') ?>">
							<i class="icon-base bx bx-power-off icon-md me-3"></i><span>Log Out</span>
						</a>
					</li>
				</ul>
			</li>
			<!--/ User -->
		</ul>
	</div>
</nav>
