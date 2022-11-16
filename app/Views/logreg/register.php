<?php $this->extend('layout/logreg'); ?>

<?php $this->section('content'); ?>

<main>
    <div class="bg_login">
        <div class="container">
            <h1 class="txt">SIGN UP</h1>
            <p class="txt_hai">Welcome To All</p>
            <form class="register-page" action="<?= base_url('/register') ?>" method="post">
                <?= csrf_field(); ?>
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
                <div class="row">
                    <div class="col-12">
                        <input type="text" class="form-control form-register" name="name" placeholder="Name" value="<?= set_value('name'); ?>">
                    </div>
                    <div class="col-12">
                        <input type="email" class="form-control form-register" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                    </div>
                    <div class="col-12">
                        <input type="password" class="form-control form-register" name="password" placeholder="Password" value="<?= set_value('password'); ?>">
                    </div>
                    <div class="col-12">
                        <input type="password" class="form-control form-register" name="cpassword" placeholder="Confirm Password" value="<?= set_value('cpassword'); ?>">
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <button type="submit" class="btn btn-submit">sign up</button>
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
        <p style="text-align: center; font-weight: 600;">Do you have an account?
            <a href="<?= site_url('/login') ?>" style="color: #ed5a00; text-decoration:none; font-weight: 700;"> LOGIN</a>
        </p>
    </div>
</main>

<?php $this->endsection(); ?>