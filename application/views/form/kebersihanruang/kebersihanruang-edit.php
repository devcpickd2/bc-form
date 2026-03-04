<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Edit Kebersihan Ruang Produksi</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('kebersihanruang')?>">
                    <i class="fas fa-arrow-left"></i> Daftar Kebersihan Ruang Produksi
                </a>
            </li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav> 

    <div class="card shadow mb-4">
        <div class="card-body">

            <form method="post" action="<?= base_url('kebersihanruang/edit/'.$row->uuid);?>">

                <!-- ================= TABEL KETERANGAN ================= -->
                <div style="display: flex; gap: 20px;">
                    <table border="1" cellpadding="5" cellspacing="0" 
                    style="border-collapse: collapse; width: 35%; font-size: 12px;">
                    <thead style="background-color: #ADD8E6;">
                        <tr>
                            <th>Keterangan Pemeriksaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>1. Berdebu</td></tr>
                        <tr><td>2. Basah</td></tr>
                        <tr><td>3. Pecah & Retak</td></tr>
                        <tr><td>4. Sisa produksi</td></tr>
                        <tr><td>5. Noda tinta/karat</td></tr>
                        <tr><td>6. Jamur / bau</td></tr>
                    </tbody>
                </table>
            </div>

            <br>

            <!-- ================= TANGGAL & SHIFT ================= -->
            <div class="form-group row">
                <div class="col-md-3">
                    <label class="font-weight-bold">Tanggal</label>
                    <input type="date" name="date"
                    class="form-control"
                    value="<?= $row->date ?>">
                </div>

                <div class="col-md-3">
                    <label class="font-weight-bold">Shift</label>
                    <select name="shift" class="form-control">
                        <option value="1" <?= ($row->shift == '1') ? 'selected' : '' ?>>Shift 1</option>
                        <option value="2" <?= ($row->shift == '2') ? 'selected' : '' ?>>Shift 2</option>
                        <option value="3" <?= ($row->shift == '3') ? 'selected' : '' ?>>Shift 3</option>
                    </select>
                </div>
            </div>

            <!-- ================= LOKASI ================= -->
            <div class="form-group row">
                <div class="col-sm-3">
                    <label class="font-weight-bold">Lokasi</label>
                    <select name="lokasi" class="form-control">

                        <?php
                        $lokasi_lama = $row->lokasi;
                        $lokasi_ada = false;

                        foreach($area_list as $area):
                            if($area->area == $lokasi_lama){
                                $lokasi_ada = true;
                            }
                            ?>
                            <option value="<?= $area->area ?>"
                                <?= ($lokasi_lama == $area->area) ? 'selected' : '' ?>>
                                <?= $area->area ?>
                            </option>
                        <?php endforeach; ?>

                        <?php if(!$lokasi_ada && !empty($lokasi_lama)): ?>
                            <option value="<?= $lokasi_lama ?>" selected>
                                <?= $lokasi_lama ?> (Data Lama)
                            </option>
                        <?php endif; ?>

                    </select>
                </div>
            </div>

            <hr>

            <!-- ================= DETAIL BAGIAN ================= -->
            <?php 
            $detail = json_decode($row->detail, true);
            if(!empty($detail)):
                foreach($detail as $index => $d):

                    $kondisi_array = !empty($d['kondisi']) 
                    ? explode(',', $d['kondisi']) 
                            : ['bersih']; // default jika kosong
                            ?>

                            <div class="form-group row mt-3">

                                <div class="col-sm-2">
                                    <label class="font-weight-bold">Bagian</label>
                                    <input type="text" name="bagian[]" 
                                    class="form-control"
                                    value="<?= $d['bagian'] ?>" readonly>
                                </div>

                                <div class="col-sm-4">
                                    <label class="font-weight-bold d-block">Kondisi</label>

                                    <?php 
                                    $opsi = ['bersih','1','2','3','4','5','6'];
                                    foreach($opsi as $opt):
                                        $checked = in_array($opt, $kondisi_array) ? 'checked' : '';
                                        ?>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input kondisi-group-<?= $index ?>" 
                                            type="checkbox"
                                            name="kondisi[<?= $index ?>][]" 
                                            value="<?= $opt ?>" <?= $checked ?>>
                                            <label class="form-check-label"><?= $opt ?></label>
                                        </div>

                                    <?php endforeach; ?>
                                </div>

                                <div class="col-sm-3">
                                    <label class="font-weight-bold">Problem</label>
                                    <input type="text" name="problem[]" 
                                    class="form-control"
                                    value="<?= $d['problem'] ?>">
                                </div>

                                <div class="col-sm-3">
                                    <label class="font-weight-bold">Tindakan</label>
                                    <input type="text" name="tindakan[]" 
                                    class="form-control"
                                    value="<?= $d['tindakan'] ?>">
                                </div>

                            </div>

                            <?php 
                        endforeach;
                    endif;
                    ?>

                    <br>

                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Update
                    </button>

                    <a href="<?= base_url('kebersihanruang')?>" class="btn btn-danger">
                        <i class="fa fa-times"></i> Batal
                    </a>

                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .breadcrumb{
        background-color:#2E86C1;
    }
</style>

<script>
    $(document).ready(function(){

        function initCheckboxLogic(){

            $('[class^="kondisi-group-"]').each(function(){

                let className = $(this).attr('class').split(' ')[1];
                let group = $('.'+className);

                group.off('change').on('change', function(){

                    let bersih = group.filter('[value="bersih"]');
                    let selainBersih = group.not('[value="bersih"]');

                    if($(this).val()==='bersih'){
                        if($(this).is(':checked')){
                            selainBersih.prop('checked',false);
                            selainBersih.prop('disabled',true);
                        } else {
                            selainBersih.prop('disabled',false);
                        }
                    }

                    if($(this).val()!=='bersih'){
                        bersih.prop('checked',false);
                        bersih.prop('disabled',true);

                        if(selainBersih.filter(':checked').length === 0){
                            bersih.prop('disabled',false);
                            bersih.prop('checked',true); 
                        }
                    }
                });
            });
        }

        initCheckboxLogic();

    });
</script>