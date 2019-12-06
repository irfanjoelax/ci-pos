<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-cubes"></i> Data Product</h1>
    </div>
    <!-- end Page Heading -->

    <!-- content -->
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <table class="table table-sm table-bordered dataTable" width="100%" cellspacing="0">
                        <thead class="bg-dark text-white">
                            <tr align="center">
                                <th width="15">#</th>
                                <th>Product Name</th>
                                <th width="115">Buy</th>
                                <th width="115">Sale</th>
                                <th width="60">Stok</th>
                                <th width="60">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($products as $product) :
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $product->name_product ?></td>
                                    <td class="text-right">Rp. <?= uang($product->beli_product) ?></td>
                                    <td class="text-right">Rp. <?= uang($product->jual_product) ?></td>
                                    <td class="text-right"><?= uang($product->stok_product) ?></td>
                                    <td align="center">
                                        <a href="<?= site_url('operator/product/show/' . $product->id_product) ?>" class="btn btn-sm btn-success">
                                            <i class="fa fa-eye"></i> Show
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end content -->
</div>