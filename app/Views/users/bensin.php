<?php $this->extend('layout/navbar'); ?>

<?php $this->section('content'); ?>

<main>
    <div class="bensin__filter" id="filter-content-close">
        <div class="container">
            <div class="bensin__filter-icon open" id="filter-open">
                <div id="open">
                    <i class="uil uil-filter filter__icon"></i> Filter
                </div>
            </div>
            <div class="bensin__filter-icon close" id="filter-close">
                <div id="close">
                    <i class="uil uil-filter filter__icon"></i> Filter
                </div>
            </div>
        </div>
    </div>
    <div class="bensin__content-filter" id="bensin-content">
        <div class="bensin__menu">
            <div class="container">
                <div class="provinsi">
                    <h6>Provinsi</h6>
                    <p class="provinsi__name">Jawa Timur</p>
                </div>
                <div class="kota">
                    <h6>Kota</h6>
                    <p class="kota__name">Malang</p>
                </div>
                <form action="<?= base_url('/isi-bensin') ?>" method="post">
                    <div class="daerah">
                        <h6>Daerah</h6>
                        <div class="bengsin__form-check">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="daerah" value="Blimbing" id="blimbing">
                                        <label class="form-check-label" for="blimbing">
                                            Blimbing
                                        </label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="daerah" value="Klojen" id="klojen">
                                        <label class="form-check-label" for="klojen">
                                            Klojen
                                        </label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="daerah" value="Lowokwaru" id="lowokwaru">
                                        <label class="form-check-label" for="lowokwaru">
                                            Lowokwaru
                                        </label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="daerah" value="Sukun" id="sukun">
                                        <label class="form-check-label" for="sukun">
                                            Sukun
                                        </label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="daerah" value="Kedungkandang" id="kedungkandang">
                                        <label class="form-check-label" for="kedungkandang">
                                            Kedungkandang
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="button-filter">
                        <button type="submit" class="btn btn__filter">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <?php if (!empty(session()->getFlashdata('fail'))) : ?>
            <div class="col-12" style="margin-top: 20px;">
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('fail'); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="bensin__page-menu">
            <div class="row">
                <?php foreach ($jenisUsaha as $usaha) : ?>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                        <a href="<?= base_url() ?>/isi-bensin/detail/<?= $usaha['slug'] ?>">
                            <div class="box" onclick="location.href='<?= base_url() ?>/isi-bensin/detail/<?= $usaha['slug'] ?>'">
                                <div class="box__image">
                                    <img src="<?= base_url() ?>/assets/image/<?= $usaha['gambar'] ?>" alt="">
                                </div>
                                <div class="box__text">
                                    <div class="text__nama-toko">
                                        <h5><?= $usaha['nama_toko']; ?></h5>
                                    </div>
                                    <div class="text__nema-pemilik">
                                        <h6><?= $usaha['nama']; ?></h6>
                                    </div>
                                    <div class="text__alamat">
                                        <i class="uil uil-location-point"></i>
                                        <span><?= $usaha['daerah']; ?></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>

<?php $this->endSection(); ?>

<?php $this->section('js'); ?>

<script>
    const toggleFilter = document.getElementById('filter-open'),
        toggleFilterClose = document.getElementById('filter-close'),
        filterMenu = document.getElementById('bensin-content'),
        open = document.getElementById('open'),
        close = document.getElementById('close')

    if (toggleFilter) {
        toggleFilter.addEventListener('click', () => {
            filterMenu.classList.add('show-filter')
            toggleFilterClose.classList.remove('close')
            toggleFilter.classList.add('remove-page')
        })
    }

    if (toggleFilterClose) {
        toggleFilterClose.addEventListener('click', () => {
            filterMenu.classList.remove('show-filter')
            toggleFilterClose.classList.add('close')
            toggleFilter.classList.remove('remove-page')
        })
    }
</script>

<?php $this->endSection(); ?>