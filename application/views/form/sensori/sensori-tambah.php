<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Sensori Finish Good</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('sensori')?>">
                    <i class="fas fa-arrow-left">
                    </i> Daftar Sensori Finish Good</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav> 
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('sensori/tambah');?>" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Tanggal</label>
                            <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?> " value="<?php echo date("Y-m-d") ?>">
                            <div class="invalid-feedback <?= !empty(form_error('date')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('date') ?>
                            </div>
                        </div>  
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control <?= form_error('nama_produk') ? 'invalid' : '' ?> " value="<?= set_value('nama_produk'); ?>">
                            <div class="invalid-feedback <?= !empty(form_error('nama_produk')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('nama_produk') ?>
                            </div>
                        </div> 
                    </div>
                    <hr>

                    <div class="form-area" id="form-sensori-wrapper">
                        <label class="form-label font-weight-bold">sensori</label>
                        <div class="sensori-group border p-3 mb-3 rounded bg-light" data-index="0">
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label>Kode Produksi</label>
                                    <input type="text" name="kode_produksi[]" class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <label>Best Before</label>
                                    <input type="date" name="best_before[]" class="form-control" value="<?php echo date('Y-m-d') ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <label>Warna</label><br>
                                    <label><input type="radio" name="warna[0]" value="Ok"> Ok</label><br>
                                    <label><input type="radio" name="warna[0]" value="Tidak ok"> Tidak ok</label>
                                </div>
                                <div class="col-sm-2">
                                    <label>Tekstur</label><br>
                                    <label><input type="radio" name="tekstur[0]" value="Ok"> Ok</label><br>
                                    <label><input type="radio" name="tekstur[0]" value="Tidak ok"> Tidak ok</label>
                                </div>
                                <div class="col-sm-2">
                                    <label>Rasa</label><br>
                                    <label><input type="radio" name="rasa[0]" value="Ok"> Ok</label><br>
                                    <label><input type="radio" name="rasa[0]" value="Tidak ok"> Tidak ok</label>
                                </div>
                                <div class="col-sm-2">
                                    <label>Aroma</label><br>
                                    <label><input type="radio" name="aroma[0]" value="Ok"> Ok</label><br>
                                    <label><input type="radio" name="aroma[0]" value="Tidak ok"> Tidak ok</label>
                                </div>
                                <div class="col-sm-2">
                                    <label>Kenampakan</label><br>
                                    <label><input type="radio" name="kenampakan[0]" value="Ok"> Ok</label><br>
                                    <label><input type="radio" name="kenampakan[0]" value="Tidak ok"> Tidak ok</label>
                                </div>
                                <div class="col-sm-3 d-flex align-items-end">
                                    <button type="button" class="btn btn-danger btn-remove">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary mt-2" id="add-sensori">+ Tambah Kode</button>
                    <br>

                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Tindakan Koreksi</label>
                            <textarea class="form-control" name="tindakan"></textarea>
                            <div class="invalid-feedback <?= !empty(form_error('tindakan')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('tindakan') ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label font-weight-bold">Catatan</label>
                            <textarea class="form-control" name="catatan"></textarea>
                            <div class="invalid-feedback <?= !empty(form_error('catatan')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('catatan') ?>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-md btn-success mr-2">
                                <i class="fa fa-save"></i> Simpan
                            </button>
                            <a href="<?= base_url('sensori')?>" class="btn btn-md btn-danger">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        let index = 1; // karena 0 sudah ada di awal

        $('#add-sensori').click(function() {
            var newGroup = $('.sensori-group').first().clone();

            // Kosongkan semua input text dan date
            newGroup.find('input[type="text"], input[type="date"]').val('');
            // Hilangkan centang radio
            newGroup.find('input[type="radio"]').prop('checked', false);

            // Update nama radio button dengan index baru
            newGroup.find('input[type="radio"]').each(function() {
                let name = $(this).attr('name'); // misal: warna[0]
                if(name) {
                    let baseName = name.split('[')[0]; // 'warna'
                    $(this).attr('name', baseName + '[' + index + ']');
                }
            });

            // Update data-index attribute (optional, bisa untuk tracking)
            newGroup.attr('data-index', index);

            $('#form-sensori-wrapper').append(newGroup);

            index++;
        });

        $(document).on('click', '.btn-remove', function() {
            if ($('.sensori-group').length > 1) {
                $(this).closest('.sensori-group').remove();
            } else {
                alert("Minimal satu baris harus ada.");
            }
        });
    });
</script>
