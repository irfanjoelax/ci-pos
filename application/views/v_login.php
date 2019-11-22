<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">

   <title><?= TITLE ?></title>

   <link rel="shortcut icon" href="<?= base_url('asset/ci-icon.ico') ?>" type="image/x-icon">

   <!-- Custom fonts for this template-->
   <link href="<?= base_url('asset/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

   <!-- Custom styles for this template-->
   <link href="<?= base_url('asset/css/sb-admin-2.min.css" rel="stylesheet') ?>">
</head>

<body class="bg-gradient-primary">
   <div class="container">
      <div class="row justify-content-center mt-3">
         <div class="col-md-5 mt-5">
            <?= $this->session->flashdata('notif_login_false') ?>
            <div class="card o-hidden border-0 shadow-lg my-5">
               <div class="card-body">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="p-5">
                           <div class="text-center">
                              <h1 class="h4 text-gray-900 mb-4">
                                 <i class="fa fa-user"></i>&nbsp;&nbsp;<?= TITLE ?> LOGIN PAGE
                              </h1>
                           </div>
                           <form action="<?= site_url('auth') ?>" method="post" class="user">
                              <div class="form-group">
                                 <input type="text" name="email" id="email" class="form-control form-control-user" placeholder="Enter email here" value="<?= set_value('email') ?>">
                                 <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                              </div>
                              <div class="form-group">
                                 <input type="password" name="password" id="password" class="form-control form-control-user" placeholder="Password">
                                 <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                              </div>
                              <button type="submit" id="log_submit" class="btn btn-primary btn-user btn-block"><i class="fa fa-unlock-alt"></i> &nbsp; <strong>L O G I N</strong></button>
                           </form>
                           <hr>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Bootstrap core JavaScript-->
   <script src="<?= base_url('asset/vendor/jquery/jquery.min.js') ?>"></script>
   <script src="<?= base_url('asset/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

   <!-- Core plugin JavaScript-->
   <script src="<?= base_url('asset/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

   <!-- Custom scripts for all pages-->
   <script src="<?= base_url('asset/js/sb-admin-2.min.js') ?>"></script>

</body>

</html>