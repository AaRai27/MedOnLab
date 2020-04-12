  <!-- ----------------------------------- Content ----------------------------------- -->
  <div class="container mt-5">
  	<div class="row">
  		<div class="col-md-12" style="min-height: 30vw;">
  			<div class="col-md-6 rounded-left float-left" style="background-color: #a1e0db;height:552px">
  				<img src="<?= base_url('assets/img/logo.png') ?>" width="70%" style="margin-top: 80px;margin-left: 90px;">
  				<!-- <hr> -->
  				<h2 class="text-center" style="color:#fff;">Online Medical Check Up <br> For You</h2>
  			</div>
  			<div class="col-md-6 rounded-right float-left" style="background-color: #d4f8e8;height:552px">
  				<h3 class="text-center mt-3">Form Registrasi</h3>
  				<?php $this->session->flashdata('pesan'); ?>
  				<!-- <hr> -->
  				<form class="col-md-12" action="<?= base_url('auth/registration') ?>" method="post">
  					<div class="d-flex justify-content-center">
  						<div class="col-md-10">
  							<input type="hidden" name="id_pasien" id="id_pasien" class="form-control" value="MC-<?= $last_id;  ?>">
  							<div class="form-group">
  								<label for="fullname" class="mt-0">Full Name</label>
  								<div class="input-group">
  									<div class="input-group-prepend">
  										<div class="input-group-text"><i class="fas fa-user"></i></div>
  									</div>
  									<input type="text" name="fullname" id="fullname" class="form-control" placeholder="Masukkan Nama Lengkap" value="<?= set_value('fullname') ?>">
  								</div>
  								<small class="text-danger"><?= form_error('fullname') ?></small>
  							</div>
  							<div class="form-group">
  								<label for="username" class="mt-0">Username</label>
  								<div class="input-group">
  									<div class="input-group-prepend">
  										<div class="input-group-text"><i class="fas fa-user"></i></div>
  									</div>
  									<input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username" value="<?= set_value('username') ?>">
  								</div>
  								<small class="text-danger"><?= form_error('username') ?></small>
  							</div>
  							<div class="form-group">
  								<label for="email" class="mt-0">Email</label>
  								<div class="input-group">
  									<div class="input-group-prepend">
  										<div class="input-group-text"><i class="fas fa-briefcase"></i></div>
  									</div>
  									<input type="text" name="email" id="email" class="form-control" placeholder="Masukkan Email" value="<?= set_value('email') ?>">
  								</div>
  								<small class="text-danger"><?= form_error('email') ?></small>
  							</div>
  							<div class="form-group">
  								<label for="password1" class="mt-0">Password</label>
  								<div class="input-group">
  									<div class="input-group-prepend">
  										<div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
  									</div>
  									<input type="password" name="password1" id="password1" class="form-control" placeholder="Masukkan Password">
  									<div class="input-group-prepend">
  										<button class="btn btn-default reveal bg-light rounded-right border-secondary" type="button" onclick="showPassword1()">
  											<i class="fas fa-eye"></i>
  										</button>
  									</div>
  								</div>
  								<small class="text-danger"><?= form_error('password1') ?></small>
  							</div>
  							<div class="form-group">
  								<label for="password2" class="mt-0">Confirm Password</label>
  								<div class="input-group">
  									<div class="input-group-prepend">
  										<div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
  									</div>
  									<input type="password" name="password2" id="password2" class="form-control" placeholder="Konfirmasi Password Anda">
  									<div class="input-group-prepend">
  										<button class="btn btn-default reveal bg-light rounded-right border-secondary" type="button" onclick="showPassword2()">
  											<i class="fas fa-eye"></i>
  										</button>
  									</div>
  								</div>
  								<small class="text-danger"><?= form_error('password2') ?></small>
  							</div>
  							<div class="d-flex justify-content-around mt-0">
  								<button type="submit" class="btn btn-success">SUBMIT</button>
  							</div>
  						</div>
  					</div>
  				</form>
  			</div>

  		</div>
  	</div>
  </div>
  <!-- ----------------------------------- Content ----------------------------------- -->