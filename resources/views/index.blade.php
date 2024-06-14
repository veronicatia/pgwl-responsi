@extends('layouts.template')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">
    <style>
        html,
        body {
            height: 100%;
            width: 100%;
        }

        #map {
            height: calc(100vh - 56px);
            width: 100%;
            margin: 0;
        }

        .img-thumbnail {
            max-width: 100%;
            /* Atur lebar maksimal agar gambar tidak melebihi ukuran parent */
            height: auto;
            /* Biarkan tinggi menyesuaikan proporsi gambar */
        }
    </style>
@endsection

@section('content')
    <div id="map"></div>

    <!-- Modal Create Point -->
    <div class="modal fade" id="PointModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Obsevatorium dan Planetarium</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store-point') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Fill point name">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Alamat</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="geom" class="form-label">Koordinat</label>
                            <textarea class="form-control" id="geom" name="geom" rows="3" readonly></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="image_point" name="image"
                                onchange="document.getElementById('preview-image-point').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <div class="mb-3">
                            <img src="" alt="Preview" id="preview-image-point" class="img-thumbnail"
                                width="100">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Create Polygon -->
    <div class="modal fade" id="PolygonModal" tabindex="-1" aria-labelledby="PolygonModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Astrofotografi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store-polygon') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Fill point name">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Alamat</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="geom" class="form-label">Koordinat</label>
                            <textarea class="form-control" id="geom_polygon" name="geom" rows="3" readonly></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Foto</label>
                            <input type= "file" class="form-control" id="image_polygon" name="image"
                                onchange="document.getElementById
                            ('preview-image-polygon').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <div class="mb-3">
                            <img src="" alt="Preview" id="preview-image-polygon" class="img-thumbnail"
                                width="100">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="basemap-control" class="leaflet-top leaflet-right"></div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
    <script src="https://unpkg.com/terraformer@1.0.7/terraformer.js"></script>
    <script src="https://unpkg.com/terraformer-wkt-parser@1.1.2/terraformer-wkt-parser.js"></script>

    <script>
        var map = L.map('map').setView([-1.41856053, 115.61956851], 6);

        // Add OpenStreetMap tile layer to the map
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        /* Digitize Function */
        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);

        var drawControl = new L.Control.Draw({
            draw: {
                position: 'topleft',
                polyline: false,
                polygon: true,
                rectangle: true,
                circle: false,
                marker: true,
                circlemarker: false
            },
            edit: false
        });

        map.addControl(drawControl);

        map.on('draw:created', function(e) {
            var type = e.layerType,
                layer = e.layer;

            console.log(type);

            var drawnJSONObject = layer.toGeoJSON();
            var objectGeometry = Terraformer.WKT.convert(drawnJSONObject.geometry);

            console.log(drawnJSONObject);
            console.log(objectGeometry);

            if (type === 'marker') {
                $("#geom").val(objectGeometry);
                $("#PointModal").modal('show');
            } else if (type === 'polyline') {
                $("#geom_polyline").val(objectGeometry);
                $("#PolylineModal").modal('show');
            } else if (type === 'polygon' || type === 'rectangle') {
                $("#geom_polygon").val(objectGeometry);
                $("#PolygonModal").modal('show');
            }

            drawnItems.addLayer(layer);
        });

        // Define basemaps
        var basemaps = {
            "OpenStreetMap": L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }),
            "Esri World Imagery": L.tileLayer(
                'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                    maxZoom: 19,
                    attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
                }),
            "CartoDB Dark Matter": L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
                maxZoom: 19,
                attribution: 'Map tiles by <a href="https://carto.com/attributions">Carto</a>, under <a href="https://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>. Data by <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            })
            // Add more basemaps as needed
        };

        // Initial basemap
        basemaps["OpenStreetMap"].addTo(map);

        // Basemap control
        L.control.layers(basemaps).addTo(map);

        // Function to switch basemaps
        function switchBasemap(basemapName) {
            map.eachLayer(function(layer) {
                if (layer instanceof L.TileLayer && !layer._url.includes('leaflet.draw')) {
                    map.removeLayer(layer);
                }
            });
            basemaps[basemapName].addTo(map);
        }

        // Example usage to switch basemap (you can trigger this as needed)
        // switchBasemap("Esri World Imagery");


        /* GeoJSON Point */
        var point = L.geoJson(null, {
            onEachFeature: function(feature, layer) {
                var imagePath = "{{ asset('storage/images/') }}/" + feature.properties.image;
                var popupContent = "Nama: " + feature.properties.name + "<br>" +
                    "Alamat: " + feature.properties.description + "<br>" +
                    "Foto: <img src='" + imagePath + "' class='img-thumbnail' alt='Gambar tidak ditemukan'>" +
                    "<br>" +
                    "<div class='d-flex flex-row mt-3'>" +
                    "<a href='{{ url('edit-point') }}/" + feature.properties.id +
                    "' class='btn btn-sm btn-warning me-2'><i class='fa-solid fa-edit'></i></a>" +
                    "<form action='{{ url('delete-point') }}/" + feature.properties.id +
                    "' method='POST' onsubmit='return confirm(\"Yakin Anda ingin menghapus data ini?\")'>" +
                    '{{ csrf_field() }}' +
                    '{{ method_field('DELETE') }}' +
                    "<button type='submit' class='btn btn-danger'><i class='fa-solid fa-trash-can'></i></button>" +
                    "</form>" +
                    "</div>";

                layer.on({
                    click: function(e) {
                        layer.bindPopup(popupContent).openPopup(e.latlng);
                    },
                    mouseover: function(e) {
                        layer.bindTooltip(feature.properties.name, {
                            sticky: true
                        });
                    }
                });
            }
        });

        $.getJSON("{{ route('api.points') }}", function(data) {
            point.addData(data);
            map.addLayer(point);
        });

        /* GeoJSON Polygon */
        var polygon = L.geoJson(null, {
            onEachFeature: function(feature, layer) {
                var imagePath = "{{ asset('storage/images/') }}/" + feature.properties.image;
                var popupContent = "Nama: " + feature.properties.name + "<br>" +
                    "Alamat: " + feature.properties.description + "<br>" +
                    "Foto: <img src='" + imagePath + "' class='img-thumbnail' alt='Gambar tidak ditemukan'>" +
                    "<br>" +
                    "<div class='d-flex flex-row mt-3'>" +
                    "<a href='{{ url('edit-polygon') }}/" + feature.properties.id +
                    "' class='btn btn-sm btn-warning me-2'><i class='fa-solid fa-edit'></i></a>" +
                    "<form action='{{ url('delete-polygon') }}/" + feature.properties.id +
                    "' method='POST' onsubmit='return confirm(\"Yakin Anda ingin menghapus data ini?\")'>" +
                    '{{ csrf_field() }}' +
                    '{{ method_field('DELETE') }}' +
                    "<button type='submit' class='btn btn-danger'><i class='fa-solid fa-trash-can'></i></button>" +
                    "</form>" +
                    "</div>";

                layer.on({
                    click: function(e) {
                        layer.bindPopup(popupContent).openPopup(e.latlng);
                    },
                    mouseover: function(e) {
                        layer.bindTooltip(feature.properties.name, {
                            sticky: true
                        });
                    }
                });
            }
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
