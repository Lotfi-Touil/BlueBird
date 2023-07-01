<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Connectez-vous</h1>
                                </div>
                                <?php $this->partial("form", $form, $formErrors ?? []) ?>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="/forgot-password">Mot de passe oublié ?</a>
                                </div>
                                <div class="text-center small">
                                    Pas de compte ? <a href="/register">Inscrivez-vous</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
