'<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Tambah Pemeriksaan Pembuatan Larutan</h1>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="<?= base_url('pembuatanlarutan')?>">
					<i class="fas fa-arrow-left">
					</i> Daftar Pemeriksaan Pembuatan Larutan</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Tambah</li>
			</ol>
		</nav> 
		<div class="card shadow mb-4">
			<div class="card-body">
				<form class="user" method="post" action="<?= base_url('pembuatanlarutan/tambah');?>" enctype="multipart/form-data">
					<div class="form-group row">
						<div class="col-sm-4">
							<label class="form-label font-weight-bold">Tanggal</label>
							<input type="date" name="date" class="form-control <?= form_error('date') ? 'invalid' : '' ?> " value="<?php echo date("Y-m-d") ?>">
							<div class="invalid-feedback <?= !empty(form_error('date')) ? 'd-block' : '' ; ?> ">
								<?= form_error('date') ?>
							</div>
						</div>
						<div class="col-sm-4">
							<label class="form-label font-weight-bold">Pukul</label>
							<input type="time" name="pukul" class="form-control <?= form_error('pukul') ? 'invalid' : '' ?> " value="<?php echo date("H:i") ?>">
							<div class="invalid-feedback <?= !empty(form_error('pukul')) ? 'd-block' : '' ; ?> ">
								<?= form_error('pukul') ?>
							</div>
						</div> 
					</div>
					<hr>
					<div class="form-group row">
						<div class="col-sm-4">
							<label class="form-label font-weight-bold">Area</label>
							<input type="text" name="area" class="form-control <?= form_error('area') ? 'invalid' : '' ?> " value="<?= set_value('area'); ?>">
							<div class="invalid-feedback <?= !empty(form_error('nama_bareaarang')) ? 'd-block' : '' ; ?> ">
								<?= form_error('area') ?>
							</div>
						</div> 
						<div class="col-sm-4">
							<label class="form-label font-weight-bold">Nama Chemical</label>
							<input type="text" name="nama_chemical" class="form-control <?= form_error('nama_chemical') ? 'invalid' : '' ?> " value="<?= set_value('nama_chemical'); ?>">
							<div class="invalid-feedback <?= !empty(form_error('nama_chemical')) ? 'd-block' : '' ; ?> ">
								<?= form_error('nama_chemical') ?>
							</div>
						</div> 
						<div class="col-sm-4">
							<label class="form-label font-weight-bold">Expired Date</label>
							<input type="date" name="expired" class="form-control <?= form_error('expired') ? 'invalid' : '' ?> " value="<?php echo date("Y-m-d") ?>">
							<div class="invalid-feedback <?= !empty(form_error('expired')) ? 'd-block' : '' ; ?> ">
								<?= form_error('expired') ?>
							</div>
						</div> 
					</div>
					<div class="form-group row">
						<div class="col-sm-4">
							<label class="form-label font-weight-bold">Konsentrasi</label>
							<input type="text" name="konsentrasi" class="form-control <?= form_error('konsentrasi') ? 'invalid' : '' ?> " value="<?= set_value('konsentrasi'); ?>">
							<div class="invalid-feedback <?= !empty(form_error('konsentrasi')) ? 'd-block' : '' ; ?> ">
								<?= form_error('konsentrasi') ?>
							</div>
						</div> 
						<div class="col-sm-4">
							<label class="form-label font-weight-bold">Larutan Beku</label>
							<input type="text" name="larutan_beku" class="form-control <?= form_error('larutan_beku') ? 'invalid' : '' ?> " value="<?= set_value('larutan_beku'); ?>">
							<div class="invalid-feedback <?= !empty(form_error('larutan_beku')) ? 'd-block' : '' ; ?> ">
								<?= form_error('larutan_beku') ?>
							</div>
						</div> 
						<div class="col-sm-4">
							<label class="form-label font-weight-bold">Air</label>
							<input type="text" name="air" class="form-control <?= form_error('air') ? 'invalid' : '' ?> " value="<?= set_value('air'); ?>">
							<div class="invalid-feedback <?= !empty(form_error('air')) ? 'd-block' : '' ; ?> ">
								<?= form_error('air') ?>
							</div>
						</div> 
					</div>
					<hr>
					<div class="form-group row">
						<div class="col-sm-6">
							<label class="form-label font-weight-bold">Catatan</label>
							<textarea class="form-control" name="catatan"></textarea>
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
							<a href="<?= base_url('pembuatanlarutan')?>" class="btn btn-md btn-danger">
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
</style> '