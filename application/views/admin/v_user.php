<div class="container-fluid">
   <?= $this->session->flashdata('message') ?>
</div>
<div class="container-fluid">
   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-users"></i> Data User</h1>
      <a href="<?= site_url('admin/user/create') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white"></i> Add User</a>
   </div>
   <!-- end Page Heading -->

   <!-- content -->
   <div class="row">
      <div class="col-10">
         <div class="card shadow mb-4">
            <div class="card-body">
               <table class="table table-sm table-bordered dataTable" width="100%" cellspacing="0">
                  <thead class="bg-dark text-white">
                     <tr class="text-center">
                        <th width="15">#</th>
                        <th width="150">Image Avatar</th>
                        <th>User Name</th>
                        <th>Role User</th>
                        <th width="80">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $no = 1;
                     foreach ($users as $user) :
                        ?>
                        <tr>
                           <td><?= $no++ ?></td>
                           <td class="text-center"><img src="<?= base_url('upload/user/') . $user->img_user ?>" alt="" width="100"></td>
                           <td><?= $user->name_user ?></td>
                           <?php if ($user->role_id == 1) { ?>
                              <td class="text-center text-danger">Administrator</td>
                           <?php } elseif ($user->role_id == 2) { ?>
                              <td class="text-center text-primary">Operator</td>
                           <?php } ?>
                           <td class="text-center">
                              <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal-<?= $user->id_user ?>">
                                 <i class="fa fa-trash"></i> Delete
                              </button>
                           </td>
                        </tr>

                        <!-- Logout Modal-->
                        <div class="modal" id="deleteModal-<?= $user->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog modal-sm" role="document">
                              <div class="modal-content">
                                 <div class="modal-header mx-auto">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirm ?</h5>
                                 </div>
                                 <div class="modal-body">
                                    <div class="text-center"><?= $user->name_user ?></div>
                                 </div>
                                 <div class="modal-footer  mx-auto">
                                    <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">
                                       <i class="fa fa-window-close"></i> &nbsp; Cancel
                                    </button>
                                    <a class="btn btn-sm btn-danger" href="<?= site_url('admin/user/delete/' . $user->id_user) ?>">
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