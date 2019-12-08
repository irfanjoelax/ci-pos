<div class="container-fluid">
   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-credit-card"></i> Edit Data Spending</h1>
   </div>
   <!-- end Page Heading -->

   <!-- content -->
   <div class="row">
      <div class="col-10">
         <div class="card shadow mb-4">
            <div class="card-body">
               <form action="<?= site_url('admin/spending/update/' . $spending->id_spend) ?>" method="post" enctype="multipart/form-data">
                  <div class="row">
                     <div class="col-9">
                        <div class="form-group">
                           <label class="font-weight-bold">Type Spending</label>
                           <input type="text" class="form-control" name="name" id="name" value="<?= $spending->name_spend ?>">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-5">
                        <div class="form-group">
                           <label class="font-weight-bold">Nominal</label>
                           <input type="number" class="form-control" name="total" id="total" value="<?= $spending->total_spend ?>">
                        </div>
                     </div>
                     <div class="col-5">
                        <div class="form-group">
                           <label class="font-weight-bold">Date</label>
                           <input type="date" class="form-control" name="date" id="date" value="<?= $spending->tgl_spend ?>">
                        </div>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-primary">
                     <i class="fa fa-save"></i> &nbsp; Save Change
                  </button>
                  <a href="<?= site_url('admin/spending') ?>" class="btn btn-warning">
                     <i class="fa fa-reply"></i> &nbsp; Cancel / Back
                  </a>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!-- end content -->
</div>