<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Inscrivez-vous en 30 secondes!</h1>
                        </div>
                        <?php $this->partial("form", $form, $formErrors ?? []) ?>
                        <hr>
                        <div class="text-center small">
                            Déjà un compte ? <a href="/login">Connectez-vous</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>