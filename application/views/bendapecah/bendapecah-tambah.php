<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <?php if (!empty($success_msg)): ?>
        <div class="alert alert-success"><?= $success_msg ?></div>
    <?php endif; ?>

    <?php if (!empty($error_msg)): ?>
        <div class="alert alert-danger"><?= $error_msg ?></div>
    <?php endif; ?> -->

    <h1 class="h3 mb-2 text-gray-800">Tambah Benda Pecah Belah</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('bendapecah')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Benda Pecah Belah</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('bendapecah/tambah');?>">
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Nama Benda</label>
                            <input type="text" name="nama_benda" class="form-control <?= form_error('nama_benda') ? 'invalid' : '' ?> " value="<?= set_value('nama_benda'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('nama_benda')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('nama_benda') ?>
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
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Pemilik</label>
                            <input type="text" name="pemilik" class="form-control <?= form_error('pemilik') ? 'invalid' : '' ?> " value="<?= set_value('pemilik'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('pemilik')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('pemilik') ?>
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
                            <a href="<?= base_url('bendapecah')?>" class="btn btn-md btn-danger">
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