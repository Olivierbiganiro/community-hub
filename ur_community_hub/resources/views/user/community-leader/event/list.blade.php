@extends('layouts.guest.partial.layouts')
@section('content')
<div class="main-content-wrapper">
    <div class="container py-5">
        <div class="mb-4 row">
            <div class="text-center col-12">
                <h1 class="section-title">Upcoming Events</h1>
                <p class="section-subtitle">Stay updated with our latest community events</p>
            </div>
        </div>
        <div class="row py-3">
            @forelse($events as $event)
                <div class="mb-4 col-md-6 col-lg-4">
                    <div class="rounded shadow event-card">
                        <!-- Event Image -->
                        <div class="event-image">
                            <img src="{{ asset($event->image ?? 'assets/web/images/default-event.jpg') }}" alt="{{ $event->title }}" class="img-fluid rounded-top">
                        </div>

                        <!-- Event Details -->
                        <div class="p-3 event-content">
                            <h3 class="event-title">
                                <a href="{{ route('events.show', $event->id) }}">{{ $event->title }}</a>
                            </h3>
                            <p class="event-date">
                                <i class="fa fa-calendar"></i> {{ date('F j, Y', strtotime($event->event_date)) }}
                            </p>
                            <p class="event-location">
                                <i class="fa fa-map-marker-alt"></i> {{ $event->location }}
                            </p>
                            <p class="event-community">
                                <i class="fa fa-users"></i> Organized by: {{ $event->community->community_name ?? 'N/A' }}
                            </p>

                            <!-- Action Buttons -->
                            <div class="event-actions">
                                <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-eye"></i> View Details
                                </a>
                                <a href="#" class="btn btn-outline-success btn-sm">
                                    <i class="fa fa-share"></i> Share
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center col-12">
                    <p class="text-muted">No upcoming events available.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-4 d-flex justify-content-center">
            {{ $events->links() }}
        </div>
    </div>
</div>

<!-- Custom Styles -->
<style>
    .event-card {
        background: #fff;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s;
        border-radius: 12px;
        overflow: hidden;
    }

    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .event-image img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .event-title {
        font-size: 1.25rem;
        font-weight: bold;
        margin-bottom: 8px;
    }

    .event-date,
    .event-location,
    .event-community {
        font-size: 0.9rem;
        color: #666;
        margin-bottom: 5px;
    }

    .event-actions .btn {
        margin-top: 10px;
    }

    .section-title {
        font-size: 2rem;
        font-weight: bold;
        color: #333;
    }

    .section-subtitle {
        font-size: 1.1rem;
        color: #777;
        margin-bottom: 20px;
    }
</style>
@endsection
