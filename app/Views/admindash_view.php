<?= $this->extend('backend/page-layouts'); ?>
<?= $this->section('content'); ?>
    <section>
        <div class="container">
                <div class="row">
                    <div class="col">
                        <h4>Dashboard</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">Home</li>
                            </ol>
                        </nav>
                    </div>
                </div>
        </div>

<!-- Cards -->
       <div class="container">
            <div class="row">
                <div class="col-sm-6 mb-3 mb-sm-0 col-lg-3">
                    <div class="card shadow bg-subtle-primary" style="border-radius: 20px;">
                    <div class="card-body">
                        <h5 class="card-title">Quick Sms</h5>
                        <p class="card-text">Send batch and group message</p>
                                                <!-- Default dropend button -->
                        <div class="btn-group dropend">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-send"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <!-- Dropdown menu links -->
                                <li><a class="dropdown-item" href="<?= base_url().'dashboard/single-message'?>">Single SMS</a></li>
                                <li><a class="dropdown-item"  href="<?= base_url().'dashboard/group-message'?>">Group SMS</a></li>
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>
               <div class="col-sm-6 mb-3 mb-sm-0 col-lg-3">
                    <div class="card shadow bg-subtle-primary" style="border-radius: 20px;">
                    <div class="card-body">
                        <h5 class="card-title">Quick Access</h5>
                        <p class="card-text">Create, Delete, Update and Read clients</p>
                        <!-- btn to clietns -->
                            <a href="<?= base_url().'dashboard/users'?>" class="btn btn-primary">See all clients</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
       </div>

       <!-- Renewed subs table limit to 5 -->
       <div class="container mt-5">
            <!-- Simple Datatable start -->
					<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Renewed Subscriptions</h4>
                            <h5 class="text-blue h5">Last 5 payments</h5>
                           
                           <a href="<?= base_url().'dashboard/subscriptions'?>" class="btn btn-info ">All Payments</a>
                         
						</div>
						<div class="pb-20">
                            <?php if(count($subscriptions) > 0):?>
                                <table class="data-table table stripe hover nowrap">
                                    <thead>
                                        <tr>
                                            <th class="table-plus datatable-nosort">Name</th>
                                            <th>Phone</th>
                                            <th>Amount</th>
											<th>Plan</th>
                                            <th>Renewed date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php foreach($subscriptions as $subs):?>
                                        <tr>
                                            <td class="table-plus"><?= $subs['username'];?></td>
                                            <td>+<?= $subs['phone'];?></td>
                                            <td><?= $subs['amount'];?></td>
                                            <td><?= $subs['plan'];?></td>
                                            <td><?=date("l d M Y h:i:s", strtotime( $subs['updated_at']))?></td>

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



