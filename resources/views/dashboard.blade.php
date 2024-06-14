<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container py-12">
        <!-- Carousel Gambar di Bagian Atas -->
        <div class="row mb-4">
            <div class="col-md-12">
                <div id="dataCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('assets/1.png') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/2.png') }}" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#dataCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#dataCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Card Konten dengan Sub-Card -->
        <div class="row mb-4">
            <div class="col-md-12">
                <!-- Card 1 -->
                <div class="card mb-4">
                    <div class="row no-gutters">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title">Observatorium dan Planetarium</h4>
                                <p class="card-text" style="text-align: justify;">
                                    Observatorium dan planetarium adalah dua jenis fasilitas astronomi yang berfungsi
                                    untuk mempelajari dan mengamati objek-objek di langit. Observatorium sering kali
                                    merupakan kompleks bangunan yang dilengkapi dengan teleskop-teleskop canggih dan
                                    peralatan pengamatan lainnya. Fungsinya utamanya adalah untuk mengamati benda langit
                                    seperti bintang, planet, komet, dan objek angkasa lainnya. Observatorium biasanya
                                    terletak di tempat-tempat yang jauh dari cahaya kota dan polusi udara agar
                                    pengamatan astronomi bisa dilakukan dengan optimal.
                                    <br><br>
                                    Sementara itu, planetarium adalah fasilitas yang didesain untuk mensimulasikan
                                    langit seperti yang terlihat dari Bumi. Biasanya planetarium dilengkapi dengan
                                    proyektor langit yang mampu menampilkan gambar bintang-bintang, planet, dan galaksi
                                    di dinding kubah semacam planetarium. Fungsinya tidak hanya untuk pendidikan dan
                                    penelitian astronomi, tetapi juga untuk mengedukasi masyarakat umum tentang kosmos
                                    dan gerakannya. Planetarium sering digunakan untuk menyajikan pertunjukan visual dan
                                    edukasi mengenai fenomena astronomi, sejarah astronomi, serta eksplorasi ruang
                                    angkasa.
                                    <br><br>
                                    Kedua fasilitas ini memiliki peran penting dalam mempromosikan pemahaman manusia
                                    tentang alam semesta dan melibatkan masyarakat dalam penelitian serta penjelajahan
                                    astronomi. Meskipun fokus dan fungsi keduanya berbeda, observatorium dan planetarium
                                    sama-sama berkontribusi dalam mendukung pengembangan ilmu pengetahuan astronomi
                                    serta meningkatkan minat dan pengetahuan publik tentang keajaiban alam semesta yang
                                    luas.
                                </p>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="card m-3" style="background-color: #0d2843; color: #fff;">
                                <div class="card-body text-center">
                                    <h4 class="card-title"><i class="fa-solid fa-location-dot" style="color: #555555;"></i> Total Obsevatorium dan Planetarium</h4>
                                    <p style="font-size: 28pt">{{ $total_points }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Card 3 -->
                <div class="card mb-4">
                    <div class="row no-gutters">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title">Astrofotografi</h4>
                                <p class="card-text" style="text-align: justify;">

                                    Astrofotografi adalah seni mengambil gambar langit malam dan objek-objek angkasa
                                    menggunakan teknik fotografi khusus. Salah satu faktor krusial dalam astrofotografi
                                    adalah pemilihan lokasi yang tepat. Lokasi yang ideal untuk astrofotografi harus
                                    memiliki langit yang minim polusi cahaya dari perkotaan agar objek langit dapat
                                    terlihat dengan jelas. Observasi terbaik sering kali dilakukan di tempat-tempat
                                    terpencil jauh dari cahaya kota, seperti pegunungan, padang gurun, atau pesisir
                                    pantai yang tidak terlalu tercemar oleh sinar buatan manusia.
                                    <br><br>
                                    Selain itu, faktor lain yang penting dalam memilih lokasi untuk astrofotografi
                                    adalah kondisi cuaca yang stabil dan jernih. Lokasi dengan cuaca yang sering cerah
                                    dan minim awan biasanya lebih disukai, karena ini memungkinkan untuk mengambil
                                    gambar yang tajam dan detail dari objek-objek angkasa tanpa gangguan cuaca. Beberapa
                                    fotografer astro sering memilih tempat-tempat yang memiliki musim kering panjang
                                    atau musim gugur, di mana langit cenderung lebih cerah dan transparan untuk
                                    menghasilkan hasil yang optimal dalam astrofotografi. Dengan memperhatikan kedua
                                    faktor ini, fotografer dapat meningkatkan kemungkinan untuk mengabadikan keindahan
                                    alam semesta dengan detail yang memukau.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card m-3" style="background-color: #0d2843; color: #fff;">
                                <div class="card-body text-center">
                                    <h4 class="card-title"><i class="fa-solid fa-location-dot" style="color: #555555;"></i> Total Lokasi Astrofotografi</h4>
                                    <p style="font-size: 28pt">{{ $total_polygons }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer bg-dark text-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <br>
                        <br>
                        <h5>Informasi Kontak</h5>
                        <ul class="list-unstyled">
                            <li>Alamat: Jalan Arjuna, Tlogoadi, Mlati, Sleman</li>
                            <li>Telepon: 62 813-9104-2231</li>
                            <li>Email: veronicatianingrum@mail.ugm.ac.id</li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <br>
                        <br>
                        <div class="d-flex justify-content-end">
                            <div class="social-media">
                                <h5>Sosial Media</h5>
                                <ul class="list-unstyled">
                                    <li><a href="https://www.facebook.com/checkpoint/1501092823525282/?next=https%3A%2F%2Fwww.facebook.com%2Fdtk.sv.ugm%2F"><i class="fab fa-facebook"></i> Facebook</a></li>
                                    <li><a href="https://x.com/str_sig_ugm"><i class="fab fa-twitter"></i> Twitter</a></li>
                                    <li><a href="https://www.instagram.com/dtk.sv.ugm/"><i class="fab fa-instagram"></i> Instagram</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p>&copy; 2024 IndoSky. Hak Cipta Dilindungi.</p>
                    </div>
                </div>
            </div>
        </footer>


    </div>
</x-app-layout>
