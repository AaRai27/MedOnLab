	<!-- ----------------------------------- Navbar ----------------------------------- -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url() ?>" style="color : #1eb2a6;">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Pendaftaran uji lab</li>
		</ol>
	</nav>

	<div id="utama">
		<h1>Pendaftaran Uji Laboratorium</h1>
		<form id="msform">
			<!-- progressbar -->
			<ul id="progressbar">
				<li class="active" id="datadiri"><strong>Isi data diri dan jenis layanan</strong></li>
				<li id="jadwal"><strong>Pilih jadwal</strong></li>
				<li id="pembayaran"><strong>Pembayaran</strong></li>
				<li id="confirm"><strong>Selesai!</strong></li>
			</ul><br>
			<!-- fieldsets -->
			<fieldset>
				<div class="form-card">
					<div class="row">
						<div class="col-7">
							<h2 class="fs-title">Data diri dan jenis layanan</h2>
						</div>
						<div class="col-5">
							<h2 class="steps">Step 1 - 4</h2>
						</div>
					</div>
					<label class="fieldlabels">Nama Pasien: *</label> <input type="email" />
					<label class="fieldlabels">tanggal Lahir: *</label> <input type="date" />
					<label class="fieldlabels">Jenis Layanan: *</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<label class="input-group-text" for="inputGroupSelect01">Pilihan</label>
						</div>
						<select class="custom-select" id="inputGroupSelect01">
							<option selected>--Pilih Layanan--</option>
							<option>Cek Darah</option>
							<option>cek Urin</option>
							<option>Cek Darah dan Urin</option>
						</select>
					</div>
				</div>
				<input type="button" name="next" class="next action-button" value="Next" />
			</fieldset>
			<fieldset>
				<div class="form-card">
					<div class="row">
						<div class="col-7">
							<h2 class="fs-title">Reservasi jadwal pengambilan sampel:</h2>
						</div>
						<div class="col-5">
							<h2 class="steps">Step 2 - 4</h2>
						</div>
					</div>
					<label class="fieldlabels">Lokasi Laboratorium: *</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<label class="input-group-text" for="inputGroupSelect01">Cabang</label>
						</div>
						<select class="custom-select" id="inputGroupSelect01">
							<option selected>--Pilih Cabang--</option>
							<option>Cabang Bandung</option>
							<option>Cabang Bekasi</option>
							<option>Cabang Bogor</option>
							<option>Cabang Surakarta</option>
						</select>
					</div>
					<label class="fieldlabels">Tanggal pengambilan sampel: *</label> <input type="date" />
					<label class="fieldlabels">Waktu pengambilan sampel: *</label> <input type="time" />
				</div>
				<input type="button" name="next" class="next action-button" value="Next" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
			</fieldset>
			<fieldset>
				<div class="form-card">
					<div class="row">
						<div class="col-7">
							<h2 class="fs-title">Pembayaran:</h2>
						</div>
						<div class="col-5">
							<h2 class="steps">Step 3 - 4</h2>
						</div>

						<div class="alert alert-warning" role="alert">
							Segera lakukan pembayaran ke Rekening Mandiri 115896327536 a/n. MedOnLab
						</div>
					</div>
					<label class="fieldlabels">Upload Foto Bukti Pembayaran:</label> <input type="file" name="pic" accept="image/*">
				</div>
				<input type="button" name="next" class="next action-button" value="Submit" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
			</fieldset>
			<fieldset>
				<div class="form-card">
					<div class="row">
						<div class="col-7">
							<h2 class="fs-title">Pendaftaran Berhasil</h2>
						</div>
						<div class="col-5">
							<h2 class="steps">Step 4 - 4</h2>
						</div>
					</div> <br><br>
					<h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
					<div class="row justify-content-center">
						<div class="col-3"> <img src="https://i.gifer.com/7efs.gif" class="fit-image"> </div>
					</div> <br><br>
				</div>
			</fieldset>
		</form>
	</div>