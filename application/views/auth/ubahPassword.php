<div class="container mt-3" style="min-height: 38vw;">
    <div class="row">
        <?php if (validation_errors()) : ?>
            <div class="col-md-12">
                <div class="text-center">
                    <?= validation_errors(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <h2>Ubah Data</h2>
    <hr>
    <?= form_open('auth/ubahPassword') ?>
    <div class="form-group">
        <?= form_label('Password Lama') ?>
        <?= form_input(['name' => 'password', 'id' => 'password', 'class' => 'form-control', 'type' => 'password']) ?>
        <button class="btn btn-default reveal bg-light rounded-right border-secondary" type="button" onclick="showPasswordLama()">
            <i class="fas fa-eye"></i>
        </button>
    </div>
    <div class="form-group">
        <?= form_label('Password Baru') ?>
        <?= form_input(['name' => 'password1', 'id' => 'password1', 'class' => 'form-control', 'type' => 'password']) ?>
        <button class="btn btn-default reveal bg-light rounded-right border-secondary" type="button" onclick="showPassword1()">
            <i class="fas fa-eye"></i>
        </button>
    </div>
    <div class="form-group">
        <?= form_label('Konfirmasi Password Baru') ?>
        <?= form_input(['name' => 'password2', 'id' => 'password2', 'class' => 'form-control', 'type' => 'password']) ?>
        <button class="btn btn-default reveal bg-light rounded-right border-secondary" type="button" onclick="showPassword2()">
            <i class="fas fa-eye"></i>
        </button>
    </div>
    <div class="form-group">
        <a href="<?= site_url('User') ?>" class="btn btn-success">Back</a>
        <?= form_submit('submit', 'Update', ['class' => 'btn btn-warning']) ?>
    </div>
    <?= form_close() ?>
</div>