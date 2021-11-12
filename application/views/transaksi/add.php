<div class="content-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <form action="<?= base_url('transaksi/tambah') ?>" method="POST">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4>Form Input Data Transaksi</h4>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <label for="no_biling">No Transaksi</label>
                <input type="text" name="no_biling" class="form-control">
              </div>
              <div class="form-group">
                <label for="item">Jenis Item</label>
                <div class="input-group">
                  <select class="form-control" data-live-search="true" name="item" data-size="5">
                    <option>- Pilih Item -</option>
                    <?php foreach ($item->result() as $r_item) : ?>
                      <option value="<?= $r_item->id_item; ?>"><?= $r_item->nama_item; ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="input-group-btn">
                    <a class="btn btn-primary" id="btn-1"><i class="fa fa-plus"></i></a>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="kapal">Nama Kapal</label>
                <div class="input-group">
                  <select class="form-control" data-live-search="true" name="kapal" data-size="5">
                    <option>- Pilih Kapal -</option>
                    <?php foreach ($kapal->result() as $r_kapal) : ?>
                      <option value="<?= $r_kapal->id_kapal; ?>"><?= $r_kapal->nama_kapal; ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="input-group-btn">
                    <a class="btn btn-primary" id="btn-2"><i class="fa fa-plus"></i></a>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="tangkap">Jenis Penangkapan</label>
                <div class="input-group">
                  <select class="form-control" data-live-search="true" name="tangkap" data-size="5">
                    <option>- Pilih Penagkapan -</option>
                    <?php foreach ($tangkap->result() as $r_tangkap) : ?>
                      <option value="<?= $r_tangkap->id_catch; ?>"><?= $r_tangkap->nama_catch; ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="input-group-btn">
                    <a class="btn btn-primary" id="btn-3"><i class="fa fa-plus"></i></a>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="qty">Qty</label>
                <input type="text" name="qty" class="form-control">
              </div>
              <div class="form-group">
                <label>Tanggal Transaksi</label>
                <div class="form-group">
                  <input type="date" class="form-control" name="tanggal">
                </div>
              </div>
            </div>
            <div class="panel-footer">
              <button type="just_submit" class="btn btn-danger" name="submit_data" style="border-radius: 0;">Submit</button>
              <button type="submit" class="btn btn-primary" name="submit_data_and_close">Submit & Close</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal Tambah -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <form id="f_tambah" action="" method="POST">
      <div class="modal-content">
        <div class="modal-header" style="border-radius: 0; background: #007F30; color: #FFF; padding: 10px; text-align: center;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input id="tambah" type="text" class="form-control" name="" placeholder="">
          </div>
        </div>
        <div class="modal-footer" style="border-radius: 0; background: #007F30; color: #FFF; padding: 10px; text-align: center;">
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>