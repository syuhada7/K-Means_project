<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
  public function login($user, $pass)
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('username', $user);
    $this->db->where('password', md5($pass));
    $query = $this->db->get();
    return $query;
  }

  public function get($id = null)
  {
    $this->db->from('user');
    if ($id != null) {
      $this->db->where('id_user', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function getAll()
  {
    $this->db->order_by('username', 'ASC');
    return $this->db->get('user')->result();
  }

  public function add($post)
  {
    $params = [
      'username'       => $post['username'],
      'password'       => md5($post['password1']),
      'status_user'    => $post['status']
    ];
    $this->db->insert('user', $params);
  }

  public function edit($post)
  {
    $params['username'] = $post['username'];
    if (!empty($post['password1'])) {
      $params['password'] = md5($post['password1']);
    }
    $params['status_user'] = $post['status'];
    $this->db->where('id_user', $post['id_user']);
    $this->db->update('user', $params);
  }

  public function delete($where)
  {
    $this->db->where($where);
    $this->db->delete('user');
  }
}
