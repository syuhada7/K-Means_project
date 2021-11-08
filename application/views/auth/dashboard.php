<div class="container" style="margin-bottom: 50px;">
  <div class="row">
    <div class="col-md-12">
      <h3>Statistik Raw Material Tahun 2020</h3><br/>
      <div class="col-md-4">
        <div class="info-jumlah">
          <span class="label-jml">Jumlah Transaksi Masuk</span><br />
          <span class="jumlahMhs"><?= $jmlmsk; ?></span><br />
          Transaksi
        </div>
      </div>
      <div class="col-md-4">
        <div class="info-jumlah">
          <span class="label-jml">Jumlah Transaksi Keluar</span><br />
          <span class="jumlahMhs"><?= $jmlklr; ?></span><br />
          Data
        </div>
      </div>
      <div class="col-md-4">
        <div class="info-jumlah">
          <span class="label-jml">Jumlah QTY Raw Material</span><br />
          <span class="jumlahMhs"><?= total($jmlkpl); ?></span><br />
          Kg
        </div>
      </div>
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
      <table id="jml_keluar" hidden="true">
        <thead>
          <tr>
            <th>Nama Item</th>
            <th>Jumlah Transaksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sqlJumlkeluar = mysqli_query($db, "SELECT b.nama_item, COUNT(a.id_item) AS jumlah FROM transaksi a INNER JOIN item b ON (a.id_item = b.id_item) WHERE year(a.tanggal) = '2020' AND id_jenis='2' GROUP BY a.id_item ORDER BY jumlah DESC LIMIT 5");
          while ($rkjs = mysqli_fetch_assoc($sqlJumlkeluar)) {
          ?>
            <tr>
              <td><?php echo $rk['nama_item']; ?></td>
              <td><?php echo $rk['jumlah']; ?></td>
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
              <td><?php echo $rpj['nama_catch']; ?></td>
              <td><?php echo $rpj['jumlah']; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <table id="jml_qty" hidden="true">
        <thead>
          <tr>
            <th>Item</th>
            <th>Jumlah Qty</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sqlJumGel = mysqli_query($db, "SELECT a.qty, b.nama_kapal FROM transaksi a INNER JOIN kapal b ON (a.id_kapal = b.id_kapal) WHERE a.id_jenis='1' AND year(a.tanggal) = '2020' GROUP BY a.id_kapal ORDER BY a.id_transaksi ASC");
          while ($rjg = mysqli_fetch_assoc($sqlJumGel)) {
          ?>
            <tr>
              <td><?php echo $rjg['nama_kapal']; ?></td>
              <td><?php echo $rjg['qty']; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <div class="grafik">
        <div class="col-md-6" style="margin-top: 30px;">
          <div id="total_masuk"></div>
        </div>
        <div class="col-md-6" style="margin-top: 30px;">
          <div id="total_keluar"></div>
        </div>
        <div class="col-md-6" style="margin-top: 30px;">
          <div id="total_tangkap"></div>
        </div>
        <div class="col-md-6" style="margin-top: 30px;">
          <div id="total_qty"></div>
        </div>
      </div>
    </div>
    <?php
    function total($total)
    {
      $hasil = number_format($total, 2, ',', '.');
      return $hasil;
    }?>