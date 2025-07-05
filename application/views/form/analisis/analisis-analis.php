<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Update Permohonan Analisis Sampel Laboratorium</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('analisis')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Permohonan Analisis Sampel Laboratorium</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Analisis</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
                <table border="1" cellpadding="8" cellspacing="0" style="border-collapse: collapse; width: 40%; text-align: left; font-family: Arial, sans-serif; font-size: 14px;">
                    <thead style="background-color: #f2f2f2;">
                        <tr>
                            <th style="padding: 10px; background-color: #ADD8E6; color: gray;">Kimia</th>
                            <th style="padding: 10px; background-color: #ADD8E6; color: gray;">Mikrobiologi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1. Moisture</td>
                            <td>5. TPC</td>
                        </tr>
                        <tr>
                            <td>2. Salinity</td>
                            <td>6. Enterobacter</td>
                        </tr>
                        <tr>
                            <td>3. pH</td>
                            <td>7. Salmonella</td>
                        </tr>
                        <tr>
                            <td>4. Bulk Density</td>
                            <td>8. Yeast and Mold</td>
                        </tr>
                    </tbody>
                </table>
                <hr>

                <!-- Permintaan Analisis -->
                <?php
                $analisis_values = set_value('analisis', []);
                if (isset($larutan->analisis)) {
                    $analisis_values = explode(',', $larutan->analisis);
                    $analisis_values = array_map('trim', $analisis_values);
                }
                ?>
                <form class="user" method="post" action="<?= base_url('analisis/analis/'.$analisis->uuid); ?>">
                    <label class="form-label font-weight-bold">Permintaan Analisis</label>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="d-flex flex-wrap gap-3">
                                <div class="d-flex align-items-center mr-4">
                                    <strong style="margin-right: 8px;">Kimia:</strong>
                                    <?php for ($i = 1; $i <= 3; $i++): ?>
                                        <div class="form-check form-check-inline me-2">
                                            <input type="checkbox" name="analisis[]" value="<?= $i ?>"
                                            class="form-check-input"
                                            <?= in_array((string)$i, $analisis_values) ? 'checked' : '' ?>>
                                            <label class="form-check-label"><?= $i ?></label>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                                <div class="d-flex align-items-center mr-4">
                                    <strong style="margin-right: 8px;">Mikrobiologi:</strong>
                                    <?php for ($i = 5; $i <= 8; $i++): ?>
                                        <div class="form-check form-check-inline me-2">
                                            <input type="checkbox" name="analisis[]" value="<?= $i ?>"
                                            class="form-check-input"
                                            <?= in_array((string)$i, $analisis_values) ? 'checked' : '' ?>>
                                            <label class="form-check-label"><?= $i ?></label>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                                <div class="d-flex align-items-center mr-4">
                                    <strong style="margin-right: 8px;">Lainnya:</strong>
                                    <?php
                                    $lainnya = array_diff($analisis_values, ['1','2','3','5','6','7','8']);
                                    $lainnya = array_values($lainnya);
                                    ?>
                                    <input type="text" name="analisis[]" class="form-control form-control-sm <?= form_error('analisis') ? 'is-invalid' : '' ?>"
                                    placeholder="Masukkan lainnya" style="width: 200px;"
                                    value="<?= isset($lainnya[0]) ? htmlspecialchars($lainnya[0]) : '' ?>">
                                </div>

                            </div>
                        </div>
                        <div class="invalid-feedback <?= !empty(form_error('analisis')) ? 'd-block' : '' ?>">
                            <?= form_error('analisis') ?>
                        </div>
                    </div>
                    <!-- Batas Suci -->

                    <hr>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Catatan</label>
                            <textarea class="form-control" name="catatan"><?= set_value('catatan', isset($analisis->catatan) ? $analisis->catatan : '') ?></textarea>
                            <div class="invalid-feedback <?= !empty(form_error('catatan')) ? 'd-block' : '' ?>">
                                <?= form_error('catatan') ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-md btn-success mr-2">
                                <i class="fa fa-save"></i> Simpan
                            </button>
                            <a href="<?= base_url('analisis') ?>" class="btn btn-md btn-danger">
                                <i class="fa fa-times"></i> Batal
                            </a>
                        </div>
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
    .form-check-inline {
        margin-right: 10px;
    }
</style>
