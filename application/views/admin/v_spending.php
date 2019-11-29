<div class="container-fluid">
   <?= $this->session->flashdata('message') ?>
</div>
<div class="container-fluid">
   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-credit-card"></i> Data Spending</h1>
      <a href="<?= site_url('admin/spending/create') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white"></i> Add Spending</a>
   </div>
   <!-- end Page Heading -->

   <!-- content -->
   <div class="row">
      <div class="col-10">
         <div class="card shadow mb-4">
            <div class="card-body">
               <table class="table table-sm table-bordered dataTable" width="100%" cellspacing="0">
                  <thead class="bg-dark text-white">
                     <tr align="center">
                        <th width="15">#</th>
                        <th>Type Spending</th>
                        <th width="200">Nominal</th>
                        <th width="130">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $no = 1;
                     foreach ($spendings as $spending) :
                        ?>
                        <tr>
                           <td><?= $no++ ?></td>
                           <td><?= $spending->name_spend ?></td>
                           <td class="text-right">Rp. <?= uang($spending->total_spend) ?></td>
                           <td class="text-right">
                              <a href="<?= site_url('admin/spending/edit/' . $spending->id_spend) ?>" class="btn btn-sm btn-success">
                                 <i class="fa fa-edit"></i> Edit
                              </a>
                              <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal-<?= $spending->id_spend ?>">
                                 <i class="fa fa-trash"></i> Delete
                              </button>
                           </td>
                        </tr>

                        <!-- Logout Modal-->
                        <div class="modal" id="deleteModal-<?= $spending->id_spend ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog modal-sm" role="document">
                              <div class="modal-content">
                                 <div class="modal-header mx-auto">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirm ?</h5>
                                 </div>
                                 <div class="modal-body">
                                    <div class="text-center"><?= $spending->name_spend ?></div>
                                 </div>
                                 <div class="modal-footer  mx-auto">
                                    <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">
                                       <i class="fa fa-window-close"></i> &nbsp; Cancel
                                    </button>
                                    <a class="btn btn-sm btn-danger" href="<?= site_url('admin/spending/delete/' . $spending->id_spend) ?>">
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