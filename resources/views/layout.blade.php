<!DOCTYPE html>
<html lang="en">

@include('partials.head')

<body>
    <div id="app">
        @include('partials.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>{{ $title }}</h3>
            </div>
            <div class="page-content">
                <div class="col-12 col-lg-3">
                    <div class="card">
                        <div class="card-body py-4 px-5">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl">
                                    <img src="{{ asset('assets/images/faces/1.jpg') }} " alt="Face 1">
                                </div>
                                <div class="ms-3 name">
                                    <h5 class="font-bold">Admin E-Grownomy</h5>
                                    <h6 class="text-muted mb-0">@admin</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @yield('content')
            </div>

            @include('partials.footer')
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/mazer.js"></script>
</body>

</html>
