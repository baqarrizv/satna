/**
 * Lock screen check functionality
 * Checks if the current session is locked and redirects to lock screen if necessary
 */

document.addEventListener("DOMContentLoaded", function() {
    // Don't run the check on the lock screen or unlock pages
    const currentUrl = window.location.pathname;
    // Check against the correct paths for lock-screen and unlock routes
    if (currentUrl === '/lock-screen' || currentUrl === '/unlock') {
        return;
    }

    // Function to check if session is locked
    function checkIfLocked() {
        fetch('/check-session')
            .then(response => response.json())
            .then(data => {
                // If the session is not expired (meaning it's locked), redirect to lock screen
                if (!data.expired) {
                    window.location.href = '/lock-screen';
                }
            })
            .catch(error => {
                console.error('Error checking lock status:', error);
            });
    }

    // Run check immediately before page content loads fully
    checkIfLocked();
}); 