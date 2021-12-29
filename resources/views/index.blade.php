<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ asset('adminkit/static/img/icons/icon-48x48.png') }}" />

    <title>Go And Back</title>

    {{-- css --}}
    <link href="{{asset('adminkit/static/css/app.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        .card-hover {
            transition: all .2s ease-in-out;
        }

        .card-hover:hover {
            transform: scale(1.1);
        }

    </style>
</head>

<body class="bg-light">
    <div class="container">
        {{-- navbar --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <i class="align-middle" data-feather="camera">
                        <</i>Go And Back </a> <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page"
                                            href="#carouselExampleSlidesOnly">Beranda</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#item">Items</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#tim">Tim</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#tentangkami">Tentang Kami</a>
                                    </li>
                                </ul>
                            </div>
            </div>
        </nav>
        {{-- end navbar --}}

        {{-- content --}}
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('adminkit/src/img/photos/carousel.jpg') }}" width="1175px" height="350px"
                        class="d-block" alt="...">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row text-center">
                <div class="rounded p-4" style="background-color: #deded5;">
                    <h1 style="letter-spacing: 2px; color: #818963;">Sewa Kamera Go And Back Magelang</h1>
                    <p>Nikmati berbagai kemudahan sewa kamera di Go And Back Magelang. Go And Back menyediakan berbagai
                        jenis kamera siap pakai. Rasakan juga promo dan diskon-diskon menarik setiap harinya.
                    </p>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-4">
                <div class="pt-4 card text-center" style="width: 24rem;height: 15rem;">
                    <div class="card-body">
                        <i class="align-middle mb-3" data-feather="loader" style="width: 70px;height: 70px;"></i>
                        <h5 class="card-title text-dark">Pelayanan Cepat</h5>
                        <p class="card-text">Pelayanan cepat dan ramah oleh pegawai toko. Jangan sungkan bertanya</p>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="pt-4 card text-center" style="width: 24rem;height: 15rem;">
                    <div class="card-body">
                        <i class="align-middle mb-3" data-feather="layers" style="width: 70px;height: 70px;"></i>
                        <h5 class="card-title text-dark">Stock Update</h5>
                        <p class="card-text">Tidak perlu khawatir kehabisan stock, karena stock item yang tersedia pasti
                            selalu diupdate</p>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="pt-4 card text-center" style="width: 24rem;height: 15rem;">
                    <div class="card-body">
                        <i class="align-middle mb-3" data-feather="star" style="width: 70px;height: 70px;"></i>
                        <h5 class="card-title text-dark">Banyak Promo</h5>
                        <p class="card-text">Rajin cek website agar tidak tertinggal promo menarik lainnya</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="container">
            <div class="row" id="item">
                <div class="col-12 bg-white">
                    <h1 style="letter-spacing: 2px; color: #818963;" class="text-center p-4">Kamera Yang Disewakan</h1>

                    <div class="row mb-4">
                        @foreach ($items as $item)
                        <div class="col-md-3 card-hover" id="grow">
                            <div class="card pl-4 pr-4 pt-4 shadow-lg border">
                                <img class="mx-auto" width="230px" height="230px"
                                    src="{{ asset('picture/'. $item->picture) }}"
                                    alt="{{ asset('adminkit/src/img/avatars/avatar.jpg') }}" srcset="">
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $item->nama }}</h5>
                                    <p class="card-text">{{ $item->deskripsi }}</p>
                                    <p class="btn btn-primary">
                                        Rp. {{ $item->harga }}/hari
                                    </p>
                                </div>
                                <?php
                                if ($item->status == 'ya') {
                            ?>
                                <td class="text-center"><span class="badge bg-success p-1">Tersedia</span></td>
                                <?php
                                }
                                else {
                            ?>
                                <td class="text-center"><span class="badge bg-danger p-1">Tidak Tersedia</span></td>
                                <?php
                                }
                            ?>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div id="tim" class="container bg-white">
                    <div class="row">
                        <h1 style="letter-spacing: 2px; color: #818963;" class="text-center p-4">Team</h1>
                    </div>
                    <div class="row">
                        @foreach ($teams as $team)
                        <div class="col-md-3">
                            <div class="mx-auto card large-shadow text-center" style="width: 18rem;">
                                <img style="width: 200px; height:200px;" src="{{ asset('foto_tim/'.$team->foto) }}"
                                    class="card-img-top mx-auto rounded-circle"
                                    alt="{{ asset('adminkit/src/img/avatars/avatar.jpg') }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $team->nama }}</h5>
                                    <p class="card-text fw-bold fs-5">{{ $team->tugas }}</p>
                                    <p class="border border-3 rounded">{{ $team->nim }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- end content --}}

                {{-- footer --}}
                <footer class="text-center text-lg-start" id="tentangkami" style="background-color: #deded5;">
                    <div class="container p-4">
                        <div class="row mt-4">
                            <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                                <h5 style="letter-spacing: 2px; color: #818963;" class="text-uppercase mb-4">Tentang
                                    Kami</h5>

                                <p>
                                    At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                    praesentium
                                    voluptatum deleniti atque corrupti.
                                </p>

                                <div style="letter-spacing: 2px; color: #818963;" class="mt-4">
                                    <a href="facebook.com">Faebook</a>

                                    <a href="instagram.com">Instagram</a>

                                    <a href="twitter.com">Twitter</a>

                                    <a href="youtube.com">Youtube</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                                <h5 style="letter-spacing: 2px; color: #818963;" class="text-uppercase mb-4 pb-1">
                                    Dapatkan Promo Terupdate</h5>
                                <form action="{{ url('/') }}" method="post">
                                    @csrf
                                    <div class="form-outline form-white mb-4">
                                        <input type="email" name="subscriber" id="formControlLg"
                                            class="form-control form-control-lg mb-2"
                                            placeholder="Masukkan email disini" />
                                    </div>
                                    @foreach ($errors->get('subscriber') as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                    @endforeach
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">OK</button>
                                </form>
                                <ul class="fa-ul">
                                    <li class="mb-3 mt-4">
                                        <span data-feather="compass" class="fa-li"><i
                                                class="fas fa-home"></i></span><span class="ms-2">Jl. Tentara Pelajar
                                            46, Muntilan, Magelang</span>
                                    </li>
                                    <li class="mb-3">
                                        <span data-feather="mail" class="fa-li"><i
                                                class="fas fa-envelope"></i></span><span
                                            class="ms-2">toko@gmail.com</span>
                                    </li>
                                    <li class="mb-3">
                                        <span data-feather="phone" class="fa-li"><i
                                                class="fas fa-phone"></i></span><span class="ms-2">
                                            081314490356</span>
                                    </li>
                                </ul>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                                <h5 style="letter-spacing: 2px; color: #818963;" class="text-uppercase mb-4">Jam Buka
                                </h5>

                                <table style="color: #4f4f4f; border-color: #666;" class="table text-left">
                                    <tbody class="font-weight-normal">
                                        <tr>
                                            <td class="text-left">Senin - Kamis :</td>
                                            <td>08:00 - 19:00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Jumat - Sabtu :</td>
                                            <td>08:00 - 20:00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Minggu :</td>
                                            <td>08:00 - 22:00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>

            {{-- javascript --}}
            @include('includes.js')
        </div>
    </div>
</body>

</html>
