<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Update Laporan Roti Gosong</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('gosong')?>">
                    <i class="fas fa-arrow-left"></i> Daftar Laporan Roti Gosong
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav> 
    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" method="post" action="<?= base_url('gosong/edit/'.$gosong->uuid);?>">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label class="font-weight-bold">Tanggal</label>
                        <input type="date" name="date" class="form-control <?= form_error('date') ? 'is-invalid' : '' ?>"
                        value="<?= $gosong->date; ?>">
                        <div class="invalid-feedback"><?= form_error('date') ?></div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Shift</label>
                        <select class="form-control <?= form_error('shift_main') ? 'is-invalid' : '' ?>" name="shift_main">
                            <option disabled>Pilih Shift</option>
                            <option value="1" <?= set_select('shift_main', '1', $shift_number == '1'); ?>>1</option>
                            <option value="2" <?= set_select('shift_main', '2', $shift_number == '2'); ?>>2</option>
                            <option value="3" <?= set_select('shift_main', '3', $shift_number == '3'); ?>>3</option>
                        </select>
                        <div class="invalid-feedback"><?= form_error('shift_main') ?></div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label class="form-label font-weight-bold">Grup Shift</label>
                        <select class="form-control <?= form_error('shift_group') ? 'is-invalid' : '' ?>" name="shift_group">
                            <option disabled>--Pilih Grup--</option>
                            <option value="A" <?= set_select('shift_group','A', $shift_group=='A'); ?>>A</option>
                            <option value="B" <?= set_select('shift_group','B', $shift_group=='B'); ?>>B</option>
                            <option value="C" <?= set_select('shift_group','C', $shift_group=='C'); ?>>C</option>
                        </select>
                        <div class="invalid-feedback"><?= form_error('shift_group') ?></div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Total Berat (Kg)</label>
                        <input type="text" name="total_berat" id="total_berat" class="form-control <?= form_error('total_berat') ? 'invalid' : '' ?>" value="<?= $gosong->total_berat; ?>" >
                        <div class="invalid-feedback <?= !empty(form_error('total_berat')) ? 'd-block' : '' ; ?>">
                            <?= form_error('total_berat') ?>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-md btn-success mr-2">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        <a href="<?= base_url('gosong')?>" class="btn btn-md btn-danger">
                            <i class="fa fa-times"></i> Batal
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<script>
    const totalBarang = document.getElementById('total_barang');

    totalBarang.addEventListener('blur', function() {
    let val = this.value.replace(',', '.'); // ganti koma jadi titik
    if (!isNaN(val) && val !== '') {
        // Paksa 3 digit di belakang koma
        let parts = parseFloat(val).toFixed(3).split('.');
        this.value = parts[0] + '.' + parts[1];
    } else {
        this.value = '';
    }
});
</script>
<style type="text/css">
    .breadcrumb{
        background-color: #2E86C1;
    }
</style>