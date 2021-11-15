<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    check_not_login();
    check_admin();
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title'] = 'Data User';
    $data['row'] = $this->User_model->get();
    $this->template->load('template/template', 'user/index', $data);
  }

  public function add()
  {
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', ['matches' => 'password dont match!!', 'min_length' => 'Password too short!']);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
    $this->form_validation->set_rules('status', 'Status User', 'trim|required');

    if ($this->form_validation->run() == false) {
      redirect('User');
    } else {
      $post = $this->input->post(null, TRUE);
      $this->User_model->add($post);
      if ($this->db->affected_rows() > 0) {
        echo "<script>alert('Data Success Save !!') window.location='" . site_url('User') . "'</script>";
      }
      redirect('User');
    }
  }

  public function ubah($id)
  {
    $this->form_validation->set_rules('username', 'Username', 'trim');
    if ($this->input->post('password1')) {
      $this->form_validation->set_rules('password1', 'Password', 'trim|min_length[6]|matches[password2]', ['matches' => 'password dont match!!', 'min_length' => 'Password too short!']);
      $this->form_validation->set_rules('password2', 'Password', 'trim|matches[password1]');
    }
    if ($this->input->post('password2')) {
      $this->form_validation->set_rules('password2', 'Password', 'trim|matches[password1]');
    }
    $this->form_validation->set_rules('status', 'Status', 'trim|required');

    if ($this->form_validation->run() == false) {
      $query = $this->User_model->get($id);
      if ($query->num_rows() > 0) {
        $data['row'] = $query->row();
        $data['title'] = 'Ubah Data User';
        $this->load->view('template/header', $data);
        $this->load->view('user/edit', $data);
        $this->load->view('template/footer');
      } else {
        echo "<script>alert('Data not found !!') window.location='" . site_url('User') . "'</script>";
      }
    } else {
      $post = $this->input->post(null, TRUE);
      $this->User_model->edit($post);
      if ($this->db->affected_rows() > 0) {
        echo "<script>alert('Data Success Edit !!') window.location='" . site_url('User') . "'</script>";
      }
      redirect('User');
    }
  }

  public function hapus($id)
  {
    $where = array('id_user' => $id);
    $this->User_model->delete($where, 'username');
    if ($this->db->affected_rows() > 0) {
      echo "<script>alert('Data Success Delete !!') window.location='" . site_url('User') . "'</script>";
    }
    redirect('User');
  }
}
