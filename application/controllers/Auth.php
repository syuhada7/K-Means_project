<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('User_model');
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
        $data['title'] = 'Main Menu';
        foreach ($cek->result() as $row) {
          $users = array(
            'username' => $row->username,
            'status_user' => $row->status_user
          );
          $data['user'] = $row->username;
          $data['level'] = $row->status_user;
          $this->load->view('template/header_menu', $data);
          $this->load->view('menu/index', $data);
          $this->load->view('template/footer');
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
