<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Verifikasi Proses Produksi</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('proses') ?>">
                    <i class="fas fa-arrow-left"></i> Daftar Laporan Verifikasi Proses Produksi
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" method="post" action="<?= base_url('proses/edit/'.$proses->uuid); ?>">
                <?php
                $tanggal_sess = set_value('date', $proses->date);
                $shift_sess = set_value('shift', $proses->shift);
                $nama_produk_sess = set_value('nama_produk', $proses->nama_produk);

                $proses_data = json_decode($proses->proses_produksi, true);

                $proses_produksi = [ 
                    'dough_mixing' => [
                        ['label' => 'Acuan No. Dokumen / Revisi', 'params' => ['dokumen', 'revisi']],
                        'no_formula','nama_produk','kode_produksi'
                    ],
                    'kondisi_rm' => [
                        'tepung_terigu','tepung_tapioka','yeast','bread_improver','premix','shortening','chill_water'
                    ],
                    'mixing' => [
                        ['label' => 'Waktu Mixing (menit speed 1 / speed 2)', 'params' => ['waktu_mixing_1','waktu_mixing_2']],
                        'sensori','suhu_adonan','berat_adonan'
                    ],
                    'proofing' => [
                        ['label' => 'Jam Mulai / Selesai', 'params' => ['jam_mulai','jam_selesai']],
                        ['label' => 'Suhu Setting / Aktual (34 - 36°C)', 'params' => ['suhu_setting','suhu_aktual']],
                        ['label' => 'RH Setting / Aktual (78 - 82%)', 'params' => ['rh_setting','rh_aktual']],
                        'durasi_waktu','hasil_proofing'
                    ],
                    'electric_baking' => [
                        ['label' => 'Baking Time (High / Low)', 'params' => ['baking_time_high','baking_time_low']], 
                    ],
                    'hasil_baking' => ['suhu_produk','sensori_produk']
                ];

                $label_param = [
                    'dokumen'=>'Acuan Dokumen','revisi'=>'Revisi','no_formula'=>'No. Formula',
                    'nama_produk'=>'Jenis Produk','kode_produksi'=>'Kode Produksi',
                    'tepung_terigu'=>'Tepung Terigu','tepung_tapioka'=>'Tepung Tapioka','yeast'=>'Yeast',
                    'bread_improver'=>'Bread Improver','premix'=>'Premix','shortening'=>'Shortening','chill_water'=>'Chill Water (14 - 16°C)',
                    'waktu_mixing_1'=>'Waktu Mixing 1','waktu_mixing_2'=>'Waktu Mixing 2','sensori'=>'Sensori',
                    'suhu_adonan'=>'Suhu Adonan (29 - 31°C)','berat_adonan'=>'Berat Adonan (630 - 670 g/pcs)',
                    'jam_mulai'=>'Jam Mulai','jam_selesai'=>'Jam Selesai','suhu_setting'=>'Suhu Setting (34 - 36°C)',
                    'suhu_aktual'=>'Suhu Aktual','rh_setting'=>'RH Setting (78 - 82%)','rh_aktual'=>'RH Aktual',
                    'durasi_waktu'=>'Durasi Waktu (60 - 70 menit)','hasil_proofing'=>'Hasil Proofing',
                    'baking_time_high'=>'Baking Time High','baking_time_low'=>'Baking Time Low',
                    'suhu_produk'=>'Suhu Produk (80 - 97°C)','sensori_produk'=>'Sensori Produk'
                ];

                $standar_berat = [
                    'tepung_terigu'=>'','tepung_tapioka'=>'2.270','yeast'=>'0.372',
                    'bread_improver'=>'','premix'=>'','shortening'=>'0.252','chill_water'=>'18'
                ];

                $default_mixing = ['waktu_mixing_1'=>3,'waktu_mixing_2'=>8];
                $default_baking = ['baking_time_high'=>5,'baking_time_low'=>7];
                ?>

                <div class="form-group row">
                    <div class="col-md-3">
                        <label class="font-weight-bold">Tanggal</label>
                        <input type="date" name="date" class="form-control" value="<?= $tanggal_sess ?>">
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold">Shift</label>
                        <select name="shift" class="form-control">
                            <?php for($s=1;$s<=3;$s++): ?>
                                <option value="<?= $s ?>" <?= $shift_sess==$s?'selected':'' ?>>Shift <?= $s ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold">Nama Produk</label>
                        <select name="nama_produk" id="select_nama_produk" class="form-control">
                            <option value="">-- Pilih Produk --</option>
                            <?php foreach($produk_list as $p): ?>
                                <option value="<?= $p->nama_produk ?>" <?= $nama_produk_sess==$p->nama_produk?'selected':'' ?>><?= $p->nama_produk ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="table-responsive mt-4" style="overflow-x:auto;">
                    <table class="table table-bordered table-sm" style="min-width:1300px; table-layout:fixed;">
                        <thead class="thead-light">
                            <tr>
                                <th>Jenis Produksi</th>
                                <th>Std. Berat</th>
                                <?php for($i=1;$i<=10;$i++): ?>
                                    <th style="text-align:center;">Input ke-<?= $i ?></th>
                                <?php endfor; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($proses_produksi as $kategori=>$params): ?>
                                <tr style="background:#f1f1f1;font-weight:bold;">
                                    <td colspan="12"><?= ucwords(str_replace('_',' ',$kategori)) ?></td>
                                </tr>

                                <?php foreach($params as $param):
                                    if(is_array($param)){
                                        $label=$param['label'];
                                        $subParams=$param['params'];
                                    } else {
                                        $label=$label_param[$param]??ucwords(str_replace('_',' ',$param));
                                        $subParams=[$param];
                                    }
                                    ?>
                                    <tr>
                                        <td><?= $label ?></td>
                                        <td>
                                            <?php
                                            if($kategori=='kondisi_rm'){
                                                $stdVal = $proses_data[$kategori][$subParams[0]][0] ?? $standar_berat[$subParams[0]]??'';
                                                echo '<input type="text" name="proses_produksi['.$kategori.']['.$subParams[0].'][0]" class="form-control form-control-sm" value="'.$stdVal.'">';
                                            }
                                            ?>
                                        </td>

                                        <?php for($col=1;$col<=10;$col++): ?>
                                            <td class="text-center">
                                                <?php foreach($subParams as $sub):
                                                    $value = $proses_data[$kategori][$sub][$col] ?? '';
                                                    if($value=='' && isset($default_mixing[$sub])) $value=$default_mixing[$sub];
                                                    if($value=='' && isset($default_baking[$sub])) $value=$default_baking[$sub];

                                                    $isCheckbox=false;
                                                    if($kategori=='kondisi_rm' || in_array($sub,['sensori','sensori_produk'])){
                                                        $isCheckbox=true;
                                                        $checked = ($value=='1')?'checked':'';
                                                    }
                                                    $isKodeProduksi = ($kategori=='dough_mixing' && $sub=='kode_produksi');
                                                    ?>

                                                    <?php if($isCheckbox): ?>
                                                        <input type="checkbox" name="proses_produksi[<?= $kategori ?>][<?= $sub ?>][<?= $col ?>]" value="1" <?= $checked ?> class="checkbox-lg">
                                                    <?php else: ?>
                                                        <input type="<?= in_array($sub,['jam_mulai','jam_selesai'])?'time':'text' ?>" 
                                                        name="proses_produksi[<?= $kategori ?>][<?= $sub ?>][<?= $col ?>]" 
                                                        value="<?= $value ?>" 
                                                        class="form-control form-control-sm <?= $isKodeProduksi?'kode_produksi_field':'' ?>" 
                                                        id="<?= $isKodeProduksi && $col==1?'kode_produksi_1':'' ?>">
                                                    <?php endif; ?>

                                                <?php endforeach; ?>
                                            </td>
                                        <?php endfor; ?>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="form-group row mt-3">
                    <div class="col-sm-6">
                        <label class="font-weight-bold">Catatan</label>
                        <textarea class="form-control" name="catatan"><?= set_value('catatan',$proses->catatan) ?></textarea>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <button type="submit" class="btn btn-success mr-2"><i class="fa fa-save"></i> Simpan</button>
                        <a href="<?= base_url('proses') ?>" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .checkbox-lg{transform:scale(1.5);display:block;margin:0 auto;}
    td input.form-control{width:100%;box-sizing:border-box;}
    .breadcrumb{
        background-color: #2E86C1;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded',function(){
        const selectProduk=document.getElementById('select_nama_produk');
        const namaInputs=document.querySelectorAll('input[name*="nama_produk"]');
        if(selectProduk){
            selectProduk.addEventListener('change',function(){
                const val=this.value;
                namaInputs.forEach(i=>i.value=val);
            });
        }

        const kodeInputs = document.querySelectorAll('.kode_produksi_field');
        const firstInput = kodeInputs[0];
        if(firstInput){
            firstInput.addEventListener('input', function(){
                const kodeAwal = this.value.trim();
                const match = kodeAwal.match(/^([A-Za-z]+)(\d+)$/);
                if(!match){ for(let i=1;i<kodeInputs.length;i++) kodeInputs[i].value=''; return; }
                const prefix = match[1];
                const startNum = parseInt(match[2],10);
                const len = match[2].length;
                for(let i=1;i<kodeInputs.length;i++){
                    kodeInputs[i].value = prefix + (startNum+i).toString().padStart(len,'0');
                }
            });
        }

        function updateDurasi(){
            document.querySelectorAll('input[name*="[durasi_waktu]"]').forEach((durasi,i)=>{
                const jamMulai=document.querySelectorAll('input[name*="[jam_mulai]"]')[i].value;
                const jamSelesai=document.querySelectorAll('input[name*="[jam_selesai]"]')[i].value;
                if(jamMulai && jamSelesai){
                    const h1=jamMulai.split(':').map(Number);
                    const h2=jamSelesai.split(':').map(Number);
                    let diff=(h2[0]*60+h2[1])-(h1[0]*60+h1[1]);
                    if(diff<0) diff+=24*60;
                    durasi.value=diff;
                }
            });
        }
        document.querySelectorAll('input[name*="[jam_mulai]"]').forEach(i=>i.addEventListener('change',updateDurasi));
        document.querySelectorAll('input[name*="[jam_selesai]"]').forEach(i=>i.addEventListener('change',updateDurasi));
    });
</script>
