<!-- Content Header (Page header) -->
<section class="content-header">
  <img src="<?= base_url('assets/logo mercu.png'); ?>" alt="" width="70" height="50" style="float: left; margin-top: 5px; margin-right:20px">
  <h3>Statistik Raw Material Tahun 2020</h3>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="box box-default">
    <div class="container">
      <br>
      <div class="row">
        <div class="col-md-1">
          <a href="<?= base_url('transaksi/inadd') ?>" class="btn btn-info"><i class="fa fa-plus"></i> In Raw</a>
        </div>
        <div class="col-md-1">
          <a href="<?= base_url('transaksi/outadd') ?>" class="btn btn-danger"><i class="fa fa-plus"></i> Out Raw</a>
        </div>
        <br>
        <div class="col-md">
          <h3 style="text-align: center;"><i class="fa fa-shopping-basket"></i> DATA TRANSAKSI</h3>
        </div>
      </div>
      <br>
      <hr style="margin-top: -10px;">
      <div class="box-body table-responsive">
        <table id="transaksi" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-center">No. </th>
              <th class="text-center">No Transaksi</th>
              <th class="text-center">Item</th>
              <th class="text-center">Nama Kapal</th>
              <th class="text-center">Jenis Penangkapan</th>
              <th class="text-center">Qty</th>
              <th class="text-center">Jenis Transaksi</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($row->result() as $tr) : ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $tr->no_biling; ?></td>
                <td><?= $tr->barang; ?></td>
                <td><?= $tr->vessel; ?></td>
                <td><?= $tr->metode; ?></td>
                <td><?= $tr->qty; ?></td>
                <td><?= $tr->js; ?></td>
                <td>
                  <?= anchor('transaksi/ubah/' . $tr->id_transaksi, '<button class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Update</button>'); ?> |
                  <a href="<?= site_url('transaksi/hapus/' . $tr->id_transaksi); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure delete <?= $tr->no_biling ?> ?');"><i class="fa fa-trash"></i> Delete</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>