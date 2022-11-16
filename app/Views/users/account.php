<?php $this->extend('layout/navbar'); ?>

<?php $this->section('content'); ?>

<header>
    <div class="bg__account-header"></div>
    <div class="card__account">
        <div class="img__account-users">
            <img src="<?= base_url() ?>/assets/image/<?= $userInfo['image'] ?>" alt="">
        </div>
        <div class="name__account-users">
            <?php $firstName = explode(" ", $userInfo['name']); ?>
            <p><?= $firstName[0]; ?></p>
        </div>
        <div class="email__account-users">
            <p><?= $userInfo['email']; ?></p>
        </div>
    </div>
</header>

<main>
    <div class="container">
        <div class="account">
            <div class="setting-page">
                <div class="box__setting-account" onclick="location.href='/account/setting'">
                    <div class="box__setting-icon">
                        <i class="uil uil-user"></i>
                        <p>My Account</p>
                    </div>
                    <div class="box__setting-arrow">
                        <i class="uil uil-angle-right-b"></i>
                    </div>
                </div>

                <div class="box__setting-account">
                    <div class="box__setting-icon">
                        <i class="uil uil-bell"></i>
                        <p>Notification</p>
                    </div>
                    <div class="box__setting-arrow">
                        <i class="uil uil-angle-right-b"></i>
                    </div>
                </div>

                <div class="box__setting-account">
                    <div class="box__setting-icon">
                        <i class="uil uil-question-circle"></i>
                        <p>Help Center</p>
                    </div>
                    <div class="box__setting-arrow">
                        <i class="uil uil-angle-right-b"></i>
                    </div>
                </div>

                <div class="box__setting-account" onclick="location.href='/logout'">
                    <div class="box__setting-icon">
                        <i class="uil uil-setting"></i>
                        <p>Log Out</p>
                    </div>
                    <div class="box__setting-arrow">
                        <i class="uil uil-angle-right-b"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php $this->endSection(); ?>