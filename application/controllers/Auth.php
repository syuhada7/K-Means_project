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
    check_already_login();
    $data['title'] = 'Login Page';
    $this->load->view('template/header_auth', $data);
    $this->load->view('auth/index');
    $this->load->view('template/footer_auth');
  }

  public function login()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($post['btn_login'])) {
      $query = $this->User_model->login($post);
      if ($query->num_rows() > 0) {
        $row = $query->row();
        $params = array(
          'id_user' => $row->id_user,
          'status_user' => $row->status_user
        );
        $this->session->set_userdata($params);
        echo "<script>
        alert('Hore, Login Success');
        window.location='" . site_url('Dashboard') . "';
        </script>";
      } else {
        echo "<script>
        alert('Sorry, Please check your username / password');
        window.location='" . site_url('Auth') . "';
        </script>";
      }
    }
  }

  public function logout()
  {
    $params = array('id_user', 'status_user');
    $this->session->unset_userdata($params);
    redirect('Auth');
  }

  public function about()
  {
    $data['title'] = 'About';
    $this->template->load('template/template', 'auth/about', $data);
  }
}
