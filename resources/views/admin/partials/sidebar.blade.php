@php
    $currentRoute = Route::currentRouteName();
    $activeMenu = $activeMenu ?? null;
    $activeSubmenu = $activeSubmenu ?? null;
    
    // Auto-detect active menu based on route
    if (!$activeMenu) {
        if (str_contains($currentRoute, 'sliders')) {
            $activeMenu = 'sliders';
        } elseif (str_contains($currentRoute, 'partners')) {
            $activeMenu = 'partners';
        } elseif (str_contains($currentRoute, 'index-section-headers')) {
            $activeMenu = 'section-headers';
        } elseif (str_contains($currentRoute, 'abouts')) {
            $activeMenu = 'abouts';
        } elseif (str_contains($currentRoute, 'hero-slides')) {
            $activeMenu = 'hero-slides';
        } elseif (str_contains($currentRoute, 'services')) {
            $activeMenu = 'services';
        } elseif (str_contains($currentRoute, 'testimonials')) {
            $activeMenu = 'testimonials';
        } elseif (str_contains($currentRoute, 'blogs')) {
            $activeMenu = 'blogs';
        } elseif (str_contains($currentRoute, 'settings')) {
            $activeMenu = 'settings';
        } elseif (str_contains($currentRoute, 'dashboard')) {
            $activeMenu = 'dashboard';
        }
    }
    
    // Auto-detect active submenu
    if (!$activeSubmenu && $activeMenu === 'sliders') {
        if (str_contains($currentRoute, 'create')) {
            $activeSubmenu = 'sliders.create';
        } elseif (str_contains($currentRoute, 'index') || str_contains($currentRoute, 'edit') || str_contains($currentRoute, 'show')) {
            $activeSubmenu = 'sliders.index';
        }
    }
    
    if (!$activeSubmenu && $activeMenu === 'partners') {
        if (str_contains($currentRoute, 'create')) {
            $activeSubmenu = 'partners.create';
        } elseif (str_contains($currentRoute, 'index') || str_contains($currentRoute, 'edit') || str_contains($currentRoute, 'show')) {
            $activeSubmenu = 'partners.index';
        }
    }
    
    if (!$activeSubmenu && $activeMenu === 'abouts') {
        if (str_contains($currentRoute, 'create')) {
            $activeSubmenu = 'abouts.create';
        } elseif (str_contains($currentRoute, 'index') || str_contains($currentRoute, 'edit') || str_contains($currentRoute, 'show')) {
            $activeSubmenu = 'abouts.index';
        }
    }
    
    if (!$activeSubmenu && $activeMenu === 'hero-slides') {
        if (str_contains($currentRoute, 'create')) {
            $activeSubmenu = 'hero-slides.create';
        } elseif (str_contains($currentRoute, 'index') || str_contains($currentRoute, 'edit') || str_contains($currentRoute, 'show')) {
            $activeSubmenu = 'hero-slides.index';
        }
    }
    
    if (!$activeSubmenu && $activeMenu === 'section-headers') {
        if (str_contains($currentRoute, 'create')) {
            $activeSubmenu = 'index-section-headers.create';
        } elseif (str_contains($currentRoute, 'index') || str_contains($currentRoute, 'edit') || str_contains($currentRoute, 'show')) {
            $activeSubmenu = 'index-section-headers.index';
        }
    }
    
    if (!$activeSubmenu && $activeMenu === 'services') {
        if (str_contains($currentRoute, 'create')) {
            $activeSubmenu = 'services.create';
        } elseif (str_contains($currentRoute, 'index') || str_contains($currentRoute, 'edit') || str_contains($currentRoute, 'show')) {
            $activeSubmenu = 'services.index';
        }
    }
    
    if (!$activeSubmenu && $activeMenu === 'testimonials') {
        if (str_contains($currentRoute, 'create')) {
            $activeSubmenu = 'testimonials.create';
        } elseif (str_contains($currentRoute, 'index') || str_contains($currentRoute, 'edit') || str_contains($currentRoute, 'show')) {
            $activeSubmenu = 'testimonials.index';
        }
    }
    
    if (!$activeSubmenu && $activeMenu === 'blogs') {
        if (str_contains($currentRoute, 'create')) {
            $activeSubmenu = 'blogs.create';
        } elseif (str_contains($currentRoute, 'index') || str_contains($currentRoute, 'edit') || str_contains($currentRoute, 'show')) {
            $activeSubmenu = 'blogs.index';
        }
    }
