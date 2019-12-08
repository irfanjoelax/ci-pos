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
                     <h2 class="card-title"><?= $this->session->userdata('name_user') ?></h2>
                     <p class="card-text"><?= $this->session->userdata('email_user') ?></p>
                     <a href="<?= site_url('operator/sell/create') ?>" class="btn btn-lg btn-success">
                        <i class="fa fa-plus"></i> &nbsp; New Sell
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-6">
         <div class="card">
            <div class="card-body">
               <h2 class="card-title">Welcome to <?= TITLE ?></h2>
               <p class="card-text">Your active login in this application is</p>
               <a href="#" class="btn btn-lg btn-primary">
                  <i class="fa fa-user"></i> &nbsp;Operator
               </a>
            </div>
         </div>
      </div>
   </div>

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