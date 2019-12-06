<div class="container-fluid">
   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">
         <?= $sell_detail->name_customer ?>
      </h1>
      <h5 class="h3 mb-0 text-gray-800">
         <?= tanggal($sell_detail->tgl_sell) ?>
      </h5>
   </div>
   <!-- end Page Heading -->

   <!-- content -->
   <div class="row">
      <div class="col">
         <div class="card shadow mb-4">
            <div class="card-body">
               <table class="table table-sm table-bordered" width="100%" cellspacing="0">
                  <thead class="bg-dark text-white">
                     <tr align="center">
                        <th width="50">#</th>
                        <th>Product Name</th>
                        <th width="120">Price</th>
                        <th width="70">Qty</th>
                        <th width="140">Subtotal</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $no = 1;
                     $total = 0;
                     foreach ($sells as $sell) :
                        $total += $sell->product_price * $sell->product_qty;
                        ?>
                        <tr>
                           <td class="text-center"><?= $no++ ?></td>
                           <td><?= $sell->product_name ?></td>
                           <td class="text-right">Rp. <?= uang($sell->product_price) ?></td>
                           <td class="text-right"><?= $sell->product_qty ?> </td>
                           <td class="text-right">Rp. <?= uang($sell->product_price * $sell->product_qty) ?></td>
                        </tr>
                     <?php endforeach; ?>
                     <tr>
                        <td class="text-right" colspan="3"><strong>Total Item</strong></td>
                        <td class="text-right" colspan="2"><?= $sell_detail->item_sell ?></td>
                     </tr>
                     <tr>
                        <td class="text-right" colspan="3"><strong>Total</strong></td>
                        <td class="text-right" colspan="2"><strong>Rp. <?= uang($total) ?>,-</strong></td>
                     </tr>
                     <tr>
                        <td class="text-right" colspan="3"><strong>Diskon</strong></td>
                        <td class="text-right" colspan="2"><strong><?= $sell_detail->disk_sell ?> %</strong></td>
                     </tr>
                     <tr>
                        <td class="text-right" colspan="3"><strong>Grand Total</strong></td>
                        <td class="text-right" colspan="2"><strong>Rp. <?= uang($sell_detail->bayar_sell) ?>,-</strong></td>
                     </tr>
                     <tr>
                        <td class="text-right" colspan="5"><strong><?= ucwords(terbilang($sell_detail->bayar_sell)) ?> Rupiah</strong></td>
                     </tr>
                  </tbody>
               </table>
               <div class="text-right">
                  <a href="<?= site_url('admin/sell') ?>" class="btn btn-warning">
                     <i class="fa fa-undo"></i> &nbsp; Back
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end content -->
</div>