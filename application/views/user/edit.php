<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <form action="" method="POST">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>Form Edit Data User</h4>
        </div>
        <div class="panel-body">
          <div class="form-group row">
            <div class="col-lg-6 <?= form_error('username') ? 'has-error' : null ?>">
              <label>Username</label>
              <input type="hidden" name="id_user" value="<?= $row->id_user ?>">
              <input type="text" name="username" value="<?= $this->input->post('username') ?? $row->username ?>" class="form-control">
            </div>
            <div class="col-lg-6 <?= form_error('password1') ? 'has-error' : null ?>">
              <label>Password</label>
              <input type="password" name="password1" class="form-control" value="<?= $this->input->post('password1'); ?>">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-6 <?= form_error('password2') ? 'has-error' : null ?>">
              <label>Re-Password</label>
              <input type="password" name="password2" class="form-control" value="<?= $this->input->post('password2'); ?>">
            </div>
            <div class="col-lg-6 <?= form_error('status') ? 'has-error' : null ?>">
              <label>Status User</label>
              <select name="status" class="form-control">
                <?php $status = $this->input->post('status') ? $this->input->post('status') : $row->status_user ?>
                <option value="Admin">Admin</option>
                <option value="Employee" <?= $status == 'Employee' ? "selected" : null ?>>Employee</option>
                <option value="Pimpinan" <?= $status == 'Pimpinan' ? "selected" : null ?>>Pimpinan</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
            <button type="reset" class="btn btn-default"><i class="fa fa-undo"></i> Reset</button>
          </div>
        </div>
    </form>
  </div>
</div>