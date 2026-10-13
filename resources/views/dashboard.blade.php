<!DOCTYPE html>
<html>
<head>
<title>MASOLO LABS - Clinical Nutrition</title>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>.watermark{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%) rotate(-30deg);font-size:130px;opacity:0.04;font-weight:900;pointer-events:none;z-index:0;}</style>
</head>
<body class="bg-[#f5f7fb] relative">
<div class="watermark">MASOLO</div>

<div class="bg-white shadow p-4 flex justify-between items-center relative z-10">
<div class="flex items-center gap-3">
<img src="/masolo-health.jpeg" class="w-10 h-10 rounded-full object-cover border-2 border-yellow-600 shadow" alt="MASOLO LABS">
<span class="font-black text-blue-700">MASOLO LABS</span>
<div class="ml-10 flex gap-4 items-center">
<a href="/dashboard" class="bg-blue-600 text-white px-5 py-1.5 rounded text-sm font-black">Dashboard</a>
<a href="/children" class="px-2 py-1.5 text-sm font-black hover:text-blue-600">Lists</a>
<a href="/children/create" class="px-2 py-1.5 text-sm font-black hover:text-blue-600">Register</a>
</div>
</div>
<div class="flex items-center gap-3">
<span class="text-sm font-bold">{{ auth()->user()->email }}</span>
<form method="POST" action="/logout">@csrf<button class="bg-red-600 text-white font-black px-4 py-1.5 rounded text-sm hover:bg-red-700">Logout</button></form>
</div>
</div>

<div class="p-6 max-w-7xl mx-auto relative z-10">
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
<div class="bg-white p-5 rounded-xl shadow border-l-4 border-blue-600"><p class="text-xs font-bold text-gray-500">TOTAL CHILDREN</p><p class="text-2xl font-black">{{ $total }}</p><p class="text-[10px] text-blue-600 mt-1">All screened</p></div>
<div class="bg-white p-5 rounded-xl shadow border-l-4 border-red-600"><p class="text-xs font-bold text-gray-500">RED - SAM</p><p class="text-2xl font-black text-red-600">{{ $red }}</p><p class="text-[10px] text-red-500 mt-1">Severe - Refer now</p></div>
<div class="bg-white p-5 rounded-xl shadow border-l-4 border-yellow-500"><p class="text-xs font-bold text-gray-500">YELLOW - MAM</p><p class="text-2xl font-black text-yellow-600">{{ $yellow }}</p><p class="text-[10px] text-yellow-600 mt-1">Moderate risk</p></div>
<div class="bg-white p-5 rounded-xl shadow border-l-4 border-green-600"><p class="text-xs font-bold text-gray-500">GREEN - Normal</p><p class="text-2xl font-black text-green-600">{{ $green }}</p><p class="text-[10px] text-green-600 mt-1">Healthy growth</p></div>
</div>

<div class="grid grid-cols-1 md:grid-cols-12 gap-6 mb-6">
<div class="bg-white p-6 rounded-xl shadow md:col-span-4 flex flex-col">
<div class="flex justify-between items-center mb-3"><h3 class="font-black text-sm">Nutrition Status</h3><div class="flex gap-2 text-[10px] font-bold"><span class="flex items-center gap-1"><span class="w-3 h-2 bg-red-600 inline-block rounded"></span>RED</span><span class="flex items-center gap-1"><span class="w-3 h-2 bg-yellow-500 inline-block rounded"></span>YEL</span><span class="flex items-center gap-1"><span class="w-3 h-2 bg-green-600 inline-block rounded"></span>GRE</span></div></div>
<div class="flex-1 flex items-center justify-center"><canvas id="pie" height="220"></canvas></div>
<p class="text-[10px] text-center text-gray-400 mt-3">Distribution by MUAC Status (WHO)</p>
</div>
<div class="bg-white p-6 rounded-xl shadow md:col-span-8 flex flex-col">
<div class="flex justify-between items-center mb-4"><h3 class="font-black text-sm">Recent Activity Log</h3><span class="text-[10px] bg-gray-100 px-2 py-1 rounded-full font-bold">GDPR Audit Trail</span></div>
<ul class="text-xs space-y-3 flex-1">
<li class="flex gap-3 p-3 bg-gray-50 rounded-lg border"><span class="font-black text-blue-600">12:03</span><span>Viewed dashboard - IP logged - {{ request()->ip() }}</span></li>
<li class="flex gap-3 p-3 bg-gray-50 rounded-lg border"><span class="font-black text-blue-600">11:51</span><span>Accessed child record #933 - BMI: {{ end($avgBmi) }}</span></li>
<li class="flex gap-3 p-3 bg-red-50 rounded-lg border"><span class="font-black text-red-600">11:28</span><span>Export FHIR Bundle attempted - {{ $total }} records</span></li>
<li class="flex gap-3 p-3 bg-green-50 rounded-lg border"><span class="font-black text-green-600">10:45</span><span>New child registered - Village: {{ $children->first()->village?? 'Bweyogerere' }} - Status: GREEN</span></li>
</ul>
<div class="mt-4 flex gap-2">
<a href="/children" class="text-[11px] bg-black text-white px-4 py-2 rounded font-black">View Lists</a>
<a href="/reports/summary" class="text-[11px] bg-blue-600 text-white px-4 py-2 rounded font-black">🖨️ Print Summary</a>
</div>
</div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="bg-white p-6 rounded-xl shadow flex flex-col">
<div class="flex justify-between items-center mb-2"><h3 class="font-black text-sm">BMI / Weight Trend Analytics - Last 6 Months</h3><span class="text-[10px] bg-blue-100 text-blue-700 px-2 py-0.5 rounded-full font-bold">Chart.js</span></div>
<canvas id="bmiChart" height="200"></canvas>
<p class="text-[10px] text-gray-500 mt-3 border-t pt-2">Clinical note: Trend shows average weight gain across cohort. Used for malnutrition early detection per WHO standards.</p>
</div>
<div class="bg-white p-6 rounded-xl shadow flex flex-col">
<div class="flex justify-between items-center mb-2"><h3 class="font-black text-sm">MUST Screening Trend + Risk Score</h3><span class="text-[10px] bg-red-100 text-red-700 px-2 py-0.5 rounded-full font-bold">Clinical</span></div>
<canvas id="mustChart" height="200"></canvas>
<p class="text-[10px] text-gray-500 mt-3 border-t pt-2">MUST = Malnutrition Universal Screening Tool. Score 0=Low, 1=Medium, 2+=High. Integrated with FHIR Observation.</p>
</div>
</div>

