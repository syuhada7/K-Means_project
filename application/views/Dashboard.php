<!-- Content Header (Page header) -->
<section class="content-header">
  <img src="<?= base_url('assets/logo mercu.png'); ?>" alt="" width="70" height="50" style="float: left; margin-top: 5px;">
  <h3>Statistik Raw Material Tahun 2020</h3>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"></h3>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-lg">
          <div class="small-box bg-green">
            <div class="inner">
              <h4 align='center'><b>Jumlah QTY Raw Material</b></h4>
              <h3 align='center'><?= total($jmlkpl); ?></h3>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="row">
        <table id="jml_masuk" hidden="true">
          <thead>
            <tr>
              <th>Nama Item</th>
              <th>Jumlah Transaksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sqlmasuk = mysqli_query($db, "SELECT b.nama_item, COUNT(a.id_item) AS jumlah FROM transaksi a INNER JOIN item b ON (a.id_item = b.id_item) WHERE year(a.tanggal) = '2020' AND id_jenis='1' GROUP BY a.id_item ORDER BY jumlah DESC LIMIT 5");
            while ($rm = mysqli_fetch_assoc($sqlmasuk)) {
            ?>
              <tr>
                <td><?= $rm['nama_item']; ?></td>
                <td><?= $rm['jumlah']; ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
        <table id="jml_tangkap" hidden="true">
          <thead>
            <tr>
              <th>Jenis Penangkapan</th>
              <th>Jumlah</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sqlJumPJ = mysqli_query($db, "SELECT b.nama_catch, COUNT(a.id_catch) AS jumlah FROM transaksi a INNER JOIN tangkap b ON (a.id_catch = b.id_catch) WHERE year(a.tanggal) = '2020' AND a.id_jenis ='1' GROUP BY a.id_catch ORDER BY jumlah DESC");
            while ($rpj = mysqli_fetch_assoc($sqlJumPJ)) {
            ?>
              <tr>
                <td><?= $rpj['nama_catch']; ?></td>
                <td><?= $rpj['jumlah']; ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
        <div class="grafik">
          <div class="col-md-6" style="margin-top: 30px;">
            <div id="total_masuk"></div>
          </div>
          <div class="col-md-6" style="margin-top: 30px;">
            <div id="total_tangkap"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</section>
<!-- /.content -->
<?php
function total($total)
{
  $hasil = number_format($total, 2, ',', '.');
  return $hasil;
} ?>