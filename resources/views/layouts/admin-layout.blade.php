<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'لوحة التحكم') - TowerTech</title>
    @include('admin.partials.styles')
    @stack('styles')
</head>
<body>
    <div class="dashboard-container">
        @include('admin.partials.sidebar')
        
        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
                <h1>@yield('page-title', 'لوحة التحكم')</h1>
                <div class="user-info">
                    <div class="user-dropdown">
                        <button class="user-dropdown-toggle" onclick="toggleUserDropdown()">
                            <div class="user-avatar">
                                @php
                                    $user = Auth::user();
                                    $nameParts = explode(' ', $user->name ?? $user->email);
                                    $firstName = $nameParts[0];
                                    $initials = strtoupper(substr($firstName, 0, 1));
                                    if (isset($nameParts[1]) && !empty($nameParts[1])) {
                                        $initials .= strtoupper(substr($nameParts[1], 0, 1));
                                    } else {
                                        $initials .= strtoupper(substr($firstName, 1, 1) ?? substr($firstName, 0, 1));
                                    }
                                @endphp
                                @if($user->image)
                                    <img src="{{ asset('storage/' . $user->image) }}" alt="{{ $user->name }}" class="avatar-image">
                                @else
                                    <span class="avatar-initials">{{ $initials }}</span>
                                @endif
                            </div>
                            <div class="user-details">
                                <span class="user-name">{{ $firstName }}</span>
                                <span class="user-role">مدير</span>
                            </div>
                            <i class="dropdown-arrow">▼</i>
                        </button>
                        <div class="user-dropdown-menu" id="userDropdownMenu">
                            <a href="{{ route('profile.edit') }}" class="dropdown-item">
                                <i>👤</i>
                                <span>تعديل الحساب</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>

    @include('admin.partials.scripts')
    @stack('scripts')
</body>
</html>

