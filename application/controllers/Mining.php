<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mining extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    // $this->load->model('Mining_model');
  }

  public function index()
  {
    $data['title'] = 'Hasil Clustering';
    $data['con'] = $this->db->db_connect();
    $this->load->view('template/header', $data);
    $this->load->view('mining/index', $data);
    $this->load->view('template/footer');
  }

  public function detail()
  {
    $data['title'] = 'Hasil Iterasi';
    $data['con'] = $this->db->db_connect();
    $this->load->view('template/header', $data);
    $this->load->view('mining/detail', $data);
    $this->load->view('template/footer');
  }
}
