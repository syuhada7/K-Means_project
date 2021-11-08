</div>
</div>
</body>
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