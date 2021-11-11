<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['title'] = 'Login Page';
    $this->load->view('template/header_auth', $data);
    $this->load->view('auth/index');
    $this->load->view('template/footer_auth');
  }

  public function login()
  {
    if (isset($_POST['login'])) {
      $user = $this->input->post('username', true);
      $pass = $this->input->post('password', true);
      $cek = $this->User_model->login($user, $pass);
      if ($cek->num_rows() == 1) {
        $data['title'] = 'Dashboard';
        foreach ($cek->result() as $row) {
          $users = array(
            'username' => $row->username,
            'status_user' => $row->status_user
          );
          $data['user'] = $row->username;
          $data['level'] = $row->status_user;
          $data['jmlmsk'] = $this->Dashboard_model->tranMsk();
          $data['jmlklr'] = $this->Dashboard_model->tranOut();
          $data['jmlkpl'] = $this->Dashboard_model->ikan();
          $data['db'] = $this->db->db_connect();

          $this->load->view('template/headerA', $data);
          $this->load->view('auth/board', $data);
          $this->load->view('template/footerA');
        }
      } else {
        echo "<script>
              alert('Please Check Again..!!');
              window.location='" . site_url('auth') . "';
              </script>";
      }
    }
  }

  public function about()
  {
    $data['title'] = 'About';
    $this->load->view('template/header', $data);
    $this->load->view('auth/about', $data);
    $this->load->view('template/footer');
  }
}
