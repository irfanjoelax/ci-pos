<div class="container-fluid">
   <?= $this->session->flashdata('message') ?>
</div>
<div class="container-fluid">
   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-list"></i> Data Satuan</h1>
      <a href="<?= site_url('admin/satuan/create') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white"></i> Add Satuan</a>
   </div>
   <!-- end Page Heading -->

   <!-- content -->
   <div class="row">
      <div class="col-8">
         <div class="card shadow mb-4">
            <div class="card-body">
               <table class="table table-sm table-bordered dataTable" width="100%" cellspacing="0">
                  <thead class="bg-dark text-white">
                     <tr align="center">
                        <th width="15">#</th>
                        <th>Satuan Name</th>
                        <th width="130">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $no = 1;
                     foreach ($satuans as $satuan) :
                        ?>
                        <tr>
                           <td><?= $no++ ?></td>
                           <td><?= $satuan->name_satuan ?></td>
                           <td align="center">
                              <a href="<?= site_url('admin/satuan/edit/' . $satuan->id_satuan) ?>" class="btn btn-sm btn-success">
                                 <i class="fa fa-edit"></i> Edit
                              </a>
                              <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal-<?= $satuan->id_satuan ?>">
                                 <i class="fa fa-trash"></i> Delete
                              </button>
                           </td>
                        </tr>

                        <!-- Logout Modal-->
                        <div class="modal" id="deleteModal-<?= $satuan->id_satuan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog modal-sm" role="document">
                              <div class="modal-content">
                                 <div class="modal-header mx-auto">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirm ?</h5>
                                 </div>
                                 <div class="modal-body">
                                    <div class="text-center"><?= $satuan->name_satuan ?></div>
                                 </div>
                                 <div class="modal-footer  mx-auto">
                                    <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">
                                       <i class="fa fa-window-close"></i> &nbsp; Cancel
                                    </button>
                                    <a class="btn btn-sm btn-danger" href="<?= site_url('admin/satuan/delete/' . $satuan->id_satuan) ?>">
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