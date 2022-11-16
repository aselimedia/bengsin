<?php $this->extend('layout/logreg'); ?>

<?php $this->section('content'); ?>

<main>
    <div class="bg_login">
        <div class="container">
            <h1 class="txt">FORGOT PASSWORD</h1>
            <p class="txt_hai">Hi, Have a Good day!</p>
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
            <form class="login-page" action="<?= base_url('/login/forgot-password'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="row">
                    <div class="col-12">
                        <input type="email" class="form-control form-login" name='email' placeholder="Email" value="<?= set_value('email'); ?>">

                        <?php if (isset($validation)) : ?>
                            <div class="col-12">
                                <div class="alert alert-danger alert-login" role="alert">
                                    <?= display_error($validation, 'email') ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <button type="button" onclick="location.href='<?= base_url('/login') ?>'" class="btn btn-submit">back</button>
                    </div>
                    <div class="col-6 d-flex justify-content-start">
                        <button type="submit" class="btn btn-submit">reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<?php $this->endsection(); ?>