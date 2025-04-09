<!DOCTYPE html>
<html>
<head>
    <title>Redirecting...</title>
</head>
<body>
    <p>Redirecting, please wait...</p>

    <script>
        // Wait for the page to load and then simulate user interaction to avoid pop-up blockers
       
            // Open invoice in a new tab
            var newTab = window.open("{{ $invoice_url }}", "_blank");

            if (newTab) {
                // If the tab opened successfully (not blocked), redirect the current page.
                window.location.href = "{{ $redirect_url }}";
            } else {
                // If the pop-up was blocked, alert the user
                alert("Please allow pop-ups for this site to view the invoice.");
            }
       
    </script>
</body>
</html>
