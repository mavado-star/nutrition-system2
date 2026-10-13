<!DOCTYPE html>
<html>
<head>
    <title>Add Clinic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4" style="max-width:600px">
    <h3>Add New Clinic - MASOLO Labs</h3>
    <form method="POST" action="{{ url('/super-admin/clinics') }}">
        @csrf
        <div class="mb-3"><label>Clinic Name</label><input type="text" name="name" class="form-control" required placeholder="e.g. Bweyogerere Health Centre"></div>
        <div class="mb-3"><label>District</label><input type="text" name="district" class="form-control" value="Kampala"></div>
        <div class="mb-3"><label>Contact Person</label><input type="text" name="contact_person" class="form-control"></div>
        <div class="mb-3"><label>Phone (MoMo)</label><input type="text" name="phone" class="form-control" required></div>
        <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control"></div>
        <div class="mb-3"><label>Plan</label><select name="plan" class="form-control"><option value="basic">Basic - UGX 50,000</option></select></div>
        <div class="mb-3"><label>Subscription Ends</label><input type="date" name="subscription_ends_at" class="form-control" value="{{ date('Y-m-d', strtotime('+30 days')) }}"></div>
        <button class="btn btn-success w-100">Create Clinic - UGX 50,000</button>
    </form>
    <br><a href="{{ url('/super-admin/clinics') }}">Back</a>
</div>
</body>
</html>