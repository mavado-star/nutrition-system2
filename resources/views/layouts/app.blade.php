<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MASOLO Labs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{background:#f5f7fb}
        .watermark{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%) rotate(-30deg);font-size:80px;font-weight:900;color:#000;opacity:0.05;pointer-events:none;z-index:9999}
    </style>
</head>
<body>
    <div class="watermark">MASOLO LABS</div>
    <nav class="navbar bg-white shadow-sm" style="padding:12px 20px;">
        <div class="container-fluid">
            <a href="/dashboard" style="display:flex;align-items:center;gap:12px;text-decoration:none;font-weight:900;color:#0d6efd;font-size:19px;">
                <img src="/masolo-health.jpeg" style="height:42px;width:42px;object-fit:cover;border-radius:50%;border:2px solid #0d6efd;background:#000;">
                MASOLO LABS
            </a>
            <div style="display:flex;gap:15px;align-items:center">
                <span style="font-size:13px">{{ Auth::user()->email ?? '' }}</span> <form method="POST" action="/logout">
  @csrf
  <button type="submit">Logout</button>
</form>
               
            </div>
        </div>
    </nav>
    <div class="container mt-4">{{ $slot ?? '' }}@yield('content')</div>
</body>
</html>