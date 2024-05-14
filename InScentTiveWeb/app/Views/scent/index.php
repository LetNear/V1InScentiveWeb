<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">SCENT TABLE</h6>
    </div>
    <div class="card-body">
        <a href="<?= base_url("scent/create"); ?>" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Add Scent</span>
        </a>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Scent ID</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Description</th> <!-- New column -->
                        <th>Functions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Scent ID</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Description</th> <!-- New column -->
                        <th>Functions</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    foreach ($scent_info as $scent) {
                        echo "<tr>";
                        echo "<td>" . $scent['id'] . "</td>";
                        echo "<td>" . $scent['name'] . "</td>";
                        echo "<td>" . $scent['qty'] . "</td>";
                        echo "<td>" . $scent['price'] . "</td>";
                        echo "<td>" . $scent['description'] . "</td>"; 
                        echo "
                            <td>
                                <a class='btn btn-warning btn-block' href='" . base_url() . "scent/edit/" . $scent['id'] . "'>
                                    <i class='fas fa-pen'></i> Edit
                                </a>
                                <a class='btn btn-danger btn-block' href='" . base_url() . "scent/delete/" . $scent['id'] . "'>
                                    <i class='fas fa-trash'></i> Delete
                                </a>
                            </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
