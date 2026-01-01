@extends('layouts.admin-layout')

@section('title', 'لوحة التحكم')
@section('page-title', 'لوحة التحكم الرئيسية')

@push('styles')
<style>
    * {
        font-family: '29ltbukra' !important;
    }

    .welcome-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 12px;
        padding: 40px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
        color: white;
    }

    .welcome-card h2 {
        color: white;
        font-size: 28px;
        margin-bottom: 10px;
    }

    .welcome-card p {
        color: rgba(255, 255, 255, 0.9);
        font-size: 16px;
        line-height: 1.6;
    }

    .dashboard-cards {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 25px;
        margin-top: 30px;
    }

    .dashboard-card {
        background: white;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        cursor: pointer;
        border: 1px solid #f0f0f0;
        position: relative;
        overflow: hidden;
    }

    .dashboard-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .dashboard-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        border-color: #667eea;
    }

    .dashboard-card:hover::before {
        transform: scaleX(1);
    }

    .dashboard-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .dashboard-card-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        svg {
            fill: white;
            width: 30px;
            height: 30px;
            margin-top: 2px;
        }
    }

    .dashboard-card-title {
        color: #333;
        font-size: 18px;
        font-weight: 600;
        margin: 0;
        flex: 1;
        margin-right: 0;
    }

    .dashboard-card-value {
        color: #667eea;
        font-size: 42px;
        font-weight: 700;
        margin-bottom: 10px;
        line-height: 1;
    }

    .dashboard-card-label-link-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        margin-top: 10px;
    }

    .dashboard-card-label {
        color: #666;
        font-size: 14px;
        margin: 0;
        font-weight: 600;
    }

    .dashboard-card-link {
        display: inline-flex;
        align-items: center;
        color: #667eea;
        font-size: 12px;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
        margin: 0;
    }

    .dashboard-card-link:hover {
        color: #764ba2;
        transform: translateX(-5px);
    }

    .dashboard-card-link svg {
        margin-right: 5px;
        transition: transform 0.3s ease;
    }

    .dashboard-card:hover .dashboard-card-link svg {
        transform: translateX(-3px);
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 30px;
    }

    .stat-card {
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .stat-card h3 {
        color: #666;
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stat-card .value {
        color: #333;
        font-size: 32px;
        font-weight: 700;
    }
</style>
@endpush

@section('content')
    <div class="welcome-card">
        <h2>مرحباً بك في لوحة تحكم TowerTech</h2>
        <p>تم تسجيل الدخول بنجاح إلى لوحة التحكم. هذا هو مركز التحكم الخاص بك حيث يمكنك إدارة جميع أقسام التطبيق.</p>
    </div>

    <div class="dashboard-cards">
        <!-- Sliders Card -->
        <a href="{{ route('sliders.index') }}" class="dashboard-card" style="text-decoration: none; color: inherit;">
            <div class="dashboard-card-header">
                <h3 class="dashboard-card-title">سلايدر</h3>
                <div class="dashboard-card-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M4 3H1V5H3V19H1V21H4C4.55228 21 5 20.5523 5 20V4C5 3.44772 4.55228 3 4 3ZM7 4C7 3.44772 7.44772 3 8 3H16C16.5523 3 17 3.44772 17 4V20C17 20.5523 16.5523 21 16 21H8C7.44772 21 7 20.5523 7 20V4ZM9 5V19H15V5H9ZM19 4C19 3.44772 19.4477 3 20 3H23V5H21V19H23V21H20C19.4477 21 19 20.5523 19 20V4Z"></path></svg></div>
            </div>
            <div class="dashboard-card-value">{{ $stats['sliders'] }}</div>
            <div class="dashboard-card-label-link-container">
                <div class="dashboard-card-label">عدد السلايدرات</div>
                <div class="dashboard-card-link">
                    عرض الكل
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                        <path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"/>
                    </svg>
                </div>
            </div>
        </a>

        <!-- Partners Card -->
        <a href="{{ route('partners.index') }}" class="dashboard-card" style="text-decoration: none; color: inherit;">
            <div class="dashboard-card-header">
                <h3 class="dashboard-card-title">الشركاء</h3>
                <div class="dashboard-card-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M3.16113 4.46875C5.58508 2.0448 9.44716 1.9355 12.0008 4.14085C14.5528 1.9355 18.4149 2.0448 20.8388 4.46875C23.2584 6.88836 23.3716 10.741 21.1785 13.2947L13.4142 21.0858C12.6686 21.8313 11.4809 21.8652 10.6952 21.1874L10.5858 21.0858L2.82141 13.2947C0.628282 10.741 0.741522 6.88836 3.16113 4.46875ZM4.57534 5.88296C2.86819 7.59011 2.81942 10.3276 4.42902 12.0937L4.57534 12.2469L12 19.6715L17.3026 14.3675L13.7677 10.8327L12.7071 11.8934C11.5355 13.0649 9.636 13.0649 8.46443 11.8934C7.29286 10.7218 7.29286 8.8223 8.46443 7.65073L10.5656 5.54823C8.85292 4.17713 6.37076 4.23993 4.7286 5.73663L4.57534 5.88296ZM13.0606 8.71139C13.4511 8.32086 14.0843 8.32086 14.4748 8.71139L18.7168 12.9533L19.4246 12.2469C21.1819 10.4896 21.1819 7.64032 19.4246 5.88296C17.7174 4.17581 14.9799 4.12704 13.2139 5.73663L13.0606 5.88296L9.87864 9.06494C9.51601 9.42757 9.49011 9.99942 9.80094 10.3919L9.87864 10.4792C10.2413 10.8418 10.8131 10.8677 11.2056 10.5569L11.2929 10.4792L13.0606 8.71139Z"></path></svg></div>
            </div>
            <div class="dashboard-card-value">{{ $stats['partners'] }}</div>
            <div class="dashboard-card-label-link-container">
                <div class="dashboard-card-label">عدد الشركاء</div>
                <div class="dashboard-card-link">
                    عرض الكل
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                        <path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"/>
                    </svg>
                </div>
            </div>
        </a>

        <!-- About Us Card -->
        <a href="{{ route('abouts.index') }}" class="dashboard-card" style="text-decoration: none; color: inherit;">
            <div class="dashboard-card-header">
                <h3 class="dashboard-card-title">من نحن</h3>
                <div class="dashboard-card-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12.4142 5H21C21.5523 5 22 5.44772 22 6V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H10.4142L12.4142 5ZM4 5V19H20V7H11.5858L9.58579 5H4ZM11 12H13V17H11V12ZM11 9H13V11H11V9Z"></path></svg></div>
            </div>
            <div class="dashboard-card-value">{{ $stats['about'] }}</div>
            <div class="dashboard-card-label-link-container">
                <div class="dashboard-card-label">عدد العناصر</div>
                <div class="dashboard-card-link">
                    عرض الكل
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                        <path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"/>
                    </svg>
                </div>
            </div>
        </a>

        <!-- Hero Slides Card -->
        <a href="{{ route('hero-slides.index') }}" class="dashboard-card" style="text-decoration: none; color: inherit;">
            <div class="dashboard-card-header">
                <h3 class="dashboard-card-title">المشاريع</h3>
                <div class="dashboard-card-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M6 21.5C4.067 21.5 2.5 19.933 2.5 18C2.5 16.067 4.067 14.5 6 14.5C7.5852 14.5 8.92427 15.5539 9.35481 16.9992L15 16.9994V15L17 14.9994V9.24339L14.757 6.99938H9V9.00003H3V3.00003H9V4.99939H14.757L18 1.75739L22.2426 6.00003L19 9.24139V14.9994L21 15V21H15V18.9994L9.35499 19.0003C8.92464 20.4459 7.58543 21.5 6 21.5ZM6 16.5C5.17157 16.5 4.5 17.1716 4.5 18C4.5 18.8285 5.17157 19.5 6 19.5C6.82843 19.5 7.5 18.8285 7.5 18C7.5 17.1716 6.82843 16.5 6 16.5ZM19 17H17V19H19V17ZM18 4.58581L16.5858 6.00003L18 7.41424L19.4142 6.00003L18 4.58581ZM7 5.00003H5V7.00003H7V5.00003Z"></path></svg></div>
            </div>
            <div class="dashboard-card-value">{{ $stats['hero_slides'] }}</div>
            <div class="dashboard-card-label-link-container">
                <div class="dashboard-card-label">عدد المشاريع</div>
                <div class="dashboard-card-link">
                    عرض الكل
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                        <path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"/>
                    </svg>
                </div>
            </div>
        </a>

        <!-- Services Card -->
        <a href="{{ route('services.index') }}" class="dashboard-card" style="text-decoration: none; color: inherit;">
            <div class="dashboard-card-header">
                <h3 class="dashboard-card-title">الخدمات</h3>
                <div class="dashboard-card-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M10.0072 2.10365C8.60556 1.64993 7.08193 2.28104 6.41168 3.59294L5.6059 5.17011C5.51016 5.35751 5.35775 5.50992 5.17036 5.60566L3.59318 6.41144C2.28128 7.08169 1.65018 8.60532 2.10389 10.0069L2.64935 11.6919C2.71416 11.8921 2.71416 12.1077 2.64935 12.3079L2.10389 13.9929C1.65018 15.3945 2.28129 16.9181 3.59318 17.5883L5.17036 18.3941C5.35775 18.4899 5.51016 18.6423 5.6059 18.8297L6.41169 20.4068C7.08194 21.7187 8.60556 22.3498 10.0072 21.8961L11.6922 21.3507C11.8924 21.2859 12.1079 21.2859 12.3081 21.3507L13.9931 21.8961C15.3947 22.3498 16.9183 21.7187 17.5886 20.4068L18.3944 18.8297C18.4901 18.6423 18.6425 18.4899 18.8299 18.3941L20.4071 17.5883C21.719 16.9181 22.3501 15.3945 21.8964 13.9929L21.3509 12.3079C21.2861 12.1077 21.2861 11.8921 21.3509 11.6919L21.8964 10.0069C22.3501 8.60531 21.719 7.08169 20.4071 6.41144L18.8299 5.60566C18.6425 5.50992 18.4901 5.3575 18.3944 5.17011L17.5886 3.59294C16.9183 2.28104 15.3947 1.64993 13.9931 2.10365L12.3081 2.6491C12.1079 2.71391 11.8924 2.71391 11.6922 2.6491L10.0072 2.10365ZM8.19271 4.50286C8.41612 4.06556 8.924 3.8552 9.39119 4.00643L11.0762 4.55189C11.6768 4.74632 12.3235 4.74632 12.9241 4.55189L14.6091 4.00643C15.0763 3.8552 15.5841 4.06556 15.8076 4.50286L16.6133 6.08004C16.9006 6.64222 17.3578 7.09946 17.92 7.38668L19.4972 8.19246C19.9345 8.41588 20.1448 8.92375 19.9936 9.39095L19.4481 11.076C19.2537 11.6766 19.2537 12.3232 19.4481 12.9238L19.9936 14.6088C20.1448 15.076 19.9345 15.5839 19.4972 15.8073L17.92 16.6131C17.3578 16.9003 16.9006 17.3576 16.6133 17.9197L15.8076 19.4969C15.5841 19.9342 15.0763 20.1446 14.6091 19.9933L12.9241 19.4479C12.3235 19.2535 11.6768 19.2535 11.0762 19.4479L9.3912 19.9933C8.924 20.1446 8.41612 19.9342 8.19271 19.4969L7.38692 17.9197C7.09971 17.3576 6.64246 16.9003 6.08028 16.6131L4.50311 15.8073C4.06581 15.5839 3.85544 15.076 4.00668 14.6088L4.55213 12.9238C4.74656 12.3232 4.74656 11.6766 4.55213 11.076L4.00668 9.39095C3.85544 8.92375 4.06581 8.41588 4.50311 8.19246L6.08028 7.38668C6.64246 7.09946 7.09971 6.64222 7.38692 6.08004L8.19271 4.50286ZM6.75972 11.7573L11.0023 15.9999L18.0734 8.92885L16.6592 7.51464L11.0023 13.1715L8.17394 10.343L6.75972 11.7573Z"></path></svg></div>
            </div>
            <div class="dashboard-card-value">{{ $stats['services'] }}</div>
            <div class="dashboard-card-label-link-container">
                <div class="dashboard-card-label">عدد الخدمات</div>
                <div class="dashboard-card-link">
                    عرض الكل
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                        <path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"/>
                    </svg>
                </div>
            </div>
        </a>

        <!-- Testimonials Card -->
        <a href="{{ route('testimonials.index') }}" class="dashboard-card" style="text-decoration: none; color: inherit;">
            <div class="dashboard-card-header">
                <h3 class="dashboard-card-title">آراء العملاء</h3>
                <div class="dashboard-card-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M11.9999 17C15.6623 17 18.8649 18.5751 20.607 20.9247L18.765 21.796C17.3473 20.1157 14.8473 19 11.9999 19C9.15248 19 6.65252 20.1157 5.23479 21.796L3.39355 20.9238C5.13576 18.5747 8.33796 17 11.9999 17ZM11.9999 2C14.7613 2 16.9999 4.23858 16.9999 7V10C16.9999 12.6888 14.8776 14.8818 12.2168 14.9954L11.9999 15C9.23847 15 6.9999 12.7614 6.9999 10V7C6.9999 4.31125 9.1222 2.11818 11.783 2.00462L11.9999 2ZM11.9999 4C10.4022 4 9.09623 5.24892 9.00499 6.82373L8.9999 7V10C8.9999 11.6569 10.343 13 11.9999 13C13.5976 13 14.9036 11.7511 14.9948 10.1763L14.9999 10V7C14.9999 5.34315 13.6567 4 11.9999 4Z"></path></svg></div>
            </div>
            <div class="dashboard-card-value">{{ $stats['testimonials'] }}</div>
            <div class="dashboard-card-label-link-container">
                <div class="dashboard-card-label">عدد الآراء</div>
                <div class="dashboard-card-link">
                    عرض الكل
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                        <path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"/>
                    </svg>
                </div>
            </div>
        </a>

        <!-- Blog Card -->
        <a href="{{ route('blogs.index') }}" class="dashboard-card" style="text-decoration: none; color: inherit;">
            <div class="dashboard-card-header">
                <h3 class="dashboard-card-title">المدونة</h3>
                <div class="dashboard-card-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M3 9.00886C3 5.69022 5.69071 2.99951 9.00935 2.99951H12C15.3093 2.99951 17.9942 5.67508 18.0093 8.98082H18.9533C20.1037 8.98082 21 9.87713 21 11.0275V14.9902C21 18.3088 18.3093 20.9995 14.9907 20.9995H9.00935C5.69071 20.9995 3 18.3088 3 14.9902V9.00886ZM9.00935 4.99951C6.79528 4.99951 5 6.79479 5 9.00886V14.9902C5 17.2042 6.79528 18.9995 9.00935 18.9995H14.9907C17.2047 18.9995 19 17.2042 19 14.9902V11H18C16.9243 11 16 10.0756 16 9C16 6.78593 14.2141 4.99951 12 4.99951H9.00935ZM8 9C8 8.44772 8.44772 8 9 8H12.5C13.0523 8 13.5 8.44772 13.5 9C13.5 9.55228 13.0523 10 12.5 10H9C8.44772 10 8 9.55228 8 9ZM9 14C8.44772 14 8 14.4477 8 15C8 15.5523 8.44772 16 9 16H15C15.5523 16 16 15.5523 16 15C16 14.4477 15.5523 14 15 14H9Z"></path></svg></div>
            </div>
            <div class="dashboard-card-value">{{ $stats['blogs'] }}</div>
            <div class="dashboard-card-label-link-container">
                <div class="dashboard-card-label">عدد المقالات</div>
                <div class="dashboard-card-link">
                    عرض الكل
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                        <path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"/>
                    </svg>
                </div>
            </div>
        </a>

        <!-- Categories Card -->
        <a href="{{ route('admin.categories.index') }}" class="dashboard-card" style="text-decoration: none; color: inherit;">
            <div class="dashboard-card-header">
                <h3 class="dashboard-card-title">الأقسام</h3>
                <div class="dashboard-card-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M3 3C2.44772 3 2 3.44772 2 4V20C2 20.5523 2.44772 21 3 21H21C21.5523 21 22 20.5523 22 20V4C22 3.44772 21.5523 3 21 3H3ZM4 5H20V19H4V5ZM6 7V9H18V7H6ZM6 11V13H18V11H6ZM6 15V17H14V15H6Z"></path></svg></div>
            </div>
            <div class="dashboard-card-value">{{ $stats['categories'] }}</div>
            <div class="dashboard-card-label-link-container">
                <div class="dashboard-card-label">عدد الأقسام</div>
                <div class="dashboard-card-link">
                    عرض الكل
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                        <path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"/>
                    </svg>
                </div>
            </div>
        </a>

        <!-- Settings Card -->
        <a href="{{ route('settings.index') }}" class="dashboard-card" style="text-decoration: none; color: inherit;">
            <div class="dashboard-card-header">
                <h3 class="dashboard-card-title">الإعدادات</h3>
                <div class="dashboard-card-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M3.33946 17.0002C2.90721 16.2515 2.58277 15.4702 2.36133 14.6741C3.3338 14.1779 3.99972 13.1668 3.99972 12.0002C3.99972 10.8345 3.3348 9.824 2.36353 9.32741C2.81025 7.71651 3.65857 6.21627 4.86474 4.99001C5.7807 5.58416 6.98935 5.65534 7.99972 5.072C9.01009 4.48866 9.55277 3.40635 9.4962 2.31604C11.1613 1.8846 12.8847 1.90004 14.5031 2.31862C14.4475 3.40806 14.9901 4.48912 15.9997 5.072C17.0101 5.65532 18.2187 5.58416 19.1346 4.99007C19.7133 5.57986 20.2277 6.25151 20.66 7.00021C21.0922 7.7489 21.4167 8.53025 21.6381 9.32628C20.6656 9.82247 19.9997 10.8336 19.9997 12.0002C19.9997 13.166 20.6646 14.1764 21.6359 14.673C21.1892 16.2839 20.3409 17.7841 19.1347 19.0104C18.2187 18.4163 17.0101 18.3451 15.9997 18.9284C14.9893 19.5117 14.4467 20.5941 14.5032 21.6844C12.8382 22.1158 11.1148 22.1004 9.49633 21.6818C9.55191 20.5923 9.00929 19.5113 7.99972 18.9284C6.98938 18.3451 5.78079 18.4162 4.86484 19.0103C4.28617 18.4205 3.77172 17.7489 3.33946 17.0002ZM8.99972 17.1964C10.0911 17.8265 10.8749 18.8227 11.2503 19.9659C11.7486 20.0133 12.2502 20.014 12.7486 19.9675C13.1238 18.8237 13.9078 17.8268 14.9997 17.1964C16.0916 16.5659 17.347 16.3855 18.5252 16.6324C18.8146 16.224 19.0648 15.7892 19.2729 15.334C18.4706 14.4373 17.9997 13.2604 17.9997 12.0002C17.9997 10.74 18.4706 9.5632 19.2729 8.6665C19.1688 8.4405 19.0538 8.21822 18.9279 8.00021C18.802 7.78219 18.667 7.57148 18.5233 7.36842C17.3457 7.61476 16.0911 7.43414 14.9997 6.80405C13.9083 6.17395 13.1246 5.17768 12.7491 4.03455C12.2509 3.98714 11.7492 3.98646 11.2509 4.03292C10.8756 5.17671 10.0916 6.17364 8.99972 6.80405C7.9078 7.43447 6.65245 7.61494 5.47428 7.36803C5.18485 7.77641 4.93463 8.21117 4.72656 8.66637C5.52881 9.56311 5.99972 10.74 5.99972 12.0002C5.99972 13.2604 5.52883 14.4372 4.72656 15.3339C4.83067 15.5599 4.94564 15.7822 5.07152 16.0002C5.19739 16.2182 5.3324 16.4289 5.47612 16.632C6.65377 16.3857 7.90838 16.5663 8.99972 17.1964ZM11.9997 15.0002C10.3429 15.0002 8.99972 13.6571 8.99972 12.0002C8.99972 10.3434 10.3429 9.00021 11.9997 9.00021C13.6566 9.00021 14.9997 10.3434 14.9997 12.0002C14.9997 13.6571 13.6566 15.0002 11.9997 15.0002ZM11.9997 13.0002C12.552 13.0002 12.9997 12.5525 12.9997 12.0002C12.9997 11.4479 12.552 11.0002 11.9997 11.0002C11.4474 11.0002 10.9997 11.4479 10.9997 12.0002C10.9997 12.5525 11.4474 13.0002 11.9997 13.0002Z"></path></svg></div>
            </div>
            <div class="dashboard-card-value">{{ $stats['settings'] }}</div>
            <div class="dashboard-card-label-link-container">
                <div class="dashboard-card-label">الإعدادات العامة</div>
                <div class="dashboard-card-link">
                    عرض الكل
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                        <path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"/>
                    </svg>
                </div>
            </div>
        </a>
    </div>
@endsection
