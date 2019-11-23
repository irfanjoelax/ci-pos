<div class="container-fluid">
   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-users"></i> Setting Profile</h1>
   </div>
   <!-- end Page Heading -->

   <!-- content -->
   <div class="row">
      <div class="col-2">
         <div class="card shadow mb-4">
            <div class="card-body">
               <img src="<?= base_url('upload/user/' . $this->session->userdata('img_user')) ?>" class="img-thumbnail rounded mx-auto d-block">
            </div>
         </div>
      </div>
      <div class="col-10">
         <div class="card shadow mb-4">
            <div class="card-body">
               <form action="<?= site_url('auth/change_profile/' . $this->session->userdata('id_user')) ?>" method="post" enctype="multipart/form-data">
                  <div class="row">
                     <div class="col-6">
                        <div class="form-group">
                           <label class="font-weight-bold">Name User</label>
                           <input type="text" class="form-control" name="name" id="name" value="<?= $this->session->userdata('name_user') ?>">
                        </div>
                     </div>
                     <div class="col-6">
                        <div class="form-group">
                           <label class="font-weight-bold">Email address</label>
                           <input type="text" class="form-control" name="email" id="email" value="<?= $this->session->userdata('email_user') ?>">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-8">
                        <div class="form-group">
                           <label class="font-weight-bold">Image User</label>
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" name="image" id="customFile">
                              <label class="custom-file-label" for="customFile">Choose file here..</label>
                           </div>
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

   <!-- end page table -->
</div>
<!-- end container-fluid -->