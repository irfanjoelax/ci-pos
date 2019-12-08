<div class="container-fluid">
   <?= $this->session->flashdata('message') ?>
</div>
<div class="container-fluid">
   <div class="row">
      <div class="col-md-6">
         <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
               <div class="col-md-4">
                  <img src="<?= base_url('upload/user/' . $this->session->userdata('img_user')) ?>" class="card-img" alt="...">
               </div>
               <div class="col-md-8">
                  <div class="card-body">
                     <h3 class="card-title"><?= $this->session->userdata('name_user') ?></h3>
                     <p class="card-text"><?= $this->session->userdata('email_user') ?></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-6">
         <div class="card">
            <div class="card-body">
               <h3 class="card-title">Welcome to <?= TITLE ?></h3>
               <p class="card-text">Your active login in this application as</p>
               <a href="#" class="btn btn-lg btn-danger">Administrator</a>
            </div>
         </div>
      </div>
   </div>

   <!-- Content Row -->
   <div class="row">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Selling</div>
                     <div class="h6 mb-0 font-weight-bold text-gray-800">Rp. <?= uang($total_sell) ?>,-</div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-file fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Buying</div>
                     <div class="h6 mb-0 font-weight-bold text-gray-800">Rp. <?= uang($total_buy) ?>,-</div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-cart-plus fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Spending</div>
                     <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                           <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">Rp. <?= uang($total_spending) ?>,-</div>
                        </div>
                     </div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-credit-card fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Income</div>
                     <div class="h6 mb-0 font-weight-bold text-gray-800">Rp. <?= uang($total_income) ?>,-</div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-comments fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Content Row -->

   <div class="row">
      <!-- Area Chart -->
      <div class="col">
         <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-primary">Chart of Sell</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
               <div class="chart-area">
                  <canvas id="sellChart"></canvas>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>