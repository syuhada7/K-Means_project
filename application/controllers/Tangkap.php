<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tangkap extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['row'] = $this->Tangkap_model->getAll();
    $this->load->view('template/header', $data);
    $this->load->view('tangkap/index', $data);
    $this->load->view('template/footer');
  }

  public function add()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($_POST['submit'])) {
      $this->Tangkap_model->add($post);
      if ($this->db->affected_rows() > 0) {
        redirect('transaksi/add');
      }
    }
  }
}
