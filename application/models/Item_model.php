<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item_model extends CI_Model
{
  public function get($id = null)
  {
    $this->db->from('item');
    if ($id != null) {
      $this->db->where('id_item', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'nama_item' => $post['tambah_item']
    ];
    $this->db->insert('item', $params);
  }
}
