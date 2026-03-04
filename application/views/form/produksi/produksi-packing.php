<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">PACKING AREA</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('produksi')?>">
                    <i class="fas fa-arrow-left"></i> Daftar Laporan Verifikasi Proses Produksi
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" method="post" action="<?= base_url('produksi/packing/'.$produksi->uuid);?>" enctype="multipart/form-data">
                <label class="form-label font-weight-bold">Produk : <?= $produksi->nama_produk;?></label><br>
                <label class="form-label font-weight-bold">Kode Produksi : <?= $produksi->kode_produksi;?></label>
                <hr>
                <label class="form-label font-weight-bold">SENSORI PRODUK</label>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold mb-2">Hasil</label>
                        <div class="form-check">
                            <input type="radio" name="produk_hasil" value="oke" class="form-check-input <?= form_error('produk_hasil') ? 'is-invalid' : '' ?>" <?= ($produksi->produk_hasil == 'oke') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Oke</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="produk_hasil" value="tidak" class="form-check-input <?= form_error('produk_hasil') ? 'is-invalid' : '' ?>" <?= ($produksi->produk_hasil == 'tidak') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Tidak</label>
                        </div>
                        <div class="invalid-feedback <?= !empty(form_error('produk_hasil')) ? 'd-block' : ''; ?>">
                            <?= form_error('produk_hasil') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold mb-2">Rasa</label>
                        <div class="form-check">
                            <input type="radio" name="produk_rasa" value="oke" class="form-check-input <?= form_error('produk_rasa') ? 'is-invalid' : '' ?>" <?= ($produksi->produk_rasa == 'oke') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Oke</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="produk_rasa" value="tidak" class="form-check-input <?= form_error('produk_rasa') ? 'is-invalid' : '' ?>" <?= ($produksi->produk_rasa == 'tidak') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Tidak</label>
                        </div>
                        <div class="invalid-feedback <?= !empty(form_error('produk_rasa')) ? 'd-block' : ''; ?>">
                            <?= form_error('produk_rasa') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold mb-2">Aroma</label>
                        <div class="form-check">
                            <input type="radio" name="produk_aroma" value="oke" class="form-check-input <?= form_error('produk_aroma') ? 'is-invalid' : '' ?>" <?= ($produksi->produk_aroma == 'oke') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Oke</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="produk_aroma" value="tidak" class="form-check-input <?= form_error('produk_aroma') ? 'is-invalid' : '' ?>" <?= ($produksi->produk_aroma == 'tidak') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Tidak</label>
                        </div>
                        <div class="invalid-feedback <?= !empty(form_error('produk_aroma')) ? 'd-block' : ''; ?>">
                            <?= form_error('produk_aroma') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold mb-2">Tekstur</label>
                        <div class="form-check">
                            <input type="radio" name="produk_tekstur" value="oke" class="form-check-input <?= form_error('produk_tekstur') ? 'is-invalid' : '' ?>" <?= ($produksi->produk_tekstur == 'oke') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Oke</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="produk_tekstur" value="tidak" class="form-check-input <?= form_error('produk_tekstur') ? 'is-invalid' : '' ?>" <?= ($produksi->produk_tekstur == 'tidak') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Tidak</label>
                        </div>
                        <div class="invalid-feedback <?= !empty(form_error('produk_tekstur')) ? 'd-block' : ''; ?>">
                            <?= form_error('produk_tekstur') ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold mb-2">Warna</label>
                        <div class="form-check">
                            <input type="radio" name="produk_warna" value="oke" class="form-check-input <?= form_error('produk_warna') ? 'is-invalid' : '' ?>" <?= ($produksi->produk_warna == 'oke') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Oke</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="produk_warna" value="tidak" class="form-check-input <?= form_error('produk_warna') ? 'is-invalid' : '' ?>" <?= ($produksi->produk_warna == 'tidak') ? 'checked' : ''; ?>>
                            <label class="form-check-label">Tidak</label>
                        </div>
                        <div class="invalid-feedback <?= !empty(form_error('produk_warna')) ? 'd-block' : ''; ?>">
                            <?= form_error('produk_warna') ?>
                        </div>
                    </div>
                </div>
                <hr>
                <label class="form-label font-weight-bold">KEMASAN</label>
              <!--   <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label" for="gambar_kode_kemasan">Aktual Nama, Kode, Best Before Kemasan</label>
                        <br>
                        <div class="custom-file">
                            <input type="file" name="gambar_kode_kemasan" id="gambar_kode_kemasan" 
                            class="custom-file-input <?= form_error('gambar_kode_kemasan') ? 'is-invalid' : '' ?>" 
                            accept="image/*,application/pdf" capture="camera">
                            <label class="custom-file-label" for="gambar_kode_kemasan">Masukkan Gambar...</label>
                        </div>

                        <?php if (!empty($produksi->gambar_kode_kemasan)): ?>
                            <a href="<?= base_url('uploads/' . $produksi->gambar_kode_kemasan); ?>" target="_blank" class="d-block mt-2">
                                Lihat Gambar Sebelumnya
                            </a>
                        <?php endif; ?>

                        <small class="text-danger font-italic d-block mt-1">
                            *Masukkan gambar kemasan
                        </small>

                        <div class="invalid-feedback <?= form_error('gambar_kode_kemasan') ? 'd-block' : '' ; ?>">
                            <?= form_error('gambar_kode_kemasan') ?>
                        </div>
                    </div>                    
                </div> -->
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold" for="gambar_kode_kemasan">
                            Aktual Nama, Kode, Best Before Kemasan
                        </label>
                        <br>

                        <div class="custom-file">
                            <input type="file"
                            name="gambar_kode_kemasan"
                            id="gambar_kode_kemasan"
                            class="custom-file-input 
                            <?= (!empty($upload_error) || form_error('gambar_kode_kemasan')) ? 'is-invalid' : '' ?>" accept="image/*">

                            <label class="custom-file-label" for="gambar_kode_kemasan">
                                Pilih Gambar (Max 2MB)...
                            </label>
                        </div>

                        <!-- ERROR DARI UPLOAD -->
                        <?php if (!empty($upload_error)): ?>
                            <div class="invalid-feedback d-block">
                                <?= $upload_error; ?>
                            </div>
                        <?php endif; ?>

                        <!-- ERROR DARI FORM VALIDATION -->
                        <?php if (form_error('gambar_kode_kemasan')): ?>
                            <div class="invalid-feedback d-block">
                                <?= form_error('gambar_kode_kemasan'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($produksi->gambar_kode_kemasan)): ?>
                            <a href="<?= base_url('uploads/' . $produksi->gambar_kode_kemasan); ?>" 
                             target="_blank" 
                             class="d-block mt-2">
                             Lihat Gambar Sebelumnya
                         </a>
                     <?php endif; ?>

                     <small class="text-danger font-italic d-block mt-1">
                        *Format: JPG, JPEG, PNG, PDF — Maksimal 2 MB
                    </small>
                </div>                    
            </div>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label class="form-label font-weight-bold">Kondisi Kemasan</label>
                    <select class="form-control <?= form_error('packing_kondisi_kemasan') ? 'invalid' : '' ?>" name="packing_kondisi_kemasan">
                        <option value="1" <?= set_select('packing_kondisi_kemasan', '1'); ?> <?= $produksi->packing_kondisi_kemasan == 1?'selected':'';?>>Oke</option>
                        <option value="2" <?= set_select('packing_kondisi_kemasan', '2'); ?> <?= $produksi->packing_kondisi_kemasan == 2?'selected':'';?>>Tidak Oke</option>
                    </select>
                    <div class="invalid-feedback <?= !empty(form_error('packing_kondisi_kemasan')) ? 'd-block' : '' ; ?>">
                        <?= form_error('packing_kondisi_kemasan') ?>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-sm-6">
                    <label class="form-label font-weight-bold">Catatan</label>
                    <textarea class="form-control" name="catatan"><?= $produksi->catatan; ?></textarea>
                    <div class="invalid-feedback <?= !empty(form_error('catatan')) ? 'd-block' : '' ; ?> ">
                        <?= form_error('catatan') ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-md btn-success mr-2">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                    <a href="<?= base_url('produksi')?>" class="btn btn-md btn-danger">
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
    .breadcrumb {
        background-color: #2E86C1;
    }
</style>
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/browser-image-compression@2.0.2/dist/browser-image-compression.min.js"></script>

<script>
    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener('change', async function(e){
            const file = e.target.files[0];
            if(!file) return;

            if(file.type.startsWith('image/')){
                const options = {
                    maxSizeMB: 0.5,
                    maxWidthOrHeight: 800,
                    useWebWorker: true
                };

                try{
                    const compressedFile = await imageCompression(file, options);

                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(compressedFile);
                    e.target.files = dataTransfer.files;

                }catch(err){
                    console.log(err);
                }
            }
        });
    });
</script>