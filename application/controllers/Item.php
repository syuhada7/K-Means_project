<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Item_model');
  }

  public function index()
  {
    $data['row'] = $this->Item_model->getAll();
    $this->load->view('template/header', $data);
    $this->load->view('item/index', $data);
    $this->load->view('template/footer');
  }

  public function add()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($_POST['submit'])) {
      $this->Item_model->add($post);
      if ($this->db->affected_rows() > 0) {
        redirect('transaksi/add');
      }
    }
  }
}
