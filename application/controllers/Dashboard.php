<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    check_not_login();
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['jmlkpl'] = $this->Dashboard_model->ikan();
    $data['db'] = $this->db->db_connect();
    $this->template->load('template/template', 'dashboard', $data);
  }

  public function forecast()
  {
    $data['title'] = 'Forecast';
    $data['aug'] = $this->Dashboard_model->bulan1();
    $data['sep'] = $this->Dashboard_model->bulan2();
    $data['okt'] = $this->Dashboard_model->bulan3();
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
    $this->template->load('template/template', 'auth/forecast', $data);
  }
}
