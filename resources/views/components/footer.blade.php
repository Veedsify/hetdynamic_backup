<footer class="site-footer">
    <div class="container">
        <div class="site-footer__top">
            <div class="site-footer__map float-bob-x">
                <img src=" {{ asset('/assets/images/shapes/site-footer-map-1.png') }}" alt="">
            </div>
            <div class="site-footer__top-left">
                <div class="site-footer__visa-box">
                    <ul class="list-unstyled site-footer__visa-list">
                        <li>
                            <div class="site-footer__visa-img">
                                <img src=" {{ asset('/assets/images/resources/site-footer-visa-img-1-1.jpg') }}" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="site-footer__visa-img">
                                <img src=" {{ asset('/assets/images/resources/site-footer-visa-img-1-2.jpg') }}" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="site-footer__visa-img">
                                <img src=" {{ asset('/assets/images/resources/site-footer-visa-img-1-3.jpg') }}" alt="">
                            </div>
                        </li>
                    </ul>
                    <div class="site-footer__visa-content">
                        <p class="site-footer__visa-text">Approved Traveler Visa Applications. <a
                                href="{{ route('login') }}">Get
                                Your Visa</a></p>
                    </div>
                </div>
            </div>
            <div class="site-footer__call">
                <div class="site-footer__call-icon">
                    <img src=" {{ asset('/assets/images/icon/site-footer-icon-comment.png') }}" alt="">
                </div>
                <div class="site-footer__call-content">
                    <p class="site-footer__call-sub-title">Have Question?</p>
                    <h5 class="site-footer__call-number"><a href="tel:{{ $pagedata->site_phone }}"><span>Free</span>
                            {{ $pagedata->site_phone }}</a></h5>
                </div>
            </div>
        </div>
        <div class="site-footer__middle">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="footer-widget__column footer-widget__about">
                        <div class="footer-widget__logo">
                            <a href="/"><img src="{{ asset($pagedata->site_logo) }}" width="100"
                                    alt=""></a>
                        </div>
                        <p class="footer-widget__about-text">{{ $pagedata->site_description }}</p>
                        <div class="site-footer__social">
                            <a href="{{ $pagedata->site_twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="{{ $pagedata->site_facebook }}" target="_blank"><i class="fab fa-facebook"></i></a>
                            <a href="{{ $pagedata->site_pinterest }}" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                            <a href="{{ $pagedata->site_instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                    <div class="footer-widget__column footer-widget__link">
                        <div class="footer-widget__title-box">
                            <h3 class="footer-widget__title">Explore</h3>
                        </div>
                        <ul class="footer-widget__link-list list-unstyled ">
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li><a href="{{ route('blog') }}">Blogs</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                            <li><a href="{{ route('terms.condition') }}">Terms/Condition</a></li>
                            <li><a href="{{ route('privacy.policy') }}">Privacy Policy</a></li>
                            <li><a href="{{ route('write.review') }}">Write Review</a></li>
                            <li><a href="{{ route('certificate') }}">Certificate</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                    <div class="footer-widget__column footer-widget__visa">
                        <div class="footer-widget__title-box">
                            <h3 class="footer-widget__title">Services</h3>
                        </div>
                        <ul class="footer-widget__visa-list list-unstyled">
                            @foreach ($allServices as $service)
                                <li><a
                                        href="{{ route('services.list.service', $service->slug) }}">{{ $service->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="500ms">
                    <div class="footer-widget__column footer-widget__Contact">
                        <div class="footer-widget__title-box">
                            <h3 class="footer-widget__title">Contact</h3>
                        </div>
                        <ul class="footer-widget__Contact-list list-unstyled">
                            <li>
                                <div class="icon">
                                    <span class="fas fa-envelope"></span>
                                </div>
                                <div class="text">
                                    <p><a href="mailto:{{ $pagedata->site_email }}">{{ $pagedata->site_email }}</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="fas fa-map-marker-alt"></span>
                                </div>
                                <div class="text">
                                    <p>{{ $pagedata->site_address }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="fas fa-clock"></span>
                                </div>
                                <div class="text">
                                    <p>Mon – Sat: 8:00 am to 6:00 pm <br> Sunday: Closed</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="site-footer__bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-footer__bottom-inner">
                        <p class="site-footer__bottom-text">© Copyright 2023 by <a href="#">HetDynamic.com</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
