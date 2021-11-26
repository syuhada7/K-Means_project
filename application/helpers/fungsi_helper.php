<?php

function check_already_login()
{
  $ci = &get_instance();
  $user_session = $ci->session->userdata('id_user');
  if ($user_session) {
    redirect('dashboard');
  }
}

function check_not_login()
{
  $ci = &get_instance();
  $user_session = $ci->session->userdata('id_user');
  if (!$user_session) {
    redirect('Auth');
  }
}

function check_admin()
{
  $ci = &get_instance();
  $ci->load->library('fungsi');
  if ($ci->fungsi->user_login()->status_user != 'Admin') {
    redirect('dashboard');
  }
}

function check_user()
{
  $ci = &get_instance();
  $ci->load->library('fungsi');
  if ($ci->fungsi->user_login()->status_user != 'Employee') {
    redirect('dashboard');
  }
}

function check_pimpinan()
{
  $ci = &get_instance();
  $ci->load->library('fungsi');
  if ($ci->fungsi->user_login()->status_user != 'Pimpinan') {
    redirect('dashboard');
  }
}

function indo_date($date)
{
  $d = substr($date, 8, 2);
  $m = substr($date, 5, 2);
  $y = substr($date, 0, 4);
  return $d . '/' . $m . '/' . $y;
}
