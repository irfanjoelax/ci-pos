<div class="container-fluid">
   <?= $this->session->flashdata('message') ?>
</div>
<div class="container-fluid">
   <div class="row">
      <div class="col-md-6">
         <div class="card">
            <div class="card-body">
               <h2 class="card-title">Welcome to <?= TITLE ?></h2>
               <p class="card-text">Your active login in this application is</p>
               <a href="#" class="btn btn-lg btn-danger">Administrator</a>
            </div>
         </div>
      </div>
      <div class="col-md-6">
         <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
               <div class="col-md-4">
                  <img src="<?= base_url('upload/user/' . $this->session->userdata('img_user')) ?>" class="card-img" alt="...">
               </div>
               <div class="col-md-8">
                  <div class="card-body">
                     <h5 class="card-title"><?= $this->session->userdata('name_user') ?></h5>
                     <p class="card-text"><?= $this->session->userdata('email_user') ?></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>