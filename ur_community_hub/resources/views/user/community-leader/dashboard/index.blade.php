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
                $totalEvents = \App\Models\Event::count();
            @endphp
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
        @if ($recentEvents->isNotEmpty())
            <!-- Recent Events Table -->
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
        <!-- Quick Actions -->
        <div class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-3">
            <a href="{{ route('event-profile') }}"
                class="flex items-center justify-center p-4 text-white bg-blue-500 rounded-md shadow-md">
                <i class="mr-2 text-3xl fa fa-plus-circle"></i> Create Event
            </a>
            <a href="{{ route('profile.show') }}"
                class="flex items-center justify-center p-4 text-white bg-yellow-500 rounded-md shadow-md">
                <i class="mr-2 text-3xl fa fa-user-circle"></i> Edit Profile
            </a>
        </div>
    </div>
</x-app-layout>
