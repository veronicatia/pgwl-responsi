@extends('layouts.template')

@section('styles')
    <style>
        html,
        body {
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
        }

        .map-container {
            position: relative;
            height: 600px;
            /* Adjust this height as needed */
        }

        #map {
            height: 100%;
            width: 100%;
        }

        .card-container {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .card {
            flex: 1;
            margin: 0 10px;
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-body {
            background-color: #f8f9fa;
            padding: 20px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .card-body p {
            margin-bottom: 0;
        }
    </style>
@endsection

@section('content')
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
                <button class="carousel-control-prev" type="button" data-bs-target="#dataCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#dataCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Cards Section -->

    <div class="card-container" style="display: flex; justify-content: space-between;">
        <div class="card" style="flex: 1; margin-right: 10px;">
            <div class="card-header" style="background-color: #343a40; color: #fff;">Persebaran Lokasi Observatorium dan
                Planetarium</div>
            <div class="card-body">
                <p style="text-align: justify;">
                    Indonesia memiliki beberapa observatorium yang penting dalam bidang astronomi. Observatorium Bosscha di
                    Lembang, Jawa Barat, misalnya, didirikan pada tahun 1923 oleh pemerintah Hindia Belanda dan hingga kini
                    masih aktif sebagai pusat penelitian. Di samping itu, terdapat pula Observatorium Gunung Timau di Timor
                    Timur, yang juga memberikan kontribusi besar dalam pengamatan benda langit di wilayah timur Indonesia.
                    <br>
                    Planetarium di Indonesia berfungsi sebagai pusat edukasi dan publikasi ilmu pengetahuan astronomi kepada
                    masyarakat luas. Planetarium Jakarta misalnya, berlokasi di Taman Ismail Marzuki, Jakarta Pusat, dan
                    menyediakan berbagai program untuk memperkenalkan dunia astronomi kepada anak-anak hingga dewasa. Selain
                    itu, Planetarium Bosscha di Bandung, Jawa Barat, juga merupakan salah satu yang terkemuka di Indonesia
                    dengan koleksi peralatan yang lengkap untuk kegiatan edukasi dan penelitian.
                </p>
            </div>
        </div>

        <div class="card" style="flex: 1; margin-left: 10px;">
            <div class="card-header" style="background-color: #343a40; color: #fff;">Persebaran Lokasi Astrofotografi</div>
            <div class="card-body">
                <p style="text-align: justify;">
                    Indonesia menawarkan langit yang indah dan minim polusi cahaya di beberapa lokasi tertentu, membuatnya
                    ideal untuk astrofotografi. Pulau-pulau terpencil di Indonesia, seperti Pulau Komodo atau Pulau Weh,
                    memberikan pandangan langit malam yang menakjubkan. Komunitas astrofotografi di Indonesia semakin
                    berkembang, dan lokasi-langkah astronomi semacam itu menarik minat para pecinta bintang dan fotografi
                    malam.
                </p>
            </div>
        </div>
    </div>


    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Lokasi Persebaran Observatorium, Planetarium, dan Astrofotografi</h2>
            </div>
        </div>
    </div>

    <br>
    <!-- Map Container -->
    <div class="map-container">
        <div id="map"></div>
    </div>
    <br>
    <br>
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

@endsection

@section('script')
    <script>
        var map = L.map('map').setView([-1.41856053, 115.61956851], 5);

        // Add OpenStreetMap tile layer to the map
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        /* GeoJSON Point */
        var point = L.geoJson(null, {
            onEachFeature: function(feature, layer) {
                var popupContent = "Nama: " + feature.properties.name + "<br>" +
                    "Alamat: " + feature.properties.description + "<br>" +
                    "Foto: <img src='{{ asset('storage/images/') }}/" + feature.properties.image +
                    "' class='img-thumbnail' alt='...'>";
                layer.on({
                    click: function(e) {
                        point.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        point.bindTooltip(feature.properties.name);
                    },
                });
            },
        });
        $.getJSON("{{ route('api.points') }}", function(data) {
            point.addData(data);
            map.addLayer(point);
        });
        /* GeoJSON Polyline */
        var polyline = L.geoJson(null, {
            onEachFeature: function(feature, layer) {
                var popupContent = "Nama: " + feature.properties.name + "<br>" +
                    "Deskripsi: " + feature.properties.description + "<br>" +
                    "Foto: <img src='{{ asset('storage/images/') }}/" + feature.properties.image +
                    "' class='img-thumbnail' alt='...'>";
                layer.on({
                    click: function(e) {
                        polyline.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        polyline.bindTooltip(feature.properties.name);
                    },
                });
            },
        });
        $.getJSON("{{ route('api.polylines') }}", function(data) {
            polyline.addData(data);
            map.addLayer(polyline);
        });
        /* GeoJSON Polygon */
        var polygon = L.geoJson(null, {
            onEachFeature: function(feature, layer) {
                var popupContent = "Nama: " + feature.properties.name + "<br>" +
                    "Deskripsi: " + feature.properties.description + "<br>" +
                    "Foto: <img src='{{ asset('storage/images/') }}/" + feature.properties.image +
                    "' class='img-thumbnail' alt='...'>";
                layer.on({
                    click: function(e) {
                        polygon.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        polygon.bindTooltip(feature.properties.name);
                    },
                });
            },
        });
        $.getJSON("{{ route('api.polygons') }}", function(data) {
            polygon.addData(data);
            map.addLayer(polygon);
        });

        // layer control
        var overlayMaps = {
            "Observatorium dan Planetarium": point,
            "Astrofotografi": polygon
        };

        var layerControl = L.control.layers(null, overlayMaps, {
            collapsed: false
        }).addTo(map);
    </script>
@endsection
