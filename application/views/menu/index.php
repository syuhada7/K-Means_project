<div class="container-fluid">
  <img src="<?= base_url('assets/logo mercu.png'); ?>" alt="" width="70" height="50" style="float: left; margin-top: 15px;">
  <div id="info">
    <span class="jam">
      <?php
      $hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
      $bulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
      echo $hari[date("w")] . ", " . date("j") . " " . $bulan[date("n")] . " " . date("Y");
      ?> - <span id="time"></span></span>
    <h4>Hi,<?= $user; ?>. Welcome Back!</h4>
  </div>
  <?php if ($level == 'Admin') { ?>
    <nav>
      <ul>
        <a href="<?= base_url('user'); ?>">
          <li>
            <div class="front" id="box1"><span class="fa fa-user fa-5x"></span></div>
            <div class="back">MANAGE USER</div>
          </li>
        </a>
        <a href="<?= base_url('transaksi'); ?>">
          <li>
            <div class="front" id="box1"><span class="fa fa-pencil fa-5x"></span></div>
            <div class="back">INPUT DATA</div>
          </li>
        </a>
        <a href="<?= base_url('dashboard'); ?>">
          <li>
            <div class="front" id="box4"><span class="fa fa-dashboard fa-5x"></span></div>
            <div class="back">VIEW DATA</div>
          </li>
        </a>
      </ul>
      <ul>
        <a href="<?= base_url('mining'); ?>">
          <li>
            <div class="front" id="box2"><span class="fa fa-bar-chart fa-5x"></span></div>
            <div class="back">MINING DATA</div>
          </li>
        </a>
        <a href="<?= base_url('dashboard/forecast'); ?>">
				  <li>
					  <div class="front" id="box3"><span class="fa fa-line-chart fa-5x"></span></div>
					  <div class="back">FORECAST DATA</div>
				  </li>
			  </a>
        <a href="<?= base_url('auth/about'); ?>">
          <li>
            <div class="front" id="box5"><span class="fa fa-question-circle-o fa-5x"></span></div>
            <div class="back">ABOUT</div>
          </li>
        </a>
      </ul>
    </nav>
  <?php } ?>
  <?php if ($level == 'Employee') { ?>
    <nav>
      <ul>
        <a href="<?= base_url('dashboard'); ?>">
          <li>
            <div class="front" id="box4"><span class="fa fa-dashboard fa-5x"></span></div>
            <div class="back">VIEW DATA</div>
          </li>
        </a>
        <a href="<?= base_url('transaksi'); ?>">
          <li>
            <div class="front" id="box1"><span class="fa fa-pencil fa-5x"></span></div>
            <div class="back">INPUT DATA</div>
          </li>
        </a>
        <a href="<?= base_url('mining'); ?>">
          <li>
            <div class="front" id="box2"><span class="fa fa-bar-chart fa-5x"></span></div>
            <div class="back">MINING DATA</div>
          </li>
        </a>
      </ul>
      <ul>
        <a href="<?= base_url('dashboard/forecast'); ?>">
          <li>
            <div class="front" id="box3"><span class="fa fa-line-chart fa-5x"></span></div>
            <div class="back">FORECAST DATA</div>
          </li>
        </a>
        <a href="<?= base_url('auth/about'); ?>">
          <li>
            <div class="front" id="box5"><span class="fa fa-question-circle-o fa-5x"></span></div>
            <div class="back">ABOUT</div>
          </li>
        </a>
      </ul>
    </nav>
  <?php } ?>
  <?php if ($level == 'Pimpinan') { ?>
    <nav>
      <ul>
        <a href="<?= base_url('dashboard'); ?>">
          <li>
            <div class="front" id="box4"><span class="fa fa-dashboard fa-5x"></span></div>
            <div class="back">VIEW DATA</div>
          </li>
        </a>
        <a href="<?= base_url('mining'); ?>">
          <li>
            <div class="front" id="box2"><span class="fa fa-bar-chart fa-5x"></span></div>
            <div class="back">MINING DATA</div>
          </li>
        </a>
      </ul>
      <ul>
        <a href="<?= base_url('dashboard/forecast'); ?>">
          <li>
            <div class="front" id="box3"><span class="fa fa-line-chart fa-5x"></span></div>
            <div class="back">FORECAST DATA</div>
          </li>
        </a>
        <a href="<?= base_url('auth/about'); ?>">
          <li>
            <div class="front" id="box5"><span class="fa fa-question-circle-o fa-5x"></span></div>
            <div class="back">ABOUT</div>
          </li>
        </a>
      </ul>
    </nav>
  <?php } ?>
</div>