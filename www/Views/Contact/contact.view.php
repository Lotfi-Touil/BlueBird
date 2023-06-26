<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <?php $this->partial("form", $form, $formErrors ?? []) ?>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>