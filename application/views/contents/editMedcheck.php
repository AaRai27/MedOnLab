  <!-- Content -->
  <div class="container" style="height: 45rem">
      <div class="row">
          <div class="box float mx-auto mt-5">
              <div class="card text-center">
                  <div class="card-header" style=" background-color: #1eb2a6; color: white;">
                      <img src="<?= base_url('assets/img/logo-lands.png') ?>" style="width: 200px;">
                      <h4>Data Pasien </h4>
                  </div>
                  <div class="card-body">
                      <div class="col-md-4">
                          <table class="data-pasien mt-0 mb-2 text-left">
                              <tr>
                                  <td>
                                      Nama Pasien
                                  </td>
                                  <td> : </td>
                                  <td><?= $pasien['nama_pasien'] ?></td>
                              </tr>
                              <tr class="text-left">
                                  <td>
                                      ID Pasien
                                  </td>
                                  <td> : </td>
                                  <td><?= $pasien['id_pasien'] ?></td>
                              </tr>
                          </table>
                      </div>

                      <div class="row">
                          <div class="col-sm-6">
                              <div class="card">
                                  <div class="card-body">
                                      <h5 class="card-title">Tanggal Lahir</h5>
                                      <p class="card-text"><input class="form-control" type="text" value="<?= date("d F Y", strtotime($pasien['tgl_lahir'])) ?>" name="tgl_lahir"></p>
                                      <!-- <a href="#" class="btn btn-primary">Update</a> -->
                                      <!-- Untuk UPDATE -->
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-6">
                              <div class="card">
                                  <div class="card-body">
                                      <h5 class="card-title">Jenis Layanan</h5>
                                      <select class="custom-select" id="layanan" name="layanan">
                                          <option value="<?= $pasien['layanan']; ?>" selected><?= $pasien['layanan'] ?></option>
                                          <option>------------</option>
                                          <option value="Cek Darah">Cek Darah</option>
                                          <option value="Cek Urin">Cek Urin</option>
                                          <option value="Cek Darah dan Urin">Cek Darah dan Urin</option>
                                      </select>
                                      <!-- <a href="#" class="btn btn-primary">Update</a> -->
                                      <!-- Untuk UPDATE -->
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-6">
                              <div class="card">
                                  <div class="card-body">
                                      <h5 class="card-title">Cabang Lab</h5>
                                      <select class="custom-select" id="cabang" name="cabang">
                                          <option value="<?= $pasien['cabang']; ?>" selected><?= $pasien['cabang']; ?></option>
                                          <option value="----------"></option>
                                          <option value="Cabang Bandung">Cabang Bandung</option>
                                          <option value="Cabang Bekasi">Cabang Bekasi</option>
                                          <option value="Cabang Bogor">Cabang Bogor</option>
                                          <option value="Cabang Surakarta">Cabang Surakarta</option>
                                      </select>
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-6">
                              <div class="card">
                                  <div class="card-body">
                                      <h5 class="card-title">Tanggal Check Up</h5>
                                      <p class="card-text"><input name="tgl_periksa" class="form-control" type="text" value="<?= $pasien['tgl_periksa'] ?>" readonly></p>
                                      <!-- <a href="#" class="btn btn-primary">Update</a> -->
                                      <!-- Untuk UPDATE -->
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-6">
                              <div class="card">
                                  <div class="card-body">
                                      <h5 class="card-title">Alamat</h5>
                                      <p class="card-text"><input name="alamat" class="form-control" type="text" value="<?= $pasien['alamat'] ?>"></p>
                                      <!-- <a href="#" class="btn btn-primary">Update</a> -->
                                      <!-- Untuk UPDATE -->
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-6">
                              <div class="card">
                                  <div class="card-body">
                                      <h5 class="card-title">Nomor HP</h5>
                                      <p class="card-text"><input name="nomor_hp" class="form-control" type="text" value="<?= $pasien['nomor_hp'] ?>"></p>
                                      <!-- <a href="#" class="btn btn-primary">Update</a> -->
                                      <!-- Untuk UPDATE -->
                                  </div>
                              </div>
                          </div>
                      </div>
                      <a href="<?= base_url('user/edit_medcheck/') . $pasien['id']; ?>" class="btn btn-primary" style="margin-top: 20px;">Update</a>
                  </div>
                  <?php if ($pasien['status'] == 0) : ?>
                      <div class="card-footer text-dark" style=" background-color: #D8D8D8FF;">
                          <td class="text-center">MENUNGGU PEMBAYARAN, <a href="<?= base_url('upload/do_upload/') . $pasien['id'] ?>">Page Pembayaran</a></td>
                      </div>
                  <?php elseif ($pasien['status'] == 1) : ?>
                      <div class="card-footer text-white" style=" background-color: #18b0b0;">
                          <td class="text-center">PEMERIKSAAN SELESAI</td>
                      </div>
                  <?php else : ?>
                      <div class="card-footer text-white" style=" background-color: #de7119;">
                          <td class="text-center">SEDANG DIPROSES</td>
                      </div>
                  <?php endif; ?>
              </div>
          </div>
      </div>
  </div>
  </div>