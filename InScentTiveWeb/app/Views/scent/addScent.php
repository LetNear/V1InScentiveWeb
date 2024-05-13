<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Scent Table</h6>
    </div>
    <div class="card-body">
        <a href="<?= base_url("scent/index"); ?>" class="btn btn-warning btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Return</span>
        </a>

        <?php
        if (isset($validation)) {
            echo '
                    <div class="alert alert-danger" role="alert">
                    <ul>  
                ';
            foreach ($validation as $validation) {
                echo "<li>" . esc($validation) . "</li>";
            }
            echo '
                        </ul>
                    </div>
                ';
        }
        ?>


        <?= form_open("scent/create"); ?>
        <div class="form-group row">
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-user" id="Name" name="Name" value=""
                    placeholder="Scent Name">
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-user" id="Quantity" name="Quantity" value=""
                    placeholder="Quantity">
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control form-control-user" id="Price" name="Price" value=""
                    placeholder="Price">
            </div>
        </div>
       

        <button class="btn btn-primary btn-block">
            <i class="fas fa-plus"></i> Add Scent
        </button>
        </form>
    </div>
</div>
