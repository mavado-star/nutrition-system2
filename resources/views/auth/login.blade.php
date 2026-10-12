<!DOCTYPE html><html><head><title>Login - Nutrition System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="manifest" href="/manifest.json">
<meta name="theme-color" content="#2563eb">
<style>
body{margin:0;font-family:Arial;background:#f1f5f9;display:flex;justify-content:center;align-items:center;min-height:100vh}
.card{background:#fff;width:380px;border-radius:16px;padding:28px;box-shadow:0 8px 24px rgba(0,0,0,.12)}
.head{background:#2563eb;color:#fff;padding:14px;border-radius:10px;text-align:center;margin:-28px -28px 20px -28px}
.head h2{margin:0;font-size:18px}
label{font-size:12px;font-weight:700;color:#334155;margin-top:12px;display:block}
input{width:100%;padding:12px;margin:6px 0 12px;border:1px solid #e2e8f0;border-radius:10px;box-sizing:border-box}
.btn{width:100%;padding:13px;background:#2563eb;color:#fff;border:none;border-radius:10px;font-weight:800;cursor:pointer;margin-top:10px}
.link{display:block;text-align:center;margin-top:12px;font-size:13px;color:#2563eb;text-decoration:none}
.error{color:#dc2626;font-size:12px;margin-bottom:8px}
</style></head><body>
<div class="card">
<div class="head"><h2>🍼 Nutrition System - Login</h2></div>

@if($errors->any())<div class="error">{{ $errors->first() }}</div>@endif

<form method="POST" action="/login">@csrf
<label>Email</label>
<input type="email" name="email" value="{{ old('email') }}" placeholder="health@bwe.com" required>

<label>Password</label>
<input type="password" name="password" placeholder="••••" required>

<div style="display:flex;align-items:center;gap:6px;margin:8px 0"><input type="checkbox" name="remember" style="width:auto;margin:0"><small>Remember me</small></div>

<button class="btn" type="submit">Login to Dashboard</button>
</form>

<a class="link" href="/register">Don't have account? Register here</a>
<p style="text-align:center;font-size:10px;color:#94a3b8;margin-top:14px">Bweyogerere HC III - MASOLO Labs LTD</p>
</div>

<script>
if('serviceWorker' in navigator){
  window.addEventListener('load', function(){
    navigator.serviceWorker.register('/sw.js');
  });
}
</script>
</body></html>