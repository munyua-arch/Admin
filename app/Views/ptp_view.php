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
                                <li class="breadcrumb-item active" aria-current="page">PTP</li>
                            </ol>
                        </nav>
                    </div>
                </div>
        </div>


        <div class="container">
            <!-- Simple Datatable start -->
					<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">PTP IPS</h4>
						</div>
						<div class="pb-20">
                                <table class="data-table table stripe hover nowrap">
                                    <thead>
                                        <tr>
                                            <th class="table-plus datatable-nosort">Name</th>
                                            <th>IP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="table-plus">Bedah PTP 2</td>
                                            <td>192.168.40.7</td>
                                        </tr>
                                        <tr>
                                            <td class="table-plus">Bedah BH Keria</td>
                                            <td>192.168.40.8</td>
                                        </tr>
                                        <tr>
                                            <td class="table-plus">Makuri BH</td>
                                            <td>192.168.40.29</td>
                                        </tr>
                                        <tr>
                                            <td class="table-plus">Bedah Bh</td>
                                            <td>192.168.40.5</td>
                                        </tr>
                                    </tbody>
                                </table>
						</div>
					</div>
					<!-- Simple Datatable End -->
        </div>

    </section>
    
<?= $this->endSection(); ?>