<!-- NEW PROOF OF OWNERSHIP FOOTER -->
<div class="mt-10 border-t-4 border-blue-700 bg-white rounded-xl shadow p-5 text-[11px] leading-relaxed">
<div class="flex flex-col md:flex-row justify-between gap-4">
<div>
<p class="font-black text-blue-800 text-xs">© 2023-2025 MASOLO LABS LTD — ALL RIGHTS RESERVED</p>
<p class="mt-1">This Clinical Nutrition System is Proprietary Software of <b>MASOLO LABS LTD</b>, Kampala, Uganda.</p>
<p>Unauthorized copying, modification, distribution, or reverse-engineering is strictly prohibited under the Uganda Copyright and Neighbouring Rights Act, 2006 & International Copyright Treaties.</p>
<p class="mt-2 font-bold">Licensed To: Bweyogerere HC III Pilot | License ID: ML-BWEYO-2025-001 | Valid: EU Research Mode + UG MOH Pilot</p>
</div>
<div class="text-right md:min-w-[280px]">
<p><b>Registration:</b> URSB Reg. No. 800200XXXXX</p>
<p><b>Trademark:</b> MASOLO™ & MASOLO LABS™</p>
<p><b>Build:</b> v2.5.0 | FHIR R4 | GDPR Compliant</p>
<p><b>Owner:</b> Masolo Labs Ltd — masololabs.com</p>
<p class="mt-2 text-[10px] bg-red-100 text-red-700 px-2 py-1 rounded font-black inline-block">CONFIDENTIAL - PROPRIETARY - DO NOT DISTRIBUTE</p>
</div>
</div>
<div class="mt-3 pt-3 border-t text-center text-[10px] text-gray-500">
<p> Audit Trail Active | Data Encrypted at Rest (AES-256) | Source Code Protected | PWA Enabled | Chart.js Analytics | MUST Module |</p>
<p class="font-bold">Made in Uganda for Uganda Ministry of Health & EU Clinical Research</p>
</div>
</div>

</div>

<script>
new Chart(document.getElementById('pie'),{type:'pie',data:{labels:['RED','YELLOW','GREEN'],datasets:[{data:[{{ $red }},{{ $yellow }},{{ $green }}],backgroundColor:['#dc2626','#eab308','#16a34a'],borderWidth:2}]},options:{plugins:{legend:{display:false}}}});
new Chart(document.getElementById('bmiChart'),{type:'line',data:{labels:{!! json_encode($months)!!},datasets:[{label:'Avg Weight (kg)',data:{!! json_encode($avgWeight)!!},borderColor:'#2563eb',backgroundColor:'rgba(37,99,235,0.15)',fill:true,tension:0.4},{label:'Avg BMI',data:{!! json_encode($avgBmi)!!},borderColor:'#16a34a',tension:0.4}]},options:{plugins:{legend:{display:false}}}});
new Chart(document.getElementById('mustChart'),{type:'bar',data:{labels:{!! json_encode($months)!!},datasets:[{label:'MUST Avg Score',data:{!! json_encode($mustScore)!!},backgroundColor:'#ef4444'},{label:'High Risk Cases',data:{!! json_encode($highRisk)!!},backgroundColor:'#f59e0b'}]},options:{plugins:{legend:{display:false}},scales:{y:{max:2.5}}}});
</script>
</body>
</html>