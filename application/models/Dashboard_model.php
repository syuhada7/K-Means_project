<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
  public function tranMsk()
  {
    $this->db->select_sum('id_jenis');
    $this->db->where('id_jenis', 1);
    $query = $this->db->get('transaksi');
    if ($query->num_rows() > 0) {
      return $query->row()->id_jenis;
    } else {
      return 0;
    }
  }

  public function tranOut()
  {
    $this->db->select_sum('id_jenis');
    $this->db->where('id_jenis', 2);
    $query = $this->db->get('transaksi');
    if ($query->num_rows() > 0) {
      return $query->row()->id_jenis;
    } else {
      return 0;
    }
  }

  public function ikan()
  {
    $this->db->select_sum('qty');
    $query = $this->db->get('transaksi');
    if ($query->num_rows() > 0) {
      return $query->row()->qty;
    } else {
      return 0;
    }
  }

  public function qty_alb()
  {
    $this->db->select_sum('qty');
    $query = $this->db->get_where('transaksi', "id_item= 1 AND YEAR(tanggal)= 2020 AND MONTH(tanggal)= 9");
    if ($query->num_rows() > 0) {
      return $query->row()->qty;
    } else {
      return 0;
    }
  }
  public function qty_alb2()
  {
    $this->db->select_sum('qty');
    $query = $this->db->get_where('transaksi', "id_item= 1 AND id_jenis= 1 AND YEAR(tanggal)= 2020 AND MONTH(tanggal)= 10");
    if ($query->num_rows() > 0) {
      return $query->row()->qty;
    } else {
      return 0;
    }
  }

  public function qty_be()
  {
    $this->db->select_sum('qty');
    $query = $this->db->get_where('transaksi', "id_item= 2 AND id_jenis= 1 AND YEAR(tanggal)= 2020 AND MONTH(tanggal)= 9 ");
    if ($query->num_rows() > 0) {
      return $query->row()->qty;
    } else {
      return 0;
    }
  }
  public function qty_be2()
  {
    $this->db->select_sum('qty');
    $query = $this->db->get_where('transaksi', "id_item= 2 AND id_jenis= 1 AND YEAR(tanggal)= 2020 AND MONTH(tanggal)= 10 ");
    if ($query->num_rows() > 0) {
      return $query->row()->qty;
    } else {
      return 0;
    }
  }

  public function qty_euth()
  {
    $this->db->select_sum('qty');
    $query = $this->db->get_where('transaksi', "id_item= 3 AND id_jenis= 1 AND YEAR(tanggal)= 2020 AND MONTH(tanggal)= 10 ");
    if ($query->num_rows() > 0) {
      return $query->row()->qty;
    } else {
      return 0;
    }
  }

  public function qty_sj()
  {
    $this->db->select_sum('qty');
    $query = $this->db->get_where('transaksi', "id_item= 4 AND id_jenis= 1 AND YEAR(tanggal)= 2020 AND MONTH(tanggal)= 8 ");
    if ($query->num_rows() > 0) {
      return $query->row()->qty;
    } else {
      return 0;
    }
  }
  public function qty_sj2()
  {
    $this->db->select_sum('qty');
    $query = $this->db->get_where('transaksi', "id_item= 4 AND id_jenis= 1 AND YEAR(tanggal)= 2020 AND MONTH(tanggal)= 9 ");
    if ($query->num_rows() > 0) {
      return $query->row()->qty;
    } else {
      return 0;
    }
  }
  public function qty_sj3()
  {
    $this->db->select_sum('qty');
    $query = $this->db->get_where('transaksi', "id_item= 4 AND id_jenis= 1 AND YEAR(tanggal)= 2020 AND MONTH(tanggal)= 10 ");
    if ($query->num_rows() > 0) {
      return $query->row()->qty;
    } else {
      return 0;
    }
  }

  public function qty_tgl()
  {
    $this->db->select_sum('qty');
    $query = $this->db->get_where('transaksi', "id_item= 5 AND id_jenis= 1 AND YEAR(tanggal)= 2020 AND MONTH(tanggal)= 9 ");
    if ($query->num_rows() > 0) {
      return $query->row()->qty;
    } else {
      return 0;
    }
  }
  public function qty_tgl2()
  {
    $this->db->select_sum('qty');
    $query = $this->db->get_where('transaksi', "id_item= 5 AND id_jenis= 1 AND YEAR(tanggal)= 2020 AND MONTH(tanggal)= 10 ");
    if ($query->num_rows() > 0) {
      return $query->row()->qty;
    } else {
      return 0;
    }
  }

  public function qty_yf()
  {
    $this->db->select_sum('qty');
    $query = $this->db->get_where('transaksi', "id_item= 6 AND id_jenis= 1 AND YEAR(tanggal)= 2020 AND MONTH(tanggal)= 8 ");
    if ($query->num_rows() > 0) {
      return $query->row()->qty;
    } else {
      return 0;
    }
  }
  public function qty_yf2()
  {
    $this->db->select_sum('qty');
    $query = $this->db->get_where('transaksi', "id_item= 6 AND id_jenis= 1 AND YEAR(tanggal)= 2020 AND MONTH(tanggal)= 9 ");
    if ($query->num_rows() > 0) {
      return $query->row()->qty;
    } else {
      return 0;
    }
  }
  public function qty_yf3()
  {
    $this->db->select_sum('qty');
    $query = $this->db->get_where('transaksi', "id_item= 6 AND id_jenis= 1 AND YEAR(tanggal)= 2020 AND MONTH(tanggal)= 10 ");
    if ($query->num_rows() > 0) {
      return $query->row()->qty;
    } else {
      return 0;
    }
  }
}
