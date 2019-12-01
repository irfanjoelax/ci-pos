<!-- Logout Modal-->
<div class="modal" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave ?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
         </div>
         <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">
               <i class="fa fa-window-close"></i> &nbsp; Cancel
            </button>
            <a class="btn btn-primary" href="<?= site_url('auth/logout') ?>">
               <i class="fa fa-sign-out-alt"></i> &nbsp; Logout
            </a>
         </div>
      </div>
   </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url() ?>/asset/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>/asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>/asset/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url() ?>/asset/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url() ?>/asset/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('asset/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('asset/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<script>
   // Add the following code if you want the name of the file appear on select
   $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
   });

   $('.dataTable').DataTable({
      "processing": true,
      "serverside": true,
      "ordering": false,
   });

   $(function() {
      table = $('.dataTable-cart').DataTable({
         "dom": 'Brt',
         "bSort": false,
         "processing": true,
         "serverside": true,
         "ajax": {
            "url": "<?= site_url('admin/buy/data_cart') ?>",
            "type": "GET"
         }
      }).on('draw.dt', function() {
         loadCart($('#disk').val());
      });

      tableProduct = $('#dataTable-product').DataTable({
         "processing": true,
         "serverside": true,
         "ordering": false,
         "ajax": {
            "url": "<?= site_url('admin/product/data') ?>",
            "type": "GET"
         }
      });

      $('.form-cart').on('submit', function() {
         return false;
      });

      $('#disk').change(function(e) {
         e.preventDefault();
         if ($(this).val() == "") $(this).val(0).select();
         loadCart($(this).val());
      });
   });

   function changeQty(productID) {
      $.ajax({
         type: "POST",
         url: "<?= site_url('admin/buy/update_cart/') ?>" + productID,
         data: {
            qty: $('#qty_' + productID).val()
         },
         success: function(response) {
            table.ajax.reload(function() {
               loadCart($('#disk').val());
            });
            tableProduct.ajax.reload();
         },
         error: function() {
            alert('tidak dapat changeQty');
         }
      });
   }

   function deleteItem(productID) {
      if (confirm("apakah yakin hapus data ?")) {
         $.ajax({
            type: "POST",
            url: "<?= site_url('admin/buy/delete_cart/') ?>" + productID,
            success: function(response) {
               table.ajax.reload(function() {
                  loadCart($('#disk').val());
               });
               tableProduct.ajax.reload();
            },
            error: function() {
               alert('tidak dapat deleteItem');
            }
         });
      }
   }

   function loadCart(diskon = 0) {
      $('#total').val($('.total').text());
      $('#item').val($('.total_item').text());

      $.ajax({
         type: "GET",
         url: "<?= site_url('admin/buy/load_cart/') ?>" + diskon + "/" + $('.total').text(),
         dataType: "JSON",
         success: function(data) {
            $('#bayar').val(data.bayar);
            $('#grand_total').text("Grand Total : " + data.grand_total);
         },
         error: function() {
            alert('tidak dapat loadCart');
         }
      });

   }
</script>

</body>

</html>