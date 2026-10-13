<!DOCTYPE html>
<html>
<head>
<title>Child Report - {{ $child->name }}</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>@media print{.no-print{display:none} body{background:white}}</style>
</head>
<body class="bg-gray-100 p-6">
<div class="max-w-3xl mx-auto bg-white p-8 shadow rounded">
<div class="flex justify-between border-b pb-4">
<div>
<div class="flex items-center gap-2"><div class="bg-black text-blue-400 rounded-full w-8 h-8 flex items-center justify-center font-bold">M</div><span class="font-black text-blue-700">MASOLO LABS</span></div>
<p class="text-[10px] mt-1">Bweyogerere HC III Pilot | GDPR & FHIR R4 Compliant</p>
</div>
<div class="text-right text-xs"><p>Date: {{ date('d/m/Y H:i') }}</p><p>ID: #{{ $child->id }}</p><p class="font-bold">Child Clinical Nutrition Report</p></div>
</div>

<h2 class="font-black text-center my-4 text-blue-700">CHILD NUTRITION ASSESSMENT REPORT</h2>

<div class="grid grid-cols-2 gap-4 text-sm mt-4">
<p><b>Child Name:</b> {{ $child->name }}</p><p><b>Age:</b> {{ $child->age }} months</p>
<p><b>Gender:</b> {{ $child->gender }}</p><p><b>Village:</b> {{ $child->village }}</p>
<p><b>Parent:</b> {{ $child->parent_name }}</p><p><b>Phone:</b> {{ $child->phone }}</p>
</div>

<div class="grid grid-cols-3 gap-4 mt-6 text-center">
<div class="border p-4 rounded bg-blue-50"><p class="text-xs">Weight</p><p class="font-black text-lg">{{ $child->weight_kg }} kg</p></div>
<div class="border p-4 rounded bg-blue-50"><p class="text-xs">Height</p><p class="font-black text-lg">{{ $child->height_cm }} cm</p></div>
<div class="border p-4 rounded bg-blue-50"><p class="text-xs">BMI</p><p class="font-black text-lg">{{ $child->bmi }}</p></div>
</div>

<div class="mt-6 border p-4 rounded text-center @if($child->status=='RED') bg-red-50 border-red-400 @elseif($child->status=='YELLOW') bg-yellow-50 border-yellow-400 @else bg-green-50 border-green-400 @endif">
<p class="text-xs">MUAC: {{ $child->muac_cm }} cm</p>
<p class="font-black text-xl @if($child->status=='RED') text-red-600 @elseif($child->status=='YELLOW') text-yellow-600 @else text-green-600 @endif">{{ $child->status }} - @if($child->status=='RED') Severe Acute Malnutrition - REFER IMMEDIATELY @elseif($child->status=='YELLOW') Moderate - Supplementary Feeding @else Normal @endif</p>
<p class="text-[10px] mt-1">WHO MUAC Standard: &lt;11.5 RED, 11.5-12.5 YELLOW, &gt;12.5 GREEN</p>
</div>

<div class="mt-8 flex justify-between text-xs">
<div><p>___________________</p><p>Health Worker Signature</p></div>
<div class="text-right"><p>___________________</p><p>Parent/Guardian</p></div>
</div>

<p class="text-[9px] text-center text-gray-400 mt-8">Proprietary of MASOLO Labs LTD | Audit Trail Active | Data encrypted</p>

<div class="no-print text-center mt-6 flex gap-3 justify-center">
<button onclick="window.print()" class="bg-blue-600 text-white font-black px-8 py-2 rounded">🖨️ Print Report</button>
<a href="/children" class="bg-gray-200 px-8 py-2 rounded font-bold">Back to Lists</a>
</div>
</div>
</body>
</html>