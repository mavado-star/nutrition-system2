<!DOCTYPE html><html><head><title>Register</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>body{margin:0;font-family:Arial;background:#f1f5f9;display:flex;justify-content:center;align-items:center;min-height:100vh}
.card{background:#fff;width:380px;border-radius:16px;padding:28px;box-shadow:0 8px 24px rgba(0,0,0,.12)}
.head{background:#2563eb;color:#fff;padding:14px;border-radius:10px;text-align:center;margin:-28px -28px 20px -28px}
input{width:100%;padding:12px;margin:6px 0 12px;border:1px solid #e2e8f0;border-radius:10px;box-sizing:border-box}
.btn{width:100%;padding:13px;background:#2563eb;color:#fff;border:none;border-radius:10px;font-weight:800;cursor:pointer}
</style></head><body>
<div class="card">
<div class="head"><h2>Create Account</h2></div>
<form method="POST" action="/register">@csrf
<input name="name" placeholder="Full Name" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<input type="password" name="password_confirmation" placeholder="Confirm Password" required>
<button class="btn" type="submit">Register</button>
</form>
<a href="/login" style="display:block;text-align:center;margin-top:10px;font-size:13px;color:#2563eb;text-decoration:none">Already have account? Login</a>
</div>
</body></html>