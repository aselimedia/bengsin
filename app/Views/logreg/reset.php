<?php $this->extend('layout/logreg'); ?>

<?php $this->section('content'); ?>

<main>
    <div class="bg_login">
        <div class="container">
            <h1 class="txt">CHANGE YOUR</h1>
            <p class="txt_hai">PASSWORD FOR</p>
            <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('fail'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (!empty(session()->getFlashdata('success'))) : ?>
                <div class="col-12">
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('success'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (isset($validation)) : ?>
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->listErrors() ?>
                    </div>
                </div>
            <?php endif; ?>
            <form class="login-page" action="<?= base_url('/login/reset?email=' . $email . '&token=' . $token) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="row">
                    <div class="cpl-12">
                        <h5 style="color: white; text-align: center"><?= $email ?></h5>
                    </div>
                    <div class="col-12">
                        <input type="password" class="form-control form-login" name='password' placeholder="Password">
                    </div>
                    <div class="col-12">
                        <input type="password" class="form-control form-login" name='cpassword' placeholder="password">
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <button type="submit" class="btn btn-submit">submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<?php $this->endsection(); ?>