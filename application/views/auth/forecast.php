<?php

$data = [0, $aug, $sep, $okt];
$bulan = [0, 8, 9, 10, 11];

// Inisialisasi Awal
$at = array(); // Nilai Kesalahan Absolut ke-t
$mt = array(); // Nilai Pemulusan Absolut ke-t
$ct = array(); // Nilai Konstanta ke-t
$et = array(); // Nilai Error ke-t
$ea = array(); // Nilai Error Absolut
$ea2 = array(); // Nilai Error Absolute Kuadrat
$pe = array(); // Hitung Persentage Error
$hasilForecast = array(); //Untuk menampung hasil forecast

$hasilForecast[0] = 0.00;
$hasilForecast[1] = array_sum($data) / count($data);
$at[0] = 0.00;
$mt[0] = 0.00;
$ct[0] = 0.00;
$ct[1] = 0.20;
$beta = 0.50;
$et[0] = 0.00;

for ($k = 0; $k < count($data); $k++) {
  if ($k > 0) {
    // Hitung Forecast
    $hitungForecast = $ct[$k] * $data[$k] + (1 - $ct[$k]) * $hasilForecast[$k];
    $nff = round($hitungForecast);
    array_push($hasilForecast, $nff);

    // Hitung E
    $hitungE = $data[$k] - $hasilForecast[$k];
    $nfe = round($hitungE);
    array_push($et, $nfe);
    array_push($ea, abs($nfe));
    array_push($ea2, pow($nfe, 2));
    array_push($pe, $nfe / $data[$k] * 100 / 100);

    // Hitung A
    $hitungA = $beta * $et[$k] + (1 - $beta) * $at[$k - 1];
    $nfa = round($hitungA);
    array_push($at, $nfa);

    // Hitung M
    $hitungM = $beta * abs($et[$k]) + (1 - $beta) * $mt[$k - 1];
    $nfm = round($hitungM);
    array_push($mt, $nfm);

    // Hitung Alpha
    $HitungAlpha = abs($at[$k] / $mt[$k]);
    $nfal = round($HitungAlpha);
    array_push($ct, $nfal);
  }
}
array_push($data, 0.00);
array_push($et, 0.00);
array_push($at, 0.00);
array_push($mt, 0.00);
array_push($ct, 0.00);
?>

<div class="container">
  <h3 class="text-center">FORECAST DATA DENGAN METODE <i>EXPONENTIAL SMOOTHING</i></h3>
  <div class="col-md-12">
    <div id="forcase">
    </div>
    <br>
    <script type="text/javascript">
      $(function() {
        Highcharts.chart('forcase', {
          title: {
            text: 'Forecasting Data Raw Material',
            x: -20 //center
          },
          xAxis: {
            categories: ['Agustus', 'September', 'Oktober', 'November']
          },
          yAxis: {
            title: {
              text: 'Jumlah Quantity'
            },
            plotLines: [{
              value: 0,
              width: 1,
              color: '#808080'
            }]
          },
          tooltip: {
            valueSuffix: 'Kg'
          },
          legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
          },
          series: [{
            name: 'Forecasting',
            data: [2445000, 1980504, 7937959, <?= $hitungForecast; ?>]
          }]
        });
      });
    </script>
    <br>
    <div class="jumbotron" style="border-radius: 0;">
      <h4>FORECASTING</h4>
      <hr>
      <table class="table table-bordered">
        <thead>
          <th>Bulan</th>
          <th>Data Aktual</th>
          <th>Forecast</th>
          <th><i>E</i><i style="font-size: 8pt;">t</i></th>
          <th><i>A</i><i style="font-size: 8pt;">t</i></th>
          <th><i>M</i><i style="font-size: 8pt;">t</i></th>
          <th><i>α</i><i style="font-size: 8pt;">t</i></th>
        </thead>
        <tbody>
          <?php
          for ($tb = 0; $tb < count($data); $tb++) {
            echo "<tr>
                  <td>" . $bulan[$tb] . "</td>
                  <td>" . total($data[$tb]) . "</td>
                  <td>" . total($hasilForecast[$tb]) . "</td>
                  <td>" . total($et[$tb]) . "</td>
                  <td>" . total($at[$tb]) . "</td>
                  <td>" . total($mt[$tb]) . "</td>
                  <td>" . total($ct[$tb]) . "</td>
                  </tr>";
          }
          ?>
        </tbody>
      </table>
      <?php
      // Hitung MAD
      $mad = array_sum($ea) / 4;

      // Hitung MSE
      $mse = array_sum($ea2) / 4;

      // Hitung MAPE
      $mape = array_sum($pe) / 4;
      var_dump($mape);
      ?>
      <h4>PERHITUNGAN KESALAHAN RAMALAN</h4>
      <hr>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>MAD</th>
            <th>MSE</th>
            <th>MAPE</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?= total($mad); ?></td>
            <td><?= total($mse); ?></td>
            <td><?= round($mape) . "%"; ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-md-12">
    <div class="jumbotron" style="text-align: justify; border-radius: 0; margin-top: 15px; padding: 40px;">
      <p align="center">Keterangan</p>
      <hr>
      Berikut ini adalah peramalan jumlah quantity untuk 1 bulan kedepan berdasarkan data transaksi sebelumnya.
      Peramalan ini menggunakan metode <i>Exponential Smoothing</i> dengan ARRSES. Untuk mengukur kualitas ramalan
      digunakan metode MAD, MSE, dan MAPE yang menghasilkan nilai MAD : <?= total($mad); ?>, MSE : <?= total($mse); ?> dan MAPE : <?= round($mape) . "%"; ?> yang berarti permalan data raw material
      tahunan PT. Pahala Bahari Nusantara menggunakan metode <i>Exponential Smoothing</i> adalah metode yang tepat karena Persentase keakuratannya <?= round($mape) . "%"; ?>.
    </div>
  </div>
</div>