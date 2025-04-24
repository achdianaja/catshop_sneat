<div class="row">
    <div class="col-md-12">
        <div class="card mb-6">
            <!-- Account -->
            <?= $this->session->flashdata('msg') ?>
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-6 py-4">
                    <img
                        src="<?= base_url('uploads/users/' . $this->session->userdata('photo_230012')) ?>"
                        alt="user-avatar"
                        class="d-block w-px-100 h-px-100 rounded"
                        id="uploadedAvatar" />
                    <div class="button-wrapper">
                        <form action="<?= site_url('auth230012/changephoto') ?>" method="post" enctype="multipart/form-data">
                            <label for="upload" class="btn btn-outline-primary me-3 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Upload new photo</span>
                                <i class="icon-base bx bx-upload d-block d-sm-none"></i>
                                <input
                                    type="file"
                                    id="upload"
                                    name="photo"
                                    class="account-file-input"
                                    hidden />
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
                <form id="formAccountSettings" method="POST" onsubmit="return false">
                    <div class="row g-6">
                        <div class="col-md-6">
                            <label for="username_230012" class="form-label">Username</label>
                            <input
                                class="form-control"
                                type="text"
                                id="username_230012"
                                name="username_230012"
                                value=""
                                placeholder="Enter your username"
                                />
                        </div>
                        <div class="col-md-6">
                            <label for="fullname_230012" class="form-label">Full Name</label>
                            <input
                                class="form-control"
                                type="text"
                                id="fullname_230012"
                                name="fullname_230012"
                                value=""
                                placeholder="Enter your full name" />
                        </div>
                        <div class="col-md-6">
                            <label for="usertype_230012" class="form-label">User Type</label>
                            <input
                                class="form-control"
                                type="text"
                                id="usertype_230012"
                                name="usertype_230012"
                                value=""
                                placeholder="" />
                        </div>
                    </div>
                    <div class="mt-6">
                        <button type="submit" class="btn btn-primary me-3">Save changes</button>
                        <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">Delete Account</h5>
            <div class="card-body">
                <div class="mb-6 col-12 mb-0">
                    <div class="alert alert-warning">
                        <h5 class="alert-heading mb-1">Are you sure you want to delete your account?</h5>
                        <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                    </div>
                </div>
                <form id="formAccountDeactivation" onsubmit="return false">
                    <div class="form-check my-8 ms-2">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="accountActivation"
                            id="accountActivation" />
                        <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
                    </div>
                    <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
                </form>
            </div>
        </div>
    </div>
</div>