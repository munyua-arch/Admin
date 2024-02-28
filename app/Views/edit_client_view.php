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
            <div class="text-center">
                <h4>Client Profile Edit</h4>
            </div>

            <?php if($page_session->getTempdata('client_edit_success')):?>
                <div class="alert alert-success">
                    <?= $page_session->getTempdata('client_edit_success');?>
                </div>
            <?php endif;?>

            <?php if($page_session->getTempdata('client_edit_error')):?>
                <div class="alert alert-success">
                    <?= $page_session->getTempdata('client_edit_error');?>
                </div>
            <?php endif;?>

            <?= form_open();?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="username" value="<?= set_value($client['username'])?>">
                                <label for="floatingInput">Username</label>
                               
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@email.com" value="<?= set_value($client['email'])?>">
                                <label for="floatingInput">Email</label>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="location" class="form-control" id="floatingInput" placeholder="location" value="<?= set_value($client['location'])?>">
                                <label for="floatingInput">Location</label>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="ip" class="form-control" id="floatingInput" placeholder="Ip address" value="<?= set_value('ip')?>">
                                <label for="floatingInput">Ip Address</label>
                                
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="tel" name="phone" class="form-control" id="floatingPassword" placeholder="Phone Number" value="<?= set_value($client['phone'])?>">
                                <label for="floatingPassword">254 7xx xxx xxx</label>
                               
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="plan" class="form-control" id="floatingInput" placeholder="plan" value="<?= set_value($client['plan'])?>">
                                <label for="floatingInput">Plan</label>
                                
                            </div>
                        </div>
                        
                    </div>

                    <input type="submit" name="submit" value="Update" class="btn btn-primary mt-3" style="width : 100%;">
                <?= form_close();?>
        </div>

    </section>
    
<?= $this->endSection(); ?>