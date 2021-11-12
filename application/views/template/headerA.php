<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/bootstrap/fonts/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="shortcut icon" href="<?= base_url('assets/logo mercu.png'); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/AdminLTE.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/input.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap-select.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/datepicker/datepicker3.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/dataTables.bootstrap.css'); ?>" />
  <!-- AdminLTE Skins. Choose a skin from the css/skins -->
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/skins/_all-skins.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/jquery-ui.min.css'); ?>">

  <!-- JS -->
  <script src="<?= base_url('assets/dist/js/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('assets/dist/js/bootstrap.min.js'); ?>"></script>
  <script src="<?= base_url('assets/dist/js/highcharts.js'); ?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/dist/js/data.js'); ?>"></script>
  <script type="text/javascript">
    function showTime() {
      var a_p = "";
      var today = new Date();
      var curr_hour = today.getHours();
      var curr_minute = today.getMinutes();
      if (curr_hour < 12) {
        a_p = "AM";
      } else {
        a_p = "PM";
      }
      if (curr_hour == 0) {
        curr_hour = 12;
      }
      if (curr_hour > 12) {
        curr_hour = curr_hour - 12;
      }
      curr_hour = checkTime(curr_hour);
      curr_minute = checkTime(curr_minute);
      document.getElementById('time').innerHTML = curr_hour + ":" + curr_minute + " " + a_p;
    }

    function checkTime(i) {
      if (i < 10) {
        i = "0" + i;
      }
      return i;
    }
    setInterval(showTime, 500);
  </script>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body class="hold-transition skin-blue layout-top-nav">
  <div class="wrapper">
    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <a href="<?= base_url('dashboard'); ?>" class="navbar-brand"><b>K-Means</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <?php if ($level == 'Admin') { ?>
              <ul class="nav navbar-nav">
                <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-tachometer"></i></a></li>
                <li><a href="<?= base_url('transaksi'); ?>" data-toggle="tooltip"><i class="fa fa-pencil"></i></a></li>
                <li><a href="<?= base_url('mining'); ?>" data-toggle="tooltip"><i class="fa fa-bar-chart"></i></a></li>
                <li><a href="<?= base_url('dashboard/forecast'); ?>" data-toggle="tooltip"><i class="fa fa-line-chart"></i></a></li>
              </ul>
            <?php } ?>
            <?php if ($level == 'Employee') { ?>
              <ul class="nav navbar-nav">
                <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-tachometer"></i></a></li>
                <li><a href="<?= base_url('transaksi'); ?>" data-toggle="tooltip"><i class="fa fa-pencil"></i></a></li>
                <li><a href="<?= base_url('mining'); ?>" data-toggle="tooltip"><i class="fa fa-bar-chart"></i></a></li>
                <li><a href="<?= base_url('dashboard/forecast'); ?>" data-toggle="tooltip"><i class="fa fa-line-chart"></i></a></li>
              </ul>
            <?php } ?>
            <?php if ($level == 'Pimpinan') { ?>
              <ul class="nav navbar-nav">
                <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-tachometer"></i></a></li>
                <li><a href="<?= base_url('mining'); ?>" data-toggle="tooltip"><i class="fa fa-bar-chart"></i></a></li>
                <li><a href="<?= base_url('dashboard/forecast'); ?>" data-toggle="tooltip"><i class="fa fa-line-chart"></i></a></li>
              </ul>
            <?php } ?>
          </div>
          <!-- /.navbar-collapse -->
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li>
                <span class="label">
                  <?php
                  $hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
                  $bulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                  echo $hari[date("w")] . ", " . date("j") . " " . $bulan[date("n")] . " " . date("Y");
                  ?> - <span id="time"></span>
                </span>
              </li>
              <li><a href="<?= base_url('auth'); ?>" data-toggle="tooltip"><i class="fa fa-sign-out"></i></a></li>
              <li><a href="<?= base_url('auth/about'); ?>" data-toggle="tooltip"><i class="fa fa-question-circle"></i></a></li>
            </ul>
          </div>
          <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
      </nav>
    </header>