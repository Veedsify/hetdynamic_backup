  <header class="main-header">
      <nav class="main-menu">
          <div class="main-menu__wrapper">
              <div class="main-menu__wrapper-inner">
                  <div class="main-menu__logo">
                      <a href="/"><img class="img-fluid" width="90" src="{{ asset($pagedata->site_logo) }}"
                              alt="logo"></a>
                  </div>
                  <div class="main-menu__search-box">
                      <a href="#"
                          class="main-menu__search search-toggler icon-magnifying-glass"><span>Search...</span></a>
                  </div>
                  <div class="main-menu__wrapper-inner-content">
                      <div class="main-menu__update-box">
                          <div class="main-menu__update-box-inner">
                              <div class="main-menu__update-box-left">
                                  <div class="main-menu__update-icon-box">
                                      <div class="main-menu__update-icon">
                                          <span class="icon-megaphone"></span>
                                      </div>
                                      <div class="main-menu__update-icon-text">
                                          <p>Updates</p>
                                      </div>
                                  </div>
                                  <div class="main-menu__update-carousel-box">
                                      <div class="main-menu__update-carousel thm-owl__carousel owl-theme owl-carousel"
                                          data-owl-options='{
                                                "items": 1,
                                                "margin": 30,
                                                "smartSpeed": 700,
                                                "loop":true,
                                                "autoplay": false,
                                                "nav":true,
                                                "dots":false,
                                                "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
                                                "responsive":{
                                                    "0":{
                                                        "items":1
                                                    },
                                                    "768":{
                                                        "items":1
                                                    },
                                                    "992":{
                                                        "items": 1
                                                    }
                                                }
                                            }'>
                                          <div class="item">
                                              <div class="main-menu__update-single">
                                                  <p class="main-menu__update-text">The United States Mission is
                                                      Pleased to Announce the Expansion of Interview.</p>
                                              </div>
                                          </div>
                                          <div class="item">
                                              <div class="main-menu__update-single">
                                                  <p class="main-menu__update-text">The United States Mission is
                                                      Pleased to Announce the Expansion of Interview.</p>
                                              </div>
                                          </div>
                                          <div class="item">
                                              <div class="main-menu__update-single">
                                                  <p class="main-menu__update-text">The United States Mission is
                                                      Pleased to Announce the Expansion of Interview.</p>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="main-menu__update-box-right">
                                  <div class="main-menu__social-box">
                                      <h4 class="main-menu__social-title">Follow us:</h4>
                                      <div class="main-menu__social">
                                        <a href="{{ $pagedata->site_twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="{{ $pagedata->site_facebook }}" target="_blank"><i class="fab fa-facebook"></i></a>
                                        <a href="{{ $pagedata->site_pinterest }}" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="{{ $pagedata->site_instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="main-menu__top">
                          <div class="main-menu__top-inner">
                              <div class="main-menu__top-left">
                                  <ul class="list-unstyled main-menu__contact-list">
                                      <li>
                                          <div class="icon">
                                              <i class="fas fa-map-marker"></i>
                                          </div>
                                          <div class="text">
                                              <p>{{ $pagedata->site_address }}</p>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="icon">
                                              <i class="fas fa-envelope"></i>
                                          </div>
                                          <div class="text">
                                              <p><a href="mailto:{{ $pagedata->site_email }}">{{ $pagedata->site_email }}</a>
                                              </p>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="icon">
                                              <i class="fas fa-clock"></i>
                                          </div>
                                          <div class="text">
                                              <p>Mon - Fri 8.00 am - 6.00 pm</p>
                                          </div>
                                      </li>
                                  </ul>
                              </div>
                              <div class="main-menu__top-right">
                                  <ul class="list-unstyled main-menu__top-menu">

                                      @auth
                                          @if (auth()->user()->role === 'user')
                                              <li><a href="{{ route('account.setting') }}">Dashboard</a></li>
                                          @elseif(auth()->user()->role === 'admin')
                                              <li><a href="{{ route('admin') }}">Dashboard</a></li>
                                          @endif
                                          <li><a href="{{ route('logout') }}">Logout</a></li>
                                      @endauth
                                      @guest
                                          <li><a href="{{ route('login') }}">Login</a></li>
                                      @endguest

                                      <li><a href="{{ route('faq') }}">Faq’s</a></li>
                                      <li><a href="{{ route('contact') }}">Contact</a></li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                      <div class="main-menu__bottom">
                          <div class="main-menu__bottom-inner">
                              <div class="main-menu__main-menu-box">
                                  <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                                  <x-navlinks />
                              </div>
                              <div class="main-menu__right">
                                  <div class="main-menu__call">
                                      <div class="main-menu__call-icon">
                                          <img src=" {{ asset('/assets/images/icon/main-menu-three-comment-icon.png') }}"
                                              alt="">
                                      </div>
                                      <div class="main-menu__call-content">
                                          <p class="main-menu__call-sub-title">Have Question?</p>
                                          <h5 class="main-menu__call-number"><a
                                                  href="tel:{{ $pagedata->site_phone }}"><span>Free</span>
                                                  {{ $pagedata->site_phone }}</a>
                                          </h5>
                                      </div>
                                  </div>
                                  <div class="main-menu__btn-box">
                                      <a href="{{ route('contact') }}" class="thm-btn main-menu__btn">Book
                                          Appointment</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </nav>
  </header>
