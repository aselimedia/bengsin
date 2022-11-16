<?php $this->extend('layout/navbar'); ?>

<?php $this->section('content'); ?>

<div class="col-lg-6">
    <div class="row">
        <div class="col-4">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <a href="<?= base_url() ?>/tambal-ban">
                        <div class="bengsin-image-dash">
                            <img src="assets/image/tire.png" alt="" class="rounded mx-auto d-block" draggable="false" (dragstart)="false;">
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
                            <img src="assets/image/isi-bensin.png" alt="" class="rounded mx-auto d-block" draggable="false" (dragstart)="false;">
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
                        <img src="assets/image/service.png" alt="" class="rounded mx-auto d-block" draggable="false" (dragstart)="false;">
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
                        <img src="assets/image/oil-change.png" alt="" class="rounded mx-auto d-block" draggable="false" (dragstart)="false;">
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
                        <img src="assets/image/check-up.png" alt="" class="rounded mx-auto d-block" draggable="false" (dragstart)="false;">
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
                        <img src="assets/image/petrol.png" alt="" class="rounded mx-auto d-block" draggable="false" (dragstart)="false;">
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
            <h5 class="promo">Promo Saat Ini</h5>
            <div class="row">
                <div id="promo-1">
                    <div class="promo-card">
                        <div class="circle-persen"></div>
                        <p class="circle-text">%</p>
                        <p class="all-promo d-flex justify-content-center">Lihat Semua Promo</p>
                    </div>
                </div>
                <div id="promo-2">
                    <div class="promo-card">
                        <p class="cuppon-name">Kupon Diskon Bengsin</p>
                        <p class="cuppon-balance d-flex justify-content-center">Rp 100.000,00</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="col-12 bottom"></div>
</div>

<?php $this->endSection(); ?>

<?php $this->section('cardNamess'); ?>

<section class="home__card">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card__picture">
                    <img src="<?= base_url() ?>/assets/image/default-pict.png">
                </div>
                <div class="card__name">
                    <h3 class="card__name-text">Luiz</h3>
                    <div class="card__balance-point">
                        <p class="card__balance-text">300 Poin</p>
                        <p class="card__balance-text">Rp. 1.xxx.xxx</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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