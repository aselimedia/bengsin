<?php $this->extend('layout/navbar'); ?>

<?php $this->section('content'); ?>

<main>
    <div class="container">
        <?php if (!empty(session()->getFlashdata('fail'))) : ?>
            <div class="col-12" style="margin-top: 20px; text-align:center;">
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('fail'); ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if (!empty(session()->getFlashdata('success'))) : ?>
            <div class="col-12" style="margin-top: 20px; text-align:center;">
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if (isset($validation)) : ?>
            <div class="col-12" style="margin-top: 20px; text-align:center;">
                <div class="alert alert-danger" role="alert">
                    <?= $validation->listErrors() ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="setting__account">
            <form style="margin-top: 30px" action="/account/setting" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12 setting">
                        <div class="image__setting-up">
                            <img src="<?= base_url() ?>/assets/image/<?= $userInfo['image'] ?>" alt="" id="photo">
                            <input type="file" class="my_file" name="sampul" id="file" onchange="previewImg()">
                            <label for="file" id="uploadButton"><i class="uil uil-camera"></i></label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" value="<?= $userInfo['name'] ?>" disabled>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" value="<?= $userInfo['email'] ?>" disabled>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" class="btn btn-save" value="Save">
                    </div>
                    <div class="col-12">
                        <input onclick="location.href='/account'" type="button" class="btn btn-back-setting" value="Back">
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<?php $this->endSection(); ?>

<?php $this->section('js'); ?>

<script lang="javascript">
    function previewImg() {
        const sampul = document.getElementById('file')
        const sampulLabel = document.querySelector('.my_file')
        const imgPreview = document.querySelector('#photo')

        sampulLabel.textContent = sampul.files[0].name

        const fileSampul = new FileReader();
        fileSampul.readAsDataURL(sampul.files[0])

        fileSampul.onload = function(e) {
            imgPreview.src = e.target.result
        }
    }
</script>

<?php $this->endSection(); ?>