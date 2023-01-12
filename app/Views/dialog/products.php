<div class="modal bs-example-modal-products" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Products</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="table-rep-plugin">
                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                        <table id="products_table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </th>
                                    <th>Product Code</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $row) : ?>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </td>
                                    <td><?= $row['product_code'] ?></td>
                                    <td><?= $row['product_name'] ?></td>
                                    <td><?= $row['unit_price'] ?></td>
                                    <td><?= $row['description'] ?></td>
                                    <td hidden><?= $row['id'] ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-dismiss="modal"
                    id="addProducts">Select</button>
            </div>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->