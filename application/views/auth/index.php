<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <form action="<?= site_url('auth/login'); ?>" method="POST">
        <div class="panel panel-danger">
          <div class="panel-heading">
            <h4 align="center"><img src="<?= base_url('assets/logo mercu.png'); ?>" alt="" width="100" height="80" style="margin-top: 15px;"></h4>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
          </div>
          <div class="panel-footer">
            <button type="submit" name="btn_login" class="btn btn-info"><i class="fa fa-sign-in"></i> Sign In</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>