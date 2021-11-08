<style media="screen">
  .jumbotron {
    background: #fff;
    border-radius: 0;
    align-content: center;
    -webkit-box-shadow: 10px 11px 40px -12px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: 10px 11px 40px -12px rgba(0, 0, 0, 0.75);
    box-shadow: 10px 11px 40px -12px rgba(0, 0, 0, 0.75);
  }

  .table-bordered>thead {
    background: green;
    color: #fff;
  }

  .table-bordered>tbody>tr>td:last-child {
    background: red;
    color: #fff;
    font-weight: bold;
    width: 50px;
  }
</style>
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
        public $z;
        function __construct($v, $w, $x, $y, $z)
        {
          $this->v = $v;
          $this->w = $w;
          $this->x = $x;
          $this->y = $y;
          $this->z = $z;
        }
      }

      function distance($p1, $p2)
      {
        return sqrt(pow(($p1->v - $p2->v), 2) + pow(($p1->w - $p2->w), 2) + pow(($p1->x - $p2->x), 2) + pow(($p1->y - $p2->y), 2) + pow(($p1->z - $p2->z), 2));
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
          $z = 0;

          $c = 0;
          foreach ($group[$i] as $set) {
            $c++;
            $v += $set->v;
            $w += $set->w;
            $x += $set->x;
            $y += $set->y;
            $z += $set->z;
          }

          $v /= $c;
          $w /= $c;
          $x /= $c;
          $y /= $c;
          $z /= $c;

          $centroid[$i] = new DataSet($v, $w, $x, $y, $z);
        }

        return $centroid;
      }

      if (isset($_REQUEST['data'])) {
        $var = $_REQUEST['data'];
      } else
        $sql = "SELECT id_item, id_catch, id_jenis, qty, id_kapal FROM transaksi";
      $result = mysqli_query($con, $sql);
      while ($r = mysqli_fetch_assoc($result)) {
        $var1[] = array('v' => $r['id_item'], 'w' => $r['id_catch'], 'x' => $r['id_jenis'], 'y' => $r['qty'], 'z' => $r['id_kapal']);
      }
      $var = json_encode($var1);

      if (isset($_REQUEST['k']))
        $k = $_REQUEST['k'];
      else
        $k = 3;

      $obj = json_decode($var);

      $table = array();
      foreach ($obj as $row) {
        $table[] = new DataSet($row->v, $row->w, $row->x, $row->y, $row->z);
      }

      $centroid = array();
      for ($i = 0; $i < $k; $i++)
        $centroid[] = new DataSet($table[$i]->v, $table[$i]->w, $table[$i]->x, $table[$i]->y, $table[$i]->z);


      $iteration_limit = 100;

      for ($iteration = 0; $iteration < $iteration_limit; $iteration++) {

        $cluster = dump($table, $centroid, $k);

        $group = array();
        for ($i = 0; $i < $k; $i++) {
          $group[] = array();
        }

        $i = 0;
        foreach ($table as $row) {
          $group[$cluster[$i]][] = new DataSet($row->v, $row->w, $row->x, $row->y, $row->z);
          $i++;
        }

        $new_centroid = dump_group($centroid, $group, $k);

        // CHECK CHANGED IN NEW CENTROID AND BREAK
        $flag = true;  //ASSUME SAME VALUES EXIST
        $i = 0;
        foreach ($new_centroid as $g) {
          if (
            $centroid[$i]->v != $new_centroid[$i]->v || $centroid[$i]->w != $new_centroid[$i]->w || $centroid[$i]->x != $new_centroid[$i]->x
            || $centroid[$i]->y != $new_centroid[$i]->y || $centroid[$i]->z != $new_centroid[$i]->z
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
          $centroid[$i] = new DataSet($g->v, $g->w, $g->x, $g->y, $g->z);
          $i++;
        }
      }
      ?>
      <h3>HASIL AKHIR CLUSTERING DATA DENGAN K-MEANS</h3>
      <div class="jumbotron" id="info_iterasi" style="border-radius: 0;">
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
        $kapalCount[$i] = array();
      ?>
        <div class="jumbotron" style="border-radius: 0; overflow: scroll; height: 400px;">
          <table class="table table-striped">
            <thead>
              <tr>
                <th colspan="5">Pola Ke-<?= $i + 1; ?></th>
              </tr>
              <tr>
                <th>Item</th>
                <th>Nama Kapal</th>
                <th>Jenis Penangkapan</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $item = array();
              $tangkap = array();
              $kapal = array();
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
                $sqlkapal = "SELECT nama_kapal FROM kapal WHERE id_kapal = $var->z";
                $reskapal = mysqli_query($con, $sqlkapal);
                while ($rkapal = mysqli_fetch_assoc($reskapal)) {
                  $kapal = $rkapal;
                }
                echo "<tr>
                        <td>" . $item['nama_item'] . "</td>
                        <td>" . $kapal['nama_kapal'] . "</td>
                        <td>" . $tangkap['nama_catch'] . "</td>
                      </tr>";
                array_push($itemCount[$i], $item['nama_item']);
                array_push($kapalCount[$i], $kapal['nama_kapal']);
                array_push($tangkapCount[$i], $tangkap['nama_catch']);
              }
              $jmlitem[$i] = array_count_values($itemCount[$i]);
              arsort($jmlitem[$i]);
              $jmlkapal[$i] = array_count_values($kapalCount[$i]);
              arsort($jmlkapal[$i]);
              $jmltangkap[$i] = array_count_values($tangkapCount[$i]);
              arsort($jmltangkap[$i]);
              ?>
            </tbody>
          </table>
        </div>
        <!-- Initialisasi Data -->
        <?php
        $tampilitem = array_values($jmlitem[$i]);
        $tampilkapal = array_values($jmlkapal[$i]);
        $tampiltangkap = array_values($jmltangkap[$i]);
        $tnitem = array_keys($jmlitem[$i]);
        $tnkapal = array_keys($jmlkapal[$i]);
        $tntangkap = array_keys($jmltangkap[$i]);
        ?>
        <div class="jumbotron" style="border-radius: 0;">
          <h3>TABEL HASIL ITERASI - Cluster <?= $i + 1; ?></h3>
          <hr>
          <div class="row">
            <div class="col-md-4">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Item</th>
                    <th>Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  for ($tp = 0; $tp < (count($tampilitem) / count($tampilitem) * 2); $tp++) {
                    echo "<tr>
                          <td>" . $tnitem[$tp] . "</td>
                          <td>" . $tampilitem[$tp] . "</td>
                          </tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <div class="col-md-4">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Nama Kapal</th>
                    <th>Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  for ($tkp = 0; $tkp < (count($tampilkapal) / count($tampilkapal) * 5); $tkp++) {
                    echo "<tr>
                          <td>" . $tnkapal[$tkp] . "</td>
                          <td>" . $tampilkapal[$tkp] . "</td>
                          </tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <div class="col-md-4">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Jenis Tangkap</th>
                    <th>Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  for ($tj = 0; $tj < (count($tampiltangkap) / count($tampiltangkap) * 2); $tj++) {
                    echo "<tr>
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