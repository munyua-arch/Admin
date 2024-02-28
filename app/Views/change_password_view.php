<?php 

$page_session = \CodeIgniter\Config\Services::session();
?>

<?= $this->extend('backend/page-layouts'); ?>
<?= $this->section('content'); ?>

<section>

    <div class="container">
            <div class="row">
                <div class="col">
                    <h4>Change Password</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url().'dashboard/';?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                        </ol>
                    </nav>
                </div>
            </div>
    </div>

    <div class="container mt-5">
        <div class="text-center mt-3">
            <h2>Change Password</h2>
        </div>

        <?php if($page_session->getTempdata('password_success')): ?>
            <div class="alert alert-success"><?= $page_session->getTempdata('password_success'); ?></div>
        <?php endif; ?>


        <?php if($page_session->getTempdata('password_error')): ?>
            <div class="alert alert-danger"><?= $page_session->getTempdata('password_error'); ?></div>
        <?php endif; ?>

        <div class="row justify-content-center my-5">
            <div class="col-lg-6">
        
                <?= form_open(); ?>

              
                
                    <div class="form-floating mb-3">
                      <input type="password" name="old_password" class="form-control" id="floatingInput" placeholder="old password" value="<?= set_value('old_password')?>">
                      <label for="floatingInput">Old password</label>
                      <span class="text-danger"><?= display_error($validation, 'old_password'); ?></span>
                     
                    </div>

                     <div class="form-floating mb-3">
                      <input type="password" name="new_password" class="form-control" id="floatingInput" placeholder="new password" value="<?= set_value('new_password')?>">
                      <label for="floatingInput">New password</label>
                      <span class="text-danger"><?= display_error($validation, 'new_password'); ?></span>
                     
                    </div>

                     <div class="form-floating mb-3">
                      <input type="password" name="confirm_password" class="form-control" id="floatingInput" placeholder="Confirm password" value="<?= set_value('confirm_password')?>">
                      <label for="floatingInput">Confirm password</label>
                      <span class="text-danger"><?= display_error($validation, 'confirm_password'); ?></span>
                     
                    </div>
                    
            

                    <input type="submit" name="submit" value="Send" class="btn btn-primary mt-3">
                <?= form_close(); ?>
            </div>
             
        </div>
    </div>
</section>

<?= $this->endSection(); ?>