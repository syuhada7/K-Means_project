</div>
</div>
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
<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/jquery-1.9.1.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery-1.11.0.js'); ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/moment.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/jquery-ui.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery.dataTables.js'); ?>"></script>
<script src="<?= base_url('assets/js/dataTables.bootstrap.js'); ?>"></script>
<script type="text/javascript">
  $(function() {
    $("#user").dataTable();
    $("#transaksi").dataTable();
  });
</script>