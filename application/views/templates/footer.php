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

   $('#dataTable').DataTable({
      "processing": true,
      "serverside": true,
      "ordering": false,
   });
</script>

</body>

</html>