<div class="container mt-5" style="min-height: 34rem">
	<div class="row judul-page">
		<h3>Tambah Data Medical Check Up</h3>
	</div>
	<div class="row mt-4">
		<div class="col-md-12">
			<form method="post" action="<?= base_url('admin/tambah_medcheck') ?>">
				<div class="form-group row">
					<label for="inputEmail3" class="col-sm-2 col-form-label">ID Pasien & Nama Pasien</label>
					<div class="col-sm-10">
						<select class="form-control form-control-md" id="id_pasien" name="id_pasien">
							<?php foreach ($pasien as $p) : ?>
								<option value="<?= $p['id_pasien'] ?>"><?= $p['id_pasien'] . ' (' . $p['fullname'] . ')' ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
					</div>
				</div>
				<div class="form-group row">
					<label for="layanan" class="col-sm-2 col-form-label">Layanan</label>
					<div class="col-sm-10">
						<select class="form-control form-control-md" id="layanan" name="layanan">
							<option selected>--Pilih Layanan--</option>
							<option>Cek Darah</option>
							<option>cek Urin</option>
							<option>Cek Darah dan Urin</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="cabang" class="col-sm-2 col-form-label">Cabang Lab</label>
					<div class="col-sm-10">
						<select class="form-control form-control-md" id="cabang" name="cabang">
							<option selected>--Pilih Cabang--</option>
							<option value="Cabang Bandung">Cabang Bandung</option>
							<option value="Cabang Bekasi">Cabang Bekasi</option>
							<option value="Cabang Bogor">Cabang Bogor</option>
							<option value="Cabang Surakarta">Cabang Surakarta</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="alamat" class="col-sm-2 col-form-label">Alamat Pasien</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="alamat" name="alamat">
					</div>
				</div>
				<div class="form-group row">
					<label for="nomor_hp" class="col-sm-2 col-form-label">Nomor HP Aktif</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nomor_hp" name="nomor_hp">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-10">
						<button type="submit" class="btn btn-primary">Tambah</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>