<footer class="fixed-bottom">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center px-3">
                    <a href="{{ url('/') }}" class="text-center">
                        <i class="uil-home-alt font-size-40 align-middle text-muted me-1"></i>
                    </a>
                    <a href="{{ route('notifications.index') }}" class="text-center">
                        <i class="uil-bell font-size-40 align-middle text-muted me-1"></i>
                        <span style="position: absolute; margin-left: -.5em;" class="badge bg-danger rounded-pill">
                            {{ $totalUnreadNotifications }}
                        </span>
                    </a>
                    <a href="{{ route('profile') }}" class="text-center">
                        <i class="uil-user-circle font-size-40 align-middle text-muted me-1"></i>
                    </a>
                    <a href="javascript:void(0)" onclick="toggleMenu(this)" class="text-center vertical-menu-btn">
                        <i class="uil-apps font-size-40 align-middle text-muted me-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
    function toggleMenu(element) {
        // Toggle 'active' class on the vertical menu
        const menus = document.querySelectorAll('.vertical-menu');
        menus.forEach(function(menu) {
            menu.classList.toggle('active');
        });

        // Toggle 'text-muted' class on the clicked icon (element)
        element.querySelector('i').classList.toggle('text-muted');
    }
    
    document.addEventListener('DOMContentLoaded', function () {
        // Get the current page URL
        const currentUrl = window.location.href;

        // Get all the <a> elements inside the footer
        const footerLinks = document.querySelectorAll('footer a');

        // Loop through each <a> element
        footerLinks.forEach(function(link) {
            // Check if the href matches the current URL
            if (link.href === currentUrl) {
                // Find the <i> inside the <a> and remove the 'text-muted' class
                const icon = link.querySelector('i');
                if (icon) {
                    icon.classList.remove('text-muted');
                }
            }
        });
    });
</script>
