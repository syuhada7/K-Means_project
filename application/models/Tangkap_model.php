<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tangkap_model extends CI_Model
{
  public function get($id = null)
  {
    $this->db->from('tangkap');
    if ($id != null) {
      $this->db->where('id_catch', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'nama_catch' => $post['tambah_tangkap']
    ];
    $this->db->insert('tangkap', $params);
  }
}
