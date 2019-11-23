<div class="container-fluid">
   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-cog"></i> Change Password</h1>
   </div>
   <!-- end Page Heading -->

   <!-- content -->
   <div class="row">
      <div class="col-7">
         <div class="card shadow mb-4">
            <div class="card-body">
               <form action="<?= site_url('change-password') ?>" method="post" enctype="multipart/form-data">
                  <div class="row">
                     <div class="col">
                        <div class="form-group">
                           <label class="font-weight-bold">New Password</label>
                           <input type="password" class="form-control" name="password1" id="password1" placeholder="New password type in here..">
                           <?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group">
                           <label class="font-weight-bold">Repeat Password</label>
                           <input type="password" class="form-control" name="password2" id="password2" placeholder="Please repeat new password..">
                        </div>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-primary">
                     <i class="fa fa-save"></i> &nbsp; Save Change
                  </button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>