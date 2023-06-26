<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <div class="container-fluid">
        <a class="navbar-brand text-primary font-weight-bold" href="#">BLUE BIRD <sup>©</sup></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-dark" aria-current="page" href="#">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="contact">Contact</a>
                </li>
            </ul>
        </div>

        <?= $this->partial('profile') ?>

    </div>
</nav>
<!-- End of Topbar -->