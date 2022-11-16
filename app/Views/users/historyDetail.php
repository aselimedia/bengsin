<?php $this->extend('layout/navbar'); ?>

<?php $this->section('content'); ?>

<main>
    <div class="container">
        <div class="table-transaction">
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
            <?php foreach ($detailTransaction as $detail) : ?>
                <div class="detail-toko">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th scope="col" width="150px">Nama Toko</th>
                                <th scope="col" width="5%">:</th>
                                <th scope="col"><?= $detail['nama_toko']; ?></th>
                            </tr>
                            <tr>
                                <th scope="col" width="150px">Tanggal</th>
                                <th scope="col" width="5%">:</th>
                                <th scope="col"><?= date('Y-m-d', $detail['tgl']) ?></th>
                            </tr>
                            <tr>
                                <th scope="col" width="150px">Status</th>
                                <th scope="col" width="5%">:</th>
                                <?php if ($detail['status_code'] == '200') : ?>
                                    <th scope="col"><span class="badge bg-success">Success</span></th>
                                <?php elseif ($detail['status_code'] == '201') : ?>
                                    <th scope="col"><span class="badge bg-warning text-dark">Pendding</span></th>
                                <?php elseif ($detail['status_code'] == '202') : ?>
                                    <th scope="col"><span class="badge bg-danger">Pendding</span></th>
                                <?php endif ?>
                            </tr>
                        </tbody>
                </div>
                <table class="table table-borderless">
                    <?php if ($detail['status_code'] == '201') : ?>
                        <span>*Note: if you have made a payment please refresh this page</span>
                    <?php endif; ?>
                    <tbody>
                        <tr class="table-secondary">
                            <th scope="col" width="20%">Order Transaction</th>
                            <th>:</th>
                            <td style="text-align: end;"><?= $detail['order_id'] ?></td>
                        </tr>
                        <tr class="table-default">
                            <th scope="col" width="20%">Jenis Barang</th>
                            <th>:</th>
                            <td style="text-align: end;"><?= $detail['jenis'] ?></td>
                        </tr>
                        <tr class="table-secondary">
                            <th scope="col" width="20%">Type</th>
                            <th>:</th>
                            <td style="text-align: end;"><?= $userHistory['jenis'] ?></td>
                        </tr>
                        <tr class="table-default">
                            <th scope="col" width="20%">Harga</th>
                            <th>:</th>
                            <td style="text-align: end;"><?= $detail['liter']; ?> x Rp. <?= number_format((intval($detail['gross_amount']) - 2500) / intval($detail['liter']), 2, ',', '.') ?></td>
                        </tr>
                        <tr class="table-secondary">
                            <th scope="col" width="20%">Biaya Admin</th>
                            <th>:</th>
                            <td style="text-align: end;">Rp. 2.500</td>
                        </tr>
                        <tr class="table-default">
                            <th scope="col" width="20%">Total</th>
                            <th>:</th>
                            <td style="text-align: end;">Rp. <?= number_format($detail['gross_amount'], 2, ',', '.') ?></td>
                        </tr>
                        <?php if ($detail['status_code'] == '200') : ?>
                            <tr class="table-secondary">
                                <th colspan="2" style="text-align: center;">Press WhatsApp button to send your location</th>
                                <td style="text-align: end;"><button type="button" class="btn btn-success btn-wa" onClick="javascript:window.open('https://wa.me/+62<?= $detail['no_hp'] ?>', '_blank');""><i class=" uil uil-whatsapp"></i></i> WhatsApp</button></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            <?php endforeach; ?>

            <!-- Transaction Tambal Ban -->

            <?php foreach ($detailTransactionTambal as $detail) : ?>
                <div class="detail-toko">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th scope="col" width="150px">Nama Toko</th>
                                <th scope="col" width="5%">:</th>
                                <th scope="col"><?= $detail['nama_toko']; ?></th>
                            </tr>
                            <tr>
                                <th scope="col" width="150px">Tanggal</th>
                                <th scope="col" width="5%">:</th>
                                <th scope="col"><?= date('Y-m-d', $detail['tgl']) ?></th>
                            </tr>
                            <tr>
                                <th scope="col" width="150px">Status</th>
                                <th scope="col" width="5%">:</th>
                                <?php if ($detail['status_code'] == '200') : ?>
                                    <th scope="col"><span class="badge bg-success">Success</span></th>
                                <?php else : ?>
                                    <th scope="col"><span class="badge bg-warning text-dark">Pendding</span></th>
                                <?php endif ?>
                            </tr>
                        </tbody>
                </div>
                <table class="table table-borderless">
                    <?php if ($detail['status_code'] == '201') : ?>
                        <span>*Note: if you have made a payment please refresh this page</span>
                    <?php endif; ?>
                    <tbody>
                        <tr class="table-secondary">
                            <th scope="col" width="20%">Order Transaction</th>
                            <th>:</th>
                            <td style="text-align: end;"><?= $detail['order_id'] ?></td>
                        </tr>
                        <tr class="table-default">
                            <th scope="col" width="20%">Jenis Barang</th>
                            <th>:</th>
                            <td style="text-align: end;"><?= $detail['jenis'] ?></td>
                        </tr>
                        <tr class="table-secondary">
                            <th scope="col" width="20%">Type</th>
                            <th>:</th>
                            <td style="text-align: end;"><?= $userHistoryTambal['jenis'] ?></td>
                        </tr>
                        <tr class="table-default">
                            <th scope="col" width="20%">Harga</th>
                            <th>:</th>
                            <td style="text-align: end;">1 x Rp. <?= number_format((intval($detail['gross_amount']) - 2500), 2, ',', '.') ?></td>
                        </tr>
                        <tr class="table-secondary">
                            <th scope="col" width="20%">Biaya Admin</th>
                            <th>:</th>
                            <td style="text-align: end;">Rp. 2.500</td>
                        </tr>
                        <tr class="table-default">
                            <th scope="col" width="20%">Total</th>
                            <th>:</th>
                            <td style="text-align: end;">Rp. <?= number_format($detail['gross_amount'], 2, ',', '.') ?></td>
                        </tr>
                        <?php if ($detail['status_code'] == '200') : ?>
                            <tr class="table-secondary">
                                <th colspan="2" style="text-align: center;">Press WhatsApp button to send your location</th>
                                <td style="text-align: end;"><button type="button" class="btn btn-success btn-wa" onClick="javascript:window.open('https://wa.me/+62<?= $detail['no_hp'] ?>', '_blank');""><i class=" uil uil-whatsapp"></i></i> WhatsApp</button></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            <?php endforeach; ?>
            <div class="button_detail-history">
                <div class="row">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-history" onclick="location.href='/history'"><i class="uil uil-arrow-left"></i> Back</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php $this->endSection(); ?>