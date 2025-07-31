<div class="container-fluid">
  <h1 class="h3 text-dark mb-4">Update Pemeriksaan Metal Detector</h1>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= base_url('metal') ?>">
                <i class="fas fa-arrow-left"></i> Daftar Pemeriksaan Metal Detector
            </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
</nav>

<div class="card shadow-sm border-0 mb-4">
    <div class="card-body">
      <form method="post" action="<?= base_url('metal/edit/'.$metal->uuid); ?>">

        <table class="table table-bordered table-striped">
          <tbody>
            <tr>
              <td><strong>Tanggal</strong></td>
              <td>
                <input type="date" name="date_metal" class="form-control <?= form_error('date_metal') ? 'is-invalid' : '' ?>" value="<?= $metal->date_metal; ?>">
                <div class="invalid-feedback"><?= form_error('date_metal') ?></div>
            </td>
        </tr>

        <tr>
          <td><strong>Shift</strong></td>
          <td>
            <select name="shift" class="form-control <?= form_error('shift') ? 'is-invalid' : '' ?>">
              <option value="1" <?= $metal->shift == 1 ? 'selected' : '' ?>>Shift 1</option>
              <option value="2" <?= $metal->shift == 2 ? 'selected' : '' ?>>Shift 2</option>
              <option value="3" <?= $metal->shift == 3 ? 'selected' : '' ?>>Shift 3</option>
          </select>
          <div class="invalid-feedback"><?= form_error('shift') ?></div>
      </td>

      <td><strong>Pukul</strong></td>
      <td>
        <input type="time" name="time" class="form-control <?= form_error('time') ? 'is-invalid' : '' ?>" value="<?= $metal->time; ?>">
        <div class="invalid-feedback"><?= form_error('time') ?></div>
    </td>
</tr>

<tr>
  <td><strong>Nama Produk</strong></td>
  <td>
    <input type="text" name="nama_produk" class="form-control <?= form_error('nama_produk') ? 'is-invalid' : '' ?>" value="<?= $metal->nama_produk; ?>">
    <div class="invalid-feedback"><?= form_error('nama_produk') ?></div>
</td>

<td><strong>Kode Produksi</strong></td>
<td>
    <input type="text" name="kode_produksi" class="form-control <?= form_error('kode_produksi') ? 'is-invalid' : '' ?>" value="<?= $metal->kode_produksi; ?>">
    <div class="invalid-feedback"><?= form_error('kode_produksi') ?></div>
</td>
</tr>

<tr>
  <td><strong>No. Program</strong></td>
  <td>
    <input type="text" name="no_program" class="form-control <?= form_error('no_program') ? 'is-invalid' : '' ?>" value="<?= $metal->no_program; ?>">
    <div class="invalid-feedback"><?= form_error('no_program') ?></div>
</td>
<td><strong>Deteksi NG</strong></td>
<td>
    <select name="deteksi_ng" class="form-control <?= form_error('deteksi_ng') ? 'is-invalid' : '' ?>">
      <option value="-" <?= $metal->deteksi_ng == '-' ? 'selected' : '' ?>>Tidak Ada</option>
      <option value="1" <?= $metal->deteksi_ng == '1' ? 'selected' : '' ?>>Belt Conveyor Berhenti</option>
      <option value="2" <?= $metal->deteksi_ng == '2' ? 'selected' : '' ?>>Rejector</option>
  </select>
  <div class="invalid-feedback"><?= form_error('deteksi_ng') ?></div>
</td>
</tr>

<tr>
  <td><strong>Standar Fe</strong></td>
  <td><?= $metal->std_fe ?></td>
  <td><strong>Standar Non-Fe</strong></td>
  <td><?= $metal->std_nonfe ?></td>
  <td><strong>Standar SUS 304</strong></td>
  <td><?= $metal->std_sus304 ?></td>
</tr>

<!-- Check ke-1 -->
<tr class="table-info">
  <td colspan="6"><strong>Check Metal Detector ke-1</strong></td>
</tr>
<tr>
  <td><strong>Pukul</strong></td>
  <td>
    <input type="time" name="time" class="form-control" value="<?= $metal->time ?>">
</td>
</tr>
<tr>
  <td><strong>Deteksi Fe</strong></td>
  <td>
    <select name="fe_d" class="form-control">
      <option value="terdeteksi" <?= $metal->fe_d == 'terdeteksi' ? 'selected' : '' ?>>Terdeteksi</option>
      <option value="tidak_terdeteksi" <?= $metal->fe_d == 'tidak_terdeteksi' ? 'selected' : '' ?>>Tidak Terdeteksi</option>
  </select>
</td>
<td><strong>Deteksi Non-Fe</strong></td>
<td>
    <select name="nonfe_d" class="form-control">
      <option value="terdeteksi" <?= $metal->nonfe_d == 'terdeteksi' ? 'selected' : '' ?>>Terdeteksi</option>
      <option value="tidak_terdeteksi" <?= $metal->nonfe_d == 'tidak_terdeteksi' ? 'selected' : '' ?>>Tidak Terdeteksi</option>
  </select>
