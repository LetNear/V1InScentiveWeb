<!-- Cart Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Cart</h6>
    </div>
    <div class="card-body">
        <a href="<?= base_url("cart/index"); ?>" class="btn btn-warning btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Return to Cart</span>
        </a>

        <?php
        if (isset($validation)) {
            echo '
                <div class="alert alert-danger" role="alert">
                    <ul>';
            foreach ($validation as $error) {
                echo "<li>" . esc($error) . "</li>";
            }
            echo '
                    </ul>
                </div>';
        }
        ?>

   <?= form_open("cart/addToCart"); ?>
        <div class="form-group row">
            <div class="col-sm-4">
                <select class="form-control" id="scent_id" name="scent_id">
                    <option value="">Select Scent</option>
                    <?php foreach ($scents as $scent): ?>
                        <option value="<?= $scent["id"] ?>"><?= $scent["name"] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-sm-4">
                <select class="form-control" id="user_id" name="user_id">
                    <option value="">Select User</option>
                    <?php foreach ($users as $user): ?>
                        <option value="<?= $user["userID"] ?>"><?= $user["nickName"] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-user" id="quantity" name="quantity" value=""
                    placeholder="Quantity">
            </div>
        </div>

        <button class="btn btn-primary btn-block">
            <i class="fas fa-cart-plus"></i> Add to Cart
        </button>
        </form>
    </div>
</div>
