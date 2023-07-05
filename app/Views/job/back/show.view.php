<div class="card w-100 mb-3">
    <div class="card-header d-flex">
        <h4 class="card-title">Nouveau métier</h4>
        <a href="/admin/job/list" class="btn btn-primary ml-auto">
            <span class="icon text-white-50">
                <i class="fa fa-arrow-left"></i>
            </span>
            <span class="text">Revenir à la liste</span>
        </a>
    </div>
    <div class="container mt-5">
        <div class="w-75">
            <form>
                <div class="form-group">
                    <label for="title">Nom</label>
                    <input type="text" id="name" name="name" class="form-control" value="<?= $job->getName() ?>" readonly>
                </div>
            </form>
        </div>
    </div>
</div>
