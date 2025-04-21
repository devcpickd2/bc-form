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
    </div>

    <div class="row">
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body"> 
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-gray-800" style="font-size: 18px;">
                Current Product</div>
                <hr>
                <div class="h5 mb-0 font-weight-bold text-success text-uppercase mb-1" style="font-size: 18px;">
                  <?php if (!empty($latest_today)): ?>
                    <p style="font-size: 32px;">
                      <?php echo $latest_today['nama_produk']; ?>
                    </p>
                    <p style="font-size: 15px;">
                      Total Batch : <?php echo $count_batch; ?>
                    </p>
                  <?php else: ?>
                    <p style="font-size: 15px;">No Process Today</p>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-inbox fa-2x text-gray-300"></i>
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
                <div class="text-xs font-weight-bold text-gray-800" style="font-size: 18px;">
                Latest Product Code</div>
                <hr>
                <div class="h5 mb-0 font-weight-bold text-info text-uppercase mb-1" style="font-size: 18px;">
                  <?php if (!empty($latest_today)): ?>
                    <p style="font-size: 32px;">
                      <?php echo $latest_today['kode_produksi']; ?>
                    </p>
                    <p style="font-size: 15px;">
                      Total Batch : <?php echo $count_batch; ?>
                    </p>
                  <?php else: ?>
                    <p style="font-size: 15px;">No Process Today</p>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-code fa-2x text-gray-300"></i>
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
                <div class="text-xs font-weight-bold text-gray-800" style="font-size: 18px;">
                Latest Production</div>
                <hr>
                <div class="h5 mb-0 font-weight-bold text-warning text-uppercase mb-1" style="font-size: 18px;">
                  <?php if (!empty($latest_today)): ?>
                    <p style="font-size: 32px;">
                      <?php echo date('d-m-Y | H:i', strtotime($latest_today['created_at']));  ?>
                    </p>
                  <?php else: ?>
                    <p style="font-size: 15px;">No Process Today</p>
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
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-gray-800" style="font-size: 18px;">
                Stalling Time</div> 
                <hr>
                <div class="h5 mb-0 font-weight-bold text-primary text-uppercase mb-1" style="font-size: 18px;">
                  <?php if (!empty($latest_today)): ?>
                    <p style="font-size: 32px;">
                     <?php echo $latest_today['stall_jam_mulai'] . '-' . $latest_today['stall_jam_berhenti']; ?></p>
                   <?php else: ?>
                    <p style="font-size: 15px;">No Process Today</p>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-spinner fa-2x text-gray-300"></i>
              </div>
            </div>
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

  .table-limited {
    width: 100%;
    max-width: 100%;
    table-layout: fixed;
    overflow-x: auto; 
  }

  .table-limited thead, .table-limited tbody {
    display: block; 
  }

  .table-limited thead {
    overflow-y: auto; 
    width: calc(100% - 1em); 
  }

  .table-limited tbody {
    max-height: 185px; 
    overflow-y: auto; 
  }

  .table-limited th, .table-limited td {
    padding: 2px 10px;
    text-align: left;
  }


</style>