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

<!-- jQuery 1.9.1 -->
<script src="<?= base_url('assets/plugins/jQuery/jquery-1.9.1.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/datatables/dataTables.bootstrap.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/jQuery/jquery-1.11.0.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/jQueryUI/jquery-ui.min.js'); ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
<!-- SlimScroll -->
<script src="<?= base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/plugins/fastclick/fastclick.js'); ?>"></script>
<!-- AdminLTE App -->
<!-- <script src="<?= base_url('assets/dist/js/app.min.js'); ?>"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/dist/js/demo.js'); ?>"></script>

</body>
<script src="<?= base_url('assets/dist/js/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/dist/js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/datatables/dataTables.bootstrap.js'); ?>"></script>
<script type="text/javascript">
  $(function() {
    $('.datepicker').datepicker({
      format: 'yyyy-mm-dd',
      startDate: '-3d'
    });
  });
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
        action: '../proses/p_tambah_item.php'
      });
    });

    $('#btn-2').click(function() {
      $('#myModal').modal('show');
      $('#tambah').attr({
        name: 'tambah_kapal',
        placeholder: 'Nama Kapal'
      });
      $('#f_tambah').attr({
        action: '../proses/p_tambah_kapal.php'
      });
    });

    $('#btn-3').click(function() {
      $('#myModal').modal('show');
      $('#tambah').attr({
        name: 'tambah_tangkap',
        placeholder: 'Nama Jenis Tangkap'
      });
      $('#f_tambah').attr({
        action: '../proses/p_tambah_tangkap.php'
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

</html>
<script type="text/javascript">
  $(function() {
    $("#user").dataTable();
    $("#transaksi").dataTable();
  });
</script>