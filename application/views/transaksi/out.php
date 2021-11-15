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
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form action="<?= base_url('transaksi/tambahout') ?>" method="POST">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4>Form Input Data Transaksi</h4>
              </div>
              <div class="panel-body">
                <div class="form-group">
                  <div class="col-lg">
                    <label for="no_biling">No Transaksi</label>
                    <input type="text" name="no_biling" class="form-control" value="<?= $biling; ?>" readonly>
                  </div>
                  <div class="col-lg">
                    <label for="barcode">Filter Item *</label>
                    <div class="form-group input-group">
                      <input type="hidden" name="id_transaksi" id="id_transaksi">
                      <input type="text" name="nama_item" id="nama_item" class="form-control" required autofocus>
                      <span class="input-group-btn">
                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                          <i class="fa fa-search"></i>
                        </button>
                      </span>
                    </div>
                  </div>
                  <div class="col-lg">
                    <label for="kapal">Nama Kapal</label>
                    <input type="text" name="nama_kapal" id="nama_kapal" class="form-control" readonly>
                  </div>
                  <div class="col-lg">
                    <label for="tangkap">Jenis Penangkapan</label>
                    <input type="text" name="nama_catch" id="nama_catch" class="form-control" readonly>
                  </div>
                  <div class="col-lg">
                    <label for="qty">Initial Stock</label>
                    <input type="number" name="qty" id="qty" class="form-control" readonly>
                  </div>
                  <div class="col-lg">
                    <label for="qty">Qty Out</label>
                    <input type="number" name="qty2" id="qty2" class="form-control">
                  </div>
                  <div class="col-lg">
                    <label>Tanggal Transaksi</label>
                    <div class="form-group">
                      <input type="date" class="form-control" name="tanggal">
                    </div>
                  </div>
                </div>
                <div class="panel-footer">
                  <button type="just_submit" class="btn btn-info" name="submit_data"><i class="fa fa-paper-plane"></i> Submit</button>
                  <button type="submit" class="btn btn-warning" name="submit_data_and_close"><i class="fa fa-save"></i> Submit & Close</button>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal Item-->
<div class="modal fade" id="modal-item" tabindex="-1" role="dialog" aria-labelledby="modal-item" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="modal-item">Select Item</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">
        <table class="table table-bordered table-striped" id="transaksi">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Kapal</th>
              <th>Nama Item</th>
              <th>Jenis Penangkapan</th>
              <th>Stock</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($row as $i => $data) : ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $data->vessel ?></td>
                <td><?= $data->barang ?></td>
                <td><?= $data->metode ?></td>
                <td><?= $data->qty ?></td>
                <td>
                  <button class="btn btn-xs btn-info" id="select" data-id="<?= $data->id_transaksi ?>" data-nama_item="<?= $data->barang ?>" data-nama_kapal="<?= $data->vessel ?>" data-nama_catch="<?= $data->metode ?>" data-qty="<?= $data->qty ?>">
                    <i class="fa fa-check"></i> Select
                  </button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>