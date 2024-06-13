@extends('layouts.tamplate')

@section('styles')
    <style>
        html,
        body,
        {
        height: 100%;
        width: 100%;
        }

        #map {
            height: calc(100vh - 56px);
            width: 100%;
            margin: 0;
        }
    </style>
@endsection

@section('content')
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><i class="fa-solid fa-map"></i> Labirin Pogung</a>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                    {{-- <li class="nav-item"><a class="nav-link" href="#info">Info</a></li> --}}
                    <li class="nav-item"><a class="nav-link" href="#profil">Profil</a></li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="{{ route('login') }}"><i
                                class="fa-solid fa-right-to-bracket"></i>
                            Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Tema -->
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check2" viewBox="0 0 16 16">
            <path
                d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
        </symbol>
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path
                d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
            <path
                d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path
                d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
        </symbol>
    </svg>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button"
            aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
            <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
                <use href="#circle-half"></use>
            </svg>
            <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"
                    aria-pressed="false">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#sun-fill"></use>
                    </svg>
                    Light
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
                    aria-pressed="false">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#moon-stars-fill"></use>
                    </svg>
                    Dark
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto"
                    aria-pressed="true">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#circle-half"></use>
                    </svg>
                    Auto
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
        </ul>
    </div>


    <!-- Tampilan header-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-heading text-uppercase">Labirin Pogung</div>
            <div class="masthead-subheading">Pemberian informasi jalan alternatif ketika portal di Pogung ditutup</div>
            <a class="btn btn-warning btn-xl text-uppercase" href="{{ route('map-public') }}">Map</a>
        </div>
    </header>


    <!-- Tentang -->
    <section class="page-section" id="tentang">
        <div class="container">
            <div class="text-center">
                <h1 class="section-heading text-uppercase">Tentang</h1>
                <h2 class="section-heading text-uppercase">Labirin Pogung</h2>
                <h3 class="section-subheading text-muted">Pogung adalah sebuah kawasan yang terletak di dekat Universitas
                    Gadjah Mada (UGM) di Yogyakarta, Indonesia. Kawasan ini dikenal sebagai salah satu daerah yang ramai dan
                    hidup, terutama karena keberadaannya yang sangat dekat dengan kampus UGM, universitas terbesar dan
                    tertua di Indonesia. Pogung menjadi tempat tinggal favorit bagi banyak mahasiswa UGM karena lokasinya
                    yang strategis. Banyak kos-kosan dan asrama mahasiswa yang tersebar di seluruh kawasan ini, menawarkan
                    berbagai pilihan tempat tinggal mulai dari yang sederhana hingga yang lebih eksklusif. Meskipun Pogung
                    merupakan daerah yang ramai, lingkungan di sini relatif aman dan nyaman. Banyak jalan-jalan kecil yang
                    memungkinkan penghuni untuk berjalan kaki atau bersepeda dengan tenang. Kawasan ini juga memiliki
                    sejumlah ruang hijau yang bisa digunakan untuk bersantai atau berolahraga.</h3>
                <h3 class="section-subheading text-muted">Pogung memang dikenal sebagai kawasan yang aman dan nyaman untuk ditinggali, terutama bagi mahasiswa.
                    Salah satu fitur keamanan yang diterapkan di daerah ini adalah adanya portal jalan di setiap lorong atau
                    jalan kecil. Portal ini biasanya ditutup pada jam 10 malam, yang membantu menjaga keamanan lingkungan
                    dengan membatasi akses kendaraan dan orang yang tidak dikenal pada malam hari.
                    Dengan adanya kebijakan penutupan portal jalan tersebut, seringkali penghuni atau pengunjung Pogung
                    membutuhkan informasi mengenai rute alternatif. Untuk itu, pembuatan WebGIS (Sistem Informasi Geografis
                    berbasis web) Labirin Pogung sangat berguna.</h3>
                            </div>
        <div>
            <h2>Tujuan WebGIS Labirin Pogung</h2>
            <ol>
                <li><strong>Informasi jalan alternatif</strong></li>
                    <p>Membantu penghuni dan pengunjung menemukan rute alternatif ketika portal jalan ditutup. Ini sangat bermanfaat bagi mereka yang harus keluar atau masuk kawasan Pogung setelah jam 10 malam. </p>
                <li><strong>Meningkatkan Kemanan</strong></li>
                    <p>Pengguna dapat menghindari jalan-jalan yang kurang aman atau tidak familiar. Ini membantu menjaga keselamatan mereka saat bepergian pada malam hari.</p>
                <li><strong>Mempermudah Navigasi</strong></li>
                    <p>Mempermudah pengguna dalam menavigasi area Pogung, terutama bagi mereka yang baru pertama kali mengunjungi kawasan ini atau yang belum familiar dengan semua jalan dan lorong.</p>
                <li><strong>Efisiensi Waktu</strong></li>
                    <p>pengguna dapat menghemat waktu dan mengurangi kebingungan saat mencari jalan di tengah malam.</p>
            </ol>

        </div>
            {{-- <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <img src="img/tentang/mustika.png" alt="Ekonomi Image" class="img-fluid" width="130"
                            height="150">
                    </span>
                    <h4 class="my-3">Kota Mustika</h4>
                    <p class="text-muted">Blora dikenal dengan sebutan Kota Mustika yang terkenal. Istilah "Mustika" ini
                        merupakan
                        singkatan dari Maju, Unggul, Sehat, Tertib, Indah, Berkelanjutan, dan Aman, yang menjadi julukan
                        yang paling
                        terkemuka untuk daerah tersebut.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <img src="img/tentang/sate.png" alt="Ekonomi Image" class="img-fluid" width="130"
                            height="150">
                    </span>
                    <h4 class="my-3">Kota Sate</h4>
                    <p class="text-muted">Blora dijuluki sebagai Kota Sate karena wilayah ini memiliki olahan sate dengan
                        bumbu
                        khas Blora. Selain bumbunya yang khas, Sate Blora juga disajikan dengan cara yang berbeda dari sate
                        lain.
                        Sate Blora disajikan
                        dengan nasi yang diberi kuah por berwarna kuning dengn ditaburi bawang goreng. Keunikan Sate Blora
                        juga bisa
                        ditemukan saat makan di tempat atau di warung satenya. Pengunjung tidak harus beli secara kelipatan,
                        namun
                        bisa beli secara eceran.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <img src="img/tentang/barongan.png" alt="Ekonomi Image" class="img-fluid" width="130"
                            height="150">
                    </span>
                    <h4 class="my-3">Kota Barongan</h4>
                    <p class="text-muted">Hal ini didapatkan dari keseniannya, yaitu Tari Barongan. Tarian ini cukup
                        populer di
                        wilayah Jawa Tengah dan sekitarnya. Maksud dari tarian ini adalah melukiskan pertempuran antara
                        kejahatan
                        dengan kebaikan. Hingga saat ini, Tari
                        Barongan masih dipertahankan oleh masyarakat setempat.</p>
                </div> --}}
        </div>
        </div>
    </section>


    <!-- Profil -->
    <section class="page-section bg-light " id="profil">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Profil</h2>
            </div>
            <div class="row">
                <div class="align-items-center">
                    <div class="team-member text-center">
                        <img class="mx-auto rounded-circle img-fluid" src="/storage/images/profil.jpeg"
                            alt="Trisna Diah Ayu Wulandari" style="width: 200px; height: 200px;" />
                        <h4>Trisna Diah Ayu Wulandari</h4>
                        <p class="text-muted">22/505883/SV/21979</p>
                        <a class="btn btn-dark btn-social mx-2" href="https://x.com/trischies?s=20"
                            aria-label="Trisna Twitter Profile">
                            <i class="fa-brands fa-x-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/ttrisnaaa/"
                            aria-label="Trisna IG Profile">
                            <i class="fa-brands fa-instagram fa-xl" style="color: #fcfcfc;"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

