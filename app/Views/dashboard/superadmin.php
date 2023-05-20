<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h5 class="my-4 fw-500"><?= isset($title) ? $title : '' ?></h5>
        </div>
    </div>
    <div class="row">
        <div class="col-xxl-3 col-lg-4 col-md-6">
            <div class="card mb-3 border-primary" style="border-bottom-width:4px">
                <div class="card-body text-center py-3">
                    <p class="fw-500 text-secondary d-block mb-2">
                        <i class="fa-solid fa-user-group"></i> 
                        Total Pengguna
                    </p>
                    <h3 class="mb-0"><?= model('Users')->countAll() ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>
