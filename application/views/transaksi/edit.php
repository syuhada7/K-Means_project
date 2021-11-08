<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <form action="<?= base_url('transaksi/edit') ?>" method="POST">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>Form Input Data Transaksi</h4>
        </div>
        <div class="panel-body">
          <input type="hidden" name="id" class="form-control" value="<?= $row->id_transaksi; ?>">
          <div class="form-group">
            <label for="no_biling">No Transaksi</label>
            <input type="text" name="no_biling" class="form-control" value="<?= $row->no_biling; ?>" autofocus>
          </div>
          <div class="form-group">
            <label for="item">Jenis Item</label>
            <div class="input-group">
              <select class="form-control" data-live-search="true" name="item" data-size="5">
                <option value="<?= $row->id_item ?>"><?= $row->barang ?></option>
                <option>--</option>
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
                <option value="<?= $row->id_kapal ?>"><?= $row->vessel ?></option>
                <option>--</option>
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
                <option value="<?= $row->id_catch ?>"><?= $row->metode ?></option>
                <option>--</option>
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
            <input type="number" name="qty" class="form-control" value="<?= $row->qty; ?>">
          </div>
          <div class="form-group">
            <label for="jenis">Jenis Transaksi</label><br>
            <?php
            if ($row->id_jenis == 1) {
            ?>
              <label class="radio-inline"><input type="radio" name="jenis" value="1" checked>IN</label>
              <label class="radio-inline"><input type="radio" name="jenis" value="2">OUT</label>
            <?php
            } else {
            ?>
              <label class="radio-inline"><input type="radio" name="jenis" value="1">IN</label>
              <label class="radio-inline"><input type="radio" name="jenis" value="2" checked>OUT</label>
            <?php } ?>
          </div>
          <div class="form-group">
            <label>Tanggal Transaksi</label>
            <input type="date" class="form-control" name="tanggal" value="<?= $row->tanggal; ?>">
          </div>
        </div>
        <div class="panel-footer">
          <button type="just_submit" class="btn btn-danger" name="submit_data" style="border-radius: 0;">Submit</button>
        </div>
      </div>
    </form>
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