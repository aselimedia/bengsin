<?php $this->extend('layout/navbar'); ?>

<?php $this->section('content'); ?>

<main>
    <div class="container">
        <div class="bensin__product">
            <div class="bensin__input">
                <?php $order = session()->get('userOrder'); ?>
                <div class="row">
                    <div class="col-12">
                        <label class="form-label label">Jenis</label>
                        <input type="text" class="form-control bensin__control" name="jenis" value="<?= $order['jenis'] ?>" disabled>
                    </div>
                    <div class="col-12">
                        <label class="form-label label">Ban Bocor</label>
                        <input type="text" class="form-control bensin__control" name="liter" value="<?= $order['tambalban'] ?>" disabled>
                    </div>
                    <div class="col-12">
                        <label class="form-label label">Biaya Admin</label>
                        <div class="price">
                            <div class="price__box">
                                <p>Rp. 2.500</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label label">Total Harga</label>
                        <div class="price">
                            <div class="price__box">
                                <p id="harga-total">Rp. </p>
                            </div>
                        </div>
                        <input type="hidden" id="total" value="<?= $order['harga'] ?>">
                    </div>
                </div>
                <div class="bensin__btns">
                    <button class="btn btn__back btn__bensin" type="button" id="pay-button">Metode Pembayaran</button>
                </div>
                <form id="payment-form" method="post" action="<?= site_url() ?>/snap/finish">
                    <input type="hidden" name="result_type" id="result-type" value="">
                    <input type="hidden" name="result_data" id="result-data" value="">
                </form>
            </div>
        </div>
    </div>
</main>

<?php $this->endSection(); ?>

<?php $this->section('js'); ?>

<script type="text/javascript">
    function rubah(angka) {
        var reverse = angka.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        return ribuan;
    }

    var tHarga = document.getElementById('total').value;
    document.getElementById('harga-total').innerHTML = 'Rp. ' + rubah(tHarga);

    $('#pay-button').click(function(event) {
        event.preventDefault();
        $(this).attr("disabled", "disabled");

        $.ajax({
            url: '<?= site_url() ?>/snap/token',
            cache: false,

            success: function(data) {
                //location = data;

                console.log('token = ' + data);

                var resultType = document.getElementById('result-type');
                var resultData = document.getElementById('result-data');

                function changeResult(type, data) {
                    $("#result-type").val(type);
                    $("#result-data").val(JSON.stringify(data));
                    //resultType.innerHTML = type;
                    //resultData.innerHTML = JSON.stringify(data);
                }

                snap.pay(data, {

                    onSuccess: function(result) {
                        changeResult('success', result);
                        console.log(result.status_message);
                        console.log(result);
                        $("#payment-form").submit();
                    },
                    onPending: function(result) {
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    },
                    onError: function(result) {
                        changeResult('error', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    }
                });
            }
        });
    });
</script>

<?php $this->endSection(); ?>