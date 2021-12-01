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
    <br>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php
          class DataSet
          {
            public $v;
            public $w;
            public $x;
            public $y;
            function __construct($v, $w, $x, $y)
            {
              $this->v = $v;
              $this->w = $w;
              $this->x = $x;
              $this->y = $y;
            }
          }

          function distance($p1, $p2)
          {
            return sqrt(pow(($p1->v - $p2->v), 2) + pow(($p1->w - $p2->w), 2) + pow(($p1->x - $p2->x), 2) + pow(($p1->y - $p2->y), 2));
          }

          function dump($table, $centroid, $k)
          {
            $cluster = array();
            foreach ($table as $row) {

              $minValue = 999999;
              $minID = 0;

              for ($i = 0; $i < $k; $i++) {
                $dist = distance($row, $centroid[$i]);
                if ($minValue > $dist) {
                  $minID = $i;
                  $minValue = $dist;
                }
              }
              $cluster[] = $minID;
            }
            return $cluster;
          }

          function dump_group($centroid, $group, $k)
          {
            for ($i = 0; $i < $k; $i++) {

              $v = 0;
              $w = 0;
              $x = 0;
              $y = 0;

              $c = 0;
              foreach ($group[$i] as $set) {
                $c++;
                $v += $set->v;
                $w += $set->w;
                $x += $set->x;
                $y += $set->y;
              }

              $v /= $c;
              $w /= $c;
              $x /= $c;
              $y /= $c;

              $centroid[$i] = new DataSet($v, $w, $x, $y);
            }

            return $centroid;
          }

          if (isset($_REQUEST['data'])) {
            $var = $_REQUEST['data'];
          } else
            $sql = "SELECT id_item, id_catch, qty, id_kapal FROM transaksi";
          $result = mysqli_query($con, $sql);
          while ($r = mysqli_fetch_assoc($result)) {
            $var1[] = array('v' => $r['id_item'], 'w' => $r['id_catch'], 'x' => $r['qty'], 'y' => $r['id_kapal']);
          }
          $var = json_encode($var1);

          if (isset($_REQUEST['k']))
            $k = $_REQUEST['k'];
          else
            $k = 3;

          $obj = json_decode($var);

          $table = array();
          foreach ($obj as $row) {
            $table[] = new DataSet($row->v, $row->w, $row->x, $row->y);
          }

          $centroid = array();
          for ($i = 0; $i < $k; $i++)
            $centroid[] = new DataSet($table[$i]->v, $table[$i]->w, $table[$i]->x, $table[$i]->y);


          $iteration_limit = 100;

          for ($iteration = 0; $iteration < $iteration_limit; $iteration++) {

            $cluster = dump($table, $centroid, $k);

            $group = array();
            for ($i = 0; $i < $k; $i++) {
              $group[] = array();
            }

            $i = 0;
            foreach ($table as $row) {
              $group[$cluster[$i]][] = new DataSet($row->v, $row->w, $row->x, $row->y);
              $i++;
            }

            $new_centroid = dump_group($centroid, $group, $k);

            // CHECK CHANGED IN NEW CENTROID AND BREAK
            $flag = true;  //ASSUME SAME VALUES EXIST
            $i = 0;
            foreach ($new_centroid as $g) {
              if (
                $centroid[$i]->v != $new_centroid[$i]->v || $centroid[$i]->w != $new_centroid[$i]->w || $centroid[$i]->x != $new_centroid[$i]->x
                || $centroid[$i]->y != $new_centroid[$i]->y
              ) {
                $flag = false;
                break;
              }
              $i++;
            }

            if ($flag) {
              break;
            }

            // COPY NEW_CENTROID TO CENTROID
            $i = 0;
            foreach ($new_centroid as $g) {
              $centroid[$i] = new DataSet($g->v, $g->w, $g->x, $g->y);
              $i++;
            }
          }
          ?>
          <h3 align="center">HASIL AKHIR CLUSTERING DATA DENGAN K-MEANS</h3>
          <div class="box box-default" id="info_iterasi" style="border-radius: 0;">
            <label class="label label-warning">Jumlah Data = <?= count($obj); ?></label><br />
            <label class="label label-default">Jumlah Iterasi = <?= $iteration; ?></label><br />
            <label class="label label-success">Jumlah Cluster = <?= $k; ?></label>
            <a href="<?= base_url('mining/detail'); ?>" style="float: right; background: green; color: white; padding: 10px; margin-top: -20px; text-decoration: none;">Lihat Detail Iterasi</a>
          </div>
          <?php
          $sqlHapus = "TRUNCATE TABLE hasil_cluster";
          $hasil = mysqli_query($con, $sqlHapus);
          for ($i = 0; $i < count($group); $i++) {
            $itemCount[$i] = array();
            $tangkapCount[$i] = array();
          ?>
            <div class="box box-default" style="border-radius: 0; overflow: scroll; height: 400px;">
              <table class="table table-hover table-bordered">
                <thead>
                  <tr class="success">
                    <th colspan="5">Pola Ke-<?= $i + 1; ?></th>
                  </tr>
                  <tr class="danger">
                    <th>Item</th>
                    <th>Jenis Penangkapan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $item = array();
                  $tangkap = array();
                  foreach ($group[$i] as $var) {
                    $sqlitem = "SELECT nama_item FROM item WHERE id_item = $var->v";
                    $resitem = mysqli_query($con, $sqlitem);
                    while ($ritem = mysqli_fetch_assoc($resitem)) {
                      $item = $ritem;
                    }
                    $sqltangkap = "SELECT nama_catch FROM tangkap WHERE id_catch = $var->w";
                    $restangkap = mysqli_query($con, $sqltangkap);
                    while ($rtangkap = mysqli_fetch_assoc($restangkap)) {
                      $tangkap = $rtangkap;
                    }
                    echo "<tr class='active'>
                        <td>" . $item['nama_item'] . "</td>
                        <td>" . $tangkap['nama_catch'] . "</td>
                      </tr>";
                    array_push($itemCount[$i], $item['nama_item']);
                    array_push($tangkapCount[$i], $tangkap['nama_catch']);
                  }
                  $jmlitem[$i] = array_count_values($itemCount[$i]);
                  arsort($jmlitem[$i]);
                  $jmltangkap[$i] = array_count_values($tangkapCount[$i]);
                  arsort($jmltangkap[$i]);
                  ?>
                </tbody>
              </table>
            </div>
            <!-- Initialisasi Data -->
            <?php
            $tampilitem = array_values($jmlitem[$i]);
            $tampiltangkap = array_values($jmltangkap[$i]);
            $tnitem = array_keys($jmlitem[$i]);
            $tntangkap = array_keys($jmltangkap[$i]);
            ?>
            <div class="jumbotron" style="border-radius: 0;">
              <h3>TABEL HASIL ITERASI - Cluster <?= $i + 1; ?></h3>
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <table class="table table-bordered">
                    <thead>
                      <tr class="success">
                        <th>Item</th>
                        <th>Jumlah</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      for ($tp = 0; $tp < (count($tampilitem) / count($tampilitem) * 3); $tp++) {
                        echo "<tr class='info'>
                          <td>" . $tnitem[$tp] . "</td>
                          <td>" . $tampilitem[$tp] . "</td>
                          </tr>";
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
                <div class="col-md-6">
                  <table class="table table-bordered">
                    <thead>
                      <tr class="success">
                        <th>Jenis Tangkap</th>
                        <th>Jumlah</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      for ($tj = 0; $tj < (count($tampiltangkap) / count($tampiltangkap) * 3); $tj++) {
                        echo "<tr class='info'>
                          <td>" . $tntangkap[$tj] . "</td>
                          <td>" . $tampiltangkap[$tj] . "</td>
                          </tr>";
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>