<div class="container-fluid">
   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-users"></i> Create Data User</h1>
   </div>
   <!-- end Page Heading -->

   <!-- content -->
   <div class="row">
      <div class="col-10">
         <div class="card shadow mb-4">
            <div class="card-body">
               <form action="<?= site_url('admin/user/create') ?>" method="post" enctype="multipart/form-data">
                  <div class="row">
                     <div class="col">
                        <div class="form-group">
                           <label class="font-weight-bold">Name User</label>
                           <input type="text" class="form-control" name="name" id="name" placeholder="Enter user name here.." value="<?= set_value('name') ?>">
                           <?= form_error('name', '<small class="text-danger pl-2">', '</small>') ?>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-8">
                        <div class="form-group">
                           <label class="font-weight-bold">Email User</label>
                           <input type="text" class="form-control" name="email" id="email" placeholder="enter email user here.." value="<?= set_value('email') ?>">
                           <?= form_error('email', '<small class="text-danger pl-2">', '</small>') ?>
                        </div>
                     </div>
                     <div class="col-4">
                        <div class="form-group">
                           <label class="font-weight-bold">Role User</label>
                           <select name="role" id="role" class="form-control">
                              <option value="">Choose role user here..</option>
                              <option value="2">Operator</option>
                              <option value="1">Administrator</option>
                           </select>
                           <?= form_error('role', '<small class="text-danger pl-2">', '</small>') ?>
                        </div>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-primary">
                     <i class="fa fa-save"></i> &nbsp; Save Change
                  </button>
                  <button type="reset" class="btn btn-danger">
                     <i class="fa fa-undo"></i> &nbsp; Reset Form
                  </button>
                  <a href="<?= site_url('admin/user') ?>" class="btn btn-warning">
                     <i class="fa fa-reply"></i> &nbsp; Cancel / Back
                  </a>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!-- end content -->
</div>