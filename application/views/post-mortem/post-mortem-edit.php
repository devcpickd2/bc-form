<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Post Mortem</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('post-mortem')?>">
                    <i class="fas fa-arrow-left">
                    </i>Daftar Post Mortem</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Update Post Mortem</li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('post-mortem/edit/'.$post_mortem->uuid);?>">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Tanggal</label>
                            <input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?> " value="<?= $post_mortem->date; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('date')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('date') ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Waktu Kedatangan</label>
                            <input type="time" name="waktu_kedatangan" class="form-control <?= form_error('waktu_kedatangan') ? 'invalid' : '' ?> " value="<?= $post_mortem->waktu_kedatangan; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('waktu_kedatangan')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('waktu_kedatangan') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Nomor Truk</label>
                            <input type="text" name="nomor_truk" class="form-control <?= form_error('nomor_truk') ? 'invalid' : '' ?> " value="<?= $post_mortem->nomor_truk; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('nomor_truk')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('nomor_truk') ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Nama Ekspedisi</label>
                            <input type="text" name="ekspedisi" class="form-control <?= form_error('ekspedisi') ? 'invalid' : '' ?> " value="<?= $post_mortem->ekspedisi; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('ekspedisi')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('ekspedisi') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Shift</label>
                            <select class="form-control <?= form_error('shift') ? 'invalid' : '' ?>" name="shift">
                                <option value="1" <?= set_select('shift', '1'); ?> <?= $post_mortem->shift == 1?'selected':'';?>>1</option>
                                <option value="2" <?= set_select('shift', '2'); ?> <?= $post_mortem->shift == 2?'selected':'';?>>2</option>
                                <option value="3" <?= set_select('shift', '3'); ?> <?= $post_mortem->shift == 3?'selected':'';?>>3</option>
                            </select>
                            <div class="invalid-feedback <?= !empty(form_error('shift')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('shift') ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Nama Farm</label>
                            <input type="text" name="nama_farm" class="form-control <?= form_error('nama_farm') ? 'invalid' : '' ?> " value="<?= $post_mortem->nama_farm; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('nama_farm')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('nama_farm') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">CH/OH</label>
                            <select class="form-control <?= form_error('ch_oh') ? 'invalid' : '' ?>" name="ch_oh">
                                <option value="0" <?= set_select('ch_oh', '0'); ?> <?= $post_mortem->ch_oh == 0?'selected':'';?>>CH</option>
                                <option value="1" <?= set_select('ch_oh', '1'); ?> <?= $post_mortem->ch_oh == 1?'selected':'';?>>OH</option>
                            </select>
                            <div class="invalid-feedback <?= !empty(form_error('ch_oh')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('ch_oh') ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Jumlah Ayam di Proses</label>
                            <input type="number" name="jumlah_ayam" class="form-control <?= form_error('jumlah_ayam') ? 'invalid' : '' ?> " value="<?= $post_mortem->jumlah_ayam; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('jumlah_ayam')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('jumlah_ayam') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Average Farm</label>
                            <input type="text" name="average_farm" class="form-control <?= form_error('average_farm') ? 'invalid' : '' ?> " value="<?= $post_mortem->average_farm; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('average_farm')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('average_farm') ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Average RPA</label>
                            <input type="text" name="average_rpa" class="form-control <?= form_error('average_rpa') ? 'invalid' : '' ?> " value="<?= $post_mortem->average_rpa; ?>">
                            <div class="invalid-feedback <?= !empty(form_error('average_rpa')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('average_rpa') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="form-label font-weight-bold">Nama Mesin</label>
                            <select class="form-control <?= form_error('nama_mesin') ? 'invalid' : '' ?>" name="nama_mesin">
                                <option value="Marel Stork" <?= $post_mortem->nama_mesin=="Marel Stork"?'selected':'';?>>Marel Stork</option>
                                <option value="Linco" <?= $post_mortem->nama_mesin=="Linco"?'selected':'';?>>Linco</option>
                                <option value="Manual" <?= $post_mortem->nama_mesin=="Manual"?'selected':'';?>>Manual</option>
                            </select>
                            <div class="invalid-feedback <?= !empty(form_error('nama_mesin')) ? 'd-block' : '' ; ?> ">
                                <?= form_error('nama_mesin') ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">                        
                        <table class="table" id="mytable2">
                            <label class="label2">PEMERIKSAAN POST MORTEM</label>
                            <hr>
                            <tbody> 
                                <tr>
                                    <th colspan="6">Defect Tunggal - Defect Farm</th>
                                </tr>
                                <div class="form-group">
                                    <tr>
                                        <td>
                                            <div class="input-group btns" id="defect1">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="sayap_memar_kebiruan_defect" id="sayap_memar_kebiruan_defect" class="num form-control input-sm" value="<?= $post_mortem->sayap_memar_kebiruan_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Sayap Memar Kebiruan</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect1">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="sayap_patah_memar_defect" id="sayap_patah_memar_defect" class="num form-control input-sm" value="<?= $post_mortem->sayap_patah_memar_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Sayap Patah Memar</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect1">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="kaki_memar_defect" id="kaki_memar_defect" class="num form-control input-sm" value="<?= $post_mortem->kaki_memar_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Kaki Memar Kebiruan</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect1">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="kaki_patah_defect" id="kaki_patah_defect" class="num form-control input-sm" value="<?= $post_mortem->kaki_patah_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Kaki Patah Memar</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect1">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="kaki_arthritis_defect" id="kaki_arthritis_defect" class="num form-control input-sm" value="<?= $post_mortem->kaki_arthritis_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Kaki Arthritis</label>
                                        </td>
                                    </tr>
                                </div>
                                <div class="form-group">
                                    <tr>
                                        <td>
                                            <div class="input-group btns" id="defect1">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="hock_bruise_defect" id="hock_bruise_defect" class="num form-control input-sm" value="<?= $post_mortem->hock_bruise_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Hock Bruise</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect1">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="hock_burn_defect" id="hock_burn_defect" class="num form-control input-sm" value="<?= $post_mortem->hock_burn_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Hock Burn</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect1">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="dada_memar_defect" id="dada_memar_defect" class="num form-control input-sm" value="<?= $post_mortem->dada_memar_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Dada Memar Kebiruan</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect1">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="breast_burn_defect" id="breast_burn_defect" class="num form-control input-sm" value="<?= $post_mortem->breast_burn_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Breast Burn</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect1">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="punggung_memar_defect" id="punggung_memar_defect" class="num form-control input-sm" value="<?= $post_mortem->punggung_memar_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Punggung Memar</label>
                                        </td>
                                    </tr>
                                </div>
                                <div class="form-group">
                                    <tr>
                                        <td>
                                            <div class="input-group btns" id="defect1">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="luka_parut_defect" id="luka_parut_defect" class="num form-control input-sm" value="<?= $post_mortem->luka_parut_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Luka Parut</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect1">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="kulit_berjamur_defect" id="kulit_berjamur_defect" class="num form-control input-sm" value="<?= $post_mortem->kulit_berjamur_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Kulit Berjamur</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect1">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="penyakit_kulit_defect" id="penyakit_kulit_defect" class="num form-control input-sm" value="<?= $post_mortem->penyakit_kulit_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Penyakit Bisul di Kulit</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect1">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="kulit_daging_bintik_defect" id="kulit_daging_bintik_defect" class="num form-control input-sm" value="<?= $post_mortem->kulit_daging_bintik_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Kulit & Daging Bintik Merah</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect1">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="pertumbuhan_tidak_normal_defect" id="pertumbuhan_tidak_normal_defect" class="num form-control input-sm" value="<?= $post_mortem->pertumbuhan_tidak_normal_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Pertumbuhan tidak Normal</label>
                                        </td>
                                    </tr>
                                </div>
                                <tr>
                                    <th colspan="5">Defect > 1 - Defect Farm</th>
                                </tr>
                                <div class="form-group">
                                    <tr>
                                        <td>
                                            <div class="input-group btns" id="defect2">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="sayap_memar_kebiruan_defect_lebih" id="sayap_memar_kebiruan_defect_lebih" class="num form-control input-sm" value="<?= $post_mortem->sayap_memar_kebiruan_defect_lebih; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Sayap Memar Kebiruan</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect2">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="sayap_patah_memar_defect_lebih" id="sayap_patah_memar_defect_lebih" class="num form-control input-sm" value="<?= $post_mortem->sayap_patah_memar_defect_lebih; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Sayap Patah Memar</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect2">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="kaki_memar_kebiruan_defect_lebih" id="kaki_memar_kebiruan_defect_lebih" class="num form-control input-sm" value="<?= $post_mortem->kaki_memar_kebiruan_defect_lebih; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Kaki Memar Kebiruan</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect2">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="kaki_patah_memar_defect_lebih" id="kaki_patah_memar_defect_lebih" class="num form-control input-sm" value="<?= $post_mortem->kaki_patah_memar_defect_lebih; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Kaki Patah Memar</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect2">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="arthritis_defect_lebih" id="arthritis_defect_lebih" class="num form-control input-sm" value="<?= $post_mortem->arthritis_defect_lebih; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Kaki Arthritis</label>
                                        </td>
                                    </tr>
                                </div>
                                <div class="form-group">
                                    <tr>
                                        <td>
                                            <div class="input-group btns" id="defect2">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="hock_bruise_defect_lebih" id="hock_bruise_defect_lebih" class="num form-control input-sm" value="<?= $post_mortem->hock_bruise_defect_lebih; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Hock Bruise</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect2">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="hock_burn_defect_lebih" id="hock_burn_defect_lebih" class="num form-control input-sm" value="<?= $post_mortem->hock_burn_defect_lebih; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Hock Burn</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect2">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="dada_memar_kebiruan_defect_lebih" id="dada_memar_kebiruan_defect_lebih" class="num form-control input-sm" value="<?= $post_mortem->dada_memar_kebiruan_defect_lebih; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Dada Memar Kebiruan</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect2">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="breast_burn_defect_lebih" id="breast_burn_defect_lebih" class="num form-control input-sm" value="<?= $post_mortem->breast_burn_defect_lebih; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Breast Burn</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect2">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="punggung_memar_kebiruan_defect_lebih" id="punggung_memar_kebiruan_defect_lebih" class="num form-control input-sm" value="<?= $post_mortem->punggung_memar_kebiruan_defect_lebih; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Punggung Memar</label>
                                        </td>
                                    </tr>
                                </div>
                                <div class="form-group">
                                    <tr>
                                        <td>
                                            <div class="input-group btns" id="defect2">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="luka_parut_defect_lebih" id="luka_parut_defect_lebih" class="num form-control input-sm" value="<?= $post_mortem->luka_parut_defect_lebih; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Luka Parut</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect2">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="kulit_berjamur_defect_lebih" id="kulit_berjamur_defect_lebih" class="num form-control input-sm" value="<?= $post_mortem->kulit_berjamur_defect_lebih; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Kulit Berjamur</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect2">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="penyakit_bisul_defect_lebih" id="penyakit_bisul_defect_lebih" class="num form-control input-sm" value="<?= $post_mortem->penyakit_bisul_defect_lebih; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Penyakit Bisul di Kulit</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect2">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="kulit_bintik_merah_defect_lebih" id="kulit_bintik_merah_defect_lebih" class="num form-control input-sm" value="<?= $post_mortem->kulit_bintik_merah_defect_lebih; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Kulit & Daging Bintik Merah</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect2">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="pertumbuhan_tidak_normal_defect_lebih" id="pertumbuhan_tidak_normal_defect_lebih" class="num form-control input-sm" value="<?= $post_mortem->pertumbuhan_tidak_normal_defect_lebih; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Pertumbuhan tidak Normal</label>
                                        </td>
                                    </tr>
                                </div>
                                <tr>
                                    <th colspan="5">Defect Farm Internal Organ</th>
                                </tr>
                                <div class="form-group">
                                    <tr>
                                        <td>
                                            <div class="input-group btns" id="defect3">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="hati_tidak_normal_defect" id="hati_tidak_normal_defect" class="num form-control input-sm" value="<?= $post_mortem->hati_tidak_normal_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Hati tidak Normal</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect3">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="jantung_tidak_normal_defect" id="jantung_tidak_normal_defect" class="num form-control input-sm" value="<?= $post_mortem->jantung_tidak_normal_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Jantung tidak Normal</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect3">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="organ_dalam_tidak_normal_defect" id="organ_dalam_tidak_normal_defect" class="num form-control input-sm" value="<?= $post_mortem->organ_dalam_tidak_normal_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Organ Dalam tidak Normal</label>
                                        </td>
                                    </tr>
                                </div>
                                <tr>
                                    <th colspan="5">Defect Tunggal - Sortir Griller (Memar Kemerahan)</th>
                                </tr>
                                <div class="form-group">
                                    <tr>
                                        <td>
                                            <div class="input-group btns" id="defect4">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="sg_sayap_memar_defect" id="sg_sayap_memar_defect" class="num form-control input-sm" value="<?= $post_mortem->sg_sayap_memar_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Sayap Memar Kemerahan</label>
                                        </td>
                                        <td>   
                                            <div class="input-group btns" id="defect4">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="sg_kaki_memar_defect" id="sg_kaki_memar_defect" class="num form-control input-sm" value="<?= $post_mortem->sg_kaki_memar_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Kaki Memar Kemerahan</label>
                                        </td>
                                        <td>   
                                            <div class="input-group btns" id="defect4">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="sg_dada_memar_defect" id="sg_dada_memar_defect" class="num form-control input-sm" value="<?= $post_mortem->sg_dada_memar_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Dada Memar Kemerahan</label>
                                        </td>
                                        <td>  
                                            <div class="input-group btns" id="defect4">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="sg_punggung_memar_defect" id="sg_punggung_memar_defect" class="num form-control input-sm" value="<?= $post_mortem->sg_punggung_memar_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Punggung Memar Kemerahan</label>
                                        </td>
                                    </tr>
                                </div>
                                <tr>
                                    <th colspan="5">Defect > 1 - Sortir Griller (Memar Kemerahan)</th>
                                </tr>
                                <div class="form-group">
                                    <tr>
                                        <td>
                                            <div class="input-group btns" id="defect4">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="sg_sayap_memar_kemerahan_defect_lebih" id="sg_sayap_memar_kemerahan_defect_lebih" class="num form-control input-sm" value="<?= $post_mortem->sg_sayap_memar_kemerahan_defect_lebih; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Sayap Memar Kemerahan</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect4">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="sg_kaki_memar_kemerahan_defect_lebih" id="sg_kaki_memar_kemerahan_defect_lebih" class="num form-control input-sm" value="<?= $post_mortem->sg_kaki_memar_kemerahan_defect_lebih; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Kaki Memar Kemerahan</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect4">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="sg_dada_memar_kemerahan_defect_lebih" id="sg_dada_memar_kemerahan_defect_lebih" class="num form-control input-sm" value="<?= $post_mortem->sg_dada_memar_kemerahan_defect_lebih; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Dada Memar Kemerahan</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect4">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="sg_punggung_memar_kemerahan_defect_lebih" id="sg_punggung_memar_kemerahan_defect_lebih" class="num form-control input-sm" value="<?= $post_mortem->sg_punggung_memar_kemerahan_defect_lebih; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Punggung Memar Kemerahan</label>
                                        </td>
                                    </tr>
                                </div>
                                <tr>
                                    <th colspan="5">Defect Tunggal - Defect Proses Produksi</th>
                                </tr>
                                <div class="form-group">
                                    <tr>
                                        <td>
                                            <div class="input-group btns" id="defect5">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="rpa_over_scalder_defect" id="rpa_over_scalder_defect" class="num form-control input-sm" value="<?= $post_mortem->rpa_over_scalder_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Over Scalder</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect5">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="rpa_sayap_patah_defect" id="rpa_sayap_patah_defect" class="num form-control input-sm" value="<?= $post_mortem->rpa_sayap_patah_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Sayap Patah tanpa Memar</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect5">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="rpa_kaki_patah_defect" id="rpa_kaki_patah_defect" class="num form-control input-sm" value="<?= $post_mortem->rpa_kaki_patah_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Kaki Patah tanpa Memar</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect5">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="rpa_kulit_sobek_dp_defect" id="rpa_kulit_sobek_dp_defect" class="num form-control input-sm" value="<?= $post_mortem->rpa_kulit_sobek_dp_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Kulit Sobek Dada-Paha</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect5">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="rpa_kulit_sobek_dada_defect" id="rpa_kulit_sobek_dada_defect" class="num form-control input-sm" value="<?= $post_mortem->rpa_kulit_sobek_dada_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Kulit Sobek Dada</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect5">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="rpa_kulit_sobek_paha_defect" id="rpa_kulit_sobek_paha_defect" class="num form-control input-sm" value="<?= $post_mortem->rpa_kulit_sobek_paha_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Kulit Sobek Paha</label>
                                        </td>
                                    </tr>
                                </div>
                                <div class="form-group">
                                    <tr>
                                        <td>
                                            <div class="input-group btns" id="defect5">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="rpa_karkas_rusak_defect" id="rpa_karkas_rusak_defect" class="num form-control input-sm" value="<?= $post_mortem->rpa_karkas_rusak_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Karkas Rusak</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect5">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="rpa_empedu_pecah_defect" id="rpa_empedu_pecah_defect" class="num form-control input-sm" value="<?= $post_mortem->rpa_empedu_pecah_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Empedu Pecah</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect5">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="rpa_daging_dada_bawah_cut_defect" id="rpa_daging_dada_bawah_cut_defect" class="num form-control input-sm" value="<?= $post_mortem->rpa_daging_dada_bawah_cut_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Dada Bawah Terpotong</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect5">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="rpa_daging_dada_atas_cut_defect" id="rpa_daging_dada_atas_cut_defect" class="num form-control input-sm" value="<?= $post_mortem->rpa_daging_dada_atas_cut_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Dada Atas Terpotong</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect5">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="rpa_kaki_terpotong_defect" id="rpa_kaki_terpotong_defect" class="num form-control input-sm" value="<?= $post_mortem->rpa_kaki_terpotong_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Kaki Terpotong</label>
                                        </td>
                                    </tr>
                                </div>
                                <tr>
                                    <th colspan="5">Defect > 1 - Defect Proses Produksi</th>
                                </tr>
                                <div class="form-group">
                                    <tr>
                                        <td>
                                            <div class="input-group btns" id="defect6">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="rpa_over_scalder_defect_lebih" id="rpa_over_scalder_defect_lebih" class="num form-control input-sm" value="<?= $post_mortem->rpa_over_scalder_defect_lebih; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label for="rpa_over_scalder_defect_lebih" class="defect">Over Scalder</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect6">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="rpa_sayap_patah_defect_lebih" id="rpa_sayap_patah_defect_lebih" class="num form-control input-sm" value="<?= $post_mortem->rpa_sayap_patah_defect_lebih; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Sayap Patah tanpa Memar</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect6">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="rpa_kaki_patah_defect_lebih" id="rpa_kaki_patah_defect_lebih" class="num form-control input-sm" value="<?= $post_mortem->rpa_kaki_patah_defect_lebih; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Kaki Patah tanpa Memar</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect6">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="rpa_kulit_sobek_dp_defect_lebih" id="rpa_kulit_sobek_dp_defect_lebih" class="num form-control input-sm" value="<?= $post_mortem->rpa_kulit_sobek_dp_defect_lebih; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Kulit Sobek Dada-Paha</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect6">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="rpa_kulit_sobek_dada_defect_lebih" id="rpa_kulit_sobek_dada_defect_lebih" class="num form-control input-sm" value="<?= $post_mortem->rpa_kulit_sobek_dada_defect_lebih; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Kulit Sobek Dada</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect6">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="rpa_kulit_sobek_paha_defect_lebih" id="rpa_kulit_sobek_paha_defect_lebih" class="num form-control input-sm" value="<?= $post_mortem->rpa_kulit_sobek_paha_defect_lebih; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Kulit Sobek Paha</label>
                                        </td>
                                    </tr>
                                </div>
                                <div class="form-group">
                                    <tr>
                                        <td>
                                            <div class="input-group btns" id="defect6">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="rpa_karkas_rusak_defect_lebih" id="rpa_karkas_rusak_defect_lebih" class="num form-control input-sm" value="<?= $post_mortem->rpa_karkas_rusak_defect_lebih; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Karkas Rusak</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect6">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="rpa_empedu_pecah_defect_lebih" id="rpa_empedu_pecah_defect_lebih" class="num form-control input-sm" value="<?= $post_mortem->rpa_empedu_pecah_defect_lebih; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Empedu Pecah</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect6">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="rpa_daging_dada_bawah_defect_lebih" id="rpa_daging_dada_bawah_defect_lebih" class="num form-control input-sm" value="<?= $post_mortem->rpa_daging_dada_bawah_defect_lebih; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Dada Bawah Terpotong</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect6">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="rpa_daging_dada_atas_defect_lebih" id="rpa_daging_dada_atas_defect_lebih" class="num form-control input-sm" value="<?= $post_mortem->rpa_daging_dada_atas_defect_lebih; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Dada Atas Terpotong</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect6">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="rpa_kaki_terpotong_defect_lebih" id="rpa_kaki_terpotong_defect_lebih" class="num form-control input-sm" value="<?= $post_mortem->rpa_kaki_terpotong_defect_lebih; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Kaki Terpotong</label>
                                        </td>
                                    </tr>
                                </div>
                                <tr>
                                    <th colspan="5">Defect Proses Internal Program</th>
                                </tr>
                                <div class="form-group">
                                    <tr>
                                        <td>
                                            <div class="input-group btns" id="defect7">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="ip_hati_hancur_ringan_defect" id="ip_hati_hancur_ringan_defect" class="num form-control input-sm" value="<?= $post_mortem->ip_hati_hancur_ringan_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Hati Hancur Ringan</label>
                                        </td>
                                        <td>
                                            <div class="input-group btns" id="defect7">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="ip_hati_hancur_berat_defect" id="ip_hati_hancur_berat_defect" class="num form-control input-sm" value="<?= $post_mortem->ip_hati_hancur_berat_defect; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Hati Hancur Berat</label>
                                        </td>
                                    </tr>
                                </div>
                                <tr>
                                    <th colspan="5">Ayam Defect > 1</th>
                                </tr>
                                <div class="form-group">
                                    <tr>
                                        <td>
                                            <div class="input-group btns" id="defect8">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary minus-btn" type="button">-</button>
                                                </div>
                                                <input type="text" name="ayam_defect_lebih_dari_satu" id="ayam_defect_lebih_dari_satu" class="num form-control input-sm" value="<?= $post_mortem->ayam_defect_lebih_dari_satu; ?>" min="0">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary plus-btn" type="button">+</button>
                                                </div>
                                            </div>
                                            <label class="defect">Ayam Defect</label>
                                        </td>
                                    </tr>
                                </div>
                            </tbody> 
                        </table>  
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-md btn-success mr-2">
                                <i class="fa fa-save"></i> Simpan
                            </button>
                            <a href="<?= base_url('post-mortem')?>" class="btn btn-md btn-danger">
                                <i class="fa fa-times"></i> Batal
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style type="text/css">
        .breadcrumb{
            background-color: #2E86C1;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        #mytable {
            width: 50%;
            padding: 0px;
            margin: 0px;
        }
        #mytable td, #mytable tr {
            border: none;
            font-weight: bold;
            font-size: 17px;
        }
        #mytable2 th, #mytable2 td, #mytable2 tr{
            border: none;
        }
        #mytable th {
            background-color: #D3D3D3;
            text-align:left;
        }
        #mytable2{
            border: none;
            width: 50%;
        }
        #mytable2 th {
            font-size: 18px;
            width: 100%;
            text-align: left;
            color: #1B4F72;
        }
        #mytable2 td {
            padding-bottom: 0px;
            padding-top: 0px;
            margin: 0px;
        }
        #mytable2 label {
            font-weight: bold;
            font-size: 15px;
            text-align: center;
            width: 100%;
            color:  #696969;
        }  
        #defect{
            text-align: left;
            font-size: 2px;
        }
        .label2{
            font-size: 24px;
            font-weight: bold;
            color: #2F4F4F;
            text-align: center;
            width: 100%;
            color:  #696969;
            margin: 0px;
        }
        .input-sm {
            width: 50%;
            height: 70px;
            text-align: center;
            font-size: 23px;
            font-weight: bold;
            border-right: none;
            border-left: none;
        }
        .btns {
            width: 120px;
            height: 70px;
            text-align: center;
        }

        .btn.btn-secondary.minus-btn, .btn.btn-secondary.plus-btn{
            color: white;
            border: none;
            padding: 5px;
            font-size: 30px;
            cursor: pointer;
            font-weight: bold;
            width: 35px;
            text-align: center;
        }

        .form-group td {
            padding-bottom: 5px;
        }
        .defect {
            margin-top: 5px;
            margin-bottom: 5px;
        }

        #defect1 button{
            background-color: #5DADE2;
        }
        #defect1 button:hover{
            background-color: #A9CCE3;
        }

        #defect2 button{
            background-color: #2E86C1;
        }#defect2 button:hover{
            background-color: #A9CCE3;
        }

        #defect3 button{
            background-color: #1F618D;
        }
        #defect3 button:hover{
            background-color: #A9CCE3;
        }

        #defect4 button{
            background-color: #5DADE2;
        }
        #defect4 button:hover{
            background-color: #D6DBDF;
        }

        #defect5 button{
            background-color: #2E86C1;
        }
        #defect5 button:hover{
            background-color: #D6DBDF;
        }

        #defect6 button{
            background-color: #1F618D;
        }
        #defect6 button:hover{
            background-color: #D6DBDF;
        }

        #defect7 button{
            background-color: #5DADE2;
        }
        #defect7 button:hover{
            background-color: #CCD1D1;
        }

        #defect8 button{
            background-color: #2E86C1;
        }
        #defect8 button:hover{
            background-color: #CCD1D1;
        }
    </style>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var minusBtns = document.querySelectorAll('.minus-btn');
            var plusBtns = document.querySelectorAll('.plus-btn');

            // Tambahkan event listener untuk setiap tombol minus
            minusBtns.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var input = btn.parentElement.nextElementSibling;
                    var value = parseInt(input.value) || 0;
                    value = value > 0 ? value - 1 : 0;
                    input.value = value;
                });
            });

            // Tambahkan event listener untuk setiap tombol plus
            plusBtns.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var input = btn.parentElement.previousElementSibling;
                    var value = parseInt(input.value) || 0;
                    input.value = value + 1;
                });
            });
        });

            // 
        const plus = document.querySelector(".plus"),
        minus = document.querySelector(".minus"),
        num = document.querySelector(".num");

        let a = 0;

        plus.addEventListener("click", ()=>{
            a++;
            a = (a < 10) ? "0" + a : a;
            num.innerText = a;
            console.log("a");

        });
        minus.addEventListener("click", ()=>{
            if (a > 0) {
                a--;
                a = (a < 10) ? "0" + a : a;
                num.innerText = a;
                console.log("a");
            }
        });

    </script>
