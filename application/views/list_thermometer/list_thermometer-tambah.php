<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah List Thermometer</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('list_thermometer')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar List Thermometer</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('list_thermometer/tambah');?>">
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Kode Thermometer</label>
                            <input type="text" name="kode_thermometer" class="form-control <?= form_error('kode_thermometer') ? 'invalid' : '' ?> " value="<?= set_value('kode_thermometer'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('kode_thermometer')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('kode_thermometer') ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Model</label>
                            <input type="text" name="model" class="form-control <?= form_error('model') ? 'invalid' : '' ?> " value="<?= set_value('model'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('model')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('model') ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Area</label>
                            <input type="text" name="area" class="form-control <?= form_error('area') ? 'invalid' : '' ?> " value="<?= set_value('area'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('area')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('area') ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-md btn-success mr-2">
                                <i class="fa fa-save"></i> Simpan
                            </button>
                            <a href="<?= base_url('list_thermometer')?>" class="btn btn-md btn-danger">
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
</style>