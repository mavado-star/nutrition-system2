<!DOCTYPE html>
<html>
<head>
<title>MASOLO LABS - Summary Report</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
@media print{.no-print{display:none} body{padding:0} @page{margin:10mm} }
</style>
</head>
<body class="bg-white p-6">
<div class="max-w-6xl mx-auto">

<div class="flex justify-between items-center border-b-2 border-blue-600 pb-3">
<div class="flex items-center gap-2">
<div class="bg-black text-blue-400 rounded-full w-10 h-10 flex items-center justify-center font-bold border-2 border-blue-500">M</div>
<div><p class="font-black text-blue-700">MASOLO LABS LTD</p><p class="text-[10px]">Bweyogerere HC III - Clinical Nutrition System | GDPR & FHIR R4</p></div>
</div>
<div class="text-right text-xs">
<p class="font-bold">SUMMARY NUTRITION REPORT</p>
<p>Date: {{ date('d/m/Y H:i') }}</p>
<p>Total Children: {{ $total }} | RED: {{ $red }} YELLOW: {{ $yellow }} GREEN: {{ $green }}</p>
</div>
</div>

<div class="grid grid-cols-5 gap-3 mt-4 text-center">
<div class="border p-3 rounded"><p class="text-xs">Total</p><p class="font-black text-xl">{{ $total }}</p></div>
<div class="border p-3 rounded bg-red-50"><p class="text-xs text-red-600">RED (SAM)</p><p class="font-black text-xl text-red-600">{{ $red }}</p></div>
<div class="border p-3 rounded bg-yellow-50"><p class="text-xs text-yellow-600">YELLOW (MAM)</p><p class="font-black text-xl text-yellow-600">{{ $yellow }}</p></div>
<div class="border p-3 rounded bg-green-50"><p class="text-xs text-green-600">GREEN</p><p class="font-black text-xl text-green-600">{{ $green }}</p></div>
<div class="border p-3 rounded bg-blue-50"><p class="text-xs">Avg BMI</p><p class="font-black text-xl text-blue-600">{{ $avgBmi }}</p></div>
</div>

<h3 class="font-bold mt-6 mb-2">Children Lists ({{ $total }})</h3>
<table class="w-full border text-sm border-collapse">
<thead class="bg-gray-100">
<tr><th class="border p-2 text-left">Name</th><th class="border p-2">Village</th><th class="border p-2">Weight</th><th class="border p-2">Height</th><th class="border p-2">MUAC</th><th class="border p-2">BMI</th><th class="border p-2">Status</th></tr>
</thead>
<tbody>
@foreach($children as $c)
<tr>
<td class="border p-2 font-bold">{{ $c->name }}</td>
<td class="border p-2">{{ $c->village }}</td>
<td class="border p-2">{{ $c->weight_kg }} kg</td>
<td class="border p-2">{{ $c->height_cm }} cm</td>
<td class="border p-2">{{ $c->muac_cm }} cm</td>
<td class="border p-2 font-black text-blue-600">{{ $c->bmi }}</td>
<td class="border p-2"><span class="px-3 py-1 rounded-full text-white text-xs font-bold @if($c->status=='RED') bg-red-600 @elseif($c->status=='YELLOW') bg-yellow-500 text-black @else bg-green-600 @endif">{{ $c->status }}</span></td>
</tr>
@endforeach
</tbody>
</table>

<div class="mt-8 flex justify-between text-xs border-t pt-3">
<div><p>___________________</p><p>Health Worker Signature & Stamp</p></div>
<div class="text-right"><p>Date: {{ date('d/m/Y') }}</p><p>Proprietary of MASOLO Labs LTD</p></div>
</div>

<div class="no-print text-center mt-8 flex gap-3 justify-center">
<button onclick="window.print()" class="bg-blue-600 text-white font-black px-8 py-3 rounded hover:bg-blue-700">🖨️ Print / Download PDF</button>
<a href="/children" class="bg-gray-200 px-8 py-3 rounded font-bold">Back to Lists</a>
</div>

</div>
</body>
</html>