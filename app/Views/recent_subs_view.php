
<?= $this->extend('backend/page-layouts');?>
<?= $this->section('content'); ?>
    <section>
        <div class="container">
                <div class="row">
                    <div class="col">
                        <h4>Dashboard</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url().'dashboard/';?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Subscriptions</li>
                            </ol>
                        </nav>
                    </div>
                </div>
        </div>


        <div class="container">
            <!-- Simple Datatable start -->
					<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Renewed Subscriptions</h4>
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
                                            <td><?= date("l d M Y h:i:s", strtotime($subs['updated_at']));?></td>

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