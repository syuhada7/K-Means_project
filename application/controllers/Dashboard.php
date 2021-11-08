<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Dashboard_model');
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['jmlmsk'] = $this->Dashboard_model->tranMsk();
    $data['jmlklr'] = $this->Dashboard_model->tranOut();
    $data['jmlkpl'] = $this->Dashboard_model->ikan();
    $data['db'] = $this->db->db_connect();

    $this->load->view('template/header', $data);
    $this->load->view('auth/dashboard', $data);
    $this->load->view('template/footer_menu');
  }
  
  public function forecast(){
    $data['title'] = 'Forecast';
    $data['alb'] = $this->Dashboard_model->qty_alb();
    $data['alb2'] = $this->Dashboard_model->qty_alb2();
    $data['be'] = $this->Dashboard_model->qty_be();
    $data['be2'] = $this->Dashboard_model->qty_be2();
    $data['euth'] = $this->Dashboard_model->qty_euth();
    $data['sj'] = $this->Dashboard_model->qty_sj();
    $data['sj2'] = $this->Dashboard_model->qty_sj2();
    $data['sj3'] = $this->Dashboard_model->qty_sj3();
    $data['tgl'] = $this->Dashboard_model->qty_tgl();
    $data['tgl2'] = $this->Dashboard_model->qty_tgl2();
    $data['yf'] = $this->Dashboard_model->qty_yf();
    $data['yf2'] = $this->Dashboard_model->qty_yf2();
    $data['yf3'] = $this->Dashboard_model->qty_yf3();
    $this->load->view('template/header', $data);
    $this->load->view('auth/forecast');
    $this->load->view('template/footer_menu');
  }
}
