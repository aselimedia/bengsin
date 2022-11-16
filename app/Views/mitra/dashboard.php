<?php $this->extend('layout/navbarMitra'); ?>

<?php $this->section('content'); ?>

<div class="col-lg-6">
    <div class="row">
        <div class="col-4">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <a href="<?= base_url() ?>/tambal-ban">
                        <div class="bengsin-image-dash">
                            <img src="<?= base_url('assets/image/tire.png') ?>" alt="" class="rounded mx-auto d-block" draggable="false" (dragstart)="false;">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <p class="bengsin-txt">Tambal Ban</p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <a href="<?= base_url() ?>/isi-bensin">
                        <div class="bengsin-image-dash" id="isi-bensin">
                            <img src="<?= base_url('assets/image/isi-bensin.png') ?>" alt="" class="rounded mx-auto d-block" draggable="false" (dragstart)="false;">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <p class="bengsin-txt">Isi Bensin</p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <div class="bengsin-image-dash">
                        <img src="<?= base_url('assets/image/service.png') ?>" alt="" class="rounded mx-auto d-block" draggable="false" (dragstart)="false;">
                    </div>
                </div>
                <div class="col-12">
                    <p class="bengsin-txt">Service</p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <div class="bengsin-image-dash">
                        <img src="<?= base_url('assets/image/oil-change.png') ?>" alt="" class="rounded mx-auto d-block" draggable="false" (dragstart)="false;">
                    </div>
                </div>
                <div class="col-12">
                    <p class="bengsin-txt">Ganti Oli</p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <div class="bengsin-image-dash">
                        <img src="<?= base_url('assets/image/check-up.png') ?>" alt="" class="rounded mx-auto d-block" draggable="false" (dragstart)="false;">
                    </div>
                </div>
                <div class="col-12">
                    <p class="bengsin-txt">Check Up</p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <div class="bengsin-image-dash">
                        <img src="<?= base_url('assets/image/petrol.png') ?>" alt="" class="rounded mx-auto d-block" draggable="false" (dragstart)="false;">
                    </div>
                </div>
                <div class="col-12">
                    <p class="bengsin-txt">SPBU Terdekat</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-3">
    <section class="section_search home__search">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <form method="" class="mr-2 form-width d-inline-block">
                    <div class="input-group home__input">
                        <input type="text" class="form-control home__search-dash" placeholder="Search" name="keyword">
                        <span class="input-group-append">
                            <button class="btn cari" type="submit" name="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="section home__promo">
        <div class="col-12">
            <h5 class="promo">History Penjualan <?= $userInfo['jenis']; ?></h5>
            <div class="row">
                <?php foreach ($history as $history) : ?>
                    <div class="col-12">
                        <div class="history__data" onclick="location.href='<?= base_url() ?>/history/<?= $history['order_id'] ?>'" style="cursor: pointer;">
                            <div class="history__left">
                                <div class="history__jenis">
                                    <p><?= $history['jenis'] ?></p>
                                </div>
                                <div class="history__status">
                                    <?php if ($history['status_code'] == "200") : ?>
                                        <span class="badge bg-success">Success</span>
                                    <?php else : ?>
                                        <span class="badge bg-warning text-dark">Pendding</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="history__right">
                                <div class="history__tgl">
                                    <p><?= date('Y-m-d', $history['tgl']) ?></p>
                                </div>
                                <div class="history__price">
                                    <p>Rp. <?= number_format($history['gross_amount'], 2, ',', '.') ?> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php foreach ($historyTambal as $history) : ?>
                    <div class="col-12">
                        <div class="history__data" onclick="location.href='<?= base_url() ?>/history/<?= $history['order_id'] ?>'" style="cursor: pointer;">
                            <div class="history__left">
                                <div class="history__jenis">
                                    <p><?= $history['jenis'] ?></p>
                                </div>
                                <div class="history__status">
                                    <?php if ($history['status_code'] == "200") : ?>
                                        <span class="badge bg-success">Success</span>
                                    <?php else : ?>
                                        <span class="badge bg-warning text-dark">Pendding</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="history__right">
                                <div class="history__tgl">
                                    <p><?= date('Y-m-d', $history['tgl']) ?></p>
                                </div>
                                <div class="history__price">
                                    <p>Rp. <?= number_format($history['gross_amount'], 2, ',', '.') ?> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>

<?php $this->endSection(); ?>

<?php $this->section('js'); ?>

<script>
    function myFunction(x) {
        if (x.matches) {
            document.getElementById("image").className = "col-3"
            document.getElementById("name").className = "col-8"
            document.getElementById("promo-1").className = "col-6"
            document.getElementById("promo-2").className = "col-6"
        } else {
            document.getElementById("image").className = ""
            document.getElementById("name").className = ""
            document.getElementById("promo-1").className = ""
            document.getElementById("promo-2").className = ""
        }
    }

    var x = window.matchMedia("(max-width: 992px)");
    myFunction(x);
    x.addListener(myFunction);

    function responsivePromo(c) {
        if (c.matches) {
            document.getElementById("promo-1").className = "col-12"
            document.getElementById("promo-2").className = "col-12"
        } else {
            document.getElementById("promo-1").className = ""
            document.getElementById("promo-2").className = ""
        }
    }

    var c = window.matchMedia("(max-width: 767px)");
    responsivePromo(c);
    c.addListener(responsivePromo);
</script>

<?php $this->endSection(); ?>