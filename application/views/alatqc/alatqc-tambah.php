<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Inventaris Alat QC</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('alatqc')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Inventaris Alat QC</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('alatqc/tambah');?>">
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Nama Alat</label>
                            <input type="text" name="nama_alat" class="form-control <?= form_error('nama_alat') ? 'invalid' : '' ?> " value="<?= set_value('nama_alat'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('nama_alat')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('nama_alat') ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Jumlah</label>
                            <input type="number" name="jumlah" class="form-control <?= form_error('jumlah') ? 'invalid' : '' ?> " value="<?= set_value('jumlah'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('jumlah')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('jumlah') ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-md btn-success mr-2">
                                <i class="fa fa-save"></i> Simpan
                            </button>
                            <a href="<?= base_url('alatqc')?>" class="btn btn-md btn-danger">
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