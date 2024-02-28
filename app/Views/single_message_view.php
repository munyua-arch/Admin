<?php
$page_session = \CodeIgniter\Config\Services::session();
?>

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
                                <li class="breadcrumb-item active" aria-current="page">Single SMS</li>
                            </ol>
                        </nav>
                    </div>
                </div>
        </div>

        <div class="container d-flex justify-content-center align-items-center">
            
                 <div class="col-md-6 col-lg-5 mt-5 border shadow p-3" style="height: 55vh; border-radius: 5%;">
                    <div class="text-center mb-3">
                        <h4 class="text-primary">Client Messaging</h4>
                    </div>
                    
                    <div class="mb-3">
                        <h5>Enter the message you want to<br> send</h5>
                    </div>


                    <?php if(isset($error)):?>
                        <div class="alert alert-danger"><?= $error; ?></div>
                    <?php endif;?>


                   
            
                    <?= form_open(); ?>
                    <div class="form-floating mb-3">
                        <input type="tel" name="phone" class="form-control" id="floatingPassword" placeholder="Phone Number" value="<?= set_value('phone'); ?>">
                        <label for="floatingPassword">2547xxxxxxxx</label>
                        <span class="text-danger"><?= display_error($validation, 'phone'); ?></span>
                    </div>
                    
                    <div class="form-floating mb-3">
                        <textarea name="message" class="form-control" id="floatingInput" placeholder="message"><?= set_value('message')?></textarea>
                        <label for="floatingInput">Message</label>
                        <span class="text-danger"><?= display_error($validation, 'message'); ?></span>
                    </div>


                        <input type="submit" name="submit" value="Send Sms" class="btn btn-primary mt-3" style="width : 100%;">
                    <?= form_close(); ?>
                </div>  
            
        </div>

    </section>
    
<?= $this->endSection(); ?>