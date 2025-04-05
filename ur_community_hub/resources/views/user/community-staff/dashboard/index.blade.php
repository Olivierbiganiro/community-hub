<x-app-layout>
    <div class="p-4 bg-gray-100 rounded-md shadow-sm page-breadcrumb">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-700">
                <i class="fa fa-tachometer"></i> WELCOME {{ Auth::user()->name }} Dashboard
            </h3>
        </div>
    </div>

    <div class="container px-4 py-6 mx-auto my-6 bg-white rounded-md shadow-md">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
            @php
                $totalUsers = \App\Models\User::count();
                $totalCommunities = \App\Models\CommunityProfile::count();
                $totalEvents = \App\Models\Event::count();
            @endphp
            @if ($totalUsers)
                <!-- Total Users -->
                <div class="p-4 text-white bg-blue-500 rounded-md shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-lg font-bold">Total Users</h4>
                            <p class="text-2xl font-semibold">{{ $totalUsers }}</p>
                        </div>
                        <i class="text-4xl fa fa-users"></i>
                    </div>
                </div>
            @endif
            @if ($totalCommunities)
                <!-- Total Communities -->
                <div class="p-4 text-white bg-green-500 rounded-md shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-lg font-bold">Total Communities</h4>
                            <p class="text-2xl font-semibold">{{ $totalCommunities }}</p>
                        </div>
                        <i class="text-4xl fa fa-building"></i>
                    </div>
                </div>
            @endif
            @if ($totalEvents)
                <!-- Total Events -->
                <div class="p-4 text-white bg-yellow-500 rounded-md shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-lg font-bold">Total Events</h4>
                            <p class="text-2xl font-semibold">{{ $totalEvents }}</p>
                        </div>
                        <i class="text-4xl fa fa-calendar"></i>
                    </div>
                </div>
            @endif
        </div>

        @php
            $recentEvents = \App\Models\Event::latest()->limit(5)->get();
        @endphp
        <!-- Recent Events Table -->
        @if ($recentEvents->isNotEmpty())
            <div class="p-4 mt-8 bg-white rounded-md shadow-md">
                <h3 class="mb-4 text-xl font-semibold"><i class="fa fa-calendar"></i> Recent Events</h3>
                <table class="w-full border border-collapse border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="p-2 border">Title</th>
                            <th class="p-2 border">Date</th>
                            <th class="p-2 border">Location</th>
                            <th class="p-2 border">Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($recentEvents as $event)
                            <tr class="border">
                                <td class="p-2">{{ $event->title }}</td>
                                <td class="p-2">{{ $event->event_date }}</td>
                                <td class="p-2">{{ $event->location }}</td>
                                <td class="p-2">{{ ucfirst($event->status) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>
