<div class="container-fluid">
   <?= $this->session->flashdata('message') ?>
</div>
<div class="container-fluid">
   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-cubes"></i> Data Product</h1>
      <a href="<?= site_url('admin/product/create') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white"></i> Add Product</a>
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
                        <th width="130">Action</th>
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
                              <a href="<?= site_url('admin/product/edit/' . $product->id_product) ?>" class="btn btn-sm btn-success">
                                 <i class="fa fa-edit"></i> Edit
                              </a>
                              <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal-<?= $product->id_product ?>">
                                 <i class="fa fa-trash"></i> Delete
                              </button>
                           </td>
                        </tr>

                        <!-- Logout Modal-->
                        <div class="modal" id="deleteModal-<?= $product->id_product ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog modal-sm" role="document">
                              <div class="modal-content">
                                 <div class="modal-header mx-auto">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirm ?</h5>
                                 </div>
                                 <div class="modal-body">
                                    <div class="text-center"><?= $product->name_product ?></div>
                                 </div>
                                 <div class="modal-footer  mx-auto">
                                    <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">
                                       <i class="fa fa-window-close"></i> &nbsp; Cancel
                                    </button>
                                    <a class="btn btn-sm btn-danger" href="<?= site_url('admin/product/delete/' . $product->id_product) ?>">
                                       <i class="fa fa-check"></i> &nbsp; Delete
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
   <!-- end content -->
</div>