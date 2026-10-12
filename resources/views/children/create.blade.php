<!DOCTYPE html><html><head><title>MASOLO Labs - Register Child</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{margin:0;font-family:Arial;background:#f1f5f9;padding:20px;position:relative;}
.watermark{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%) rotate(-30deg);font-size:90px;font-weight:900;color:#000;opacity:0.06;pointer-events:none;z-index:9999;white-space:nowrap;letter-spacing:8px;}
.top{display:flex;justify-content:space-between;align-items:center;max-width:1100px;margin:0 auto 16px;position:relative;z-index:2;}
.logo-wrap{display:flex;align-items:center;gap:10px;font-weight:900;color:#2563eb;font-size:20px;}
.logo-wrap img{height:42px;width:42px;border-radius:50%;border:2px solid #2563eb;background:#000;object-fit:cover;}
.btn{padding:8px 14px;border-radius:6px;color:#fff;text-decoration:none;font-weight:700;font-size:13px}
.b-blue{background:#2563eb}.b-black{background:#111827}
.wrap{max-width:1100px;margin:0 auto;display:grid;grid-template-columns:1.6fr .9fr;gap:18px;position:relative;z-index:2;}
.card{background:#fff;border-radius:16px;padding:22px;box-shadow:0 4px 12px rgba(0,0,0,.06)}
.heading-blue{background:#2563eb;color:#fff;padding:14px 18px;border-radius:12px;margin:-22px -22px 18px -22px;display:flex;align-items:center;gap:10px}
.heading-blue h2{margin:0;font-size:18px}
label{font-size:12px;font-weight:700;color:#334155;margin-top:10px;display:block}
input,select{width:100%;padding:12px;margin:6px 0 10px;border:1px solid #e2e8f0;border-radius:10px;font-size:14px;box-sizing:border-box}
input:focus,select:focus{outline:none;border-color:#3b82f6;box-shadow:0 0 0 3px rgba(59,130,246,.15)}
.bmi-box{display:flex;gap:10px;align-items:center}
#bmi{flex:1;background:#f1f5f9;font-weight:800;text-align:center;font-size:18px}
#bmi_status{padding:8px 12px;border-radius:20px;font-weight:800;font-size:12px;display:none}
.btn-save{width:100%;padding:14px;background:#2563eb;color:#fff;border:none;border-radius:10px;font-weight:800;font-size:15px;cursor:pointer;margin-top:10px}
.guide h3{margin:0 0 10px;font-size:16px;color:#2563eb}
.guide-item{background:#f8fafc;border-left:4px solid #3b82f6;padding:10px 12px;border-radius:8px;margin-bottom:12px}
.guide-item.green{border-color:#16a34a}.guide-item.yellow{border-color:#eab308}.guide-item.red{border-color:#ef4444}
.guide-item b{font-size:13px}.guide-item p{margin:4px 0 0;font-size:12px;color:#475569;line-height:1.4}
.formula{background:#111827;color:#fff;padding:12px;border-radius:10px;text-align:center;font-size:13px;margin-bottom:12px}
.formula span{color:#fbbf24;font-weight:800}
footer{text-align:center;margin-top:18px;font-size:11px;color:#64748b;}
@media(max-width:800px){.wrap{grid-template-columns:1fr}}
</style></head><body>

<div class="watermark">MASOLO LABS</div>

<div class="top">
<div class="logo-wrap">
<img src="/masolo-health.jpeg" onerror="this.src='/images/masolo-health.jpeg'">
MASOLO LABS
</div>
<div><a class="btn b-black" href="/children">List</a> <a class="btn b-blue" href="/dashboard">Dashboard</a></div>
</div>

<div class="wrap">
<div class="card">
<div class="heading-blue"><h2>🍼 Register Child - Auto BMI</h2></div>
<form method="POST" action="/children">@csrf
<label>Child Name *</label>
<input name="name" placeholder="e.g Kato James" required>
<div style="display:grid;grid-template-columns:1fr 1fr;gap:10px">
<div><label>Age (months) *</label><input name="age" type="number" placeholder="e.g 24" required></div>
<div><label>Gender *</label><select name="gender" required><option value="">Select Gender</option><option>Male</option><option>Female</option></select></div>
</div>
<label>Weight (KG) * <span style="font-weight:400;color:#64748b">- Use digital scale, remove shoes</span></label>
<input name="weight_kg" id="w" type="number" step="0.1" placeholder="e.g 12.5" oninput="calcBMI()" required>
<label>Height (CM) * <span style="font-weight:400;color:#64748b">- Child standing straight against wall</span></label>
<input name="height_cm" id="h" type="number" step="0.1" placeholder="e.g 85.5" oninput="calcBMI()" required>
<label>BMI Auto Calculated</label>
<div class="bmi-box">
<input name="bmi" id="bmi" placeholder="0.00" readonly>
<span id="bmi_status"></span>
</div>
<label>MUAC (CM) * <span style="font-weight:400;color:#64748b">- Mid Upper Arm Circumference</span></label>
<input name="muac_cm" type="number" step="0.1" placeholder="e.g 12.5" required>
<label>Parent / Guardian Name</label>
<input name="parent_name" placeholder="e.g Nalongo">
<div style="display:grid;grid-template-columns:1fr 1fr;gap:10px">
<div><label>Phone</label><input name="phone" placeholder="07..."></div>
<div><label>Village *</label><input name="village" placeholder="e.g Bweyogerere" required></div>
</div>
<button class="btn-save" type="submit">💾 Save Child Record</button>
</form>
</div>

<div class="card guide">
<h3>📏 How to Measure BMI & MUAC</h3>
<div class="formula">BMI Formula = <span>Weight (KG) ÷ (Height (M) × Height (M))</span><br>Height in CM ÷ 100 = Height in M</div>
<div class="guide-item"><b>1. Weight KG - Guidelines</b><p>• Use calibrated digital scale<br>• Remove shoes & heavy clothes<br>• Record to nearest 0.1 KG</p></div>
<div class="guide-item"><b>2. Height CM - Guidelines</b><p>• Child stands barefoot, back to wall<br>• Head, shoulders, buttocks touching wall<br>• Use flat ruler on head</p></div>
<div class="guide-item"><b>3. MUAC - Mid Upper Arm</b><p>• Left arm, midpoint between shoulder & elbow<br>• Tape not too tight or loose<br>• Arm relaxed at side</p></div>
<div class="guide-item green"><b>🟢 GREEN > 12.5 CM</b><p>Good nutrition - Continue balanced diet.</p></div>
<div class="guide-item yellow"><b>🟡 YELLOW 11.5 - 12.5 CM</b><p>Moderate Malnutrition - Supplementary feeding.</p></div>
<div class="guide-item red"><b>🔴 RED < 11.5 CM</b><p>Severe Malnutrition - Refer NOW to HC III.</p></div>
<div style="margin-top:12px;text-align:center;font-size:10px;color:#94a3b8;font-weight:700;">© 2026 MASOLO Labs Protected System</div>
</div>
</div>

<script>
function calcBMI(){
let w=parseFloat(document.getElementById('w').value);
let h=parseFloat(document.getElementById('h').value);
let bmiField=document.getElementById('bmi');
let status=document.getElementById('bmi_status');
if(w>0 && h>0){
let hm=h/100;
let bmi=(w/(hm*hm)).toFixed(2);
bmiField.value=bmi;
status.style.display='inline-block';
if(bmi<16){status.textContent='Low';status.style.background='#ef4444';status.style.color='#fff';}
else if(bmi<18.5){status.textContent='Normal Low';status.style.background='#eab308';status.style.color='#fff';}
else if(bmi<=24.9){status.textContent='Good';status.style.background='#16a34a';status.style.color='#fff';}
else{status.textContent='High';status.style.background='#3b82f6';status.style.color='#fff';}
}else{bmiField.value='';status.style.display='none';}
}
</script>
</body></html>