<!DOCTYPE html><html><head><title>MASOLO Labs - Nutrition Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
body{margin:0;font-family:Arial;background:#f1f5f9;padding:20px; position:relative;}
.watermark{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%) rotate(-30deg);font-size:90px;font-weight:900;color:#000;opacity:0.06;pointer-events:none;z-index:9999;white-space:nowrap;letter-spacing:8px;}
.top{display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;flex-wrap:wrap;gap:10px;position:relative;z-index:2;}
.logo-wrap{display:flex;align-items:center;gap:10px;font-weight:900;color:#0d6efd;font-size:20px;}
.logo-wrap img{height:44px;width:44px;border-radius:50%;border:2px solid #0d6efd;background:#000;object-fit:cover;}
.btns{display:flex;gap:8px;align-items:center;flex-wrap:wrap}
.btns a, .btns button{padding:8px 14px;border-radius:6px;color:#fff;text-decoration:none;font-weight:700;font-size:13px;border:none;cursor:pointer}
.b-blue{background:#2563eb}.b-blue-light{background:#0ea5e9}.b-black{background:#111827}.b-red{background:#dc2626}
.cards{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-bottom:20px;position:relative;z-index:2;}
.card{border-radius:16px;padding:22px;text-align:center;color:#fff}
.blue{background:#3b82f6}.green{background:#16a34a}.yellow{background:#eab308}.red{background:#ef4444}
.card h1{font-size:40px;margin:8px 0}
.bottom{display:grid;grid-template-columns:1.3fr .7fr;gap:16px;position:relative;z-index:2;}
.box{background:#fff;border-radius:14px;padding:20px;box-shadow:0 2px 8px rgba(0,0,0,.06)}
footer{text-align:center;margin-top:20px;font-size:11px;color:#64748b;position:relative;z-index:2;background:#fff;padding:15px;border-radius:12px;}
@media(max-width:768px){.cards{grid-template-columns:1fr 1fr}.bottom{grid-template-columns:1fr}}
</style></head><body>

<!-- WATERMARK MASOLO LABS -->
<div class="watermark">MASOLO LABS</div>

<div class="top">
<div class="logo-wrap">
<img src="/masolo-health.jpeg" onerror="this.src='/images/masolo-health.jpeg'" alt="MASOLO">
MASOLO LABS
<span style="font-weight:600;color:#334155;font-size:14px;margin-left:8px;">Nutrition Dashboard</span>
</div>

<div class="btns">
<a class="b-blue-light" href="/dashboard">Dashboard</a>
<a class="b-black" href="/children">Children List</a>
<a class="b-blue" href="/children/create">+ Register Child</a>
<form method="POST" action="/logout" style="display:inline">@csrf
<button class="b-red" type="submit">Logout ({{ auth()->user()->name ?? '' }})</button>
</form>
</div>
</div>

<div class="cards">
<div class="card blue"><small>Total Children</small><h1>{{ $total }}</h1><small>Registered</small></div>
<div class="card green"><small>Good Health</small><h1>{{ $green }}</h1><small>GREEN > 12.5</small></div>
<div class="card yellow"><small>Needs Help</small><h1>{{ $yellow }}</h1><small>YELLOW 11.5-12.5</small></div>
<div class="card red"><small>Sick - Refer Now</small><h1>{{ $red }}</h1><small>RED <11.5</small></div>
</div>

<div class="bottom">
<div class="box"><h3>Chart - Nutrition Status</h3><canvas id="myChart" style="max-height:300px"></canvas></div>
<div class="box"><h3>Summary</h3>
<p>Total <b style="float:right">{{ $total }} <span style="background:#2563eb;color:#fff;padding:2px 8px;border-radius:10px">100%</span></b></p><hr>
<p>GREEN - Good Health <b style="float:right">{{ $green }} <span style="background:#16a34a;color:#fff;padding:2px 8px;border-radius:10px">33%</span></b></p><hr>
<p>YELLOW - Needs Help <b style="float:right">{{ $yellow }} <span style="background:#eab308;color:#fff;padding:2px 8px;border-radius:10px">33%</span></b></p><hr>
<p>RED - Sick, Refer Now <b style="float:right">{{ $red }} <span style="background:#ef4444;color:#fff;padding:2px 8px;border-radius:10px">33%</span></b></p>
</div>
</div>

<footer>
<b>Proprietary of MASOLO Labs LTD | Licensed Client: Bweyogerere HC III Pilot Only</b><br>
<span style="color:#0d6efd;font-weight:700">© 2026 MASOLO Labs | Nutrition Health Management System</span><br>
<span style="color:#d4af37;font-weight:700">All Rights Reserved | Protected under Uganda Copyright Act</span>
</footer>

<script>
new Chart(document.getElementById('myChart'),{type:'pie',data:{labels:['GREEN Good Health','YELLOW Needs Help','RED Sick Refer Now'],datasets:[{data:[{{ $green }},{{ $yellow }},{{ $red }}],backgroundColor:['#16a34a','#f59e0b','#dc2626']}]}});
</script>
</body></html>