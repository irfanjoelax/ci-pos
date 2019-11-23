<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();

      // library load codeigniter
      $this->load->library('form_validation');
   }

   public function index()
   {
      $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
      $this->form_validation->set_rules('password', 'Password', 'required|trim');

      if ($this->form_validation->run() == FALSE) {
         $this->load->view('v_login');
      } else {
         $this->_login();
      }
   }

   private function _login()
   {
      $email      = $this->input->post('email', TRUE);
      $password   = $this->input->post('password', TRUE);

      $where = array(
         'email_user'   => $email,
      );

      $user = $this->user_model->get_where($where);

      if ($user) {
         // cek password
         if (password_verify($password, $user['pass_user'])) {
            $data_session = array(
               'id_user'      => $user['id_user'],
               'name_user'    => $user['name_user'],
               'email_user'   => $user['email_user'],
               'img_user'     => $user['img_user'],
               'role_id'      => $user['role_id'],
            );

            $this->session->set_userdata($data_session);

            if ($user['role_id'] == 1) {
               redirect(site_url('admin/dashboard'));
            } else  if ($user['role_id'] == 2) {
               redirect(site_url('operator/dashboard'));
            }
         } else {
            $this->session->set_flashdata('notif_login_false', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Ooppps !</strong> your password wrong, please try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('auth');
         }
      } else {
         $this->session->set_flashdata('notif_login_false', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Ooppps !</strong> your account not registered in system<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         redirect('auth');
      }
   }

   public function logout()
   {
      $this->session->sess_destroy();
      redirect(site_url('/'));
   }

   // function untuk mengubah data profil user admin yang login
   public function profile()
   {
      // cek session login
      $session = $this->session->userdata('role_id');

      if (empty($session)) {
         redirect(site_url('/'));
      } else {
         if ($session == 1) {
            // load view modular
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar_admin');
            $this->load->view('exe/profile');
            $this->load->view('templates/footer');
            $this->load->view('templates/script');
         } elseif ($session == 2) {
            // load view modular
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar_opt');
            $this->load->view('exe/profile');
            $this->load->view('templates/footer');
            $this->load->view('templates/script');
         }
      }
   }

   public function change_profile($id_user)
   {
      if (!empty($_FILES["image"]["name"])) {
         // jika image ada data atau tidak kosong
         $update = $this->user_model->go_update_profile('img', $id_user);
      } else {
         // jika image tidak ada data atau kosong
         $update = $this->user_model->go_update_profile('null', $id_user);
      }

      if ($update) {
         $where = array(
            'id_user'   => $id_user,
         );

         $user = $this->user_model->get_where($where);

         $data_session = array(
            'id_user'      => $user['id_user'],
            'name_user'    => $user['name_user'],
            'email_user'   => $user['email_user'],
            'img_user'     => $user['img_user'],
            'role_id'      => $user['role_id'],
         );

         $this->session->set_userdata($data_session);

         if ($user['role_id'] == 1) {
            redirect(site_url('admin/dashboard'));
         } else  if ($user['role_id'] == 2) {
            redirect(site_url('operator/dashboard'));
         }
      }
   }
}

/* End of file Auth.php */
