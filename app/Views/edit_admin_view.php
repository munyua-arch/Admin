<?php

$page_session = \CodeIgniter\Config\Services::session();
?>

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
                                <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
        </div>

        <div class="container">

        <div class="text-center mb-3">
            <h4>Edit Admin Profile</h4>
        </div>

        <?php if($page_session->getTempdata('edit_success')):?>
            <div class="alert alert-success">
                <?= $page_session->getTempdata('edit_success'); ?>
            </div>
        <?php endif; ?>

        <?php if($page_session->getTempdata('edit_error')):?>
            <div class="alert alert-danger">
                <?= $page_session->getTempdata('edit_error'); ?>
            </div>
        <?php endif; ?>

            <?= form_open();?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="username" value="<?= set_value($userdata['username'])?>">
                                <label for="floatingInput">Username</label>
                                <span class="text-danger"><?= display_error($validation, 'username'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@email.com" value="<?= set_value($userdata['email'])?>">
                                <label for="floatingInput">Email</label>
                                <span class="text-danger"><?= display_error($validation, 'email'); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="tel" name="phone" class="form-control" id="floatingPassword" placeholder="Phone Number" value="<?= set_value($userdata['phone'])?>">
                                <label for="floatingPassword">254 7xx xxx xxx</label>
                                <span class="text-danger"><?= display_error($validation, 'phone'); ?></span>
                            </div>
                        </div>                        
                    </div>

                    <input type="submit" name="submit" value="Update" class="btn btn-primary mt-3" style="width : 100%;">
                <?= form_close();?>
        </div>

    </section>
    
<?= $this->endSection(); ?>