<?php $this->extend('layout/navbar'); ?>

<?php $this->section('content'); ?>

<main>
    <div class="container">
        <div class="history">
            <div class="row">
                <div class="col-6">
                    <p class="activity">My Activity</p>
                </div>
                <div class="col-6">
                    <p class="activity__history d-flex justify-content-end"">History</p>
                </div>
                <div class=" col-12">
                    <p class="recent">Recent</p>
                </div>
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
                                    <?php elseif ($history['status_code'] == "201") : ?>
                                        <span class="badge bg-warning text-dark">Pendding</span>
                                    <?php elseif ($history['status_code'] == "202") : ?>
                                        <span class="badge bg-danger">Expired</span>
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
    </div>
    </div>
    </div>
</main>

<?php $this->endSection(); ?>