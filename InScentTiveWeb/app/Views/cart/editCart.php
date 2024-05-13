<!-- Scent Edit Form -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Scent</h6>
    </div>
    <div class="card-body">
        <a href="<?= base_url("/scent/index"); ?>" class="btn btn-warning btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Return</span>
        </a>

        <?php if (isset($validation) && $validation->getErrors()) : ?>
            <div class="alert alert-danger" role="alert">
                <ul>
                    <?php foreach ($validation->getErrors() as $error) : ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if (isset($error_message)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= esc($error_message) ?>
            </div>
        <?php endif; ?>

        <?= form_open("cart/editCartItem/{$scent_info->id}"); ?>
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <input type="hidden" class="form-control form-control-user" id="ScentID" name="ScentID" value="<?= $scent_info->id ?>" placeholder="Scent ID" readonly>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-user" id="Name" name="Name" value="<?= $scent_info->name ?>" placeholder="Name" required>
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-user" id="Quantity" name="Quantity" value="<?= $scent_info->qty ?>" placeholder="Quantity" required>
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-user" id="Price" name="Price" value="<?= $scent_info->price ?>" placeholder="Price" required>
            </div>
        </div>

        <button class="btn btn-warning btn-block">
            <i class="fas fa-pen"></i> Edit Scent
        </button>
        </form>
    </div>
</div>