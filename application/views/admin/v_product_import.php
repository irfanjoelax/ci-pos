<div class="container-fluid">
   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-cubes"></i> Data Product Import</h1>
   </div>
   <!-- end Page Heading -->

   <!-- content -->
   <div class="row">
      <div class="col-10">
         <div class="card shadow mb-4">
            <div class="card-body">
               <form action="<?= site_url('admin/product/go_import') ?>" method="post" enctype="multipart/form-data">
                  <div class="row">
                     <div class="col-9">
                        <div class="form-group">
                           <label class="font-weight-bold">File Import</label>
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" name="file_import" id="file_import" required>
                              <label class="custom-file-label" for="customFile">Choose file here..</label>
                              <?= form_error('file_import', '<small class="text-danger pl-2">', '</small>') ?>
                           </div>
                        </div>
                     </div>
                     <div class="col-3">
                        <div class="form-group">
                           <label class="font-weight-bold">Example File Excel</label>
                           <div class="custom-file">
                              <a href="<?= site_url('admin/product') ?>" class="btn btn-success">
                                 <i class="fa fa-download"></i> &nbsp; Download here
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-primary">
                     <i class="fa fa-save"></i> &nbsp; Save Change
                  </button>
                  <a href="<?= site_url('admin/product') ?>" class="btn btn-warning">
                     <i class="fa fa-reply"></i> &nbsp; Cancel / Back
                  </a>
               </form>
            </div>
         </div>
      </div>

   </div>

   <!-- end page table -->
</div>
<!-- end container-fluid -->