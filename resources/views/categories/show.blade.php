<!DOCTYPE html>
<html lang="{{ $locale ?? 'ar' }}" dir="{{ ($locale ?? 'ar') == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <!-- Main Meta Tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Important Meta Tags -->
    <meta name="author" content="" />
    <meta name="description" content="{{ ($locale ?? 'ar') == 'en' ? ($settings['seo_meta_description_en'] ?? '') : ($settings['seo_meta_description_ar'] ?? '') }}" />
    <meta name="keywords" content="{{ ($locale ?? 'ar') == 'en' ? ($settings['seo_meta_keywords_en'] ?? '') : ($settings['seo_meta_keywords_ar'] ?? '') }}" />

    <!-- Library Styles -->
    <link rel="stylesheet" href="{{ asset('Tower Tech Front/assets/scss/libs/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('Tower Tech Front/assets/scss/libs/animate.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('Tower Tech Front/main.css') }}" />

    <!-- Page Title & Icon -->
    <title>{{ $pageTitle }}</title>
    <link rel="shortcut icon" href="{{ !empty($settings['favicon']) ? asset('storage/' . $settings['favicon']) : asset('Tower Tech Front/assets/images/logos/logo.png') }}" />

    <style>
        @media (max-width: 768px) {
            .category-header {
                height: 200px;
            }

            .category-header h1 {
                font-size: 1.8rem;
            }

            .category-header .line {
                width: 60px;
                height: 2px;
            }
        }

        @media (max-width: 480px) {
            .category-header {
                height: 150px;
            }

            .category-header h1 {
                font-size: 1.4rem;
            }

            .category-header .line {
                width: 50px;
                height: 2px;
            }
        }

        @media (max-width: 480px) {
            .category-header {
                height: 150px;
            }

            .category-header h1 {
                font-size: 1.4rem;
            }

            .category-header .line {
                width: 50px;
                height: 2px;
            }
        }

        .title-animate {
            opacity: 0;
            transform: translateY(50px);
            transition: all 1s ease-out;
        }

        .title-animate.active {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body class="category-show-page">

    <!-- Start Layout -->

    <div class="layout index-layout">


        <nav class="big-nav big-nav-hiddin">
            <div class="nav-links">

                <div class="big-nav-header-title">
                    <div class="nav-logo-container">
                        <a href="{{ url('/') }}">
                            <img class="main-logo" src="{{ !empty($settings['navbar_logo']) ? asset('storage/' . $settings['navbar_logo']) : asset('Tower Tech Front/assets/images/logos/logo-w.png') }}" alt="" />
                        </a>
                    </div>
                    <span class="close-big-nav">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" />
                        </svg>
                    </span>
                </div>

                <ul class="list-unstyled p-0">
                    <li class="li-active">
                        <div class="li-link">
                            <div class="link-info">
                                <a href="#home">{{ ($locale ?? 'ar') == 'en' ? 'Home' : 'الرئيسية' }}</a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="li-link">
                            <div class="link-info">
                                <a href="#about">{{ ($locale ?? 'ar') == 'en' ? 'About Us' : 'عن الشركة' }}</a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="li-link">
                            <div class="link-info">
                                <a href="#projects">{{ ($locale ?? 'ar') == 'en' ? 'Projects' : 'المشاريع' }}</a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="li-link">
                            <div class="link-info">
                                <a href="#services">{{ ($locale ?? 'ar') == 'en' ? 'Services' : 'الخدمات' }}</a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="li-link">
                            <div class="link-info">
                                <a href="#partners">
                                    {{ ($locale ?? 'ar') == 'en' ? 'Partners' : 'العملاء' }}
                                </a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="li-link">
                            <div class="link-info">
                                <a href="#blog">{{ ($locale ?? 'ar') == 'en' ? 'Blog' : 'المدونة' }}</a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="li-link">
                            <div class="link-info">
                                <a href="{{ url('/contacts') }}">{{ ($locale ?? 'ar') == 'en' ? 'Contact Us' : 'تواصل معنا' }}</a>
                            </div>
                        </div>
                    </li>

                    <!-- أضف dropdown الأقسام هنا -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="systemsDropdown" role="button" data-bs-toggle="dropdown">
                            {{ ($locale ?? 'ar') == 'en' ? 'Departments' : 'الأقسام' }}
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" style="margin-right: 5px;">
                                <path fill="currentColor" d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z" />
                            </svg>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="systemsDropdown">
                            @foreach($categories as $category)
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('categories.show', $category->slug) }}">
                                    {{ ($locale ?? 'ar') == 'en' ? $category->name_en : $category->name }}
                                </a>

                            </li>
                            @endforeach
                        </ul>
                    </li>

                </ul>

            </div>
        </nav>



        <div class="close-overlay"></div>

    </div>

    <!-- End Layout -->



    <div class="content">

        <header class="header">
            <div class="container">
                <nav class="navbar wow fadeInDown" data-wow-duration="0.8s" data-wow-delay="0.1s">

                    <div class="nav-logo">

                        <div class="nav-logo-container">
                            <a href="{{ url('/') }}">
                                <img class="main-logo" src="{{ !empty($settings['navbar_logo']) ? asset('storage/' . $settings['navbar_logo']) : asset('Tower Tech Front/assets/images/logos/logo-w.png') }}" alt="" />
                                <!-- <span>Tower Tech</span> -->
                            </a>
                        </div>

                    </div>

                    <div class="nav-links">
                        <ul class="list-unstyled">
                            <li class="nav-link-active">
                                <a href="{{ route('home') }}">
                                    {{ ($locale ?? 'ar') == 'en' ? 'Home' : 'الرئيسية' }}
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('home') }}#about">
                                    {{ ($locale ?? 'ar') == 'en' ? 'About Us' : 'عن الشركة' }}
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('home') }}#projects">
                                    {{ ($locale ?? 'ar') == 'en' ? 'Projects' : 'المشاريع' }}
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('home') }}#services">
                                    {{ ($locale ?? 'ar') == 'en' ? 'Services' : 'الخدمات' }}
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('home') }}#partners">
                                    {{ ($locale ?? 'ar') == 'en' ? 'Partners' : 'العملاء' }}
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('home') }}#blog">
                                    {{ ($locale ?? 'ar') == 'en' ? 'Blog' : 'المدونة' }}
                                </a>
                            </li>


                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="systemsDropdownDesktop" role="button" data-bs-toggle="dropdown">
                                    {{ ($locale ?? 'ar') == 'en' ? 'Departments' : 'الأقسام' }}
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" style="margin-right: 5px;">
                                        <path fill="currentColor" d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z" />
                                    </svg>
                                </a>

                                <ul class="dropdown-menu categories-dropdown-menu" aria-labelledby="systemsDropdownDesktop">
                                    @foreach($categories as $category)
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('categories.show', $category->slug) }}">
                                            {{ ($locale ?? 'ar') == 'en' ? $category->name_en : $category->name }}
                                        </a>

                                    </li>
                                    @endforeach
                                </ul>
                            </li>

                        </ul>
                        <!-- <div class="nav-links-search">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748Z">
                                    </path>
                                </svg>
                            </div> -->
                    </div>




                    <div class="nav-actions">
                        @if(!empty($settings['footer_phone']))
                        @php
                        $phoneNumber = preg_replace('/[^0-9+]/', '', $settings['footer_phone']);
                        @endphp
                        <a href="tel:{{ $phoneNumber }}" class="book-btn">
                            <span>{{ ($locale ?? 'ar') == 'en' ? ($settings['contact_us_button_text_en'] ?? 'Contact Us') : ($settings['contact_us_button_text_ar'] ?? 'تواصل معنا') }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"></path>
                            </svg>
                        </a>
                        @else
                        <a href="{{ url('/contacts') }}" class="book-btn">
                            <span>{{ ($locale ?? 'ar') == 'en' ? ($settings['contact_us_button_text_en'] ?? 'Contact Us') : ($settings['contact_us_button_text_ar'] ?? 'تواصل معنا') }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"></path>
                            </svg>
                        </a>
                        @endif
                    </div>

                    <div class="nav-actions-lang">
                        <div class="icon switch-langs">
                            @php
                            $currentLocale = $locale ?? 'ar';
                            $targetLocale = $currentLocale == 'ar' ? 'en' : 'ar';
                            $displayText = $currentLocale == 'ar' ? 'English' : 'العربية';
                            @endphp
                            <a href="{{ route('lang.switch', $targetLocale) }}" class="hover-drop">
                                <span>{{ $displayText }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M6.23509 6.45329C4.85101 7.89148 4 9.84636 4 12C4 16.4183 7.58172 20 12 20C13.0808 20 14.1116 19.7857 15.0521 19.3972C15.1671 18.6467 14.9148 17.9266 14.8116 17.6746C14.582 17.115 13.8241 16.1582 12.5589 14.8308C12.2212 14.4758 12.2429 14.2035 12.3636 13.3943L12.3775 13.3029C12.4595 12.7486 12.5971 12.4209 14.4622 12.1248C15.4097 11.9746 15.6589 12.3533 16.0043 12.8777C16.0425 12.9358 16.0807 12.9928 16.1198 13.0499C16.4479 13.5297 16.691 13.6394 17.0582 13.8064C17.2227 13.881 17.428 13.9751 17.7031 14.1314C18.3551 14.504 18.3551 14.9247 18.3551 15.8472V15.9518C18.3551 16.3434 18.3168 16.6872 18.2566 16.9859C19.3478 15.6185 20 13.8854 20 12C20 8.70089 18.003 5.8682 15.1519 4.64482C14.5987 5.01813 13.8398 5.54726 13.575 5.91C13.4396 6.09538 13.2482 7.04166 12.6257 7.11976C12.4626 7.14023 12.2438 7.12589 12.012 7.11097C11.3905 7.07058 10.5402 7.01606 10.268 7.75495C10.0952 8.2232 10.0648 9.49445 10.6239 10.1543C10.7134 10.2597 10.7307 10.4547 10.6699 10.6735C10.59 10.9608 10.4286 11.1356 10.3783 11.1717C10.2819 11.1163 10.0896 10.8931 9.95938 10.7412C9.64554 10.3765 9.25405 9.92233 8.74797 9.78176C8.56395 9.73083 8.36166 9.68867 8.16548 9.64736C7.6164 9.53227 6.99443 9.40134 6.84992 9.09302C6.74442 8.8672 6.74488 8.55621 6.74529 8.22764C6.74529 7.8112 6.74529 7.34029 6.54129 6.88256C6.46246 6.70541 6.35689 6.56446 6.23509 6.45329ZM12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22Z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="nav-big-nav-icon nav-mobile-icon">
                        <svg viewBox="0 0 24 24" width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path
                                d="M6.5 11.5a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm.5 10a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm10-10a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zm0 10a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9zM6.5 9.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm.5 10a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm10-10a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm0 10a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z">
                            </path>
                        </svg>
                    </div>

                </nav>

            </div>


        </header>



        <div class="container py-5 px-5">
            <!-- Category Title -->
            <div class="category-header wow fadeInDown" style="position: relative; height: 300px; display: flex; justify-content: center; align-items: center; text-align: center; overflow: hidden;">

                <!-- الخلفية مع blur -->
                @if($pageImage)
                <div class="category-bg" style="
        background-image: url('{{ $pageImage }}');
        background-size: cover;
        background-position: center;
        position: absolute;
        top:0;
        left:0;
        width: 100%;
        height: 100%;
        filter: blur(2px);
        border-radius: 25px;
        z-index: 1;
    "></div>
                @endif

                <!-- النص فوق الخلفية -->
                <div style="position: relative; z-index: 2; color: #fff;">
                    <h1 class="title-animate mb-4" style="margin: 0; font-size: 2rem;">{{ $pageTitle }}</h1>
                    <div class="line"></div>
                </div>
            </div>



            @if($items->count())
            <div class="row g-4">
                @foreach($items as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.2s" style="margin-bottom: 30px;">
                    <div class="product-card">


                        <div class="product-image">
                            @if($item->image)
                            <img src="{{ $item->image_url }}" alt="{{ $item->name }}">
                            @else
                            <span class="text-muted">No Image</span>
                            @endif
                        </div>

                        <div class="product-body">
                            <h5>
                                {{ ($locale ?? 'ar') == 'en' ? $item->name_en : $item->name }}
                            </h5>
                        </div>


                    </div>
                </div>
                @endforeach
            </div>
            @else
            <p class="text-center text-muted">لا يوجد منتجات في هذا القسم</p>
            @endif

        </div>

        <!-- ---- [ Start Footer ] ---- -->
        <footer>

            <div class="footer-container">

                <div class="container">

                    <div class="footer-main">
                        <div class="row">
                            <!-- Company Info Column -->
                            <div class="col-lg-4 col-md-6">
                                <div class="footer-section wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.1s">
                                    <div class="footer-logo">
                                        <div class="nav-logo-container">
                                            <a href="{{ url('/') }}">
                                                <img class="main-logo" src="{{ !empty($settings['footer_logo']) ? asset('storage/' . $settings['footer_logo']) : asset('Tower Tech Front/assets/images/logos/logo-w.png') }}" alt="Tower Tech" />
                                            </a>
                                        </div>
                                    </div>
                                    <p class="footer-description">{{ ($locale ?? 'ar') == 'en' ? ($settings['footer_about_en'] ?? 'A leading company in Saudi Arabia specializing in construction, infrastructure, information technology, low-voltage systems, and communications.') : ($settings['footer_about_ar'] ?? 'شركة رائدة في المملكة العربية السعودية متخصصة في المقاولات والبنية التحتية وتقنية المعلومات والأنظمة منخفضة الجهد والاتصالات.') }}</p>
                                    <div class="footer-social-links">
                                        @if(!empty($settings['social_facebook']))
                                        <a href="{{ $settings['social_facebook'] }}" target="_blank" class="social-link">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        @endif
                                        @if(!empty($settings['social_instagram']))
                                        <a href="{{ $settings['social_instagram'] }}" target="_blank" class="social-link">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                        @endif
                                        @if(!empty($settings['social_twitter']))
                                        <a href="{{ $settings['social_twitter'] }}" target="_blank" class="social-link">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        @endif
                                        @if(!empty($settings['social_linkedin']))
                                        <a href="{{ $settings['social_linkedin'] }}" target="_blank" class="social-link">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                        @endif
                                        @if(!empty($settings['social_youtube']))
                                        <a href="{{ $settings['social_youtube'] }}" target="_blank" class="social-link">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Links Column -->
                            <div class="col-lg-2 col-md-6">
                                <div class="footer-section wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                                    <h4 class="footer-title">{{ ($locale ?? 'ar') == 'en' ? 'Quick Links' : 'روابط سريعة' }}</h4>
                                    <ul class="footer-links">
                                        <li class="nav-link-active">
                                            <a href="{{ route('home') }}">
                                                {{ ($locale ?? 'ar') == 'en' ? 'Home' : 'الرئيسية' }}
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{ route('home') }}#about">
                                                {{ ($locale ?? 'ar') == 'en' ? 'About Us' : 'عن الشركة' }}
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{ route('home') }}#projects">
                                                {{ ($locale ?? 'ar') == 'en' ? 'Projects' : 'المشاريع' }}
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{ route('home') }}#services">
                                                {{ ($locale ?? 'ar') == 'en' ? 'Services' : 'الخدمات' }}
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{ route('home') }}#partners">
                                                {{ ($locale ?? 'ar') == 'en' ? 'Partners' : 'العملاء' }}
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{ route('home') }}#blog">
                                                {{ ($locale ?? 'ar') == 'en' ? 'Blog' : 'المدونة' }}
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>

                            <!-- Services Column -->
                            <div class="col-lg-3 col-md-6">
                                <div class="footer-section wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                                    <h4 class="footer-title">خدماتنا</h4>
                                    <ul class="footer-links">
                                        @if(!empty($settings['footer_service_links']) && count($settings['footer_service_links']) > 0)
                                        @foreach($settings['footer_service_links'] as $serviceLink)
                                        <li><a href="{{ !empty($serviceLink['link']) ? $serviceLink['link'] : '#' }}">{{ $serviceLink['title_ar'] ?? $serviceLink['title_en'] ?? 'خدمة' }}</a></li>
                                        @endforeach
                                        @else
                                        <li><a href="{{ url('/services') }}">المقاولات</a></li>
                                        <li><a href="{{ url('/services') }}">البنية التحتية</a></li>
                                        <li><a href="{{ url('/services') }}">تقنية المعلومات</a></li>
                                        <li><a href="{{ url('/services') }}">التيار الخفيف</a></li>
                                        <li><a href="{{ url('/services') }}">الاتصالات</a></li>
                                        <li><a href="{{ url('/services') }}">الاتصالات السحابية</a></li>
                                        <li><a href="{{ url('/services') }}">الأنظمة منخفضة الجهد</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>

                            <!-- Contact & Newsletter Column -->
                            <div class="col-lg-3 col-md-6">
                                <div class="footer-section wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s">
                                    <h4 class="footer-title">{{ ($locale ?? 'ar') == 'en' ? 'Contact Us' : 'تواصل معنا' }}</h4>
                                    <div class="footer-contact-info">
                                        @php
                                        $location = ($locale ?? 'ar') == 'en' && !empty($settings['footer_location_en']) ? $settings['footer_location_en'] : ($settings['footer_location_ar'] ?? '');
                                        @endphp
                                        @if(!empty($location))
                                        <div class="contact-item">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <div>
                                                @if(!empty($settings['footer_location_link']))
                                                <a href="{{ $settings['footer_location_link'] }}" target="_blank">
                                                    {{ $location }}
                                                </a>
                                                @else
                                                <a href="https://www.google.com/maps?q={{ urlencode($location) }}" target="_blank">
                                                    {{ $location }}
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($settings['footer_phone']))
                                        <div class="contact-item">
                                            <i class="fas fa-phone"></i>
                                            <div>
                                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['footer_phone']) }}">{{ $settings['footer_phone'] }}</a>
                                            </div>
                                        </div>
                                        @endif
                                        @if(!empty($settings['footer_email']))
                                        <div class="contact-item">
                                            <i class="fas fa-envelope"></i>
                                            <div>
                                                <a href="mailto:{{ $settings['footer_email'] }}">{{ $settings['footer_email'] }}</a>
                                            </div>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="newsletter-section">
                                        <h5 class="newsletter-title">{{ ($locale ?? 'ar') == 'en' ? 'Subscribe to Newsletter' : 'اشترك في النشرة الإخبارية' }}</h5>
                                        <p class="newsletter-desc">{{ ($locale ?? 'ar') == 'en' ? 'Get the latest news and updates' : 'احصل على آخر الأخبار والتحديثات' }}</p>
                                        <form class="newsletter-form" action="">
                                            <div class="form-group">
                                                <input class="newsletter-input" type="email" placeholder="{{ ($locale ?? 'ar') == 'en' ? 'Email Address' : 'البريد الإلكتروني' }}" required />
                                                <button type="submit" class="newsletter-btn">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                        <path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="footer-bottom wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s">
                        <div class="footer-divider"></div>
                        <div class="copyrights">
                            <p>جميع الحقوق محفوظة &copy; 2026 <span>EternaGo</span></p>
                            <ul class="list-unstyled">
                                @if(!empty($settings['terms_conditions_link']))
                                <li><a href="{{ $settings['terms_conditions_link'] }}">الشروط والأحكام</a></li>
                                @endif
                                @if(!empty($settings['privacy_policy_link']))
                                <li><a href="{{ $settings['privacy_policy_link'] }}">سياسة الخصوصية</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>

                </div>

            </div>

        </footer>
        <!-- ---- [ End Footer ] ---- -->

        <!-- WhatsApp Popup -->
        <div class="whatsapp-popup" id="whatsappPopup">
            <div class="whatsapp-popup-content">
                <div class="whatsapp-popup-header">
                    <div class="whatsapp-popup-avatar">
                        <img src="{{ asset('Tower Tech Front/assets/images/logos/logo.png') }}" alt="Eterena Go">
                    </div>
                    <div class="whatsapp-popup-info">
                        <h4>Tower Tech</h4>
                        <span>متاح الآن</span>
                    </div>
                    <button class="whatsapp-popup-close" id="whatsappClose">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                            <path fill="currentColor"
                                d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
                        </svg>
                    </button>
                </div>
                <div class="whatsapp-popup-message">
                    <p>مرحباً! 👋<br>كيف يمكننا مساعدتك اليوم؟</p>
                </div>
                <div class="whatsapp-popup-actions">
                    @if(!empty($settings['whatsapp_number']))
                    @php
                    $whatsappNumber = preg_replace('/[^0-9+]/', '', $settings['whatsapp_number']);
                    $whatsappUrl = 'https://wa.me/' . $whatsappNumber . '?text=' . urlencode('مرحباً، أريد الاستفسار عن خدماتكم');
                    @endphp
                    <a href="{{ $whatsappUrl }}" target="_blank" class="whatsapp-popup-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                            <path fill="currentColor"
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488" />
                        </svg>
                        ابدأ المحادثة
                    </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- WhatsApp Floating Button -->
        <div class="whatsapp-float" id="whatsappFloat">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="28" height="28">
                <path fill="currentColor"
                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488" />
            </svg>
        </div>

        <!-- Instagram Popup -->
        <div class="instagram-popup" id="instagramPopup">
            <div class="instagram-popup-content">
                <div class="instagram-popup-header">
                    <div class="instagram-popup-avatar">
                        <img src="{{ asset('Tower Tech Front/assets/images/logos/logo.png') }}" alt="Tower Tech">
                    </div>
                    <div class="instagram-popup-info">
                        <h4>Tower Tech</h4>
                        <span>متاح الآن</span>
                    </div>
                    <button class="instagram-popup-close" id="instagramClose">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                            <path fill="currentColor"
                                d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
                        </svg>
                    </button>
                </div>
                <div class="instagram-popup-message">
                    <p>مرحباً! 📸<br>تابعنا على إنستغرام للحصول على آخر التحديثات</p>
                </div>
                <div class="instagram-popup-actions">
                    @if(!empty($settings['social_instagram']))
                    <a href="{{ $settings['social_instagram'] }}" target="_blank" class="instagram-popup-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                            <path fill="currentColor"
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.98-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.98-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                        تابعنا على إنستغرام
                    </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Instagram Floating Button -->
        <div class="instagram-float" id="instagramFloat">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="28" height="28">
                <path fill="currentColor"
                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.98-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.98-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
            </svg>
        </div>

        <!-- Facebook Popup -->
        <div class="facebook-popup" id="facebookPopup">
            <div class="facebook-popup-content">
                <div class="facebook-popup-header">
                    <div class="facebook-popup-avatar">
                        <img src="{{ asset('Tower Tech Front/assets/images/logos/logo.png') }}" alt="Tower Tech">
                    </div>
                    <div class="facebook-popup-info">
                        <h4>Tower Tech</h4>
                        <span>متاح الآن</span>
                    </div>
                    <button class="facebook-popup-close" id="facebookClose">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16">
                            <path fill="currentColor"
                                d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
                        </svg>
                    </button>
                </div>
                <div class="facebook-popup-message">
                    <p>مرحباً! 👍<br>تابعنا على فيسبوك للحصول على آخر الأخبار</p>
                </div>
                <div class="facebook-popup-actions">
                    @if(!empty($settings['social_facebook']))
                    <a href="{{ $settings['social_facebook'] }}" target="_blank" class="facebook-popup-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                            <path fill="currentColor"
                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg>
                        تابعنا على فيسبوك
                    </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Facebook Floating Button -->
        <div class="facebook-float" id="facebookFloat">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="28" height="28">
                <path fill="currentColor"
                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
            </svg>
        </div>

        <!-- Main Scripts -->
        <script src="{{ asset('Tower Tech Front/assets/js/libs/jquery-3.6.3.min.js') }}"></script>
        <script src="{{ asset('Tower Tech Front/assets/js/libs/bootstrap.min.js') }}"></script>
        <script src="{{ asset('Tower Tech Front/assets/js/libs/popper.js') }}"></script>
        <script src="{{ asset('Tower Tech Front/assets/js/libs/wow.min.js') }}"></script>
        <script src="{{ asset('Tower Tech Front/assets/js/libs/jquery.countTo.js') }}"></script>
        <script src="{{ asset('Tower Tech Front/main.js') }}"></script>
        <!-- Addition Scripts -->
        <script src="https://cdn.lordicon.com/lordicon.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const popup = document.getElementById('whatsappPopup');
                const contactBtn = document.querySelector('.nav-actions .book-btn');
                if (!popup || !contactBtn) return;

                contactBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    popup.classList.add('show');
                });
            });
        </script>

        <script>
            const faqItems = document.querySelectorAll('.faq-item');

            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question');
                const answer = item.nextElementSibling;
                const icon = item.querySelector('i');


                window.addEventListener('load', () => {

                    faqItems.forEach(otherItem => {
                        if (otherItem !== item) {
                            const otherAnswer = otherItem.nextElementSibling;
                            const otherIcon = otherItem.querySelector('i');

                            otherAnswer.classList.remove('active');
                            otherIcon.classList.remove('active');
                            otherAnswer.style.maxHeight = "0";
                        }
                    });

                    answer.classList.toggle('active');
                    icon.classList.toggle('active');


                    if (answer.classList.contains('active')) {
                        answer.style.maxHeight = answer.scrollHeight + "px";
                    } else {
                        answer.style.maxHeight = "0";
                    }

                });

                item.addEventListener('click', () => {
                    faqItems.forEach(otherItem => {
                        if (otherItem !== item) {
                            const otherAnswer = otherItem.nextElementSibling;
                            const otherIcon = otherItem.querySelector('i');

                            otherAnswer.classList.remove('active');
                            otherIcon.classList.remove('active');
                            otherAnswer.style.maxHeight = "0";
                        }
                    });

                    answer.classList.toggle('active');
                    icon.classList.toggle('active');


                    if (answer.classList.contains('active')) {
                        answer.style.maxHeight = answer.scrollHeight + "px";
                    } else {
                        answer.style.maxHeight = "0";
                    }
                });


            });

            window.addEventListener('load', () => {
                const title = document.querySelector('.title-animate');
                setTimeout(() => {
                    title.classList.add('active');
                }, 100);
            });
        </script>

</body>

</html>