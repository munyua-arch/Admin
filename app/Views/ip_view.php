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
                                <li class="breadcrumb-item active" aria-current="page">Ips</li>
                            </ol>
                        </nav>
                    </div>
                </div>
        </div>


        <div class="container">
            <!-- Simple Datatable start -->
					<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Broadcasting IPS</h4>
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
                                            <td class="table-plus">Ap Town</td>
                                            <td>192.168.40.4</td>
                                        </tr>
                                        <tr>
                                            <td class="table-plus">Ap Town 2</td>
                                            <td>192.168.40.12</td>
                                        </tr>
                                        <tr>
                                            <td class="table-plus">Ap Town 3</td>
                                            <td>192.168.40.6</td>
                                        </tr>
                                        <tr>
                                            <td class="table-plus">Keria</td>
                                            <td>192.168.40.10</td>
                                        </tr>
                                        <tr>
                                            <td class="table-plus">Keria 2</td>
                                            <td>192.168.40.11</td>
                                        </tr>
                                        <tr>
                                            <td class="table-plus">Nutriri</td>
                                            <td>192.168.40.9</td>
                                        </tr>
                                        <tr>
                                            <td class="table-plus">Chogoria</td>
                                            <td>192.168.40.55</td>
                                        </tr>
                                        <tr>
                                            <td class="table-plus">Kiangua</td>
                                            <td>192.168.40.16</td>
                                        </tr>
                                        <tr>
                                            <td class="table-plus">PolePole</td>
                                            <td>192.168.40.2</td>
                                        </tr>
                                        <tr>
                                            <td class="table-plus">PolePole</td>
                                            <td>192.168.40.3</td>
                                        </tr>
                                        <tr>
                                            <td class="table-plus">Majira</td>
                                            <td>192.168.40.14</td>
                                        </tr>
                                    </tbody>
                                </table>
						</div>
					</div>
					<!-- Simple Datatable End -->
        </div>

    </section>
    
<?= $this->endSection(); ?>