@endphp

<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        @php
            $navbarLogo = \App\Models\Setting::getValue('navbar_logo');
        @endphp
        @if(!empty($navbarLogo))
            <a href="{{ route('admin.dashboard') }}" class="sidebar-logo-link">
                <img class="sidebar-logo" src="{{ asset('storage/' . $navbarLogo) }}" alt="TowerTech Logo" />
            </a>
        @else
            <a href="{{ route('admin.dashboard') }}" class="sidebar-logo-link">
                <img class="sidebar-logo" src="{{ asset('Tower Tech Front/assets/images/logos/logo-w.png') }}" alt="TowerTech Logo" />
            </a>
        @endif
    </div>
    <nav class="sidebar-menu">
        <a href="{{ route('admin.dashboard') }}" class="menu-item {{ $activeMenu === 'dashboard' ? 'active' : '' }}">
            <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M13 19H19V9.97815L12 4.53371L5 9.97815V19H11V13H13V19ZM21 20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V9.48907C3 9.18048 3.14247 8.88917 3.38606 8.69972L11.3861 2.47749C11.7472 2.19663 12.2528 2.19663 12.6139 2.47749L20.6139 8.69972C20.8575 8.88917 21 9.18048 21 9.48907V20Z"></path></svg></i>
            <span>الرئيسية</span>
        </a>
        <div class="menu-item-with-submenu {{ $activeMenu === 'sliders' ? 'open' : '' }}">
            <div class="menu-item" onclick="toggleSubmenu(this)">
                <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M4 3H1V5H3V19H1V21H4C4.55228 21 5 20.5523 5 20V4C5 3.44772 4.55228 3 4 3ZM7 4C7 3.44772 7.44772 3 8 3H16C16.5523 3 17 3.44772 17 4V20C17 20.5523 16.5523 21 16 21H8C7.44772 21 7 20.5523 7 20V4ZM9 5V19H15V5H9ZM19 4C19 3.44772 19.4477 3 20 3H23V5H21V19H23V21H20C19.4477 21 19 20.5523 19 20V4Z"></path></svg></i>
                <span>سلايدر</span>
                <span class="menu-arrow"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z"></path></svg></span>
            </div>
            <div class="submenu">
                <a href="{{ route('sliders.index') }}" class="submenu-item {{ $activeSubmenu === 'sliders.index' ? 'active' : '' }}">عرض الجميع</a>
                <a href="{{ route('sliders.create') }}" class="submenu-item {{ $activeSubmenu === 'sliders.create' ? 'active' : '' }}">انشاء جديد</a>
            </div>
        </div>
        <div class="menu-item-with-submenu {{ $activeMenu === 'partners' ? 'open' : '' }}">
            <div class="menu-item" onclick="toggleSubmenu(this)">
                <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M3.16113 4.46875C5.58508 2.0448 9.44716 1.9355 12.0008 4.14085C14.5528 1.9355 18.4149 2.0448 20.8388 4.46875C23.2584 6.88836 23.3716 10.741 21.1785 13.2947L13.4142 21.0858C12.6686 21.8313 11.4809 21.8652 10.6952 21.1874L10.5858 21.0858L2.82141 13.2947C0.628282 10.741 0.741522 6.88836 3.16113 4.46875ZM4.57534 5.88296C2.86819 7.59011 2.81942 10.3276 4.42902 12.0937L4.57534 12.2469L12 19.6715L17.3026 14.3675L13.7677 10.8327L12.7071 11.8934C11.5355 13.0649 9.636 13.0649 8.46443 11.8934C7.29286 10.7218 7.29286 8.8223 8.46443 7.65073L10.5656 5.54823C8.85292 4.17713 6.37076 4.23993 4.7286 5.73663L4.57534 5.88296ZM13.0606 8.71139C13.4511 8.32086 14.0843 8.32086 14.4748 8.71139L18.7168 12.9533L19.4246 12.2469C21.1819 10.4896 21.1819 7.64032 19.4246 5.88296C17.7174 4.17581 14.9799 4.12704 13.2139 5.73663L13.0606 5.88296L9.87864 9.06494C9.51601 9.42757 9.49011 9.99942 9.80094 10.3919L9.87864 10.4792C10.2413 10.8418 10.8131 10.8677 11.2056 10.5569L11.2929 10.4792L13.0606 8.71139Z"></path></svg></i>
                <span>الشركاء</span>
                <span class="menu-arrow"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z"></path></svg></span>
            </div>
            <div class="submenu">
                <a href="{{ route('partners.index') }}" class="submenu-item {{ $activeSubmenu === 'partners.index' ? 'active' : '' }}">عرض الجميع</a>
                <a href="{{ route('partners.create') }}" class="submenu-item {{ $activeSubmenu === 'partners.create' ? 'active' : '' }}">انشاء جديد</a>
            </div>
        </div>
        <div class="menu-item-with-submenu {{ $activeMenu === 'abouts' ? 'open' : '' }}">
            <div class="menu-item" onclick="toggleSubmenu(this)">
                <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12.4142 5H21C21.5523 5 22 5.44772 22 6V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H10.4142L12.4142 5ZM4 5V19H20V7H11.5858L9.58579 5H4ZM11 12H13V17H11V12ZM11 9H13V11H11V9Z"></path></svg></i>
                <span>من نحن</span>
                <span class="menu-arrow"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z"></path></svg></span>
            </div>
            <div class="submenu">
                <a href="{{ route('abouts.index') }}" class="submenu-item {{ $activeSubmenu === 'abouts.index' ? 'active' : '' }}">عرض الجميع</a>
                <a href="{{ route('abouts.create') }}" class="submenu-item {{ $activeSubmenu === 'abouts.create' ? 'active' : '' }}">انشاء جديد</a>
            </div>
        </div>
        <div class="menu-item-with-submenu {{ $activeMenu === 'hero-slides' ? 'open' : '' }}">
            <div class="menu-item" onclick="toggleSubmenu(this)">
                <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M6 21.5C4.067 21.5 2.5 19.933 2.5 18C2.5 16.067 4.067 14.5 6 14.5C7.5852 14.5 8.92427 15.5539 9.35481 16.9992L15 16.9994V15L17 14.9994V9.24339L14.757 6.99938H9V9.00003H3V3.00003H9V4.99939H14.757L18 1.75739L22.2426 6.00003L19 9.24139V14.9994L21 15V21H15V18.9994L9.35499 19.0003C8.92464 20.4459 7.58543 21.5 6 21.5ZM6 16.5C5.17157 16.5 4.5 17.1716 4.5 18C4.5 18.8285 5.17157 19.5 6 19.5C6.82843 19.5 7.5 18.8285 7.5 18C7.5 17.1716 6.82843 16.5 6 16.5ZM19 17H17V19H19V17ZM18 4.58581L16.5858 6.00003L18 7.41424L19.4142 6.00003L18 4.58581ZM7 5.00003H5V7.00003H7V5.00003Z"></path></svg></i>
                <span>المشاريع</span>
                <span class="menu-arrow"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z"></path></svg></span>
            </div>
            <div class="submenu">
                <a href="{{ route('hero-slides.index') }}" class="submenu-item {{ $activeSubmenu === 'hero-slides.index' ? 'active' : '' }}">عرض جميع المشاريع</a>
                <a href="{{ route('hero-slides.create') }}" class="submenu-item {{ $activeSubmenu === 'hero-slides.create' ? 'active' : '' }}">انشاء مشروع جديد</a>
            </div>
        </div>

        <div class="menu-item-with-submenu {{ $activeMenu === 'services' ? 'open' : '' }}">
            <div class="menu-item" onclick="toggleSubmenu(this)">
                <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M10.0072 2.10365C8.60556 1.64993 7.08193 2.28104 6.41168 3.59294L5.6059 5.17011C5.51016 5.35751 5.35775 5.50992 5.17036 5.60566L3.59318 6.41144C2.28128 7.08169 1.65018 8.60532 2.10389 10.0069L2.64935 11.6919C2.71416 11.8921 2.71416 12.1077 2.64935 12.3079L2.10389 13.9929C1.65018 15.3945 2.28129 16.9181 3.59318 17.5883L5.17036 18.3941C5.35775 18.4899 5.51016 18.6423 5.6059 18.8297L6.41169 20.4068C7.08194 21.7187 8.60556 22.3498 10.0072 21.8961L11.6922 21.3507C11.8924 21.2859 12.1079 21.2859 12.3081 21.3507L13.9931 21.8961C15.3947 22.3498 16.9183 21.7187 17.5886 20.4068L18.3944 18.8297C18.4901 18.6423 18.6425 18.4899 18.8299 18.3941L20.4071 17.5883C21.719 16.9181 22.3501 15.3945 21.8964 13.9929L21.3509 12.3079C21.2861 12.1077 21.2861 11.8921 21.3509 11.6919L21.8964 10.0069C22.3501 8.60531 21.719 7.08169 20.4071 6.41144L18.8299 5.60566C18.6425 5.50992 18.4901 5.3575 18.3944 5.17011L17.5886 3.59294C16.9183 2.28104 15.3947 1.64993 13.9931 2.10365L12.3081 2.6491C12.1079 2.71391 11.8924 2.71391 11.6922 2.6491L10.0072 2.10365ZM8.19271 4.50286C8.41612 4.06556 8.924 3.8552 9.39119 4.00643L11.0762 4.55189C11.6768 4.74632 12.3235 4.74632 12.9241 4.55189L14.6091 4.00643C15.0763 3.8552 15.5841 4.06556 15.8076 4.50286L16.6133 6.08004C16.9006 6.64222 17.3578 7.09946 17.92 7.38668L19.4972 8.19246C19.9345 8.41588 20.1448 8.92375 19.9936 9.39095L19.4481 11.076C19.2537 11.6766 19.2537 12.3232 19.4481 12.9238L19.9936 14.6088C20.1448 15.076 19.9345 15.5839 19.4972 15.8073L17.92 16.6131C17.3578 16.9003 16.9006 17.3576 16.6133 17.9197L15.8076 19.4969C15.5841 19.9342 15.0763 20.1446 14.6091 19.9933L12.9241 19.4479C12.3235 19.2535 11.6768 19.2535 11.0762 19.4479L9.3912 19.9933C8.924 20.1446 8.41612 19.9342 8.19271 19.4969L7.38692 17.9197C7.09971 17.3576 6.64246 16.9003 6.08028 16.6131L4.50311 15.8073C4.06581 15.5839 3.85544 15.076 4.00668 14.6088L4.55213 12.9238C4.74656 12.3232 4.74656 11.6766 4.55213 11.076L4.00668 9.39095C3.85544 8.92375 4.06581 8.41588 4.50311 8.19246L6.08028 7.38668C6.64246 7.09946 7.09971 6.64222 7.38692 6.08004L8.19271 4.50286ZM6.75972 11.7573L11.0023 15.9999L18.0734 8.92885L16.6592 7.51464L11.0023 13.1715L8.17394 10.343L6.75972 11.7573Z"></path></svg></i>
                <span>الخدمات</span>
                <span class="menu-arrow"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z"></path></svg></span>
            </div>
            <div class="submenu">
                <a href="{{ route('services.index') }}" class="submenu-item {{ $activeSubmenu === 'services.index' ? 'active' : '' }}">عرض الجميع</a>
                <a href="{{ route('services.create') }}" class="submenu-item {{ $activeSubmenu === 'services.create' ? 'active' : '' }}">انشاء جديد</a>
            </div>
        </div>
        <div class="menu-item-with-submenu {{ $activeMenu === 'testimonials' ? 'open' : '' }}">
            <div class="menu-item" onclick="toggleSubmenu(this)">
                <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M11.9999 17C15.6623 17 18.8649 18.5751 20.607 20.9247L18.765 21.796C17.3473 20.1157 14.8473 19 11.9999 19C9.15248 19 6.65252 20.1157 5.23479 21.796L3.39355 20.9238C5.13576 18.5747 8.33796 17 11.9999 17ZM11.9999 2C14.7613 2 16.9999 4.23858 16.9999 7V10C16.9999 12.6888 14.8776 14.8818 12.2168 14.9954L11.9999 15C9.23847 15 6.9999 12.7614 6.9999 10V7C6.9999 4.31125 9.1222 2.11818 11.783 2.00462L11.9999 2ZM11.9999 4C10.4022 4 9.09623 5.24892 9.00499 6.82373L8.9999 7V10C8.9999 11.6569 10.343 13 11.9999 13C13.5976 13 14.9036 11.7511 14.9948 10.1763L14.9999 10V7C14.9999 5.34315 13.6567 4 11.9999 4Z"></path></svg></i>
                <span>اراء العملاء</span>
                <span class="menu-arrow"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z"></path></svg></span>
            </div>
            <div class="submenu">
                <a href="{{ route('testimonials.index') }}" class="submenu-item {{ $activeSubmenu === 'testimonials.index' ? 'active' : '' }}">عرض الجميع</a>
                <a href="{{ route('testimonials.create') }}" class="submenu-item {{ $activeSubmenu === 'testimonials.create' ? 'active' : '' }}">انشاء جديد</a>
            </div>
        </div>
        <div class="menu-item-with-submenu {{ $activeMenu === 'blogs' ? 'open' : '' }}">
            <div class="menu-item" onclick="toggleSubmenu(this)">
                <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M3 9.00886C3 5.69022 5.69071 2.99951 9.00935 2.99951H12C15.3093 2.99951 17.9942 5.67508 18.0093 8.98082H18.9533C20.1037 8.98082 21 9.87713 21 11.0275V14.9902C21 18.3088 18.3093 20.9995 14.9907 20.9995H9.00935C5.69071 20.9995 3 18.3088 3 14.9902V9.00886ZM9.00935 4.99951C6.79528 4.99951 5 6.79479 5 9.00886V14.9902C5 17.2042 6.79528 18.9995 9.00935 18.9995H14.9907C17.2047 18.9995 19 17.2042 19 14.9902V11H18C16.9243 11 16 10.0756 16 9C16 6.78593 14.2141 4.99951 12 4.99951H9.00935ZM8 9C8 8.44772 8.44772 8 9 8H12.5C13.0523 8 13.5 8.44772 13.5 9C13.5 9.55228 13.0523 10 12.5 10H9C8.44772 10 8 9.55228 8 9ZM9 14C8.44772 14 8 14.4477 8 15C8 15.5523 8.44772 16 9 16H15C15.5523 16 16 15.5523 16 15C16 14.4477 15.5523 14 15 14H9Z"></path></svg></i>
                <span>المدونة</span>
                <span class="menu-arrow"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z"></path></svg></span>
            </div>
            <div class="submenu">
                <a href="{{ route('blogs.index') }}" class="submenu-item {{ $activeSubmenu === 'blogs.index' ? 'active' : '' }}">عرض الجميع</a>
                <a href="{{ route('blogs.create') }}" class="submenu-item {{ $activeSubmenu === 'blogs.create' ? 'active' : '' }}">انشاء جديد</a>
            </div>
        </div>
        <div class="menu-item-with-submenu {{ $activeMenu === 'section-headers' ? 'open' : '' }}">
            <div class="menu-item" onclick="toggleSubmenu(this)">
                <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M19 11V5H5V11H19ZM19 13H5V19H19V13ZM4 3H20C20.5523 3 21 3.44772 21 4V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V4C3 3.44772 3.44772 3 4 3Z"></path></svg></i>
                <span>رؤوس الأقسام</span>
                <span class="menu-arrow"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z"></path></svg></span>
            </div>
            <div class="submenu">
                <a href="{{ route('index-section-headers.index') }}" class="submenu-item {{ $activeSubmenu === 'index-section-headers.index' ? 'active' : '' }}">رؤوس الأقسام</a>
                <a href="{{ route('index-section-headers.create') }}" class="submenu-item {{ $activeSubmenu === 'index-section-headers.create' ? 'active' : '' }}">إضافة رأس قسم</a>
            </div>
        </div>
        <a href="{{ route('settings.index') }}" class="menu-item {{ $activeMenu === 'settings' ? 'active' : '' }}">
            <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M3.33946 17.0002C2.90721 16.2515 2.58277 15.4702 2.36133 14.6741C3.3338 14.1779 3.99972 13.1668 3.99972 12.0002C3.99972 10.8345 3.3348 9.824 2.36353 9.32741C2.81025 7.71651 3.65857 6.21627 4.86474 4.99001C5.7807 5.58416 6.98935 5.65534 7.99972 5.072C9.01009 4.48866 9.55277 3.40635 9.4962 2.31604C11.1613 1.8846 12.8847 1.90004 14.5031 2.31862C14.4475 3.40806 14.9901 4.48912 15.9997 5.072C17.0101 5.65532 18.2187 5.58416 19.1346 4.99007C19.7133 5.57986 20.2277 6.25151 20.66 7.00021C21.0922 7.7489 21.4167 8.53025 21.6381 9.32628C20.6656 9.82247 19.9997 10.8336 19.9997 12.0002C19.9997 13.166 20.6646 14.1764 21.6359 14.673C21.1892 16.2839 20.3409 17.7841 19.1347 19.0104C18.2187 18.4163 17.0101 18.3451 15.9997 18.9284C14.9893 19.5117 14.4467 20.5941 14.5032 21.6844C12.8382 22.1158 11.1148 22.1004 9.49633 21.6818C9.55191 20.5923 9.00929 19.5113 7.99972 18.9284C6.98938 18.3451 5.78079 18.4162 4.86484 19.0103C4.28617 18.4205 3.77172 17.7489 3.33946 17.0002ZM8.99972 17.1964C10.0911 17.8265 10.8749 18.8227 11.2503 19.9659C11.7486 20.0133 12.2502 20.014 12.7486 19.9675C13.1238 18.8237 13.9078 17.8268 14.9997 17.1964C16.0916 16.5659 17.347 16.3855 18.5252 16.6324C18.8146 16.224 19.0648 15.7892 19.2729 15.334C18.4706 14.4373 17.9997 13.2604 17.9997 12.0002C17.9997 10.74 18.4706 9.5632 19.2729 8.6665C19.1688 8.4405 19.0538 8.21822 18.9279 8.00021C18.802 7.78219 18.667 7.57148 18.5233 7.36842C17.3457 7.61476 16.0911 7.43414 14.9997 6.80405C13.9083 6.17395 13.1246 5.17768 12.7491 4.03455C12.2509 3.98714 11.7492 3.98646 11.2509 4.03292C10.8756 5.17671 10.0916 6.17364 8.99972 6.80405C7.9078 7.43447 6.65245 7.61494 5.47428 7.36803C5.18485 7.77641 4.93463 8.21117 4.72656 8.66637C5.52881 9.56311 5.99972 10.74 5.99972 12.0002C5.99972 13.2604 5.52883 14.4372 4.72656 15.3339C4.83067 15.5599 4.94564 15.7822 5.07152 16.0002C5.19739 16.2182 5.3324 16.4289 5.47612 16.632C6.65377 16.3857 7.90838 16.5663 8.99972 17.1964ZM11.9997 15.0002C10.3429 15.0002 8.99972 13.6571 8.99972 12.0002C8.99972 10.3434 10.3429 9.00021 11.9997 9.00021C13.6566 9.00021 14.9997 10.3434 14.9997 12.0002C14.9997 13.6571 13.6566 15.0002 11.9997 15.0002ZM11.9997 13.0002C12.552 13.0002 12.9997 12.5525 12.9997 12.0002C12.9997 11.4479 12.552 11.0002 11.9997 11.0002C11.4474 11.0002 10.9997 11.4479 10.9997 12.0002C10.9997 12.5525 11.4474 13.0002 11.9997 13.0002Z"></path></svg></i>
            <span>الإعدادات</span>
        </a>
    </nav>
    <div class="sidebar-footer">
        <form method="POST" action="{{ route('admin.logout') }}" style="width: 100%;">
            @csrf
            <button type="submit" class="sidebar-logout-btn">
                <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M5 11H13V13H5V16L0 12L5 8V11ZM3.99927 18H6.70835C8.11862 19.2447 9.97111 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C9.97111 4 8.11862 4.75527 6.70835 6H3.99927C5.82368 3.57111 8.72836 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C8.72836 22 5.82368 20.4289 3.99927 18Z"></path></svg></i>
                <span>تسجيل الخروج</span>
            </button>
        </form>
    </div>
</aside>

