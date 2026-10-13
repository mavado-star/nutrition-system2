<!DOCTYPE html>
<html>
<head>
<title>MASOLO LABS - Register</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>.watermark{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%) rotate(-30deg);font-size:130px;opacity:0.04;font-weight:900;pointer-events:none;z-index:0;}</style>
</head>
<body class="bg-[#f5f7fb] relative">
<div class="watermark">MASOLO</div>

<div class="bg-white shadow p-4 flex justify-between items-center relative z-10">
<div class="flex items-center gap-3">
<img src="/masolo-health.jpeg" class="w-10 h-10 rounded-full object-cover border-2 border-yellow-600 shadow" alt="MASOLO LABS">
<span class="font-black text-blue-700">MASOLO LABS</span>
<div class="ml-10 flex gap-4">
<a href="/dashboard" class="px-2 py-1.5 text-sm font-black">Dashboard</a>
<a href="/children" class="px-2 py-1.5 text-sm font-black">Lists</a>
<a href="/children/create" class="bg-blue-600 text-white px-5 py-1.5 rounded text-sm font-black">Register</a>
</div>
</div>
<div class="flex items-center gap-3">
<span class="text-sm font-bold">{{ auth()->user()->email }}</span>
<form method="POST" action="/logout">@csrf<button class="bg-red-600 text-white font-black px-4 py-1.5 rounded text-sm hover:bg-red-700">Logout</button></form>
</div>
</div>

<div class="p-6 max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 relative z-10">

<div class="bg-white p-6 rounded-xl shadow">
<h3 class="font-bold text-blue-700 mb-3">📋 Clinical Instructions</h3>
<div class="text-xs space-y-3 text-gray-700 leading-relaxed">
<p><b>1. Child Name:</b> Enter full official name as on immunization card.</p>
<p><b>2. Age:</b> Must be 0-59 months. WHO standard for under-five screening.</p>
<p><b>3. Gender:</b> Select for growth chart reference.</p>
<p><b>4. Weight (kg):</b> Use calibrated SECA scale. Remove shoes, light clothes. Accuracy 0.1kg.</p>
<p><b>5. Height (cm):</b> For <2yrs measure length (lying). >2yrs standing. Accuracy 0.1cm.</p>
<p><b>6. MUAC (cm):</b> Mid-Upper Arm Circumference at midpoint of left arm.</p>
<div class="bg-gray-50 p-3 rounded border text-[11px]">
<p class="font-bold">MUAC Interpretation (WHO):</p>
<p>🔴 <span class="text-red-600 font-bold"><11.5 cm = RED - Severe Acute Malnutrition (SAM) - Refer immediately</span></p>
<p>🟡 <span class="text-yellow-600 font-bold">11.5-12.5 cm = YELLOW - Moderate (MAM) - Supplementary feeding</span></p>
<p>🟢 <span class="text-green-600 font-bold">>12.5 cm = GREEN - Normal - Continue monitoring</span></p>
</div>
<p><b>7. Village:</b> Select catchment area for follow-up.</p>
<p><b>8. Parent & Phone:</b> For defaulter tracing and SMS reminders.</p>
<p class="mt-2 p-2 bg-blue-50 rounded text-blue-800"><b>System:</b> BMI & MUST Score auto-calculated. FHIR Observation created on save.</p>

<div class="mt-4 p-3 bg-blue-600 text-white rounded-lg">
<p class="text-xs font-bold">LIVE BMI: <span id="bmiDisplay" class="text-lg">--</span></p>
<p class="text-[10px] opacity-80">Formula: Weight / (Height_m)²</p>
<p class="text-xs font-black mt-2">Status: <span id="statusDisplay">--</span></p>
</div>
</div>
</div>

<div class="md:col-span-2 bg-white p-8 rounded-xl shadow">
<h3 class="font-bold text-lg mb-1">Register New Child</h3>
<p class="text-xs text-gray-500 mb-6">All fields marked with clinical validation - GDPR compliant</p>

<form method="POST" action="/children">@csrf
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">

<div><label class="text-xs font-semibold">Child Name *</label><input name="name" placeholder="e.g. Atim Mercy" class="border p-2.5 rounded w-full text-sm mt-1" required></div>
<div><label class="text-xs font-semibold">Age (months) *</label><input name="age" type="number" min="0" max="59" placeholder="0-59" class="border p-2.5 rounded w-full text-sm mt-1" required></div>

<div><label class="text-xs font-semibold">Gender *</label>
<select name="gender" class="border p-2.5 rounded w-full text-sm mt-1"><option>Male</option><option>Female</option></select></div>
<div><label class="text-xs font-semibold">Weight (kg) *</label><input id="weight" name="weight_kg" step="0.1" placeholder="e.g. 12.5" class="border p-2.5 rounded w-full text-sm mt-1 border-blue-300" required></div>

<div><label class="text-xs font-semibold">Height (cm) *</label><input id="height" name="height_cm" step="0.1" placeholder="e.g. 85.0" class="border p-2.5 rounded w-full text-sm mt-1 border-blue-300" required></div>
<div><label class="text-xs font-semibold">MUAC (cm) *</label><input id="muac" name="muac_cm" step="0.1" placeholder="<11.5 RED, 11.5-12.5 YELLOW, >12.5 GREEN" class="border p-2.5 rounded w-full text-sm mt-1 border-blue-300 bg-blue-50/30" required></div>

<div><label class="text-xs font-semibold">Village *</label><input name="village" placeholder="e.g. Bweyogerere, Kireka" class="border p-2.5 rounded w-full text-sm mt-1" required></div>
<div><label class="text-xs font-semibold">Parent Name</label><input name="parent_name" placeholder="Mother/Father name" class="border p-2.5 rounded w-full text-sm mt-1"></div>

<div class="md:col-span-2"><label class="text-xs font-semibold">Phone (for follow-up)</label><input name="phone" placeholder="e.g. 0772xxxxxx" class="border p-2.5 rounded w-full text-sm mt-1"></div>
<input type="hidden" name="bmi" id="bmiHidden">
</div>

<button class="mt-6 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded w-full font-bold">Save Child - Auto Calculate MUST & BMI</button>
</form>
</div>

</div>

<!-- PROOF OF OWNERSHIP FOOTER -->
<div class="p-6 max-w-6xl mx-auto relative z-10">
<div class="border-t-4 border-blue-700 bg-white rounded-xl shadow p-5 text-[11px] leading-relaxed">
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
</div>

<script>
const w = document.getElementById('weight');
const h = document.getElementById('height');
const m = document.getElementById('muac');
const bmiD = document.getElementById('bmiDisplay');
const statusD = document.getElementById('statusDisplay');
const bmiH = document.getElementById('bmiHidden');
function calc(){
  let weight = parseFloat(w.value);
  let height = parseFloat(h.value);
  let muac = parseFloat(m.value);
  if(weight && height){
    let bmi = weight / Math.pow(height/100,2);
    bmiD.innerText = bmi.toFixed(2);
    bmiH.value = bmi.toFixed(2);
  }
  if(muac){
    if(muac < 11.5){ statusD.innerText = 'RED - Severe'; statusD.className='font-black text-red-200';}
    else if(muac < 12.5){ statusD.innerText = 'YELLOW - Moderate'; statusD.className='font-black text-yellow-200';}
    else { statusD.innerText = 'GREEN - Normal'; statusD.className='font-black text-green-200';}
  }
}
w.addEventListener('input', calc);
h.addEventListener('input', calc);
m.addEventListener('input', calc);
</script>

</body>
</html>