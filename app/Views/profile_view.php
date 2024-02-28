<?= $this->extend('backend/page-layouts'); ?>
<?= $this->section('content'); ?>

<section>
<div class="container">
            <div class="row">
                <div class="col">
                    <h4>Profile</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url().'dashboard/';?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
    </div>

	

	<div class="row">
						<div class="col">
							<div class="pd-20 card-box height-100-p">
								<div class="profile-photo">
									<a
										href="modal"
										data-toggle="modal"
										data-target="#modal"
										class="edit-avatar"
										><i class="fa fa-pencil"></i
									></a>
									<img
										src=""
										alt="admin"
										class="avatar-photo"
									/>
									<div
										class="modal fade"
										id="modal"
										tabindex="-1"
										role="dialog"
										aria-labelledby="modalLabel"
										aria-hidden="true"
									>
										<div
											class="modal-dialog modal-dialog-centered"
											role="document"
										>
											<div class="modal-content">
												<div class="modal-body pd-5">
													<div class="img-container">
														<img
															id="image"
															src=""
															alt="Picture"
															style="height: 100; width: 100;"
														/>
													</div>
												</div>
												<div class="modal-footer">
													<a href="<?= base_url().'dashboard/avatar'?>"
														class="btn btn-primary"
														role="button"
											
													>Update</a>
													<button
														type="button"
														class="btn btn-default"
														data-dismiss="modal"
													>
														Close
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<h5 class="text-center h5 mb-0"><?= ucfirst($userdata['username']); ?></h5>
								<p class="text-center text-muted font-14">
									Welcome Back!
								</p>
								<div class="profile-info">
									<h5 class="mb-20 h5 text-blue">Contact Information</h5>
									<ul>
										<li>
											<span>Email Address:</span>
											<?= ucfirst($userdata['email']); ?>
										</li>
										<li>
											<span>Phone Number:</span>
											<?= ucfirst($userdata['phone']); ?>
										</li>
									</ul>
								</div>
								<div>
									<a href="<?= base_url().'dashboard/edit-admin'?>" class="btn btn-primary" role="button" style="width: 100%;">Edit Profile info</a>
								</div>
							</div>
						</div>
					</div>
</section>

<?= $this->endSection(); ?>