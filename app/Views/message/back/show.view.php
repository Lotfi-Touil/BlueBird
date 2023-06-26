<div class="card w-100 mb-3">
    <div class="card-header d-flex">
        <h4 class="card-title">Détails du Message #<?= $message['message_id'] ?></h4>
        <a href="/admin/message/list" class="btn btn-primary ml-auto">
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
                    <label for="object">Object</label>
                    <input type="text" id="object" name="object" class="form-control" value="<?= $message['object'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" class="form-control" readonly><?= $message['message'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="firstname">Firstname</label>
                    <input id="firstname" name="firstname" class="form-control" readonly value="<?= $message['firstname'] ?>">
                </div>
                <div class="form-group">
                    <label for="lastname">Lastname</label>
                    <input id="lastname" name="lastname" class="form-control" readonly value="<?= $message['lastname'] ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" name="email" class="form-control" readonly value="<?= $message['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="categorie">Catégorie</label>
                    <select id="categorie" name="categorie" class="form-control" readonly>
                        <option value="<?= $message['categorie_message_id'] ?>" readonly><?= $message['description'] ?></option>
                    </select>
                </div>
            </form>
        </div>
    </div>
</div>