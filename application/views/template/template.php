<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/bootstrap/fonts/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="shortcut icon" href="<?= base_url('assets/logo mercu.png'); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/dataTables.bootstrap.css'); ?>" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/input.css">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/datepicker/datepicker3.css'); ?>">
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">

  <!-- JS -->
  <script src="<?= base_url('assets/dist/js/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('assets/dist/js/bootstrap.min.js'); ?>"></script>
  <script src="<?= base_url('assets/dist/js/highcharts.js'); ?>"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/bootstrap/js/data.js"></script>
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

<body class="hold-transition skin-blue layout-top-nav">
  <div class="wrapper">
    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <a href="<?= base_url('dashboard'); ?>" class="navbar-brand"><b>K-Means</b></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <?php if ($this->session->userdata('status_user') == 'Admin') { ?>
              <ul class="nav navbar-nav">
                <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-tachometer"></i></a></li>
                <li><a href="<?= base_url('User'); ?>"><i class="fa fa-users"></i></a></li>
                <!-- <li><a href="<?= base_url('transaksi'); ?>" data-toggle="tooltip"><i class="fa fa-pencil"></i></a></li>
                <li><a href="<?= base_url('mining'); ?>" data-toggle="tooltip"><i class="fa fa-bar-chart"></i></a></li>
                <li><a href="<?= base_url('dashboard/forecast'); ?>" data-toggle="tooltip"><i class="fa fa-line-chart"></i></a></li> -->
              </ul>
            <?php } ?>
            <?php if ($this->session->userdata('status_user') == 'Employee') { ?>
              <ul class="nav navbar-nav">
                <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-tachometer"></i></a></li>
                <li><a href="<?= base_url('transaksi'); ?>" data-toggle="tooltip"><i class="fa fa-pencil"></i></a></li>
                <li><a href="<?= base_url('mining'); ?>" data-toggle="tooltip"><i class="fa fa-bar-chart"></i></a></li>
                <li><a href="<?= base_url('dashboard/forecast'); ?>" data-toggle="tooltip"><i class="fa fa-line-chart"></i></a></li>
              </ul>
            <?php } ?>
            <?php if ($this->session->userdata('status_user') == 'Pimpinan') { ?>
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
              <li><a href="<?= base_url('auth/logout'); ?>" data-toggle="tooltip"><i class="fa fa-sign-out"></i></a></li>
              <li><a href="<?= base_url('auth/about'); ?>" data-toggle="tooltip"><i class="fa fa-question-circle"></i></a></li>
              <span class="label"><?= $this->fungsi->user_login()->username ?></span>
            </ul>
          </div>
          <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
      </nav>
    </header>
    <!-- Full Width Column -->
    <div class="content-wrapper">
      <?= $contents ?>
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Universitas Mercu Buana</b>
      </div>
      <strong>Copyright Syuhada N - 41516310010 &copy;2021</strong>
    </div>
    <!-- /.container -->
  </footer>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 2.2.3 -->
  <script src="<?= base_url('assets/dist/js/jquery.min.js'); ?>"></script>
  <script src="<?= base_url() ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?= base_url() ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?= base_url() ?>assets/plugins/fastclick/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>assets/dist/js/app.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
  <!-- Data Table -->
  <script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.js'); ?>"></script>
  <script src="<?= base_url('assets/plugins/datatables/dataTables.bootstrap.js'); ?>"></script>
  <script type="text/javascript">
    $(function() {
      $("#user").dataTable();
      $("#transaksi").dataTable();
    });
  </script>
  <!-- date picker -->
  <script src="<?= base_url('assets/plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
  <script type="text/javascript">
    $(function() {
      $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        startDate: '-3d'
      });
    });
  </script>
</body>
<!-- Modal & Panggil Data -->
<script>
  $(document).ready(function() {
    $('#btn-1').click(function() {
      $('#myModal').modal('show');
      $('#tambah').attr({
        name: 'tambah_item',
        placeholder: 'Item'
      });
      $('#f_tambah').attr({
        action: '<?= base_url('item/add'); ?>'
      });
    });

    $('#btn-2').click(function() {
      $('#myModal').modal('show');
      $('#tambah').attr({
        name: 'tambah_kapal',
        placeholder: 'Nama Kapal'
      });
      $('#f_tambah').attr({
        action: '<?= base_url('kapal/add'); ?>'
      });
    });

    $('#btn-3').click(function() {
      $('#myModal').modal('show');
      $('#tambah').attr({
        name: 'tambah_tangkap',
        placeholder: 'Nama Jenis Tangkap'
      });
      $('#f_tambah').attr({
        action: '<?= base_url('tangkap/add'); ?>'
      });
    });
  });
</script>
<script>
  $(document).ready(function() {
    $(document).on('click', '#select', function() {
      var id_transaksi = $(this).data('id_transaksi');
      var nama_item = $(this).data('nama_item');
      var nama_kapal = $(this).data('nama_kapal');
      var nama_catch = $(this).data('nama_catch');
      var stok = $(this).data('stok');
      // -----
      $('#id_transaksi').val(id_transaksi);
      $('#nama_item').val(nama_item);
      $('#nama_kapal').val(nama_kapal);
      $('#nama_catch').val(nama_catch);
      $('#stok').val(stok);
      var element = document.getElementById('submit_data');
      if ($('#stok').val(stok) == 0) {
        document.getElementById('submit_data').style.display = "none";
      } else if (element) {
        document.getElementById('submit_data').style.display = "block";
      }
    })
  })
</script>

<!-- Tampil Grafik -->
<script type="text/javascript">
  $(function() {
    Highcharts.chart('total_masuk', {
      data: {
        table: 'jml_masuk'
      },
      chart: {
        type: 'column'
      },
      title: {
        text: 'Item Raw Material Masuk'
      },
      yAxis: {
        allowDecimals: false,
        title: {
          text: 'Item Raw Material'
        }
      },
      tooltip: {
        formatter: function() {
          return '<b>' + this.series.name + '</b><br/>' +
            this.point.y + ' ' + this.point.name;
        }
      }
    });
  });
  $(function() {
    Highcharts.chart('total_keluar', {
      data: {
        table: 'jml_keluar'
      },
      chart: {
        type: 'column'
      },
      title: {
        text: 'Item Raw Material Keluar'
      },
      yAxis: {
        allowDecimals: false,
        title: {
          text: 'Item Raw Material'
        }
      },
      tooltip: {
        formatter: function() {
          return '<b>' + this.series.name + '</b><br/>' +
            this.point.y + ' ' + this.point.name;
        }
      }
    });
  });
  $(function() {
    Highcharts.chart('total_tangkap', {
      data: {
        table: 'jml_tangkap'
      },
      chart: {
        type: 'column'
      },
      title: {
        text: 'Jenis Penangkapan'
      },
      yAxis: {
        allowDecimals: false,
        title: {
          text: 'Metode'
        }
      },
      tooltip: {
        formatter: function() {
          return '<b>' + this.series.name + '</b><br/>' +
            this.point.y + ' ' + this.point.name;
        }
      }
    });
  });
  $(function() {
    Highcharts.chart('total_qty', {
      data: {
        table: 'jml_qty'
      },
      chart: {
        type: 'column'
      },
      title: {
        text: 'Jumlah Qty Item'
      },
      yAxis: {
        allowDecimals: false,
        title: {
          text: 'Jumlah Qty'
        }
      },
      tooltip: {
        formatter: function() {
          return '<b>' + this.series.name + '</b><br/>' +
            this.point.y + ' ' + this.point.name;
        }
      }
    });
  });
</script>

</html>