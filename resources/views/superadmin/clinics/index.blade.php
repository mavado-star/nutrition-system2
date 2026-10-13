<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Hospitals - Super Admin (Ministry of Health)
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="w-full table-auto border-collapse">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="border px-4 py-2 text-left">#</th>
                                    <th class="border px-4 py-2 text-left">Hospital Name</th>
                                    <th class="border px-4 py-2 text-left">District</th>
                                    <th class="border px-4 py-2 text-left">Admin Name</th>
                                    <th class="border px-4 py-2 text-left">Email</th>
                                    <th class="border px-4 py-2 text-left">Status</th>
                                    <th class="border px-4 py-2 text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($clinics as $index => $clinic)
                                <tr class="hover:bg-gray-50">
                                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="border px-4 py-2 font-semibold">{{ $clinic->clinic_name }}</td>
                                    <td class="border px-4 py-2">
                                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-bold">
                                            {{ $clinic->district ?? 'N/A' }}
                                        </span>
                                    </td>
                                    <td class="border px-4 py-2">{{ $clinic->name }}</td>
                                    <td class="border px-4 py-2">{{ $clinic->email }}</td>
                                    <td class="border px-4 py-2">
                                        @if($clinic->is_approved)
                                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">Approved</span>
                                        @else
                                            <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm">Pending</span>
                                        @endif
                                    </td>
                                    <td class="border px-4 py-2">
                                        @if(!$clinic->is_approved)
                                        <form method="POST" action="{{ url('/super-admin/clinics/'.$clinic->id.'/approve') }}">
                                            @csrf
                                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-1 rounded text-sm">
                                                Approve
                                            </button>
                                        </form>
                                        @else
                                            <span class="text-gray-400 text-sm">✓ Approved</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="border px-4 py-8 text-center text-gray-500">
                                        No hospitals registered yet.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>