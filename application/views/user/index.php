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
    <div class="box-header with-border">
      <h3 class="box-title"></h3>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-1">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#user_tambah"><i class="fa fa-user-plus"></i> Tambah</button>
        </div>
        <div class="col-md">
          <h3 style="text-align: center;"><i class="fa fa-users"></i> DATA USER</h3>
        </div>
      </div>
      <br>
      <hr style="margin-top: -10px;">
      <div class="box-body table-responsive">
        <table id="user" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-center">No. </th>
              <th class="text-center">Username</th>
              <th class="text-center">Status User</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($row->result() as $u) : ?>
              <tr>
                <td class="text-center"><?= $no++; ?></td>
                <td class="text-center"><?= $u->username; ?></td>
                <td class="text-center"><?= $u->status_user; ?></td>
                <td class="text-center" width="160">
                  <?= anchor('user/ubah/' . $u->id_user, '<button class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Update</button>'); ?> |
                  <a href="<?= site_url('user/hapus/' . $u->id_user); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure delete <?= $u->username ?> ?');"><i class="fa fa-trash"></i> Delete</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- User Modal -->
    <div class="modal fade" id="user_tambah" tabindex="-1" role="dialog" aria-labelledby="user_tambah" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="user_tambah">Input Data User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('user/add'); ?>" method="POST">
              <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" autofocus>
              </div>
              <div class="form-group">
                <label for="password1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password1" id="password">
              </div>
              <div class="form-group">
                <label for="password2" class="form-label">Re - Password</label>
                <input type="password" class="form-control" name="password2" id="password">
              </div>
              <div class="form-group">
                <label for="status" class="form-label">Status User</label>
                <select class="form-control" name="status" id="status">
                  <option>--</option>
                  <option value="Admin">Admin</option>
                  <option value="Employee">Employee</option>
                  <option value="Pimpinan">Pimpinan</option>
                </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>