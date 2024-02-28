<?= $this->extend('backend/page-layouts'); ?>
<?= $this->section('content'); ?>
    <section>
        <div class="container">
                <div class="row">
                    <div class="col">
                        <h4>Dashboard</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url().'dashboard/';?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">My Clients</li>
                            </ol>
                        </nav>
                    </div>
                </div>
        </div>


        <div class="container">
            <!-- Simple Datatable start -->
					<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Raha Clients</h4>
						</div>
						<div class="pb-20">
                            <?php if(count($users) > 0):?>
                                <table class="data-table table stripe hover nowrap">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th class="table-plus datatable-nosort">Name</th>
                                            <th>Email</th>
                                            <th>Ip Address</th>
                                            <th>Phone</th>
                                            <th>Location</th>
                                            <th>Plan</th>
                                            <th class="datatable-nosort">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php foreach($users as $u):?>
                                        <tr>
                                            <td><?= $u['id'] ;?></td>
                                            <td class="table-plus"><?= $u['username'];?></td>
                                            <td><?= $u['email'];?></td>
                                            <td><?= $u['ip_address']?></td>
                                            <td>+<?= $u['phone'];?></td>
                                            <td><?= $u['location'];?></td>
                                            <td><?= $u['plan'];?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <a
                                                        class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                        href="#"
                                                        role="button"
                                                        data-toggle="dropdown"
                                                    >
                                                        <i class="dw dw-more"></i>
                                                    </a>
                                                    <div
                                                        class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
                                                    >
                                                        <a class="dropdown-item" href="<?= base_url();?>dashboard/edit-client/<?= $u['id']?>"
                                                            ><i class="dw dw-edit2"></i> Edit</a
                                                        >
                                                        <a class="dropdown-item" href="<?= base_url();?>dashboard/delete-client/<?= $u['id']?>"
                                                            ><i class="dw dw-delete-3"></i> Delete</a
                                                        >
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php endif;?>
						</div>
					</div>
					<!-- Simple Datatable End -->
        </div>

    </section>
    
<?= $this->endSection(); ?>