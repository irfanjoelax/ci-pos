<div class="container-fluid">
   <?= $this->session->flashdata('message') ?>
</div>
<div class="container-fluid">
   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-cart-plus"></i> Transaction Buying</h1>
      <h1 class="h3 mb-0 text-gray-800" id="grand_total"></h1>
   </div>
   <!-- end Page Heading -->

   <form action="<?= site_url('admin/buy/update') ?>" method="post" enctype="multipart/form-data">
      <!-- content -->
      <div class="row">
         <div class="col-12">
            <div class="card shadow mb-4">
               <div class="card-body">
                  <div class="row">
                     <div class="col-6">
                        <input type="text" name="supplier" id="supplier" class="form-control" value="<?= $this->session->userdata('name_supp') ?>" readonly>
                     </div>
                     <div class="col-3">
                        <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#productModal">
                           <i class="fa fa-search"></i> Choose Product
                        </button>
                     </div>
                  </div>

                  <hr>
                  <form class="form-cart" method="post">
                     <div class="row">
                        <div class="col">
                           <table class="table table-sm table-hover dataTable-cart" width="100%" cellspacing="0">
                              <thead class="bg-dark text-white">
                                 <tr align="center">
                                    <th width="15">#</th>
                                    <th>Product Name</th>
                                    <th width="115">Price</th>
                                    <th width="70">Qty</th>
                                    <th width="115">Subtotal</th>
                                    <th width="50">Action</th>
                                 </tr>
                              </thead>
                              <tbody></tbody>
                           </table>
                        </div>
                     </div>
                  </form>

                  <div class="row">
                     <div class="col-6">
                        <div class="row">
                           <div class="col-2">
                              <div class="form-group">
                                 <label class="font-weight-bold">Item</label>
                                 <input type="text" class="form-control" name="item" id="item" readonly>
                              </div>
                           </div>
                           <div class="col-4">
                              <div class="form-group">
                                 <label class="font-weight-bold">Total</label>
                                 <input type="text" class="form-control" name="total" id="total" readonly>
                              </div>
                           </div>
                           <div class="col-2">
                              <div class="form-group">
                                 <label class="font-weight-bold">Diskon</label>
                                 <input type="number" class="form-control" name="disk" id="disk" value="0">
                              </div>
                           </div>
                           <div class="col-4">
                              <div class="form-group">
                                 <label class="font-weight-bold">Grand Total</label>
                                 <input type="text" class="form-control" name="bayar" id="bayar" readonly>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-6">
                        <div class="form-group">
                           <label class="font-weight-bold">Button action</label><br>
                           <button type="submit" class="btn btn-primary">
                              <i class="fa fa-save"></i> &nbsp; Save Transaction
                           </button>
                           <a href="<?= site_url('admin/buy/delete/' . $this->session->userdata('sess_id')) ?>" class="btn btn-danger">
                              <i class="fa fa-undo"></i> &nbsp; Cancel / Back
                           </a>
                        </div>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end content -->
   </form>
</div>

<!-- product Modal-->
<div class="modal" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">List Product</h5>
         </div>
         <form action="" method="post">
            <div class="modal-body">
               <table class="table table-sm table-bordered" id="dataTable-product" width="100%" cellspacing="0">
                  <thead class="bg-dark text-white">
                     <tr align="center">
                        <th width="600">Product Name</th>
                        <th width="70">Buy</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody></tbody>
               </table>
            </div>
         </form>
      </div>
   </div>
</div>