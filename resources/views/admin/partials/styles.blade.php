<style>
    @font-face {
        font-family: '29ltbukra';
        font-style: normal;
        font-weight: normal;
        src: url('{{ asset("fonts/29ltbukraregular.ttf") }}') format('truetype');
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: '29ltbukra' !important;
    }

    body {
        font-family: '29ltbukra' !important;
        background: #f5f7fa;
        min-height: 100vh;
        direction: rtl;
    }

    .dashboard-container {
        display: flex;
        min-height: 100vh;
    }

    /* Sidebar Styles */
    .sidebar {
        width: 260px;
        background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
        color: white;
        position: fixed;
        height: 100vh;
        overflow-y: scroll;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    .sidebar-header {
        padding: 9px 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .sidebar-header h2 {
        font-size: 22px;
        font-weight: 700;
        color: white;
    }

    .sidebar-logo-link {
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        width: 100%;
    }

    .sidebar-logo {
        max-width: 100%;
        max-height: 60px;
        width: auto;
        height: auto;
        object-fit: contain;
    }

    .sidebar-menu {
        padding: 20px 0 100px 0;
    }

    .sidebar-footer {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 20px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        background: #161e2d;
        width: 260px;
    }

    .sidebar-logout-btn {
        width: 100%;
        padding: 15px 25px;
        background: rgba(239, 68, 68, 0.2);
        color: white;
        border: 1px solid rgba(239, 68, 68, 0.3);
        border-radius: 8px;
        font-size: 16px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 12px;
        font-family: '29ltbukra' !important;
    }

    .sidebar-logout-btn:hover {
        background: rgba(239, 68, 68, 0.3);
        border-color: rgba(239, 68, 68, 0.5);
    }

    .sidebar-logout-btn i {
        width: 20px;
        text-align: center;
        font-size: 18px;
    }

    .menu-item {
        display: block;
        padding: 15px 25px;
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        transition: all 0.3s ease;
        border-right: 3px solid transparent;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .menu-item:hover {
        background: rgba(255, 255, 255, 0.1);
        color: white;
        border-right-color: #3b82f6;
    }

    .menu-item.active {
        background: rgba(59, 130, 246, 0.2);
        color: white;
        border-right-color: #3b82f6;
    }

    .menu-item i {
        width: 20px;
        text-align: center;
        font-size: 18px;
        svg {
            fill: white;
            width: 20px;
            height: 20px;
            margin-top: 2px;
        }
    }

    /* Submenu Styles */
    .menu-item-with-submenu {
        position: relative;
    }

    .menu-item-with-submenu > .menu-item {
        cursor: pointer;
    }

    .menu-item-with-submenu .menu-arrow {
        margin-right: auto;
        transition: transform 0.3s ease;
        font-size: 14px;
        svg {
            fill: white;
            width: 14px;
            height: 14px;
        }
    }

    .menu-item-with-submenu.open .menu-arrow {
        transform: rotate(180deg);
    }

    .submenu {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
        background: rgba(0, 0, 0, 0.2);
    }

    .menu-item-with-submenu.open .submenu {
        max-height: 500px;
    }

    .submenu-item {
        display: block;
        padding: 12px 25px 12px 50px;
        color: rgba(255, 255, 255, 0.7);
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 14px;
        border-right: 3px solid transparent;
    }

    .submenu-item:hover {
        background: rgba(255, 255, 255, 0.1);
        color: white;
        border-right-color: #3b82f6;
        padding-right: 30px;
    }

    .submenu-item.active {
        background: rgba(59, 130, 246, 0.15);
        color: white;
        border-right-color: #3b82f6;
    }

    /* Main Content */
    .main-content {
        flex: 1;
        margin-right: 260px;
        min-height: 100vh;
    }

    .header {
        background: white;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 12px 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: sticky;
        top: 0;
        z-index: 100;
    }

    .header h1 {
        color: #333;
        font-size: 20px;
        font-weight: 600;
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 20px;
        width: 200px;
    }

    .user-dropdown {
        position: relative;
    }

    .user-dropdown-toggle {
        display: flex;
        align-items: center;
        gap: 12px;
        background: transparent;
        border: none;
        cursor: pointer;
        padding: 8px 12px;
        border-radius: 8px;
        transition: background 0.3s;
        background: #f5f7fa;
    }

    .user-dropdown-toggle:hover {
        background:rgb(220, 222, 224);
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        font-size: 14px;
        overflow: hidden;
        flex-shrink: 0;
        position: relative;
    }

    .avatar-initials {
        color: white;
    }

    .avatar-image {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
    }

    .user-details {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 2px;
    }

    .user-name {
        color: #333;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: -3px;
    }

    .user-role {
        color: #666;
        font-size: 10px;
    }

    .dropdown-arrow {
        font-size: 12px;
        color: #666;
        transition: transform 0.3s;
        margin-right: 35px;
    }

    .user-dropdown.active .dropdown-arrow {
        transform: rotate(180deg);
    }

    .user-dropdown-menu {
        position: absolute;
        top: calc(100% + 10px);
        left: 0;
        background: white;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        min-width: 200px;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.3s ease;
        z-index: 1000;
        overflow: hidden;
    }

    .user-dropdown.active .user-dropdown-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .dropdown-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 20px;
        color: #333;
        text-decoration: none;
        transition: background 0.3s;
        font-size: 14px;
    }

    .dropdown-item:hover {
        background: #f5f7fa;
    }

    .dropdown-item i {
        width: 20px;
        text-align: center;
        font-size: 16px;
    }

    .container {
        max-width: 100%;
        width: 100%;
        margin: 40px auto;
        padding: 0 20px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .sidebar {
            transform: translateX(100%);
            transition: transform 0.3s;
        }

        .sidebar.open {
            transform: translateX(0);
        }

        .main-content {
            margin-right: 0;
        }

        .menu-toggle {
            display: block;
            background: #3b82f6;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 18px;
        }
    }

    @media (min-width: 769px) {
        .menu-toggle {
            display: none;
        }
    }
</style>

