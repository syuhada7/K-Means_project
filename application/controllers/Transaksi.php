<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    check_not_login();
    check_user();
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title'] = 'Data Transaksi';
    $data['row'] = $this->Transaksi_model->getAll();
    $this->template->load('template/template', 'transaksi/index', $data);;
  }

  public function inadd()
  {
    $data['title'] = 'Input Transaksi';
    $data['row'] = $this->Transaksi_model->getAll();
    $data['item'] = $this->Item_model->get();
    $data['kapal'] = $this->Kapal_model->get();
    $data['tangkap'] = $this->Tangkap_model->get();
    $this->template->load('template/template', 'transaksi/add', $data);
  }

  public function ubah($id)
  {
    $query = $this->Transaksi_model->getAll($id);
    if ($query->num_rows() > 0) {
      $transaksi = $query->row();
      $data = array(
        'row' => $transaksi
      );
      $data['title'] = 'Update Transaksi';
      $data['item'] = $this->Item_model->get();
      $data['kapal'] = $this->Kapal_model->get();
      $data['tangkap'] = $this->Tangkap_model->get();
      $this->template->load('template/template', 'transaksi/edit', $data);
    }
  }

  public function tambah()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($_POST['submit_data'])) {
      $this->Transaksi_model->inadd($post);
      if ($this->db->affected_rows() > 0) {
        echo "<script>alert('Data Success Save !!') window.location='" . site_url('Transaksi/inadd') . "'</script>";
      }
      redirect('Transaksi/inadd');
    } else if (isset($_POST['submit_data_and_close'])) {
      $this->Transaksi_model->inadd($post);
      if ($this->db->affected_rows() > 0) {
        echo "<script>alert('Data Success Save !!') window.location='" . site_url('Transaksi') . "'</script>";
      }
      redirect('Transaksi');
    }
  }

  public function inedit()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($_POST['submit_data'])) {
      $this->Transaksi_model->inedit($post);
      if ($this->db->affected_rows() > 0) {
        echo "<script>alert('Data Success Save !!') window.location='" . site_url('Transaksi') . "'</script>";
      }
      redirect('Transaksi');
    }
  }

  public function hapus($id)
  {
    $where = array('id_transaksi' => $id);
    $this->Transaksi_model->delete($where, $id);
    if ($this->db->affected_rows() > 0) {
      echo "<script>alert('Data Success Delete !!') window.location='" . site_url('User') . "'</script>";
    }
    redirect('Transaksi');
  }
}
