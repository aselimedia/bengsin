<?php $this->extend('layout/logreg'); ?>

<?php $this->section('content'); ?>

<main>
    <div class="bg_login">
        <div class="container">
            <h1 class="txt">LOGIN</h1>
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
            <?php if (isset($validation)) : ?>
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->listErrors() ?>
                    </div>
                </div>
            <?php endif; ?>
            <form class="login-page" action="<?= base_url('/login'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="row">
                    <div class="col-12">
                        <input type="email" class="form-control form-login" name='email' placeholder="Email" value="<?= set_value('email'); ?>">
                    </div>
                    <div class="col-12">
                        <input type="password" class="form-control form-login" name="password" placeholder="Password" value="<?= set_value('password'); ?>">
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <a href="<?= base_url('/login/forgot-password') ?>" class="forget">Forgot Password?</a>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <button type="submit" class="btn btn-submit">login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-4 d-flex justify-content-center">
                <div class="box-login">
                    <img class="logo-image" src="<?= base_url() ?>/assets/image/facebook.png" alt="">
                </div>
            </div>
            <div class="col-4 d-flex justify-content-center">
                <div class="box-login">
                    <img class="logo-image" src="<?= base_url() ?>/assets/image/google.png" alt="">
                </div>
            </div>
            <div class="col-4 d-flex justify-content-center">
                <div class="box-login">
                    <img class="logo-image" src="<?= base_url() ?>/assets/image/twitter.png" alt="">
                </div>
            </div>
        </div>
    </div><br>
    <div>
        <p style="text-align: center; font-weight: 600;">Dont have an Account?
            <a href="<?= site_url('/register') ?>" style="color: #ed5a00; text-decoration:none; font-weight: 700;"> SIGN UP</a>
        </p>
    </div>
</main>

<?php $this->endsection(); ?>