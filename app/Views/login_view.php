<?php 

$page_session = \CodeIgniter\Config\Services::session();
?>

<?= $this->extend('layouts\base'); ?>
<?= $this->section('content'); ?>

<section>
    <div class="container  d-flex justify-content-center align-items-center mt-3">
         <div class="col-md-6 col-lg-5 mt-5 border shadow p-3" style="height: 60vh; border-radius: 5%; d-flex justify-content-center align-items-center">
                <div class="text-center mb-3">
                    <h4>Admin Login</h4>
                </div>

                <?php if($page_session->getTempdata('login_error')):?>
                    <div class="alert alert-danger"><?= $page_session->getTempdata('login_error');?></div>
                <?php endif;?>
        
                <?= form_open(); ?>
                
                    <div class="form-floating mb-3">
                      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?= set_value('email')?>">
                      <label for="floatingInput">Email address</label>
                      <span class="text-danger"><?= display_error($validation, 'email'); ?></span>
                    </div>
                    <div class="form-floating">
                      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                      <label for="floatingPassword">Password</label>
                      <span class="text-danger"><?= display_error($validation, 'password'); ?></span>
                    </div>
            
                    <div class="row mt-3">
                        <div class="col">
                            <p class="text-muted">
                                <a href="<?= base_url(); ?>/forgot-password" class="link-primary link-underline-opacity-0">Forgot Password?</a>
                            </p>
                            <p class="text-muted">
                                <a href="<?= base_url(); ?>/register" class="link-primary link-underline-opacity-0">Create a new admin</a>
                            </p>
                        </div>  
                    </div>

                    <input type="submit" name="submit" value="Login" class="btn btn-primary mt-3" style="width : 100%;">
                <?= form_close(); ?>
            </div>  
        
    </div>
</section>

<?= $this->endSection(); ?>