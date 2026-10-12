<!DOCTYPE html><html><head><title>MASOLO Labs - Children List - Government Edition</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{margin:0;font-family:Arial;background:#f1f5f9;padding:20px;position:relative;}
.watermark{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%) rotate(-30deg);font-size:90px;font-weight:900;color:#000;opacity:0.06;pointer-events:none;z-index:9999;}
.top{display:flex;justify-content:space-between;align-items:center;margin-bottom:16px;flex-wrap:wrap;gap:10px;position:relative;z-index:2;}
.logo-wrap{display:flex;align-items:center;gap:10px;font-weight:900;color:#2563eb;font-size:20px;}
.logo-wrap img{height:42px;width:42px;border-radius:50%;border:2px solid #2563eb;background:#000;object-fit:cover;}
.btn{padding:8px 14px;border-radius:6px;color:#fff;text-decoration:none;font-weight:700;font-size:13px;border:none;cursor:pointer}
.b-blue{background:#2563eb}.b-black{background:#111827}.b-red{background:#dc2626}.b-green{background:#16a34a}
.search-card{background:#fff;border-radius:12px;padding:14px;box-shadow:0 2px 8px rgba(0,0,0,.06);margin-bottom:16px;position:relative;z-index:2;display:flex;gap:8px;}
.search-card input{flex:1;padding:10px 14px;border:1px solid #e2e8f0;border-radius:8px}
.card-table{background:#fff;border-radius:14px;box-shadow:0 2px 8px rgba(0,0,0,.06);overflow:hidden;position:relative;z-index:2;}
table{width:100%;border-collapse:collapse}
th{background:#111827;color:#fff;padding:12px 10px;font-size:11px;text-align:left}
td{padding:10px;font-size:13px;border-bottom:1px solid #f1f5f9}
.badge{padding:4px 10px;border-radius:20px;color:#fff;font-weight:800;font-size:11px}
.bg-danger{background:#ef4444}.bg-warning{background:#eab308}.bg-success{background:#16a34a}.bg-info{background:#3b82f6}
.paginate{padding:16px;text-align:center}
</style></head><body>
<div class="watermark">MASOLO LABS</div>

<div class="top">
<div class="logo-wrap"><img src="/masolo-health.jpeg" onerror="this.src='/images/masolo-health.jpeg'"> MASOLO LABS <span style="font-weight:600;color:#334155;font-size:12px;margin-left:6px;">GOVERNMENT EDITION - UNLIMITED</span></div>
<div style="display:flex;gap:8px;"><a class="btn b-black" href="/dashboard">Dashboard</a><a class="btn b-blue" href="/children/create">+ Register Child</a></div>
</div>

<form method="GET" action="/children" class="search-card">
<input type="text" name="search" value="{{ request('search') }}" placeholder="🔍 Search by Name, Village, Status...">
<button class="btn b-black">Search</button>
@if(request('search'))<a class="btn b-green" href="/children">Clear</a>@endif
</form>

<div class="card-table"><div style="overflow-x:auto;">
<table>
<thead><tr><th>ID</th><th>Name</th><th>MUAC</th><th>BMI</th><th>BMI Status</th><th>Nutrition Status</th><th>Village</th><th>Action</th></tr></thead>
<tbody>
@forelse($children as $child)
@php
  $bmi = $child->bmi;
  if($bmi < 16){ $bmiText='Low'; $bmiColor='bg-danger'; }
  elseif($bmi < 18.5){ $bmiText='Normal Low'; $bmiColor='bg-warning'; }
  elseif($bmi <= 24.9){ $bmiText='Good'; $bmiColor='bg-success'; }
  else { $bmiText='High'; $bmiColor='bg-info'; }
@endphp
<tr>
<td>{{ $child->id }}</td>
<td><b>{{ $child->name }}</b><br><small style="color:#64748b">{{ $child->age }} months - {{ $child->gender }}</small></td>
<td><b>{{ $child->muac_cm }}</b></td>
<td><b>{{ $child->bmi }}</b></td>
<td><span class="badge {{ $bmiColor }}">{{ $bmiText }}</span></td>
<td><span class="badge {{ $child->status=='RED' ? 'bg-danger' : ($child->status=='YELLOW' ? 'bg-warning' : 'bg-success') }}">{{ $child->status }}</span></td>
<td>{{ $child->village }}</td>
<td><form action="/children/{{ $child->id }}" method="POST" onsubmit="return confirm('Delete this child?')">@csrf @method('DELETE')<button class="btn b-red" style="padding:4px 8px;font-size:11px;">Delete</button></form></td>
</tr>
@empty
<tr><td colspan="8" style="text-align:center;padding:20px;">No records - Start registering, unlimited capacity</td></tr>
@endforelse
</tbody>
</table>
</div>
<div class="paginate">{{ $children->links() }}</div>
<div style="padding:10px;text-align:center;font-size:11px;color:#64748b;">Total Children: {{ $children->total() }} | Showing {{ $children->count() }} | Unlimited Capacity - Government Licensed</div>
</div>
</body></html>