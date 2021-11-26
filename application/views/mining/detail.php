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
        <div class="col-md-12">
          <h3 style="text-align: center;">DETAIL ITERASI</h3>
          <hr>
          <?php
          class DataSet
          {
            public $v;
            public $w;
            public $x;
            function __construct($v, $w, $x)
            {
              $this->v = $v;
              $this->w = $w;
              $this->x = $x;
            }
          }

          function distance($p1, $p2)
          {
            return sqrt(pow(($p1->v - $p2->v), 2) + pow(($p1->w - $p2->w), 2) + pow(($p1->x - $p2->x), 2));
          }

          function dump($table, $centroid, $k)
          {
            $cluster = array();
          ?>
            <table class="table table-bordered" align='center'>
              <thead>
                <tr class="info">
                  <th>Item</th>
                  <th>Jenis Penangkapan</th>
                  <th>Qty</th>
                  <?php
                  for ($i = 0; $i < $k; $i++)
                    echo "<th>(C" . $i . ")</th>";
                  ?>
                  <th>Cluster</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($table as $row) {
                ?>
                  <tr class="success">
                    <td>
                      <?= total($row->v); ?>
                    </td>
                    <td>
                      <?= total($row->w); ?>
                    </td>
                    <td>
                      <?= total($row->x); ?>
                    </td>
                    <?php
                    $minValue = 999999;
                    $minID = 0;
                    for ($i = 0; $i < $k; $i++) {
                      $dist = distance($row, $centroid[$i]);
                      echo "<td>" . total($dist) . "</td>";
                      if ($minValue > $dist) {
                        $minID = $i;
                        $minValue = $dist;
                      }
                    }
                    $cluster[] = $minID;
                    ?>
                    <?php
                    if ($minID == 0) {
                      echo "<td style='background: red; color: #fff;'>" . $minID . "</td>";
                    } elseif ($minID == 1) {
                      echo "<td style='background: green; color: #fff;'>" . $minID . "</td>";
                    } elseif ($minID == 2) {
                      echo "<td style='background: blue; color: #fff;'>" . $minID . "</td>";
                    }
                    ?>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
            <br /><br />
          <?php
            return $cluster;
          }
          function dump_group($centroid, $group, $k)
          {
          ?>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <?php
                  for ($i = 0; $i < $k; $i++)
                    echo "<th style='background: grey; color: white; text-align: center;'>C" . $i . "</th>";
                  ?>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                  for ($i = 0; $i < $k; $i++) {
                    echo "<td>";

                    $v = 0;
                    $w = 0;
                    $x = 0;

                    $c = 0;
                    foreach ($group[$i] as $set) {
                      $c++;
                      echo "( " . total($set->v) . " , " . total($set->w) . " , " . total($set->x) . " )<br/>";
                      $v += $set->v;
                      $w += $set->w;
                      $x += $set->x;
                    }

                    $v /= $c;
                    $w /= $c;
                    $x /= $c;

                    $centroid[$i] = new DataSet($v, $w, $x);
                    echo "</td>";
                  }
                  ?>
                </tr>
              </tbody>
            </table>
          <?php
            return $centroid;
          }

          if (isset($_REQUEST['data'])) {
            $var = $_REQUEST['data'];
          } else
            $sql = "SELECT id_item, id_catch, qty FROM transaksi";
          $result = mysqli_query($con, $sql);
          while ($r = mysqli_fetch_assoc($result)) {
            $var1[] = array('v' => $r['id_item'], 'w' => $r['id_catch'], 'x' => $r['qty']);
          }
          $var = json_encode($var1);

          if (isset($_REQUEST['k']))
            $k = $_REQUEST['k'];
          else
            $k = 3;

          $obj = json_decode($var);
          $table = array();

          foreach ($obj as $row) {
            $table[] = new DataSet($row->v, $row->w, $row->x);
          }
          $centroid = array();
          for ($i = 0; $i < $k; $i++)
            $centroid[] = new DataSet($table[$i]->v, $table[$i]->w, $table[$i]->x);
          $iteration_limit = 20;

          for ($iteration = 0; $iteration < $iteration_limit; $iteration++) {
            echo '<br/><div style="background: #DDD; position: relative; width: 100%; height: 30px; border: 1px solid black; color: black; font-weight: bold;"><div style="padding: 5px;"><i class="fa fa-info-circle"></i> ITERASI KE ' . $iteration . '</div></div><br/>';
            $cluster = dump($table, $centroid, $k);
            $group = array();
            for ($i = 0; $i < $k; $i++) {
              $group[] = array();
            }

            $i = 0;
            foreach ($table as $row) {
              $group[$cluster[$i]][] = new DataSet($row->v, $row->w, $row->x);
              $i++;
            }
            $new_centroid = dump_group($centroid, $group, $k);

            // CHECK CHANGED IN NEW CENTROID AND BREAK
            $flag = true;  //ASSUME SAME VALUES EXIST
            $i = 0;
            foreach ($new_centroid as $g) {
              if (
                $centroid[$i]->v != $new_centroid[$i]->v || $centroid[$i]->w != $new_centroid[$i]->w || $centroid[$i]->x != $new_centroid[$i]->x
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
              $centroid[$i] = new DataSet($g->v, $g->w, $g->x);
              $i++;
            }

            echo "</br></br></br></br></br></br></br>";
          }

          if ($flag) {
            echo '<br/><div style="background: aquamarine; position: relative; width: 100%; height: 30px; border: 1px solid yellow; color: black; font-weight: bold;"><div style="padding: 5px;"><i class="fa fa-info-circle"></i> CLUSTER FINDING SUCCESSFULL</div></div><br/>';
          } else {
            echo '<br/><div style="background: red; position: relative; width: 100%; height: 30px; border: 1px solid yellow; color: white; font-weight: bold;"><div style="padding: 5px;"><i class="fa fa-info-circle"></i> ITERATION LIMIT REACHED. IMPERFECT CLUSTER, TRY CHAGING VALUE OF $k </div></div><br/>';
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>