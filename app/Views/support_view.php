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
                                <li class="breadcrumb-item active" aria-current="page">Support</li>
                            </ol>
                        </nav>
                    </div>
                </div>
        </div>

        <div class="container">
            <div class="alert alert-info border">
                <h3 class="mb-3 text-primary">Please Contact the Developer</h3>
                <p class="text-primary">Phone No: +254740289746</p>
                <p class="text-primary">Email: dmurimi919@gmail.com</p>
            </div>
        </div>

    </section>
    
<?= $this->endSection(); ?>