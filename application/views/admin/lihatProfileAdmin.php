<div class="container mt-3" style="min-height :38rem;">
    <h2><?= $title ?></h2>
    <hr>
    <div class="img-profile mb-4">
        <div class="row">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="img-thumbnail" width="130">
            </div>
        </div>
    </div>
    <?= form_open('User/lihat_profile_admin') ?>
    <div class="form-group">
        <?= form_label('Full Name') ?>
        <?= form_input(['name' => 'fullname', 'class' => 'form-control', 'required' => 'required', 'value' => $user['fullname'], 'readonly' => 'true']) ?>
    </div>
    <div class="form-group">
        <?= form_label('Email') ?>
        <?= form_input(['name' => 'email', 'class' => 'form-control', 'required' => 'required', 'value' => $user['email'], 'readonly' => 'true']) ?>
    </div>
    <div class="form-group">
        <?= form_label('Username') ?>
        <?= form_input(['name' => 'username', 'class' => 'form-control', 'required' => 'required', 'value' => $user['username'], 'readonly' => 'true']) ?>
    </div>
    <div class="form-group">
        <a href="<?= base_url('user') ?>" class="btn btn-success">Back</a>
    </div>
    <?= form_close() ?>
</div>