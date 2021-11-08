<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Item_model');
    $this->load->model('Kapal_model');
    $this->load->model('Tangkap_model');
    $this->load->model('Transaksi_model');
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title'] = 'Data Transaksi';
    $data['row'] = $this->Transaksi_model->getAll();
    $this->load->view('template/header', $data);
    $this->load->view('transaksi/index', $data);
    $this->load->view('template/footer');
  }

  public function inadd()
  {
    $data['title'] = 'Input Transaksi';
    $data['row'] = $this->Transaksi_model->getAll();
    $data['item'] = $this->Item_model->get();
    $data['kapal'] = $this->Kapal_model->get();
    $data['tangkap'] = $this->Tangkap_model->get();
    $this->load->view('template/header', $data);
    $this->load->view('transaksi/add', $data);
    $this->load->view('template/footer');
  }

  public function outadd()
  {
    $data['title'] = 'Out Transaksi';
    $data['row'] = $this->Transaksi_model->getAll();
    $data['item'] = $this->Item_model->get();
    $data['kapal'] = $this->Kapal_model->get();
    $data['tangkap'] = $this->Tangkap_model->get();
    $this->load->view('template/header', $data);
    $this->load->view('transaksi/out', $data);
    $this->load->view('template/footer');
  }

  public function ubah($id)
  {
    $data['title'] = 'Update Transaksi';
    $query = $this->Transaksi_model->getAll($id);
    if ($query->num_rows() > 0) {
      $transaksi = $query->row();
      $data = array(
        'row' => $transaksi
      );
      $data['item'] = $this->Item_model->get();
      $data['kapal'] = $this->Kapal_model->get();
      $data['tangkap'] = $this->Tangkap_model->get();
      $this->load->view('template/header', $data);
      $this->load->view('transaksi/edit', $data);
      $this->load->view('template/footer');
    }
  }

  public function tambah()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($_POST['submit_data'])) {
      $this->Transaksi_model->outadd($post);
      if ($this->db->affected_rows() > 0) {
        echo "<script>alert('Data Success Save !!') window.location='" . site_url('Transaksi/add') . "'</script>";
      }
      redirect('Transaksi/add');
    } else if (isset($_POST['submit_data_and_close'])) {
      $this->Transaksi_model->outadd($post);
      if ($this->db->affected_rows() > 0) {
        echo "<script>alert('Data Success Save !!') window.location='" . site_url('Transaksi') . "'</script>";
      }
      redirect('Transaksi');
    }
  }

  public function tambahout()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($_POST['submit_data'])) {
      $this->Transaksi_model->inadd($post);
      if ($this->db->affected_rows() > 0) {
        echo "<script>alert('Data Success Save !!') window.location='" . site_url('Transaksi/add') . "'</script>";
      }
      redirect('Transaksi/add');
    } else if (isset($_POST['submit_data_and_close'])) {
      $this->Transaksi_model->inadd($post);
      if ($this->db->affected_rows() > 0) {
        echo "<script>alert('Data Success Save !!') window.location='" . site_url('Transaksi') . "'</script>";
      }
      redirect('Transaksi');
    }
  }

  public function edit()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($_POST['submit_data'])) {
      $this->Transaksi_model->edit($post);
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