</td>
<td><strong>Deteksi SUS</strong></td>
<td>
    <select name="sus_d" class="form-control">
      <option value="terdeteksi" <?= $metal->sus_d == 'terdeteksi' ? 'selected' : '' ?>>Terdeteksi</option>
      <option value="tidak_terdeteksi" <?= $metal->sus_d == 'tidak_terdeteksi' ? 'selected' : '' ?>>Tidak Terdeteksi</option>
  </select>
</td>
</tr>

<!-- Check ke-2 -->
<tr class="table-info">
  <td colspan="6"><strong>Check Metal Detector ke-2</strong></td>
</tr>
<tr>
  <td><strong>Pukul</strong></td>
  <td>
    <input type="time" name="update_time_t" class="form-control" value="<?= $metal->update_time_t ?>">
</td>
</tr>
<tr>
  <td><strong>Fe</strong></td>
  <td>
    <select name="fe_t" class="form-control">
      <option value="">-- Pilih Deteksi --</option>
      <option value="terdeteksi" <?= $metal->fe_t == 'terdeteksi' ? 'selected' : '' ?>>Terdeteksi</option>
      <option value="tidak_terdeteksi" <?= $metal->fe_t == 'tidak_terdeteksi' ? 'selected' : '' ?>>Tidak Terdeteksi</option>
  </select>
</td>
<td><strong>Non-Fe</strong></td>
<td>
    <select name="nonfe_t" class="form-control">
      <option value="">-- Pilih Deteksi --</option>
      <option value="terdeteksi" <?= $metal->nonfe_t == 'terdeteksi' ? 'selected' : '' ?>>Terdeteksi</option>
      <option value="tidak_terdeteksi" <?= $metal->nonfe_t == 'tidak_terdeteksi' ? 'selected' : '' ?>>Tidak Terdeteksi</option>
  </select>
</td>
<td><strong>SUS</strong></td>
<td>
    <select name="sus_t" class="form-control">
      <option value="">-- Pilih Deteksi --</option>
      <option value="terdeteksi" <?= $metal->sus_t == 'terdeteksi' ? 'selected' : '' ?>>Terdeteksi</option>
      <option value="tidak_terdeteksi" <?= $metal->sus_t == 'tidak_terdeteksi' ? 'selected' : '' ?>>Tidak Terdeteksi</option>
  </select>
</td>
</tr>

<!-- Check ke-3 -->
<tr class="table-info">
  <td colspan="6"><strong>Check Metal Detector ke-3</strong></td>
</tr>
<tr>
  <td><strong>Pukul</strong></td>
  <td>
    <input type="time" name="update_time_b" class="form-control" value="<?= $metal->update_time_b ?>">
</td>
</tr>
<tr>
  <td><strong>Fe</strong></td>
  <td>
    <select name="fe_b" class="form-control">
      <option value="">-- Pilih Deteksi --</option>
      <option value="terdeteksi" <?= $metal->fe_b == 'terdeteksi' ? 'selected' : '' ?>>Terdeteksi</option>
      <option value="tidak_terdeteksi" <?= $metal->fe_b == 'tidak_terdeteksi' ? 'selected' : '' ?>>Tidak Terdeteksi</option>
  </select>
</td>
<td><strong>Non-Fe</strong></td>
<td>
    <select name="nonfe_b" class="form-control">
      <option value="">-- Pilih Deteksi --</option>
      <option value="terdeteksi" <?= $metal->nonfe_b == 'terdeteksi' ? 'selected' : '' ?>>Terdeteksi</option>
      <option value="tidak_terdeteksi" <?= $metal->nonfe_b == 'tidak_terdeteksi' ? 'selected' : '' ?>>Tidak Terdeteksi</option>
  </select>
</td>
<td><strong>SUS</strong></td>
<td>
    <select name="sus_b" class="form-control">
      <option value="">-- Pilih Deteksi --</option>
      <option value="terdeteksi" <?= $metal->sus_b == 'terdeteksi' ? 'selected' : '' ?>>Terdeteksi</option>
      <option value="tidak_terdeteksi" <?= $metal->sus_b == 'tidak_terdeteksi' ? 'selected' : '' ?>>Tidak Terdeteksi</option>
  </select>
</td>
</tr>

<tr>
  <td><strong>Keterangan</strong></td>
  <td colspan="2">
    <textarea name="keterangan" class="form-control"><?= $metal->keterangan; ?></textarea>
</td>
<td><strong>Catatan</strong></td>
<td colspan="2">
    <textarea name="catatan_metal" class="form-control"><?= $metal->catatan_metal; ?></textarea>
</td>
</tr>
</tbody>
</table>

<div class="row mt-3">
  <div class="col">
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= base_url('metal') ?>" class="btn btn-danger">Batal</a>
</div>
</div>
</form>
</div>
</div>
</div>
</div>

<style>
  .breadcrumb {
    background-color: #2E86C1;
}
.table-bordered td, .table-bordered th {
    vertical-align: middle;
}
</style>
