<?= $this->extend('layouts/base')?>
<?= $this->section('content')?>

<?= form_open(); ?>
                

    <div class="container d-flex justify-content-center align-items-center">
        <h2 class="text-primary">Welcome Admin</h2>

        <a href="<?= base_url().'/login-form'?>" class="btn btn-primary">Go to Login</a>
    </div>


<?= $this->endSection()?>