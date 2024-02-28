<?= $this->extend('backend/page-layouts'); ?>
<?= $this->section('content'); ?>
    <section>
        <div class="container" class="bg-light border ">
            <div class="row">
                <div class="col">
                    <h4>Delete My Account</h4>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url().'dashboard/';?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Delete account</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container d-flex justify-content-center align-items-center">
        <div class="card text-center mb-3 shadow" style="width: 18rem; border-radius: 15px;">
            <div class="card-body">
                <h5 class="card-title">Delete Account</h5>
                <i class="bi bi-exclamation-triangle-fill text-danger" style="font-size: 80px;"></i>
                <p class="card-text alert alert-danger">Are you sure you want to delete your account? <br> Deleting your account is irreversible and will result in the permanent loss <br> of all data associated with your account, including your profile information, settings.</p>

               <!-- Button trigger modal -->
                <div class="d-flex justify-content-center align-items-center">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Delete Account
                    </button>
                </div>
            </div>
        </div>
        

            
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-danger">
                Your account will be deleted permanently!
            </div>
            <div class="modal-footer">
                <a class="btn btn-success" role="button" id="confirmDeleteBtn">Confirm Delete</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
            </div>
        </div>
        </div>

            <script>
                // Add an event listener to the confirm delete button
                document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
                    // Redirect to the deleteAccount controller function
                    window.location.href = '<?= base_url("dashboard/confirm-delete"); ?>';
                });
            </script>
    </section>
<?= $this->endSection(); ?>



<div class="card w-75 mb-3">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Button</a>
  </div>
</div>





