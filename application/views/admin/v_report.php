<div class="container-fluid">
   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"><i class="fa fa-table"></i>
         View and Print Report
      </h1>
      <a href="#" id="btn-print" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
         <i class="fas fa-print fa-sm text-white"></i> &nbsp; Print Report
      </a>
   </div>
   <!-- end Page Heading -->

   <!-- content -->
   <div class="row">
      <div class="col">
         <div class="card shadow mb-4">
            <div class="card-body">
               <form class="form-inline" method="POST" action="<?= site_url('admin/report/refresh') ?>">
                  <label class="my-1 mr-2" for="start">Start Date</label>
                  <input type="date" class="form-control mb-2 mr-sm-2" name="start" id="start" required>

                  <label class="my-1 mr-2" for="end">End Date</label>
                  <input type="date" class="form-control mb-2 mr-sm-2" name="end" id="end" required>

                  <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-random"></i> &nbsp; Change</button>
                  &nbsp;
                  <a href="<?= site_url('admin/report') ?>" class="btn btn-warning mb-2"><i class="fa fa-reply"></i> &nbsp; Default</a>
               </form>

               <hr>
               <div id="area-print">
                  <table class="table table-sm table-striped dataTable" width="100%" cellspacing="0">
                     <thead>
                        <tr class="text-center">
                           <th width="15">#</th>
                           <th width="130">Date</th>
                           <th width="110">Selling</th>
                           <th width="110">Buying</th>
                           <th width="110">Spending</th>
                           <th width="110">Income</th>
                        </tr>
                     </thead>
                     <tbody></tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end content -->
</div>