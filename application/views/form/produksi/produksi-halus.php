<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">PACKING AREA</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('produksi') ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Laporan Verifikasi Proses Produksi
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Halus</li>
        </ol>
    </nav>
 
    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" method="post" action="<?= base_url('produksi/halus/'.$produksi->uuid); ?>" enctype="multipart/form-data">

                <label class="form-label font-weight-bold">Produk : <?= htmlspecialchars($produksi->nama_produk); ?></label><br>
                <label class="form-label font-weight-bold">Kode Produksi : <?= htmlspecialchars($produksi->kode_produksi); ?></label>
                <hr>
                <!-- SPEED ROTASI -->
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Speed Rotasi (4-6 RPM)</label>
                        <input type="number" name="dry_rotasi" class="form-control <?= form_error('dry_rotasi') ? 'is-invalid' : '' ?>" value="<?= set_value('dry_rotasi', $produksi->dry_rotasi); ?>">
                        <div class="invalid-feedback <?= !empty(form_error('dry_rotasi')) ? 'd-block' : ''; ?>">
                            <?= form_error('dry_rotasi') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Kadar Air 4 -8 (%)</label>
                        <input type="text" name="dry_kadar_air" class="form-control <?= form_error('dry_kadar_air') ? 'invalid' : '' ?>" value="<?= $produksi->dry_kadar_air; ?>">
                        <div class="invalid-feedback <?= !empty(form_error('dry_kadar_air')) ? 'd-block' : '' ; ?>">
                            <?= form_error('dry_kadar_air') ?>
                        </div>
                    </div>
                </div>
                <hr>
                <!-- SENSORI PRODUK -->
                <label class="form-label font-weight-bold">SENSORI PRODUK</label>

                <div class="form-group row">
                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold mb-2">Hasil</label>
                        <div class="form-check">
                            <input type="radio" name="produk_hasil" value="oke" class="form-check-input <?= form_error('produk_hasil') ? 'is-invalid' : '' ?>" <?= set_radio('produk_hasil', 'oke', $produksi->produk_hasil == 'oke'); ?>>
                            <label class="form-check-label">Oke</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="produk_hasil" value="tidak" class="form-check-input <?= form_error('produk_hasil') ? 'is-invalid' : '' ?>" <?= set_radio('produk_hasil', 'tidak', $produksi->produk_hasil == 'tidak'); ?>>
                            <label class="form-check-label">Tidak</label>
                        </div>
                        <div class="invalid-feedback <?= !empty(form_error('produk_hasil')) ? 'd-block' : ''; ?>">
                            <?= form_error('produk_hasil') ?>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold mb-2">Rasa</label>
                        <div class="form-check">
                            <input type="radio" name="produk_rasa" value="oke" class="form-check-input <?= form_error('produk_rasa') ? 'is-invalid' : '' ?>" <?= set_radio('produk_rasa', 'oke', $produksi->produk_rasa == 'oke'); ?>>
                            <label class="form-check-label">Oke</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="produk_rasa" value="tidak" class="form-check-input <?= form_error('produk_rasa') ? 'is-invalid' : '' ?>" <?= set_radio('produk_rasa', 'tidak', $produksi->produk_rasa == 'tidak'); ?>>
                            <label class="form-check-label">Tidak</label>
                        </div>
                        <div class="invalid-feedback <?= !empty(form_error('produk_rasa')) ? 'd-block' : ''; ?>">
                            <?= form_error('produk_rasa') ?>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold mb-2">Aroma</label>
                        <div class="form-check">
                            <input type="radio" name="produk_aroma" value="oke" class="form-check-input <?= form_error('produk_aroma') ? 'is-invalid' : '' ?>" <?= set_radio('produk_aroma', 'oke', $produksi->produk_aroma == 'oke'); ?>>
                            <label class="form-check-label">Oke</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="produk_aroma" value="tidak" class="form-check-input <?= form_error('produk_aroma') ? 'is-invalid' : '' ?>" <?= set_radio('produk_aroma', 'tidak', $produksi->produk_aroma == 'tidak'); ?>>
                            <label class="form-check-label">Tidak</label>
                        </div>
                        <div class="invalid-feedback <?= !empty(form_error('produk_aroma')) ? 'd-block' : ''; ?>">
                            <?= form_error('produk_aroma') ?>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold mb-2">Tekstur</label>
                        <div class="form-check">
                            <input type="radio" name="produk_tekstur" value="oke" class="form-check-input <?= form_error('produk_tekstur') ? 'is-invalid' : '' ?>" <?= set_radio('produk_tekstur', 'oke', $produksi->produk_tekstur == 'oke'); ?>>
                            <label class="form-check-label">Oke</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="produk_tekstur" value="tidak" class="form-check-input <?= form_error('produk_tekstur') ? 'is-invalid' : '' ?>" <?= set_radio('produk_tekstur', 'tidak', $produksi->produk_tekstur == 'tidak'); ?>>
                            <label class="form-check-label">Tidak</label>
                        </div>
                        <div class="invalid-feedback <?= !empty(form_error('produk_tekstur')) ? 'd-block' : ''; ?>">
                            <?= form_error('produk_tekstur') ?>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <label class="form-label font-weight-bold mb-2">Warna</label>
                        <div class="form-check">
                            <input type="radio" name="produk_warna" value="oke" class="form-check-input <?= form_error('produk_warna') ? 'is-invalid' : '' ?>" <?= set_radio('produk_warna', 'oke', $produksi->produk_warna == 'oke'); ?>>
                            <label class="form-check-label">Oke</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="produk_warna" value="tidak" class="form-check-input <?= form_error('produk_warna') ? 'is-invalid' : '' ?>" <?= set_radio('produk_warna', 'tidak', $produksi->produk_warna == 'tidak'); ?>>
                            <label class="form-check-label">Tidak</label>
                        </div>
                        <div class="invalid-feedback <?= !empty(form_error('produk_warna')) ? 'd-block' : ''; ?>">
                            <?= form_error('produk_warna') ?>
                        </div>
                    </div>
                </div>

                <hr>

                <!-- KEMASAN -->
                <label class="form-label font-weight-bold">KEMASAN</label>

                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold" for="gambar_kode_kemasan">
                            Aktual Nama, Kode, Best Before Kemasan
                        </label>
                        <br>

                        <div class="custom-file">
                            <input type="file" name="gambar_kode_kemasan" id="gambar_kode_kemasan" class="custom-file-input <?= (!empty($upload_error) || form_error('gambar_kode_kemasan')) ? 'is-invalid' : '' ?>" accept="image/*">
                            <label class="custom-file-label" for="gambar_kode_kemasan">Pilih Gambar (Max 2MB)...</label>
                        </div>

                        <?php if (!empty($upload_error)): ?>
                            <div class="invalid-feedback d-block">
                                <?= $upload_error; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (form_error('gambar_kode_kemasan')): ?>
                            <div class="invalid-feedback d-block">
                                <?= form_error('gambar_kode_kemasan'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($produksi->gambar_kode_kemasan)): ?>
                            <a href="<?= base_url('uploads/' . $produksi->gambar_kode_kemasan); ?>" target="_blank" class="d-block mt-2">
                                Lihat Gambar Sebelumnya
                            </a>
                        <?php endif; ?>

                        <small class="text-danger font-italic d-block mt-1">
                            *Format: JPG, JPEG, PNG, PDF — Maksimal 2 MB
                        </small>
                    </div>
                </div>

                <!-- KONDISI KEMASAN -->
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-label font-weight-bold">Kondisi Kemasan</label>
                        <select class="form-control <?= form_error('packing_kondisi_kemasan') ? 'is-invalid' : '' ?>" name="packing_kondisi_kemasan">
                            <option value="1" <?= set_select('packing_kondisi_kemasan', '1', $produksi->packing_kondisi_kemasan == 1); ?>>Oke</option>
                            <option value="2" <?= set_select('packing_kondisi_kemasan', '2', $produksi->packing_kondisi_kemasan == 2); ?>>Tidak Oke</option>
                        </select>
                        <div class="invalid-feedback <?= !empty(form_error('packing_kondisi_kemasan')) ? 'd-block' : ''; ?>">
                            <?= form_error('packing_kondisi_kemasan') ?>
                        </div>
                    </div>
                </div>

                <hr>

                <!-- CATATAN -->
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label font-weight-bold">Catatan</label>
                        <textarea class="form-control" name="catatan"><?= set_value('catatan', $produksi->catatan); ?></textarea>
                        <div class="invalid-feedback <?= !empty(form_error('catatan')) ? 'd-block' : ''; ?>">
                            <?= form_error('catatan') ?>
                        </div>
                    </div>
                </div>

                <!-- BUTTON -->
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-md btn-success mr-2">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        <a href="<?= base_url('produksi') ?>" class="btn btn-md btn-danger">
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
        input.addEventListener('change', async function(e) {
            const file = e.target.files[0];
            if (!file) return;

            if (file.type.startsWith('image/')) {
                const options = {
                    maxSizeMB: 0.5,
                    maxWidthOrHeight: 800,
                    useWebWorker: true
                };

                try {
                    const compressedFile = await imageCompression(file, options);
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(compressedFile);
                    e.target.files = dataTransfer.files;
                } catch (err) {
                    console.log(err);
                }
            }
        });
    });
</script>