<?php 

$page_session = \CodeIgniter\Config\Services::session();
?>

<?= $this->extend('layouts\base'); ?>
<?= $this->section('content'); ?>

<section>
    <div class="container  d-flex justify-content-center align-items-center mt-3">
  
            <div class="col-md-6 col-lg-5 mt-5 border shadow p-3" style="height: 85vh; border-radius: 2%;">
                <div class="text-center mb-4">
                    <h4>Create An Admin</h4>
                </div>

                <?php if($page_session->getTempdata('reg_success')): ?>
                    <div class="alert alert-success"><?= $page_session->getTempdata('register_success'); ?></div>
                <?php endif; ?>

                <?php if($page_session->getTempdata('reg_error')): ?>
                    <div class="alert alert-danger"><?= $page_session->getTempdata('error'); ?></div>
                <?php endif; ?>
        
                <?= form_open();?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="username" value="<?= set_value('username')?>">
                                <label for="floatingInput">Username</label>
                                <span class="text-danger"><?= display_error($validation, 'username'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@email.com" value="<?= set_value('email')?>">
                                <label for="floatingInput">Email</label>
                                <span class="text-danger"><?= display_error($validation, 'email'); ?></span>
                            </div>
                        </div>
                    </div>


                   <div class="col">
                        <div class="form-floating mb-3">
                            <input type="tel" name="phone" class="form-control" id="floatingPassword" placeholder="Phone Number" value="<?= set_value('phone'); ?>">
                            <label for="floatingPassword">254 7xx xxx xxx</label>
                                <span class="text-danger"><?= display_error($validation, 'phone'); ?></span>
                        </div>
                    </div>

                    

                    <div class="form-floating mb-3">
                      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" value="<?= set_value('password'); ?>">
                      <label for="floatingPassword">Password</label>
                      <span class="text-danger"><?= display_error($validation, 'password'); ?></span>
                    </div>
                    <div class="form-floating">
                      <input type="password" name="confirm_password" class="form-control" id="floatingPassword" placeholder="Confirm_Password">
                      <label for="floatingPassword">Confirm Password</label>
                      <span class="text-danger"><?= display_error($validation, 'confrim_password'); ?></span>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <p class="text-muted">
                                Have an account?
                                <a href="<?= base_url(); ?>\login" class="link-primary link-underline-opacity-0">Login</a>
                            </p>
                        </div>  
                    </div>

                    <input type="submit" name="submit" value="Submit" class="btn btn-primary mt-3" style="width : 100%;">
                <?= form_close();?>
            </div>  
    </div>
</section>

<?= $this->endSection(); ?>