<!DOCTYPE html><html><head><title>MASOLO LABS - Lists</title><script src="https://cdn.tailwindcss.com"></script>
<style>.watermark{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%) rotate(-30deg);font-size:130px;opacity:0.04;font-weight:900;pointer-events:none;z-index:0;}</style>
</head>
<body class="bg-[#f5f7fb] relative">
<div class="watermark">MASOLO</div>

<div class="bg-white shadow p-4 flex justify-between items-center relative z-10">
<div class="flex items-center gap-3"><img src="/masolo-health.jpeg" class="w-10 h-10 rounded-full object-cover border-2 border-yellow-600 shadow" alt="MASOLO LABS"><span class="font-black text-blue-700">MASOLO LABS</span><div class="ml-10 flex gap-4"><a href="/dashboard" class="px-2 py-1.5 text-sm font-black">Dashboard</a><a href="/children" class="bg-blue-600 text-white px-5 py-1.5 rounded text-sm font-black">Lists</a><a href="/children/create" class="px-2 py-1.5 text-sm font-black">Register</a></div></div>
<div class="flex items-center gap-3"><span class="text-sm font-bold">{{ auth()->user()->email }}</span><form method="POST" action="/logout">@csrf<button class="bg-red-600 text-white font-black px-4 py-1.5 rounded text-sm">Logout</button></form></div>
</div>

<div class="p-6 max-w-7xl mx-auto relative z-10">
<div class="bg-white p-6 rounded-xl shadow">

<div class="flex flex-col md:flex-row justify-between gap-3 mb-4">
<h3 class="font-bold text-lg">Children Lists ({{ $children->total() }})</h3>
<div class="flex gap-2">
<form method="GET" action="/children" class="flex gap-2">
<input type="text" name="search" value="{{ request('search') }}" placeholder="Search name or village..." class="border rounded px-3 py-2 w-64 text-sm">
<button class="bg-blue-600 text-white px-4 rounded text-sm font-bold">Search</button>
</form>
<a href="/reports/summary" class="bg-black text-white px-4 py-2 rounded text-xs font-black">🖨️ Print Summary</a>
<a href="/children/create" class="bg-blue-600 text-white px-4 py-2 rounded text-sm font-black">+ Add Child</a>
</div>
</div>

@if(session('success'))
<div class="bg-green-100 text-green-700 p-2 rounded text-sm mb-3">{{ session('success') }}</div>
@endif

<table class="w-full border text-sm"><thead class="bg-gray-100"><tr><th class="border p-2">Name</th><th class="border p-2">Village</th><th class="border p-2">Weight</th><th class="border p-2">Height</th><th class="border p-2">MUAC</th><th class="border p-2">BMI</th><th class="border p-2">Status</th><th class="border p-2">Action</th></tr></thead>
<tbody>
@foreach($children as $child)
<tr class="hover:bg-gray-50">
<td class="border p-2 font-bold">{{ $child->name }}</td>
<td class="border p-2">{{ $child->village }}</td>
<td class="border p-2">{{ $child->weight_kg }} kg</td>
<td class="border p-2">{{ $child->height_cm }} cm</td>
<td class="border p-2">{{ $child->muac_cm }} cm</td>
<td class="border p-2 font-black text-blue-600">{{ $child->bmi }}</td>
<td class="border p-2"><span class="px-3 py-1 rounded-full text-white text-xs font-bold @if($child->status=='RED') bg-red-600 @elseif($child->status=='YELLOW') bg-yellow-500 text-black @else bg-green-600 @endif">{{ $child->status }}</span></td>
<td class="border p-2 flex gap-1">
<a href="/children/{{ $child->id }}/report" class="bg-blue-600 text-white px-3 py-1 rounded text-xs font-black">🖨️ Print</a>
<form method="POST" action="/children/{{ $child->id }}">@csrf @method('DELETE')<button onclick="return confirm('Delete this child?')" class="bg-red-600 text-white px-2 py-1 rounded text-xs">Del</button></form>
</td>
</tr>
@endforeach
</tbody></table>

<div class="mt-4">{{ $children->links() }}</div>
</div>

<!-- PROOF OF OWNERSHIP FOOTER -->
<div class="mt-10 border-t-4 border-blue-700 bg-white rounded-xl shadow p-5 text-[11px] leading-relaxed">
<div class="flex flex-col md:flex-row justify-between gap-4">
<div>
<p class="font-black text-blue-800 text-xs">© 2023-2025 MASOLO LABS LTD — ALL RIGHTS RESERVED</p>
<p class="mt-1">This Clinical Nutrition System is Proprietary Software of <b>MASOLO LABS LTD</b>, Kampala, Uganda.</p>
<p>Unauthorized copying, modification, distribution, or reverse-engineering is strictly prohibited under the Uganda Copyright Act 2006 & International Treaties.</p>
<p class="mt-2 font-bold">Licensed To: Bweyogerere HC III Pilot | License ID: ML-BWEYO-2025-001</p>
</div>
<div class="text-right md:min-w-[280px]">
<p><b>URSB:</b> 800200XXXXX | <b>TM:</b> MASOLO™</p>
<p><b>Build:</b> v2.5.0 | FHIR R4 | GDPR</p>
<p><b>Owner:</b> masololabs.com</p>
<p class="mt-2 text-[10px] bg-red-100 text-red-700 px-2 py-1 rounded font-black inline-block">CONFIDENTIAL - PROPRIETARY</p>
</div>
</div>
<div class="mt-3 pt-3 border-t text-center text-[10px] text-gray-500">
<p>Audit Trail Active | Data Encrypted at Rest (AES-256) | Source Code Protected</p>
</div>
</div>

</div></body></html>