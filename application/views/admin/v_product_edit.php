<div class="container-fluid">
   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-cubes"></i> Edit Data Product</h1>
   </div>
   <!-- end Page Heading -->

   <!-- content -->
   <div class="row">
      <div class="col">
         <div class="card shadow mb-4">
            <div class="card-body">
               <form action="<?= site_url('admin/product/update/' . $product->id_product) ?>" method="post" enctype="multipart/form-data">
                  <div class="row">
                     <div class="col-9">
                        <div class="form-group">
                           <label class="font-weight-bold">Product Name</label>
                           <input type="text" class="form-control" name="name" id="name" value="<?= $product->name_product ?>">
                        </div>
                     </div>
                     <div class="col-3">
                        <div class="form-group">
                           <label class="font-weight-bold">Satuan</label>
                           <select name="satuan" id="satuan" class="form-control">
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
                           <input type="number" class="form-control" name="beli" id="beli" value="<?= $product->beli_product ?>">
                        </div>
                     </div>
                     <div class=" col-4">
                        <div class="form-group">
                           <label class="font-weight-bold">Sale</label>
                           <input type="number" class="form-control" name="jual" id="jual" value="<?= $product->jual_product ?>">
                        </div>
                     </div>
                     <div class="col-2">
                        <div class="form-group">
                           <label class="font-weight-bold">Stok</label>
                           <input type="number" class="form-control" name="stok" id="stok" value="<?= $product->stok_product ?>">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col">
                        <div class="form-group">
                           <label class="font-weight-bold">Keterangan</label>
                           <textarea name="keterangan" id="keterangan" rows="2" class="form-control"><?= $product->ket_product ?></textarea>
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
   <!-- end content -->
</div>