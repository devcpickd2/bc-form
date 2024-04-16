<!DOCTYPE html>
<html>
<head> 
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

      <?php
      date_default_timezone_set('Asia/Jakarta');

      $days = array(
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu'
      );

      $months = array(
        'January' => 'Januari',
        'February' => 'Februari',
        'March' => 'Maret',
        'April' => 'April',
        'May' => 'Mei',
        'June' => 'Juni',
        'July' => 'Juli',
        'August' => 'Agustus',
        'September' => 'September',
        'October' => 'Oktober',
        'November' => 'November',
        'December' => 'Desember'
      );

      $day = date("l"); 
      $date = date("j"); 
      $month = date("F"); 
      $year = date("Y"); 

      $today = $days[$day];
      $now_month = $months[$month];

      ?>
      <div class="h3 mb-0 text-gray-800">Update Hari Ini <?= $today ?>, <?= $date ?> <?= $now_month ?> <?= $year ?></div>

      <!-- <h1 class="h3 mb-0 text-gray-800">Update Hari Ini <?= $today ?>, <?= $date ?> <?= $now_month ?> <?= $year ?></h1> -->
      <a href="<?= base_url('post_mortem/report_pm')?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Total Kedatangan Hari ini</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?php if ($count_today > 0): ?>
                    <p><?php echo $count_today; ?> Kedatangan</p>
                  <?php else: ?>
                    <p>Tidak ada kedatangan untuk hari ini.</p>
                    <?php endif; ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-truck fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                    Waktu Kedatangan Terakhir</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php if (!empty($latest_today)): ?>
                        <ul>
                          <li><?php echo $latest_today['waktu_kedatangan']; ?></li>
                        </ul>
                      <?php else: ?>
                        <p>Tidak ada kedatangan untuk hari ini.</p>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-clock fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                    Kedatangan Ayam Terakhir</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php if (!empty($latest_today)): ?>
                        <p>
                          <?php echo $latest_today['jumlah_ayam']; ?>
                        ekor</p>
                      <?php else: ?>
                        <p>Tidak ada kedatangan untuk hari ini.</p>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-cubes fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    Total Defect Terakhir</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php if (!empty($latest_today)): 
                        $total = $latest_today['total_ayam_defect'] + $latest_today['total_defect_ayam_lebih'];
                        ?>
                        <p><?php echo $total ?> defect</p>
                      <?php else: ?>
                        <p>Tidak ada kedatangan untuk hari ini.</p>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Total Defect Hari Ini</h6>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                      <div class="chart2">
                        <canvas id="myChart" width="100%" height="27" class="chartjs-render-monitor" style=" height: 100%; width: 100%;" ></canvas>
                        <script>
                          var ctx = document.getElementById('myChart').getContext('2d');
                          var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                              labels: <?= json_encode(array_column($data_today, 'waktu_kedatangan')) ?>,
                              datasets: [{
                                label: 'Defect Tunggal ',
                                data: <?= json_encode(array_column($data_today, 'total_ayam_defect')) ?>,
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 3
                              }, {
                                label: 'Defect > 1 ',
                                data: <?= json_encode(array_column($data_today, 'total_defect_ayam_lebih')) ?>,
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 3
                              }]
                            },
                            options: {
                              scales: {
                                yAxes: [{
                                  ticks: {
                                    beginAtZero: true
                                  }
                                }]
                              },
                              tooltips: {
                                callbacks: {
                                  label: function(tooltipItem, data) {
                                            return tooltipItem.yLabel.toFixed(0); // Mengambil nilai tanpa desimal
                                          }
                                        }
                                      }
                                    }
                                  });
                                </script>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Kedatangan Hari Ini</h6>
                      </div>
                      <div class="card-body">
                        <table>
                          <thead>
                            <tr>
                              <th>Waktu</th>
                              <th>Nama Farm</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php if (!empty($data_today)): ?>
                              <ul>
                                <?php foreach ($data_today as $data): ?>
                                  <tr>
                                    <td>
                                      <li><?php echo $data['waktu_kedatangan']; ?></li>
                                    </td>
                                    <td>
                                      <?php echo $data['nama_farm']; ?>
                                    </td>
                                  </tr>
                                <?php endforeach; ?>
                              </ul>
                            <?php else: ?>
                              <p>Tidak ada data untuk hari ini.</p>
                            <?php endif; ?>
                          </tbody>
                        </table>
                        <canvas width="100%" height="100%" class="chartjs-render-monitor"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </body>
          </html>

          <style type="text/css">
            table {
              border-collapse: collapse;
              width: 100%;
            }

            .text-xs {
              font-size: 17px;
            }
            p {
              font-size: 17px;
            }
            li {
              font-size: 17px;
            }
            .h3{
              font-size: 23px;
              font-weight: bold;
              font-style: italic;
            }
            .chart2 {
              padding: 5px;
            }
            #chart {
              width: 100%;
            }
            canvas {
              cursor: pointer;
            }
          </style>