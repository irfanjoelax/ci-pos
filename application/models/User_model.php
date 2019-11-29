<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
   private $_table = 'users';

   public function get_all()
   {
      $this->db->order_by('id_user', 'DESC');
      return $this->db->get($this->_table)->result();
   }

   public function get_where($data = array())
   {
      return $this->db->get_where($this->_table, $data)->row_array();
   }

   public function go_update_profile($null, $id)
   {
      if ($null == "null") {
         // jika tidak ada data image
         $data = array(
            'name_user'    => $this->input->post('name', TRUE),
            'email_user'   => $this->input->post('email', TRUE),
         );

         return $this->db->where('id_user', $id)->update($this->_table, $data);
      } elseif ($null == "img") {
         // jika ada data image
         $data = array(
            'name_user'    => $this->input->post('name', TRUE),
            'email_user'   => $this->input->post('email', TRUE),
            'img_user'     => $this->_upload_image(),
         );

         return $this->db->where('id_user', $id)->update($this->_table, $data);
      }
   }

   public function go_update_password($id)
   {
      $data = array(
         'pass_user'    => password_hash($this->input->post('password1', TRUE), PASSWORD_DEFAULT),
      );

      return $this->db->where('id_user', $id)->update($this->_table, $data);
   }

   /**
    * function membuat upload image yang hanya dapat diakses di dalam class ini
    * dan terdapat fitur untuk compress ukuran pixel gambar
    */
   private function _upload_image()
   {
      $config['upload_path']          = './upload/user';
      $config['allowed_types']        = 'jpg|png|jpeg';

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('image')) {
         $gbr = $this->upload->data();

         // config compress image
         $config['image_library'] = 'gd2';
         $config['source_image'] = './upload/user/' . $gbr['file_name'];
         $config['create_thumb'] = FALSE;
         $config['maintain_ratio'] = FALSE;
         $config['quality'] = '100%';
         $config['width'] = 125;
         $config['height'] = 125;
         $config['new_image'] = './upload/user/' . $gbr['file_name'];

         // load library resize codeigniter
         $this->load->library('image_lib', $config);
         $this->image_lib->resize();

         return $this->upload->data("file_name");
      }
   }

   public function go_insert()
   {
      $data = array(
         'name_user'    => strtoupper($this->input->post('name', TRUE)),
         'email_user'   => $this->input->post('email', TRUE),
         'pass_user'    => password_hash('123456', PASSWORD_DEFAULT),
         'img_user'     => 'default.png',
         'role_id'      => $this->input->post('role', TRUE)
      );

      return $this->db->insert($this->_table, $data);
   }

   public function go_delete($id)
   {
      return $this->db->where('id_user', $id)->delete($this->_table);
   }
}

/* End of file User_model.php */
