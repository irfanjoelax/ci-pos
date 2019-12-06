<div class="container-fluid">
    <?= $this->session->flashdata('message') ?>
</div>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-cart-plus"></i> Data Sell</h1>
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
                                <th width="125">Date</th>
                                <th>Customer Name</th>
                                <th width="20">Item</th>
                                <th width="100">Total</th>
                                <th width="40">Disk</th>
                                <th width="100">Grand Total</th>
                                <th width="70">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($sells as $sell) :
                                ?>
                                <tr>
                                    <td class="text-center"><?= tanggal($sell->tgl_sell) ?></td>
                                    <td><?= $sell->name_customer ?></td>
                                    <td class="text-center"><?= uang($sell->item_sell) ?></td>
                                    <td class="text-right">Rp. <?= uang($sell->total_sell) ?></td>
                                    <td class="text-right"><?= $sell->disk_sell ?> %</td>
                                    <td class="text-right">Rp. <?= uang($sell->bayar_sell) ?></td>
                                    <td align="center">
                                        <a href="<?= site_url('admin/sell/show/' . $sell->id_sell) ?>" class="btn btn-sm btn-success">
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