<?php $this->extend('layout/navbar'); ?>

<?php $this->section('content'); ?>

<main>
    <section class="section home__bensin">
        <?php if (!empty(session()->getFlashdata('fail'))) : ?>
            <div class="col-12">
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('fail'); ?>
                </div>
            </div>
        <?php endif; ?>
        <?php foreach ($detailTambal as $detail) : ?>
            <form action="<?= base_url() ?>/tambal-ban/detail/<?= $detail['slug']; ?>" method="post">
            <?php endforeach; ?>
            <div class="bensin__product">
                <div class="bensin__input">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label label">Jenis Ban</label>
                            <select class="form-select bensin__select" id="jenisBahanBakar" name="jenis" aria-label="Default select example" onchange="selectedOptionBengsin(this)">
                                <option selected>Choose your tire type</option>
                                <?php foreach ($detailTambal as $detail) : ?>
                                    <option value="<?= $detail['jenis']; ?>">
                                        <?= $detail['tambalban']; ?>
                                        <?= $detail['jenis']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?php foreach ($detailTambal as $detail) : ?>
                            <div class="col-12">
                                <input type="hidden" name="" id="<?= $detail['jenis'] . $detail['tambalban'] . $detail['nama_toko'] ?>" value="<?= $detail['harga'] ?>">
                            </div>
                        <?php endforeach; ?>
                        <?php foreach ($detailTambal as $a) : ?>
                            <div class="col-12">
                                <input type="hidden" name="idmitra" value="<?= $a['id_mitra'] ?>">
                            </div>
                        <?php endforeach; ?>
                        <div class="col-12">
                            <textarea style="visibility: hidden; position: absolute;" name="harga" id="hargaLiter" cols="30" rows="10"></textarea>
                            <textarea style="visibility: hidden; position: absolute;" name="tambalban" id="banbocor" cols="30" rows="10"></textarea>
                            <label class="form-label label">Harga/Liter</label>
                            <div class="price">
                                <div class="price__box">
                                    <p class="price__text">Harga</p>
                                    <p id="harga" class="price__angka">Rp. 0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bensin__btns">
                    <button class="btn btn__bensin" type="submit">Payment Method</button>
                </div>
            </div>
            </form>
    </section>
</main>

<?php $this->endSection(); ?>

<?php $this->section('js'); ?>

<script>
    function rubah(angka) {
        var reverse = angka.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        return ribuan;
    }

    function selectedOptionBengsin(selTag) {
        var x = selTag.options[selTag.selectedIndex].text;

        if (x === 'Tambal Ban Depan Ban Tubless') {
            <?php foreach ($detailTambal as $detail) : ?>
                <?php if ($detail['no'] == 1) : ?>
                    var harga = document.getElementById('<?= $detail['jenis'] . $detail['tambalban'] . $detail['nama_toko'] ?>').value;
                <?php endif; ?>
            <?php endforeach; ?>
            document.getElementById('harga').innerHTML = 'Rp. ' + rubah(harga);
            document.getElementById('hargaLiter').innerHTML = harga;
            document.getElementById('banbocor').innerHTML = 'Tambal Ban Depan';
        } else if (x === 'Tambal Ban Belakang Ban Tubless') {
            <?php foreach ($detailTambal as $detail) : ?>
                <?php if ($detail['no'] == 2) : ?>
                    var harga = document.getElementById('<?= $detail['jenis'] . $detail['tambalban'] . $detail['nama_toko'] ?>').value;
                <?php endif; ?>
            <?php endforeach; ?>
            document.getElementById('harga').innerHTML = 'Rp. ' + rubah(harga);
            document.getElementById('hargaLiter').innerHTML = harga;
            document.getElementById('banbocor').innerHTML = 'Tambal Ban Belakang';
        } else if (x === 'Tambal Ban Depan Ban Biasa') {
            <?php foreach ($detailTambal as $detail) : ?>
                <?php if ($detail['no'] == 3) : ?>
                    var harga = document.getElementById('<?= $detail['jenis'] . $detail['tambalban'] . $detail['nama_toko'] ?>').value;
                <?php endif; ?>
            <?php endforeach; ?>
            document.getElementById('harga').innerHTML = 'Rp. ' + rubah(harga);
            document.getElementById('hargaLiter').innerHTML = harga;
            document.getElementById('banbocor').innerHTML = 'Tambal Ban Depan';
        } else if (x === 'Tambal Ban Belakang Ban Biasa') {
            <?php foreach ($detailTambal as $detail) : ?>
                <?php if ($detail['no'] == 4) : ?>
                    var harga = document.getElementById('<?= $detail['jenis'] . $detail['tambalban'] . $detail['nama_toko'] ?>').value;
                <?php endif; ?>
            <?php endforeach; ?>
            document.getElementById('harga').innerHTML = 'Rp. ' + rubah(harga);
            document.getElementById('hargaLiter').innerHTML = harga;
            document.getElementById('banbocor').innerHTML = 'Tambal Ban Belakang';
        } else if (x === 'Choose your tire type') {
            var harga = 0;
            document.getElementById('harga').innerHTML = 'Rp. ' + rubah(harga);
            document.getElementById('hargaLiter').innerHTML = harga;
        }

    }
</script>

<?php $this->endSection(); ?>