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
        <?php foreach ($detailBensin as $detail) : ?>
            <form action="<?= base_url() ?>/isi-bensin/detail/<?= $detail['slug']; ?>" method="post">
            <?php endforeach; ?>
            <div class="bensin__product">
                <div class="bensin__input">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label label">Jenis bahan bakar</label>
                            <select class="form-select bensin__select" id="jenisBahanBakar" name="jenis" aria-label="Default select example" onchange="selectedOptionBengsin(this)">
                                <option selected>Choose your fuel</option>
                                <?php foreach ($detailBensin as $detail) : ?>
                                    <option value="<?= $detail['jenis']; ?>"><?= $detail['jenis']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label label">Total Liter</label>
                            <h6 class="label text-danger" style="font-size: 10pt;">
                                <?= isset($validation) ? $validation->listErrors() : '' ?>
                            </h6>
                            <input type="number" class="form-control bensin__control" id="input-liter" name="jmlliter" placeholder="How many liters">
                            <p class="liter">Liter</p>
                            <textarea style="visibility: hidden; position: absolute;" style="visibility: hidden; position: absolute;" name=" harga" id="hargaLiter" cols="30" rows="10"></textarea>
                        </div>
                        <?php foreach ($detailBensin as $detail) : ?>
                            <div class="col-12">
                                <input type="hidden" name="" id="<?= $detail['jenis'] . $detail['nama_toko'] ?>" value="<?= $detail['harga'] ?>">
                            </div>
                        <?php endforeach; ?>
                        <?php foreach ($detailBensin as $a) : ?>
                            <div class="col-12">
                                <input type="hidden" name="idmitra" value="<?= $a['id_mitra'] ?>">
                            </div>
                        <?php endforeach; ?>
                        <div class="col-12">
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

        if (x === 'Pertalite') {
            <?php foreach ($detailBensin as $detail) : ?>
                <?php if ($detail['no'] == 1) : ?>
                    var harga = document.getElementById('<?= $detail['jenis'] . $detail['nama_toko'] ?>').value;
                <?php endif; ?>
            <?php endforeach; ?>
            document.getElementById('harga').innerHTML = 'Rp. ' + rubah(harga);
            document.getElementById('hargaLiter').innerHTML = harga;
        } else if (x === 'Pertamax') {
            <?php foreach ($detailBensin as $detail) : ?>
                <?php if ($detail['no'] == 2) : ?>
                    var harga = document.getElementById('<?= $detail['jenis'] . $detail['nama_toko'] ?>').value;
                <?php endif; ?>
            <?php endforeach; ?>
            document.getElementById('harga').innerHTML = 'Rp. ' + rubah(harga);
            document.getElementById('hargaLiter').innerHTML = harga;
        } else if (x === 'Pertamax Turbo') {
            <?php foreach ($detailBensin as $detail) : ?>
                <?php if ($detail['no'] == 3) : ?>
                    var harga = document.getElementById('<?= $detail['jenis'] . $detail['nama_toko'] ?>').value;
                <?php endif; ?>
            <?php endforeach; ?>
            document.getElementById('harga').innerHTML = 'Rp. ' + rubah(harga);
            document.getElementById('hargaLiter').innerHTML = harga;
        } else if (x === 'Solar Non-Subsidi') {
            <?php foreach ($detailBensin as $detail) : ?>
                <?php if ($detail['no'] == 4) : ?>
                    var harga = document.getElementById('<?= $detail['jenis'] . $detail['nama_toko'] ?>').value;
                <?php endif; ?>
            <?php endforeach; ?>
            document.getElementById('harga').innerHTML = 'Rp. ' + rubah(harga);
            document.getElementById('hargaLiter').innerHTML = harga;
        } else if (x === 'Choose your fuel') {
            var harga = 0;
            document.getElementById('harga').innerHTML = 'Rp. ' + rubah(harga);
            document.getElementById('hargaLiter').innerHTML = harga;
        }

    }
</script>

<?php $this->endSection(); ?>