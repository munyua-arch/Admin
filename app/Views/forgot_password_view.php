<?php 

$page_session = \CodeIgniter\Config\Services::session();
?>

<?= $this->extend('layouts\base'); ?>
<?= $this->section('content'); ?>

<section>
    <div class="container d-flex justify-content-center align-items-center mt-5">
 
       <div class="col-md-6 col-lg-5 mt-5 border shadow p-3" style="height: 55vh; border-radius: 5%;">
                <div class="text-center mb-5">
                    <h4 class="text-primary">Forgot Password</h4>
                </div>
                
                <div class="mb-3">
                    <h5>Enter your email address to reset your <br> password</h5>
                </div>


                <?php if(isset($error)):?>
                    <div class="alert alert-danger"><?= $error; ?></div>
                <?php endif;?>


                <?php if($page_session->getTempdata('forgot_error')): ?>
                    <div class="alert alert-danger"><?= $page_session->getTempdata('forgot_error'); ?></div>
                <?php endif; ?>

                <?php if($page_session->getTempdata('forgot_success')): ?>
                    <div class="alert alert-success"><?= $page_session->getTempdata('forgot_success'); ?></div>
                <?php endif; ?>
        
                <?= form_open(); ?>
                
                    <div class="form-floating mb-3">
                      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?= set_value('email')?>">
                      <label for="floatingInput">Email address</label>
                      <span class="text-danger"><?= display_error($validation, 'email'); ?></span>
                    </div>

                    <input type="submit" name="submit" value="Submit" class="btn btn-primary mt-3" style="width : 100%;">
                <?= form_close(); ?>
            </div>  

    </div>
</section>

<?= $this->endSection(); ?>