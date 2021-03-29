<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    @yield('meta')

    <title>@yield('title') | Apotek Sukun Farm</title>

    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <!-- Header -->
        <div class="app-header header-shadow" style="padding: 20px; height: 50px;">
            <div class="app-header__logo">
                <div>
                    <span class="mx-0">Sistem Informasi Manajemen</span>
                    <span class="mx-0 font-weight-bold">Apotek Sukun Farma</span>
                </div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button"
                        class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            class="p-0 btn">
                                            <img width="42" class="rounded-circle"
                                                src="{{ asset('image/avatars/1.jpg') }}" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true"
                                            class="dropdown-menu dropdown-menu-right">
                                            <button type="button" tabindex="0" class="dropdown-item">User
                                                Account</button>
                                            <button type="button" tabindex="0" class="dropdown-item">Settings</button>
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            <a href="login.html"><button type="button" tabindex="0"
                                                    class="dropdown-item">LogOut</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-main">
            <!-- SideBar -->
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div>
                        <span class="mx-0">Sistem Informasi Manajemen</span>
                        <span class="mx-0 font-weight-bold">Apotek Sukun Farma</span>
                    </div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                                data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <li style="padding-top: 20px;">
                                <a href="index.html">
                                    <i class="metismenu-icon pe-7s-rocket"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-calculator"></i>
                                    Kasir
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="">
                                            <i class="metismenu-icon"></i>
                                            Semua Produk
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="metismenu-icon"></i>Kasir
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="metismenu-icon">
                                            </i>Resep
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="metismenu-icon">
                                            </i>Riwayat Transaksi
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-box1"></i>
                                    Gudang
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{ url('obat') }}">
                                            <i class="metismenu-icon">
                                            </i>Obat
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('kategori') }}">
                                            <i class="metismenu-icon">
                                            </i>Kategori
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="metismenu-icon">
                                            </i>Transaksi Masuk
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-notebook"></i>
                                    Akuntansi
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="metismenu-icon">
                                            </i>Pengeluaran
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="metismenu-icon">
                                            </i>Riwayat Penjualan
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="metismenu-icon">
                                            </i>Riwayat Pembelian
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="metismenu-icon">
                                            </i>Laba / Rugi
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Main -->
            <div class="app-main__outer">
                <div class="app-main__inner">
                    @yield('content')
                </div>

                <!-- Footer -->
                <div class="app-wrapper-footer">
                    <div class="app-footer">
                        <div class="app-footer__inner">
                            <div class="app-footer-right">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            Apotek Sukun Farma ©2020 . All Right Reserved
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>

    @yield('modal')

    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    @yield('js')
</body>

</html>
