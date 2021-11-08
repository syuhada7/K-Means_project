<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kapal_model extends CI_Model
{
  public function get($id = null)
  {
    $this->db->from('kapal');
    if ($id != null) {
      $this->db->where('id_kapal', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'nama_kapal' => $post['tambah_kapal']
    ];
    $this->db->insert('kapal', $params);
  }
}
