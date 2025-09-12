<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Verifikasi Pembuatan Larutan Cleaning dan Sanitasi</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('larutan')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Verifikasi Pembuatan Larutan Cleaning dan Sanitasi</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
             <form action="<?= base_url('larutan/tambah'); ?>" method="post" enctype="multipart/form-data">
                <?php
                $produksi_data = $this->session->userdata('produksi_data');
                $tanggal_sess = $produksi_data['tanggal'] ?? date('Y-m-d');
                $shift_sess = $produksi_data['shift'] ?? '';
                ?>
                <div class="form-row mb-3">
                    <div class="col-md-4">
                        <label class="font-weight-bold">Tanggal</label>
                        <input type="date" name="date" class="form-control <?= form_error('date') ? 'is-invalid' : '' ?>"
                        value="<?= set_value('date', $tanggal_sess) ?>">
                        <div class="invalid-feedback"><?= form_error('date') ?></div>
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold">Shift</label>
                        <select name="shift" class="form-control <?= form_error('shift') ? 'is-invalid' : '' ?>">
                            <option disabled <?= empty($shift_sess) ? 'selected' : '' ?>>Pilih Shift</option>
                            <option value="1" <?= set_select('shift', '1', $shift_sess == '1') ?>>Shift 1</option>
                            <option value="2" <?= set_select('shift', '2', $shift_sess == '2') ?>>Shift 2</option>
                            <option value="3" <?= set_select('shift', '3', $shift_sess == '3') ?>>Shift 3</option>
                        </select>
                        <div class="invalid-feedback"><?= form_error('shift') ?></div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-sm align-middle">
                      <thead class="thead-dark text-center">
                        <tr>
                          <th>Nama Bahan</th>
                          <th>Kadar</th>
                          <th>Kimia (ml)</th>
                          <th>Air (ml)</th>
                          <th>Volume Akhir</th>
                          <th>Kebutuhan</th>
                          <th>Keterangan<br>(Sesuai)</th>
                          <th>Tindakan Koreksi</th>
                          <th>Verifikasi</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                    $larutan = [
                      ["nama" => "METTA KLIN", "kadar" => "3%", "kimia" => "300", "air" => "9700", "volume" => "10000"],
                      ["nama" => "DIVERFOAM", "kadar" => "5%", "kimia" => "250", "air" => "4750", "volume" => "5000"],
                      ["nama" => "METTA C 330", "kadar" => "2%", "kimia" => "300", "air" => "14700", "volume" => "15000"],
                      ["nama" => "HAND SOFT", "kadar" => "1000%", "kimia" => "-", "air" => "-", "volume" => "-"],
                      ["nama" => "METTA QUART", "kadar" => "400 ppm", "kimia" => "4", "air" => "996", "volume" => "1000"],
                      ["nama" => "KLORIN 12% (50 ppm)", "kadar" => "50 ppm", "kimia" => "3", "air" => "7997", "volume" => "8000"],
                      ["nama" => "KLORIN 12% (200 ppm)", "kadar" => "200 ppm", "kimia" => "167", "air" => "99833", "volume" => "100000"],
                  ];
                  foreach ($larutan as $i => $row): ?>
                      <tr>
                        <td>
                          <?= $row['nama'] ?>
                          <input type="hidden" name="bahan[]" value="<?= $row['nama'] ?>">
                      </td>
                      <td><input type="text" name="kadar[]" class="form-control form-control-sm" value="<?= $row['kadar'] ?>" readonly></td>
                      <td><input type="text" name="bahan_kimia[]" class="form-control form-control-sm" value="<?= $row['kimia'] ?>" readonly></td>
                      <td><input type="text" name="air_bersih[]" class="form-control form-control-sm" value="<?= $row['air'] ?>" readonly></td>
                      <td><input type="text" name="volume_akhir[]" class="form-control form-control-sm" value="<?= $row['volume'] ?>" readonly></td>
                      <td>
                          <select name="kebutuhan[]" class="form-control form-control-sm">
                            <option value="">-- Pilih --</option>
                            <option value="Cleaning Lantai">Cleaning Lantai</option>
                            <option value="Cleaning mesin dan alat">Cleaning mesin dan alat</option>
                            <option value="Cuci tangan">Cuci tangan</option>
                            <option value="Sanitasi Mesin dan alat">Sanitasi Mesin dan alat</option>
                            <option value="Foot Basin">Foot Basin</option>
                            <option value="Hand Basin">Hand Basin</option>
                        </select>
                    </td>
                    <td class="text-center">
                      <input type="checkbox" name="keterangan[<?= $i ?>]" value="Sesuai">
                  </td>
                  <td><input type="text" name="tindakan[]" class="form-control form-control-sm"></td>
                  <td><input type="text" name="verifikasi[]" class="form-control form-control-sm"></td>
              </tr>
          <?php endforeach; ?>
      </tbody>
  </table>
</div>

<div class="form-group mt-3">
    <label class="font-weight-bold">Catatan</label>
    <textarea name="catatan" rows="3" class="form-control" placeholder="Tulis catatan jika ada..."></textarea>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
    <a href="<?= base_url('larutan'); ?>" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
</div>
</form>

</div>
</div>
</div>
</div>
<style type="text/css">
    .breadcrumb{
        background-color: #2E86C1;
    }
</style>