<!DOCTYPE html>
<html>
<head> 
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <?php if ($this->session->flashdata('success_msg')): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '<?= $this->session->flashdata('success_msg'); ?>',
        showConfirmButton: false,
        timer: 2000
      });
    </script>
  <?php endif; ?>

  <?php if ($this->session->flashdata('error_msg')): ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Oops!',
        text: '<?= $this->session->flashdata('error_msg'); ?>'
      });
    </script>
  <?php endif; ?>

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
      <h3 class="mb-0">Update Hari Ini <?= $today ?>, <?= $date ?> <?= $now_month ?> <?= $year ?></h3>
    </div>

    <!-- Ringkasan Produksi -->
    <div class="row">
      <div class="col-md-3">
        <div class="card border-left-primary shadow py-2">
          <div class="card-body">
            <div class="card-title"><b>CURRENT PRODUCT</b></div>
            <?php if (!empty($latest_today)): ?>
              <h4 class="text-primary"><?php echo $latest_today['nama_produk']; ?></h4>
            <?php else: ?>
              <p>No Process Today</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card border-left-success shadow py-2">
          <div class="card-body">
            <div class="card-title"><b>LAST PRODUCT CODE</b></div>
            <?php if (!empty($latest_today)): ?>
              <h4 class="text-success"><?php echo $latest_today['kode_produksi']; ?></h4>
            <?php else: ?>
              <p>No Process Today</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card border-left-warning shadow py-2">
          <div class="card-body">
            <div class="card-title"><b>TOTAL BATCH TODAY</b></div>
            <?php if (!empty($latest_today)): ?>
              <h4 class="text-warning"><?php echo $count_batch; ?></h4>
            <?php else: ?>
              <p>No Process Today</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card border-left-danger shadow py-2">
          <div class="card-body">
            <div class="card-title"><b>PRODUCTION TIME PROCESS</b></div>
            <?php if (!empty($latest_today)): ?>
              <h4 class="text-danger">
                <?php
                echo date('H:i', strtotime($latest_today['created_at'])) . ' - ' . date('H:i', strtotime($latest_today['modified_at']));
                ?>
              </h4>
            <?php else: ?>
              <p>No Process Today</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="card mb-4">
      <?php
      $bulanIndo = [
        '01' => 'JANUARI', '02' => 'FEBRUARI', '03' => 'MARET', '04' => 'APRIL',
        '05' => 'MEI', '06' => 'JUNI', '07' => 'JULI', '08' => 'AGUSTUS',
        '09' => 'SEPTEMBER', '10' => 'OKTOBER', '11' => 'NOVEMBER', '12' => 'DESEMBER'
      ];
      $bulanSekarang = $bulanIndo[date('m')] . ' ' . date('Y');
      ?>

      <div class="card-header font-weight-bold">TEMUAN KONTAMINASI BENDA ASING – <?= $bulanSekarang; ?></div>
      <div class="card-body">
        <div class="row">
          <!-- Grafik -->
          <div class="col-md-6">
            <canvas id="kontaminasiChart" height="120"></canvas>
          </div>

          <!-- Tabel Temuan -->
          <div class="col-md-6">
            <table class="table table-bordered table-sm">
              <thead class="thead-light">
                <tr>
                  <th>Jenis Kontaminasi</th>
                  <th>Nama Produk</th>
                  <th>Kode Produksi</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($temuan as $row): ?>
                  <tr>
                    <td><?= $row['jenis_kontaminasi']; ?></td>
                    <td><?= $row['nama_produk']; ?></td>
                    <td><?= $row['kode_produksi']; ?></td>
                    <td><?= $row['jumlah_temuan']; ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <br>

