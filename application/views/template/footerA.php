<footer class="main-footer">
  <div class="container">
    <div class="pull-right hidden-xs">
      <b>Syuhada Nurjuliadi</b> - 41516310010
    </div>
    <strong>Copyright &copy; 2021 Universitas Mercu Buana</strong>
  </div>
  <!-- /.container -->
</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?= base_url('assets/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
<!-- SlimScroll -->
<script src="<?= base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?= base_url('assets/plugins/chartjs/Chart.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/plugins/fastclick/fastclick.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/dist/js/app.min.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/dist/js/demo.js'); ?>"></script>

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
</body>
<script>
  $(document).ready(function() {
    $(document).on('click', '#select', function() {
      var id_transaksi = $(this).data('id_transaksi');
      var nama_item = $(this).data('nama_item');
      var nama_kapal = $(this).data('nama_kapal');
      var nama_catch = $(this).data('nama_catch');
      var qty = $(this).data('qty');
      // -----
      $('#id_transaksi').val(id_transaksi);
      $('#nama_item').val(nama_item);
      $('#nama_kapal').val(nama_kapal);
      $('#nama_catch').val(nama_catch);
      $('#qty').val(qty);
      // $('#modal-item').modal('hide');
    })
  })
</script>
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

</html>
<!-- <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/jquery-1.9.1.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery-1.11.0.js'); ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/moment.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/jquery-ui.min.js'); ?>"></script> -->
<script src="<?= base_url('assets/dist/js/jquery.dataTables.js'); ?>"></script>
<script src="<?= base_url('assets/dist/js/dataTables.bootstrap.js'); ?>"></script>
<script type="text/javascript">
  $(function() {
    $("#user").dataTable();
    $("#transaksi").dataTable();
  });
</script>