@extends('layouts/index', [
    'title' => 'Error 404 - Sorry we cant find this page | Hetdynamic',
    'description' => 'error page 404',
    'image' => asset($pagedata->site_logo),
    'meta_tags' => '',
])
@section('content')
    <div class="preloader">
        <div class="preloader__image"></div>
    </div>
    <!-- /.preloader -->

    <div class="page-wrapper">
        {{-- NAVGATION BAR HERE --}}
        <x-nav />
        {{-- NAVIGATION ENDS HERE --}}

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->

        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header-bg"
                style="background-image: url({{ asset('assets/images/backgrounds/page-header-bg.jpg') }})">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <h2>404 Error</h2>
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="/">Home</a></li>
                        <li><span>-</span></li>
                        <li class="active">404 Error</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Error Page Start-->
        <section class="error-page">
            <div class="error-page__bg" style="background-image: url(assets/images/backgrounds/error-page-bg.png);">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="error-page__inner">
                            <div class="error-page__img">
                                <img src="/assets/images/resources/error-page-img.png" alt="">
                            </div>
                            <div class="error-page__title-box">
                                <div class="error-page__title-shape-1">
                                    <img src="/assets/images/shapes/error-page-title-shape-1.png" alt="">
                                </div>
                                <h2 class="error-page__title">4 <span>4</span></h2>
                            </div>
                            <h3 class="error-page__tagline">Sorry We Can't Find that Page!</h3>
                            <p class="error-page__text">The page you are looking for does not exist on this server.</p>
                            <form class="error-page__form">
                                <div class="error-page__form-input">
                                    <input type="search" placeholder="Search Here">
                                    <button type="submit"><i class="icon-magnifying-glass"></i></button>
                                </div>
                            </form>
                            <div class="error-page__btn-box">
                                <a href="{{ route('home') }}" class="thm-btn error-page__btn">Back to Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Error Page End-->

        <!--Site Footer Start-->
        <x-footer />
        <!--Site Footer End-->


    </div><!-- /.page-wrapper -->


    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="/" aria-label="logo image"><img src="{{ asset($pagedata->site_logo) }}" width="135"
                        alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:needhelp@packageName__.com">needhelp@HetDynamic.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:666-888-0000">666 888 0000</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-facebook-square"></a>
                    <a href="#" class="fab fa-pinterest-p"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->



        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->


    <!-- /.search-popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="icon-right-arrow"></i></a>
@endsection
