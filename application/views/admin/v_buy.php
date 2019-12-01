<div class="container-fluid">
   <?= $this->session->flashdata('message') ?>
</div>
<div class="container-fluid">
   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-cart-plus"></i> Data Buy</h1>
      <div>
         <?php if (!empty($this->session->userdata('sess_id'))) : ?>
            <a href="<?= site_url('admin/buy/cart/' . $this->session->userdata('sess_id')) ?>" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm text-white"><i class="fas fa-eye fa-sm text-white"></i> Live Transaction</a>
         <?php endif; ?>
         <button data-toggle="modal" data-target="#supplierModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm text-white"><i class="fas fa-plus fa-sm text-white"></i> Add Buy Transaction</button>
      </div>
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
                        <th>Supplier Name</th>
                        <th width="20">Item</th>
                        <th width="100">Total</th>
                        <th width="40">Disk</th>
                        <th width="100">Grand Total</th>
                        <th width="140">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $no = 1;
                     foreach ($buys as $buy) :
                        ?>
                        <tr>
                           <td><?= tanggal($buy->tgl_buy) ?></td>
                           <td><?= $buy->name_supplier ?></td>
                           <td class="text-center"><?= uang($buy->item_buy) ?></td>
                           <td class="text-right">Rp. <?= uang($buy->total_buy) ?></td>
                           <td class="text-right"><?= $buy->disk_buy ?> %</td>
                           <td class="text-right">Rp. <?= uang($buy->bayar_buy) ?></td>
                           <td align="center">
                              <a href="<?= site_url('admin/buy/show/' . $buy->id_buy) ?>" class="btn btn-sm btn-success">
                                 <i class="fa fa-eye"></i> Show
                              </a>
                              <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal-<?= $buy->id_buy ?>">
                                 <i class="fa fa-trash"></i> Delete
                              </button>
                           </td>
                        </tr>

                        <!-- Logout Modal-->
                        <div class="modal" id="deleteModal-<?= $buy->id_buy ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog modal-sm" role="document">
                              <div class="modal-content">
                                 <div class="modal-header mx-auto">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirm ?</h5>
                                 </div>
                                 <div class="modal-body">
                                    <div class="text-center"><?= $buy->supplier_id ?></div>
                                 </div>
                                 <div class="modal-footer  mx-auto">
                                    <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">
                                       <i class="fa fa-window-close"></i> &nbsp; Cancel
                                    </button>
                                    <a class="btn btn-sm btn-danger" href="<?= site_url('admin/buy/delete/' . $buy->id_buy) ?>">
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

<!-- supplier Modal-->
<div class="modal" id="supplierModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Choose Supplier</h5>
         </div>
         <div class="modal-body">
            <table class="table table-sm table-bordered dataTable" width="100%" cellspacing="0">
               <thead class="bg-dark text-white">
                  <tr align="center">
                     <th width="250">Supplier Name</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  foreach ($suppliers as $supplier) :
                     ?>
                     <tr>
                        <td><?= $supplier->name_supplier ?></td>
                        <td align="center">
                           <a href="<?= site_url('admin/buy/create/' . $supplier->id_supplier) ?>" class="btn btn-sm btn-success">
                              <i class="fa fa-check"></i> Choose
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