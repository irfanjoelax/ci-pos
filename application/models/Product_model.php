<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
   private $_table = 'products';

   public function get_all()
   {
      $this->db->order_by('id_product', 'DESC');
      return $this->db->get($this->_table)->result();
   }

   public function get_id($id)
   {
      $this->db->where('id_product', $id)->limit(1);
      return $this->db->get($this->_table)->row();
   }

   public function get_where($data = array())
   {
      return $this->db->get_where($this->_table, $data)->row();
   }

   public function go_insert()
   {
      $data = array(
         'name_product'   => strtoupper($this->input->post('name', TRUE)),
         'beli_product'   => $this->input->post('beli', TRUE),
         'jual_product'   => $this->input->post('jual', TRUE),
         'stok_product'   => $this->input->post('stok', TRUE),
         'satuan_id'      => $this->input->post('satuan', TRUE),
         'ket_product'    => $this->input->post('keterangan', TRUE),
      );

      return $this->db->insert($this->_table, $data);
   }

   public function go_update($id)
   {
      $data = array(
         'name_product'   => strtoupper($this->input->post('name', TRUE)),
         'beli_product'   => $this->input->post('beli', TRUE),
         'jual_product'   => $this->input->post('jual', TRUE),
         'stok_product'   => $this->input->post('stok', TRUE),
         'satuan_id'      => $this->input->post('satuan', TRUE),
         'ket_product'    => $this->input->post('keterangan', TRUE),
      );

      return $this->db->where('id_product', $id)->update($this->_table, $data);
   }

   public function go_delete($id)
   {
      return $this->db->where('id_product', $id)->delete($this->_table);
   }

   public function go_update_stok($id, $data = array())
   {
      return $this->db->where('id_product', $id)->update($this->_table, $data);
   }

   public function upload_data($filename)
   {
      ini_set('memory_limit', '-1');
      $inputFileName = './upload/excel/' . $filename;
      try {
         $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
      } catch (Exception $e) {
         die('Error loading file :' . $e->getMessage());
      }

      $worksheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
      $numRows = count($worksheet);

      for ($i = 2; $i < ($numRows + 1); $i++) {
         $ins = array(
            "name_product"    => strtoupper($worksheet[$i]["A"]),
            "beli_product"    => $worksheet[$i]["B"],
            "jual_product"    => $worksheet[$i]["C"],
            "stok_product"    => $worksheet[$i]["D"],
            "satuan_id"       => $worksheet[$i]["E"],
            "ket_product"     => $worksheet[$i]["F"]
         );

         $this->db->insert($this->_table, $ins);
      }
   }
}

/* End of file Product_model.php */
