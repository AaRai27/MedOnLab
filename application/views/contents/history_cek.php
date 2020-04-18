<div class="container mt-5" style="min-height: 34rem">
    <h2 class="text-center">History Medical Check Up </h2>
    <div class="row text mt-4">
        <div class="col-md-3">
            <table class="data-pasien mt-0 mb-2">
                <tr>
                    <td>
                        Nama Pasien
                    </td>
                    <td> : </td>
                    <td><?= $user['fullname'] ?></td>
                </tr>
                <tr class="text-left">
                    <td>
                        ID Pasien
                    </td>
                    <td> : </td>
                    <td><?= $user['id_pasien'] ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row list-table">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Pemeriksaan</th>
                    <th scope="col">Layanan</th>
                    <th scope="col">Cabang</th>
                    <th scope="col">Alamat Pasien</th>
                    <th scope="col">Nomor Hp</th>
                    <th scope="col">Aksi</th>
                    <th scope="col" class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($medcek != NULL) : ?>
                    <?php $i = 1; ?>
                    <?php foreach ($medcek as $m) : ?>
                        <tr>
                            <th scope="row" class="text-center"><?= $i ?></th>
                            <td><?= $m['layanan'] ?></td>
                            <td><?= $m['cabang'] ?></td>
                            <td><?= $m['alamat'] ?></td>
                            <td><?= $m['nomor_hp'] ?></td>

                            <?php if ($m['status'] == 0) : ?>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="<?= base_url('user/cek_status/') . $m['id'] ?>" type="button" class="btn btn-info">Details</a>
                                        <a href="<?= base_url('user/edit_medcheck/') . $m['id']; ?>" type="button" class="btn btn-primary">Edit</a>
                                        <a href="<?= base_url('upload/do_upload/') . $m['id'] ?>" type="button" class="btn btn-success">Bayar</a>
                                    </div>
                                </td>
                            <?php elseif ($m['status'] == 1) : ?>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="<?= base_url('user/cek_status/') . $m['id'] ?>" type="button" class="btn btn-info">Details</a>
                                        <a href="<?= base_url('user/edit_medcheck/') . $m['id']; ?>" type="button" class="btn btn-primary">Edit</a>
                                    </div>
                                </td>
                            <?php else : ?>
                                <td>
                                    <a href="<?= base_url('user/cek_status/') . $m['id'] ?>" type="button" class="btn btn-info btn-sm">Details</a>
                                </td>
                            <?php endif; ?>


                            <?php if ($m['status'] == 0) : ?>
                                <td class="text-center" style="background-color: grey;color:white">MENUNGGU PEMBAYARAN</td>
                            <?php elseif ($m['status'] == 1) : ?>
                                <td class="text-center" style="background-color: #de7119;color: white">PROSES</td>
                            <?php else : ?>
                                <td class="text-center" style="background-color: #18b0b0;color:white">SUKSES</td>
                            <?php endif; ?>
                            <?php $i++; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <td colspan="7" class="text-center">
                        <h4 class="text-muted">Anda Belum Pernah Melakukan Medical Check Up</h4>
                    </td>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>