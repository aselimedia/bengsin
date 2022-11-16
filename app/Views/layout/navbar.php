<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-XravRxhAaythPuaC"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/fontawesome/css/all.css">
    <script src="<?= base_url() ?>/assets/fontawesome/js/all.js"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="<?= base_url() ?>/css/navbar.css">
    <link rel="stylesheet" href="<?= base_url() ?>/css/dashboard.css">
    <link rel="stylesheet" href="<?= base_url() ?>/css/bensin.css">
    <link rel="stylesheet" href="<?= base_url() ?>/css/detail.css">
    <link rel="stylesheet" href="<?= base_url() ?>/css/history.css">
    <link rel="stylesheet" href="<?= base_url() ?>/css/account.css">
    <link rel="stylesheet" href="<?= base_url() ?>/css/setting.css">
    <link rel="stylesheet" href="<?= base_url() ?>/css/tips.css">
    <title><?= $title ?></title>
</head>

<body>
    <header class="header">
        <?php if ($title !== 'My Account') : ?>
            <div class="image__top-logo" id="image-top">
                <div class="container">
                    <div class="navbar_top">
                        <div class="navbar_top-image">
                            <img src="<?= base_url() ?>/assets/image/logo.png" alt="logo" onclick="location.href='/'" style="cursor: pointer;">
                        </div>
                        <?php if ($title !== 'Setting') : ?>
                            <div class="logout-page">
                                <div class="logout_text">
                                    <a href="/logout">Logout</a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($title !== 'Detail History') : ?>
            <nav class="navbar nav_bottom navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <ul class="nav__list grid navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= base_url('/') ?>">
                                <i class="uil uil-estate nav__icon"></i> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/history') ?>">
                                <i class="uil uil-history nav__icon"></i> Order
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/tipsT') ?>">
                                <i class="uil uil-book-reader nav__icon"></i> Tips
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/account') ?>">
                                <i class="uil uil-user nav__icon"></i> Account
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        <?php endif; ?>
    </header>

    <?php if ($title == 'Dashboard') : ?>
        <main>
            <div class="container">
                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                    <div class="col-12" style="margin-top: 20px;">
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('success'); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-lg-3">
                        <section class="home__card">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card__picture">
                                            <img src="<?= base_url() ?>/assets/image/<?= $userInfo['image'] ?>">
                                        </div>
                                        <div class="card__name">
                                            <h3 class="card__name-text"><?= ucfirst($userInfo['name']) ?></h3>
                                            <div class="card__balance-point">
                                                <p class="card__balance-text">300 Poin</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <?php $this->renderSection('content'); ?>
                </div>
            </div>
        </main>

    <?php elseif ($title == 'Isi Bensin' || $title == 'My Account' || $title == 'Setting' || $title == 'Detail History' || $title == 'Tambal Ban') : ?>
        <div class="container">

        </div>
        <?php $this->renderSection('content'); ?>

    <?php else : ?>
        <div class="container">
            <section class="home__card">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card__picture">
                                <img src="<?= base_url() ?>/assets/image/<?= $userInfo['image'] ?>">
                            </div>
                            <div class="card__name">
                                <h3 class="card__name-text"><?= $userInfo['name'] ?></h3>
                                <div class="card__balance-point">
                                    <p class="card__balance-text">300 Poin</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php $this->renderSection('content'); ?>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <?php $this->renderSection('js'); ?>
</body>

</html>