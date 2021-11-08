<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title><?= $title; ?></title>
  <link rel="shortcut icon" href="<?= base_url('assets/logo mercu.png'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/input.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/dashboard.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/hasil_mining.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/chartphp.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/dataTables.bootstrap.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/jquery-ui.min.css'); ?>">

  <!-- Js -->
  <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
  <script src="<?= base_url('assets/js/highcharts.js'); ?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/js/modules/data.js'); ?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/js/modules/exporting.js'); ?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/js/modules/data.js'); ?>"></script>
</head>

<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <!-- <li><a href="<?= base_url('auth/login') ?>" data-toggle="tooltip" title="Home"><i class="fa fa-home"></i></a></li> -->
        <li><a href="<?= base_url('dashboard'); ?>" data-toggle="tooltip" title="Dashboard"><i class="fa fa-dashboard"></i></a></li>
        <li><a href="<?= base_url('transaksi'); ?>" data-toggle="tooltip" title="Transaksi"><i class="fa fa-pencil"></i></a></li>
        <li><a href="<?= base_url('mining'); ?>" data-toggle="tooltip" title="Cluster Data"><i class="fa fa-bar-chart"></i></a></li>
        <li><a href="<?= base_url('dashboard/forecast'); ?>" data-toggle="tooltip" title="Forecast"><i class="fa fa-line-chart"></i></a></li>
        <li><a href="<?= base_url('auth/about'); ?>" data-toggle="tooltip" title="About"><i class="fa fa-question-circle"></i></a></li>
        <li><a href="<?= base_url('auth'); ?>" data-toggle="tooltip" title="Sign Out"><i class="fa fa-sign-out"></i></a></li>
      </ul>
    </div>
  </nav>