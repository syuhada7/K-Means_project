<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mining extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['title'] = 'Hasil Clustering';
    $data['con'] = $this->db->db_connect();
    $this->template->load('template/template', 'mining/index', $data);
  }

  public function detail()
  {
    $data['title'] = 'Hasil Iterasi';
    $data['con'] = $this->db->db_connect();
    $this->template->load('template/template', 'mining/detail', $data);
  }
}
