	<!-- ----------------------------------- Navbar ----------------------------------- -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url() ?>" style="color : #1eb2a6;">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Pendaftaran uji lab</li>
		</ol>
	</nav>

	<div id="utama" class="mt-1">
		<?php if (validation_errors()) : ?>
			<div class="col-md-5">
				<div class="alert alert-danger" role="alert">
					<b><?= validation_errors(); ?></b>
				</div>
			</div>
		<?php endif; ?>
		<h1>Pendaftaran Uji Laboratorium</h1>
		<form id="msform" action="<?= base_url('user/daftar') ?>" method="post">
			<!-- progressbar -->
			<ul id="progressbar">
				<li class="active" id="datadiri"><strong>Isi data diri</strong></li>
				<li id="jadwal"><strong>Layanan Lab</strong></li>
				<li id="pembayaran"><strong>Alamat dan Nomor HP</strong></li>
				<li id="confirm"><strong>Selesai!</strong></li>
			</ul><br>
			<!-- fieldsets -->
			<fieldset>
				<div class="form-card">
					<div class="row">
						<div class="col-7">
							<h2 class="fs-title">Data diri</h2>
						</div>
						<div class="col-5">
							<h2 class="steps">Step 1 - 4</h2>
						</div>
					</div>
					<label class="fieldlabels">ID Pasien: *</label>
					<input type="text" name="id_pasien" value="<?= $user['id_pasien'] ?>" readonly />
					<label class="fieldlabels">Nama Pasien: *</label>
					<input type="text" class="text-capitalize" name="nama_pasien" value="<?= $user['fullname']; ?>" readonly />
					<label class="fieldlabels">tanggal Lahir: *</label>
					<input type="date" name="tgl_lahir" value="<?= set_value('tgl_lahir') ?>" />


				</div>
				<input type="button" name="next" class="next action-button" value="Next" />
			</fieldset>
			<fieldset>
				<div class="form-card">
					<div class="row">
						<div class="col-7">
							<h2 class="fs-title">Layanan Lab</h2>
						</div>
						<div class="col-5">
							<h2 class="steps">Step 2 - 4</h2>
						</div>
					</div>
					<label class="fieldlabels">Jenis Layanan: *</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<label class="input-group-text" for="layanan">Pilihan</label>
						</div>
						<select class="custom-select" id="layanan" name="layanan" value="<?= set_value('layanan') ?>">
							<option selected>--Pilih Layanan--</option>
							<option value="Cek Darah">Cek Darah</option>
							<option value="cek Urin">cek Urin</option>
							<option value="Cek Darah dan Urin">Cek Darah dan Urin</option>
						</select>
					</div>
					<label class="fieldlabels">Lokasi Laboratorium: *</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<label class="input-group-text" for="cabang">Cabang</label>
						</div>
						<select class="custom-select" id="cabang" name="cabang" value="<?= set_value('cabang') ?>">
							<option selected>--Pilih Cabang--</option>
							<option value="Cabang Bandung">Cabang Bandung</option>
							<option value="Cabang Bekasi">Cabang Bekasi</option>
							<option value="Cabang Bogor">Cabang Bogor</option>
							<option value="Cabang Surakarta">Cabang Surakarta</option>
						</select>
					</div>

				</div>
				<input type="button" name="next" class="next action-button" value="Next" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
			</fieldset>
			<fieldset>
				<div class="form-card">
					<div class="row">
						<div class="col-md-7">
							<h2 class="fs-title">Alamat dan Nomor HP</h2>
						</div>
						<div class="col-md-5">
							<h2 class="steps">Step 3 - 4</h2>
						</div>

					</div>
					<label class="fieldlabels">Alamat Lengkap: *</label>
					<input type="text" name="alamat" id="alamat" value="<?= set_value('alamat') ?>" />
					<label class="fieldlabels">Nomor Aktif Yang Dapat Dihubungi: *</label>
					<input type="text" name="nomor_hp" id="nomor_hp" value="<?= set_value('nomor_hp') ?>" />


				</div>
				<input type="button" name="next" class="next action-button" value="Apply" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
			</fieldset>
			<fieldset>
				<div class="form-card mt-1">
					<h2 class="purple-text text-center mt-0"><strong>SUCCESS !</strong></h2> <br>
					<div class="row justify-content-center">
						<div class="col-3 mt-0">
							<button type="submit" class="btn btn-outline-light"><img src="https://i.gifer.com/7efs.gif" class="fit-image"></button>
							<h5 class="text-center text-primary">Klik Icon Untuk Submit</h5>
							<!-- <input type="submit" name="submit" class="next action-button justify-content-center" value="Submit" /> -->
						</div>
					</div>
					<div class="alert alert-warning mt-3 text-center" role="alert">
						<p>Segera lakukan pembayaran ke Rekening Mandiri 115896327536 a/n. MedOnLab</p>
						<p>Format Penamaan File : <b>"<?= str_replace(' ', '', $user['fullname']) . '_' . str_replace(' ', '', $user['id_pasien']) . '.jpg' ?>"</b> (Tanpa Spasi) </p>
					</div>
				</div>
			</fieldset>
		</form>
	</div>