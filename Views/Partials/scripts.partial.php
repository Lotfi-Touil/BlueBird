<!-- Inclusion des scripts nécéssaires -->
<script src="/assets/vendor/jquery/jquery.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Inclusion des scripts supplémentaires -->
<?php foreach ($this->scripts as $script) : ?>
    <script src="/<?= $script ?>"></script>
<?php endforeach; ?>