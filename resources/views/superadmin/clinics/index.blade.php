<!DOCTYPE html>
<html>
<head>
    <title>Super Admin - Clinics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Super Admin - All Clinics</h2>
    <p>Logged as: {{ auth()->user()->email }} ({{ auth()->user()->role }})</p>
    
    <a href="{{ url('/super-admin/clinics/create') }}" class="btn btn-primary mb-3">+ Add New Clinic</a>
    <a href="{{ url('/dashboard') }}" class="btn btn-secondary mb-3">Back to Dashboard</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>District</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Expires</th>
                <th>Children</th>
                <th>Users</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clinics as $clinic)
            <tr>
                <td>{{ $clinic->id }}</td>
                <td>{{ $clinic->name }}</td>
                <td>{{ $clinic->district }}</td>
                <td>{{ $clinic->phone }}</td>
                <td><span class="badge bg-{{ $clinic->subscription_status == 'active' ? 'success' : 'danger' }}">{{ $clinic->subscription_status }}</span></td>
                <td>{{ $clinic->subscription_ends_at }}</td>
                <td>{{ $clinic->children_count ?? 0 }}</td>
                <td>{{ $clinic->users_count ?? 0 }}</td>
                <td>
                    <a href="{{ url('/super-admin/clinics/'.$clinic->id.'/edit') }}" class="btn btn-sm btn-warning">Edit / Renew</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>