{{--
@section('script')
    <script>
        // map
        var map = L.map('map').setView([-7.7605283, 110.375388], 17);
        // layer
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);


        /* GeoJSON Point */
        var point = L.geoJson(null, {
            onEachFeature: function(feature, layer) {
                var popupContent = "Name: " + feature.properties.name + "<br>" +
                    "Description: " + feature.properties.description + "<br>" +
                    "Photo: <img src='{{ asset('storage/images/') }}/" + feature.properties.image +
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
                var popupContent = "Name: " + feature.properties.name + "<br>" +
                "Description: " + feature.properties.description + "<br>" +
                    "Photo: <img src='{{ asset('storage/images/') }}/" + feature.properties.image +
                    "' class='img-thumbnail' alt='...'>";
                layer.on({
                    click: function(e) {
                        polyline.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        polyline.bindTooltip(feature.properties.kab_kota);
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
                var popupContent = "Name: " + feature.properties.name + "<br>" +
                "Description: " + feature.properties.description + "<br>" +
                    "Photo: <img src='{{ asset('storage/images/') }}/" + feature.properties.image +
                    "' class='img-thumbnail' alt='...'>" ;


                layer.on({
                    click: function(e) {
                        polygon.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        polygon.bindTooltip(feature.properties.kab_kota);
                    },
                });
            },
        });
        $.getJSON("{{ route('api.polygons') }}", function(data) {
            polygon.addData(data);
            map.addLayer(polygon);
        });

        //layer control
        var overlayMaps = {
            "Point": point,
            "Polyline": polyline,
            "Polygon": polygon
        };

        var layerControl = L.control.layers(null, overlayMaps, {
            collapsed: false
        }).addTo(map);
    </script> --}}
{{-- @endsection --}}
