<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
  public function get($id = null)
  {
    $this->db->from('transaksi');
    if ($id != null) {
      $this->db->where('id_transaksi', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function getAll($id = null)
  {
    $this->db->select('transaksi.*, item.nama_item as barang, kapal.nama_kapal as vessel, tangkap.nama_catch as metode, jenis.nama_jenis as js');
    $this->db->from('transaksi');
    $this->db->join('item', 'item.id_item = transaksi.id_item');
    $this->db->join('kapal', 'kapal.id_kapal = transaksi.id_kapal');
    $this->db->join('tangkap', 'tangkap.id_catch = transaksi.id_catch');
    $this->db->join('jenis', 'jenis.id_jenis = transaksi.id_jenis');
    if ($id != null) {
      $this->db->where('id_transaksi', $id);
    }
    $this->db->order_by('no_biling', 'ASC');
    $query = $this->db->get();
    return $query;
  }

  public function inadd($post)
  {
    $params = [
      'no_biling' => $post['no_biling'],
      'id_item'   => $post['item'],
      'id_kapal'  => $post['kapal'],
      'id_catch'  => $post['tangkap'],
      'qty'       => $post['qty'],
      'id_jenis'  => $post[1],
      'tanggal'   => $post['tanggal']
    ];
    $this->db->insert('transaksi', $params);
  }

  public function outadd($post)
  {
    $params = [
      'no_biling' => $post['no_biling'],
      'id_item'   => $post['item'],
      'id_kapal'  => $post['kapal'],
      'id_catch'  => $post['tangkap'],
      'qty'       => $post['qty'],
      'id_jenis'  => $post[2],
      'tanggal'   => $post['tanggal']
    ];
    $this->db->insert('transaksi', $params);
  }

  public function inedit($post)
  {
    $params = [
      'id_transaksi' => $post['id'],
      'no_biling'    => $post['no_biling'],
      'id_item'      => $post['item'],
      'id_kapal'     => $post['kapal'],
      'id_catch'     => $post['tangkap'],
      'qty'          => $post['qty'],
      'id_jenis'     => $post[1],
      'tanggal'      => $post['tanggal']
    ];
    $this->db->where('id_transaksi', $post['id']);
    $this->db->update('transaksi', $params);
  }

  public function delete($where)
  {
    $this->db->where($where);
    $this->db->delete('transaksi');
  }

  public function billing()
  {
    $sql = "SELECT MAX(MID(no_biling,10,6)) as no_biling
            FROM transaksi
            WHERE MID(no_biling,4,6) = DATE_FORMAT(CURDATE(), '%y%m%d')";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      $row = $query->row();
      $n = ((int)$row->no_biling) + 1;
      $no = sprintf("%'.04d", $n);
    } else {
      $no = "0001";
    }
    $no_billing = "PBN" . date('ymd') . $no;
    return $no_billing;
  }
}
