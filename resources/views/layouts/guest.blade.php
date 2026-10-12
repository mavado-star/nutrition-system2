<!DOCTYPE html>
<html>
<head>
    <title>MASOLO Labs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#0d6efd; display:flex; justify-content:center; align-items:center; min-height:100vh;">
<div style="background:white; padding:30px; border-radius:15px; width:410px; text-align:center;">
    <img src="/masolo-health.jpeg" style="height:95px; width:95px; object-fit:cover; border-radius:50%; border:3px solid #0d6efd; background:#000;">
    <h3 style="font-weight:900; color:#0d6efd; margin-top:12px;">MASOLO LABS</h3>
    <p style="margin:0; font-weight:600;">Nutrition Health System</p>
    <hr>
    {{ $slot ?? '' }}
    @yield('content')
    <p style="font-size:11px; color:#888; margin-top:15px;">© 2026 MASOLO Labs Protected</p>
</div>
</body>
</html>