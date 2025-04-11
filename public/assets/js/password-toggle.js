function togglePassword(inputId, icon) {
    const passwordInput = document.getElementById(inputId);
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    } else {
        passwordInput.type = 'password';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    }
}

// Add session check functionality for lock screen
document.addEventListener('DOMContentLoaded', function() {
    // Check if we're on the lock screen page by looking for the session check route
    if (typeof checkSessionRoute !== 'undefined') {
        // Function to check session status
        function checkSessionStatus() {
            fetch(checkSessionRoute, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                credentials: 'same-origin'
            })
            .then(response => response.json())
            .then(data => {
                if (data.expired) {
                    // Redirect to login page if session expired
                    window.location.href = loginRoute;
                }
            })
            .catch(error => {
                console.error('Error checking session status:', error);
            });
        }

        // Check session status immediately and then every second
        checkSessionStatus();
        setInterval(checkSessionStatus, 1000);
    }
}); 