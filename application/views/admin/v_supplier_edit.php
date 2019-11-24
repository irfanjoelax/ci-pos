<div class="container-fluid">
   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-truck"></i> Edit Data Supplier</h1>
   </div>
   <!-- end Page Heading -->

   <!-- content -->
   <div class="row">
      <div class="col-10">
         <div class="card shadow mb-4">
            <div class="card-body">
               <form action="<?= site_url('admin/supplier/update/' . $supplier->id_supplier) ?>" method="post" enctype="multipart/form-data">
                  <div class="row">
                     <div class="col-8">
                        <div class="form-group">
                           <label class="font-weight-bold">Supplier Name</label>
                           <input type="text" class="form-control" name="name" id="name" value="<?= $supplier->name_supplier ?>">
                           <?= form_error('name', '<small class="text-danger pl-2">', '</small>') ?>
                        </div>
                     </div>
                     <div class="col-4">
                        <div class="form-group">
                           <label class="font-weight-bold">Contack</label>
                           <input type="text" class="form-control" name="telp" id="telp" value="<?= $supplier->telp_supplier ?>">
                           <?= form_error('telp', '<small class="text-danger pl-2">', '</small>') ?>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col">
                        <div class="form-group">
                           <label class="font-weight-bold">Supplier Address</label>
                           <textarea name="address" id="address" rows="2" class="form-control" placeholder="Enter supplier address here.."><?= $supplier->address_supplier ?></textarea>
                           <?= form_error('address', '<small class="text-danger pl-2">', '</small>') ?>
                        </div>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-primary">
                     <i class="fa fa-save"></i> &nbsp; Save Change
                  </button>
                  <a href="<?= site_url('admin/supplier') ?>" class="btn btn-warning">
                     <i class="fa fa-reply"></i> &nbsp; Cancel / Back
                  </a>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!-- end content -->
</div>