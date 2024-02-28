<?php 

$page_session = \CodeIgniter\Config\Services::session();
?>

<?= $this->extend('layouts\base'); ?>
<?= $this->section('content'); ?>

<section>
    <div class="container d-flex justify-content-center align-items-center mt-4">
      
            <div class="col-md-6 col-lg-5 mt-5 border shadow p-3" style="height: 60vh; border-radius: 5%;">
                <div class="text-center mb-5">
                    <h4>Reset Password</h4>
                </div>

                <div class="mb-3">
                    <h5>Enter your new password and submit</h5>
                </div>

                <?php if($page_session->getTempdata('reset_success')): ?>
                    <div class="alert alert-success"><?= $page_session->getTempdata('reset_success'); ?></div>
                <?php endif; ?>


                <?php if($page_session->getTempdata('reset_error')): ?>
                    <div class="alert alert-danger"><?= $page_session->getTempdata('reset_error'); ?></div>
                <?php endif; ?>

                    
                <?= form_open(); ?>
                
                    <div class="form-floating mb-3">
                      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" value="<?= set_value('password')?>">
                      <label for="floatingPassword" class="lead">New Password</label>
                      <span class="text-danger"><?= display_error($validation, 'password'); ?></span>
                    </div>

                    
                    <div class="form-floating mb-3">
                      <input type="password" name="confirm_password" class="form-control" id="floatingPassword" placeholder="Password">
                      <label for="floatingPassword" class="lead">Confirm Password</label>
                      <span class="text-danger"><?= display_error($validation, 'confirm_password'); ?></span>
                    </div>

                    <input type="submit" name="submit" value="Submit" class="btn btn-primary mt-3" style="width : 100%;">
                <?= form_close(); ?>
            </div>  
    </div>
</section>

<?= $this->endSection(); ?>