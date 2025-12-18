<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('open');
    }

    function toggleSubmenu(element) {
        const menuItemWithSubmenu = element.closest('.menu-item-with-submenu');
        menuItemWithSubmenu.classList.toggle('open');
    }

    function toggleUserDropdown() {
        const dropdown = document.querySelector('.user-dropdown');
        dropdown.classList.toggle('active');
    }

    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function(event) {
        const sidebar = document.getElementById('sidebar');
        const menuToggle = document.querySelector('.menu-toggle');
        
        if (window.innerWidth <= 768) {
            if (!sidebar.contains(event.target) && !menuToggle.contains(event.target)) {
                sidebar.classList.remove('open');
            }
        }

        // Close user dropdown when clicking outside
        const userDropdown = document.querySelector('.user-dropdown');
        const userDropdownToggle = document.querySelector('.user-dropdown-toggle');
        const userDropdownMenu = document.getElementById('userDropdownMenu');
        
        if (userDropdown && !userDropdown.contains(event.target)) {
            userDropdown.classList.remove('active');
        }
    });

    // Set active menu item and submenu item
    document.querySelectorAll('.menu-item').forEach(item => {
        item.addEventListener('click', function(e) {
            if (this.getAttribute('href') === '#') {
                e.preventDefault();
            }
            // Don't toggle submenu if clicking on a menu item with submenu
            if (!this.closest('.menu-item-with-submenu')) {
                document.querySelectorAll('.menu-item').forEach(i => i.classList.remove('active'));
                this.classList.add('active');
            }
        });
    });

    // Set active submenu item
    document.querySelectorAll('.submenu-item').forEach(item => {
        item.addEventListener('click', function(e) {
            if (this.getAttribute('href') === '#') {
                e.preventDefault();
            }
            document.querySelectorAll('.submenu-item').forEach(i => i.classList.remove('active'));
            this.classList.add('active');
        });
    });
</script>

