<!DOCTYPE html>
<html>
<head>
    <title>Redirecting...</title>
    <script>
        // Open invoice in new tab
        window.open("{{ $invoice_url }}", "_blank");
        
        // Redirect current page
        window.location.href = "{{ $redirect_url }}";
    </script>
</head>
<body>
    <p>Redirecting, please wait...</p>
</body>
</html> 