<!-- Status Loading -->
<div class="row">
  <div class="col-md-6">
    <div class="card mb-4">
      <div class="card-header"><b>Pemeriksaan Loading Produk</b></div>
      <div class="card-body">
        <table class="table table-bordered table-sm">
          <thead class="thead-light">
            <tr>
              <th>Tanggal</th>
              <th>Jam Mulai</th>
              <th>Jam Selesai</th>
              <th>Tujuan</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($loading)): ?>
              <?php foreach ($loading as $k): ?>
                <tr>
                  <td><?= date('d-m-Y', strtotime($k['date'])); ?></td>
                  <td><?= $k['start_loading']; ?></td>
                  <td><?= $k['finish_loading']; ?></td>
                  <td><?= $k['tujuan']; ?></td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr><td colspan="4" class="text-center">Tidak ada data</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card mb-4">
      <div class="card-header"><b>Penerimaan Kemasan dari Supplier</b></div>
      <div class="card-body">
        <table class="table table-bordered table-sm">
          <thead class="thead-light">
            <tr>
              <th>Nama Kemasan</th>
              <th>Kode Produksi</th>
              <th>Pemasok</th>
              <th>Jumlah</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($packaging)): ?>
              <?php foreach ($packaging as $k): ?>
                <tr>
                  <td><?= $k['jenis_kemasan']; ?></td>
                  <td><?= $k['kode_produksi']; ?></td>
                  <td><?= $k['pemasok']; ?></td>
                  <td><?= $k['jumlah_datang']; ?></td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr><td colspan="4" class="text-center">Tidak ada data</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card mb-4">
      <div class="card-header"><b>Pemeriksaan Seasoning dari Pemasok</b></div>
      <div class="card-body">
        <table class="table table-bordered table-sm">
          <thead class="thead-light">
            <tr>
              <th>Nama Bahan</th>
              <th>Kode Produksi</th>
              <th>Pemasok</th>
              <th>Jumlah Barang</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($seasoning as $row): ?>
              <tr>
                <td><?= htmlspecialchars($row['jenis_seasoning']) ?></td>
                <td><?= htmlspecialchars($row['kode_produksi']) ?></td>
                <td><?= htmlspecialchars($row['pemasok']) ?></td>
                <td><?= htmlspecialchars($row['jumlah_barang']) ?></td>
              </tr>
            <?php endforeach; ?>
            <?php if (empty($seasoning)): ?>
              <tr>
                <td colspan="4" class="text-center text-muted">Tidak ada data.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card mb-4">
      <div class="card-header"><b>Pemeriksaan Chemical dari Supplier</b></div>
      <div class="card-body">
        <table class="table table-bordered table-sm">
          <thead class="thead-light">
            <tr>
              <th>Nama Chemical</th>
              <th>Kode Produksi</th>
              <th>Pemasok</th>
              <th>Jumlah Datang</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($chemical as $row): ?>
              <tr>
                <td><?= htmlspecialchars($row['jenis_chemical']) ?></td>
                <td><?= htmlspecialchars($row['kode_produksi']) ?></td>
                <td><?= htmlspecialchars($row['pemasok']) ?></td>
                <td><?= htmlspecialchars($row['jumlah_barang']) ?></td>
              </tr>
            <?php endforeach; ?>
            <?php if (empty($chemical)): ?>
              <tr>
                <td colspan="4" class="text-center text-muted">Tidak ada data.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
</div>
</div>

<script>
  const ctx = document.getElementById('lineChart').getContext('2d');
  new Chart(ctx, {
    type: 'line',
    data: {
      labels: [1,2,3,4,5,6,7,8,9,10],
      datasets: [{
        label: 'Produksi',
        data: [4, 5, 6, 6, 7, 7, 8, 9, 10, 11],
        borderColor: '#4e73df',
        borderWidth: 2,
        fill: false
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

<script>
  const rawData = <?= json_encode($jumlah_temuan) ?>;

  // Buat label tanggal 1 - 31
  const labels = Array.from({ length: 31 }, (_, i) => (i + 1).toString());
  const data = [];
  const detailMap = {};

  // Petakan data ke tanggal
  rawData.forEach(item => {
    const tgl = parseInt(item.tanggal.split('-')[2]);
    data[tgl - 1] = parseInt(item.jumlah_temuan);
    detailMap[tgl] = {
      jumlah: item.jumlah_temuan,
      produk: item.nama_produk,
      kontaminasi: item.jenis_kontaminasi
    };
  });

  // Pastikan semua 31 hari terisi
  for (let i = 0; i < 31; i++) {
    if (!data[i]) data[i] = 0;
    if (!detailMap[i + 1]) {
      detailMap[i + 1] = {
        jumlah: 0,
        produk: '-',
        kontaminasi: '-'
      };
    }
  }

  new Chart(document.getElementById('kontaminasiChart'), {
    type: 'line',
    data: {
      labels: labels,
      datasets: [{
        label: 'Jumlah Temuan',
        data: data,
        fill: true,
        borderColor: '#e74a3b',
        backgroundColor: 'rgba(231, 74, 59, 0.1)',
        tension: 0.3,
        pointRadius: 5,
        pointHoverRadius: 6,
        pointBackgroundColor: '#e74a3b',
        pointBorderColor: '#fff',
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true,
          min: 0,
          max: 10,
          ticks: { stepSize: 1 }
        }
      },
      plugins: {
        tooltip: {
          callbacks: {
            label: function(context) {
              const day = parseInt(context.label);
              const d = detailMap[day];
              return [
                `Jumlah: ${d.jumlah}`,
                `Produk: ${d.produk}`,
                `Kontaminasi: ${d.kontaminasi}`
              ];
            }
          }
        }
      }
    }
  });
</script>

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