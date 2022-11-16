<?php $this->extend('layout/navbar'); ?>

<?php $this->section('content'); ?>

<main>
    <div class="container">
        <div class="tips">
            <div class="row">
                <div class="col-12">
                    <p class="activity bengsin-tips">Bengsin’s Tips</p>
                </div>
                <div class="col-md-4 col-sm-6 col-12" data-bs-toggle="modal" data-bs-target="#tips-first" style="cursor: pointer;">
                    <div class="image-tips-first">
                        <span class="tips-text">Pahami Mesin Saat Mobil</span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12" data-bs-toggle="modal" data-bs-target="#tips-second" style="cursor: pointer;">
                    <div class="image-tips-second">
                        <span class="tips-text">Ciri-ciri Motor Perlu Ganti Oli</span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-12" data-bs-toggle="modal" data-bs-target="#tips-third" style="cursor: pointer;">
                    <div class="image-tips-third">
                        <span class="tips-text">Rutin Melakukan Service Kendaraan</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal first -->
        <div class="modal fade" id="tips-first" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pahami Mesin Saat Mobil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="image-tips-first"></div>
                            </div>
                        </div>
                        <p>Secara prinsip kerjanya, mesin dibedakan menjadi tiga macam yakni 2 tak, 4 tak, dan motor wangkle</p>
                        <ol class="numbering">
                            <li>Mesin dua tak merupakan engine yang menggunakan dua langkah dalam setiap siklus mesin, contohnya pada Bajai Orange, Kawasaki Nina RR dan Old Vesva. Namun sekarang mesin-mesim dua tak sudah tidak diproduksi alasannya emisi dari mesin ini cukup besar.</li>
                            <li>Sementara mesin 4 tak hampir digunakan pada seluruh mobil dan motor didunia, Hal ini dikarenakan motor 4 tak memiliko konsumsi bahan bakar lebih irit dan emisinya lebih terjamin. Untuk pembelajaran, kita hanya membahas mesin 4 tak alasannya karena mesin ini yang umum dipakai pada mobil-mobil sekarang.</li>
                            <li>Motor wankle merupakan jenis mesin yang tidak menggunakan piston. Sebenarnya ada pistonnya namun bentuknya tidak seperti mesin pada umumnya, pergerakan mesin ini juga berbeda dengan mesin-mesin umum. Contohnya adalah Mazda RX series yang menggunakan wangkle sebagai dapur pacunya.</li>
                        </ol>
                        <p>Sementara berdasarkan bahan bakarnya, juga ada tiga jenis mesin mobil yakni:</p>
                        <ol class="numbering">
                            <b>
                                <li>Mesin Bensin</li>
                            </b>
                            <p>Sesuai namanya mesin bensin menggunakan bensin sebagai bahan bakar utama. Mesin ini lebih tenang dan lebih cepat putarannya dibandingkan tipe lain.</p>
                            <b>
                                <li>Mesin diesel</li>
                            </b>
                            <p>Untuk mesin diesel digunakan pada truk dan bus dengan bahan bakar solar. Kelebihan diesel adalah torsinya yang cukup besar meski top RPMnya tidak sekencang Mesin bensin</p>
                            <b>
                                <li>Mesin BBG</li>
                            </b>
                            <p>Mesin ini mulai marak digunakan pada kendaraan jenis bajai dan transjakarta di ibukota. Mungkin anda pernah melihat bajai berwarna biru dengan label BBG, itu menggunakan bahan bakar gas LPG.</p>
                        </ol>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Second -->
        <div class="modal fade" id="tips-second" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ciri-ciri Motor Perlu Ganti Oli</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="image-tips-second"></div>
                            </div>
                        </div>
                        <p>Secara prinsip kerjanya, mesin dibedakan menjadi tiga macam yakni 2 tak, 4 tak, dan motor wangkle</p>
                        <ol class="numbering">
                            <li>Mesin dua tak merupakan engine yang menggunakan dua langkah dalam setiap siklus mesin, contohnya pada Bajai Orange, Kawasaki Nina RR dan Old Vesva. Namun sekarang mesin-mesim dua tak sudah tidak diproduksi alasannya emisi dari mesin ini cukup besar.</li>
                            <li>Sementara mesin 4 tak hampir digunakan pada seluruh mobil dan motor didunia, Hal ini dikarenakan motor 4 tak memiliko konsumsi bahan bakar lebih irit dan emisinya lebih terjamin. Untuk pembelajaran, kita hanya membahas mesin 4 tak alasannya karena mesin ini yang umum dipakai pada mobil-mobil sekarang.</li>
                            <li>Motor wankle merupakan jenis mesin yang tidak menggunakan piston. Sebenarnya ada pistonnya namun bentuknya tidak seperti mesin pada umumnya, pergerakan mesin ini juga berbeda dengan mesin-mesin umum. Contohnya adalah Mazda RX series yang menggunakan wangkle sebagai dapur pacunya.</li>
                        </ol>
                        <p>Sementara berdasarkan bahan bakarnya, juga ada tiga jenis mesin mobil yakni:</p>
                        <ol class="numbering">
                            <b>
                                <li>Mesin Bensin</li>
                            </b>
                            <p>Sesuai namanya mesin bensin menggunakan bensin sebagai bahan bakar utama. Mesin ini lebih tenang dan lebih cepat putarannya dibandingkan tipe lain.</p>
                            <b>
                                <li>Mesin diesel</li>
                            </b>
                            <p>Untuk mesin diesel digunakan pada truk dan bus dengan bahan bakar solar. Kelebihan diesel adalah torsinya yang cukup besar meski top RPMnya tidak sekencang Mesin bensin</p>
                            <b>
                                <li>Mesin BBG</li>
                            </b>
                            <p>Mesin ini mulai marak digunakan pada kendaraan jenis bajai dan transjakarta di ibukota. Mungkin anda pernah melihat bajai berwarna biru dengan label BBG, itu menggunakan bahan bakar gas LPG.</p>
                        </ol>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Third -->
        <div class="modal fade" id="tips-third" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rutin Melakukan Service Kendaraan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="image-tips-third"></div>
                            </div>
                        </div>
                        <p>Secara prinsip kerjanya, mesin dibedakan menjadi tiga macam yakni 2 tak, 4 tak, dan motor wangkle</p>
                        <ol class="numbering">
                            <li>Mesin dua tak merupakan engine yang menggunakan dua langkah dalam setiap siklus mesin, contohnya pada Bajai Orange, Kawasaki Nina RR dan Old Vesva. Namun sekarang mesin-mesim dua tak sudah tidak diproduksi alasannya emisi dari mesin ini cukup besar.</li>
                            <li>Sementara mesin 4 tak hampir digunakan pada seluruh mobil dan motor didunia, Hal ini dikarenakan motor 4 tak memiliko konsumsi bahan bakar lebih irit dan emisinya lebih terjamin. Untuk pembelajaran, kita hanya membahas mesin 4 tak alasannya karena mesin ini yang umum dipakai pada mobil-mobil sekarang.</li>
                            <li>Motor wankle merupakan jenis mesin yang tidak menggunakan piston. Sebenarnya ada pistonnya namun bentuknya tidak seperti mesin pada umumnya, pergerakan mesin ini juga berbeda dengan mesin-mesin umum. Contohnya adalah Mazda RX series yang menggunakan wangkle sebagai dapur pacunya.</li>
                        </ol>
                        <p>Sementara berdasarkan bahan bakarnya, juga ada tiga jenis mesin mobil yakni:</p>
                        <ol class="numbering">
                            <b>
                                <li>Mesin Bensin</li>
                            </b>
                            <p>Sesuai namanya mesin bensin menggunakan bensin sebagai bahan bakar utama. Mesin ini lebih tenang dan lebih cepat putarannya dibandingkan tipe lain.</p>
                            <b>
                                <li>Mesin diesel</li>
                            </b>
                            <p>Untuk mesin diesel digunakan pada truk dan bus dengan bahan bakar solar. Kelebihan diesel adalah torsinya yang cukup besar meski top RPMnya tidak sekencang Mesin bensin</p>
                            <b>
                                <li>Mesin BBG</li>
                            </b>
                            <p>Mesin ini mulai marak digunakan pada kendaraan jenis bajai dan transjakarta di ibukota. Mungkin anda pernah melihat bajai berwarna biru dengan label BBG, itu menggunakan bahan bakar gas LPG.</p>
                        </ol>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php $this->endSection(); ?>