<div class="container-fluid">
   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-cubes"></i> Show Data Product</h1>
   </div>
   <!-- end Page Heading -->

   <!-- content -->
   <div class="row">
      <div class="col">
         <div class="card shadow mb-4">
            <div class="card-body">
               <form action="#" method="post" enctype="multipart/form-data">
                  <div class="row">
                     <div class="col-9">
                        <div class="form-group">
                           <label class="font-weight-bold">Product Name</label>
                           <input type="text" class="form-control" name="name" id="name" value="<?= $product->name_product ?>" readonly>
                        </div>
                     </div>
                     <div class="col-3">
                        <div class="form-group">
                           <label class="font-weight-bold">Satuan</label>
                           <select name="satuan" id="satuan" class="form-control" readonly>
                              <?php
                              foreach ($satuans as $satuan) :
                                 ?>
                                 <option value="<?= $satuan->id_satuan ?>" <?php if ($satuan->id_satuan == $product->satuan_id) echo 'selected = "selected"' ?>><?= $satuan->name_satuan ?></option>
                              <?php endforeach; ?>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-4">
                        <div class="form-group">
                           <label class="font-weight-bold">Buy</label>
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon1">Rp.</span>
                              </div>
                              <input type="text" class="form-control" placeholder="Username" value="<?= uang($product->beli_product) ?>" readonly>
                           </div>
                        </div>
                     </div>
                     <div class=" col-4">
                        <div class="form-group">
                           <label class="font-weight-bold">Sale</label>
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon1">Rp.</span>
                              </div>
                              <input type="text" class="form-control" placeholder="Username" value="<?= uang($product->jual_product) ?>" readonly>
                           </div>
                        </div>
                     </div>
                     <div class="col-2">
                        <div class="form-group">
                           <label class="font-weight-bold">Stok</label>
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Recipient's username" value="<?= $product->stok_product ?>" readonly>
                              <div class="input-group-append">
                                 <span class="input-group-text" id="basic-addon2">Pcs</span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col">
                        <div class="form-group">
                           <label class="font-weight-bold">Keterangan</label>
                           <textarea name="keterangan" id="keterangan" rows="2" class="form-control" readonly><?= $product->ket_product ?></textarea>
                        </div>
                     </div>
                  </div>
                  <a href="<?= site_url('operator/product') ?>" class="btn btn-warning">
                     <i class="fa fa-reply"></i> &nbsp; Cancel / Back
                  </a>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!-- end content -->
</div>