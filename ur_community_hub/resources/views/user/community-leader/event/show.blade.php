@extends('layouts.guest.partial.layouts')
@section('content')
<div class="main-content-wrapper">
    <!-- Event details -->
    <div class="event-detail-content">
        <div class="container">
            <div class="row">
                <div class="mb-4 col-12">
                    <div class="py-3 backto-event">
                        <a href="{{ route('event-list') }}">← Back to Events</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Left Section -->
                <div class="mb-4 col-12 col-md-6">
                    <div class="event-detail-top-left">
                        <h1>{{ $event->title }}</h1>
                        <p>{{ $event->description }}</p>
                        <ul>
                            <li><p><strong>Date:</strong>{{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y h:i A') }}</p></li>
                            <li><p><strong>Location:</strong> {{ $event->location }}</p></li>
                            <li>
                                <p><strong>Community:</strong>
                                    {{ $event->community->community_name ?? 'N/A' }}
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Right Section (Image) -->
                <div class="mb-4 col-12 col-md-6">
                    <div class="event-detail-top-right">
                        @if ($event->image)
                            <img class="img-fluid" src="{{ asset($event->image) }}" alt="{{ $event->title }}">
                        @else
                            <img class="img-fluid" src="{{ asset('assets/web/images/default-event.jpg') }}" alt="Default Event Image">
                        @endif
                    </div>
                </div>
            </div>

            <!-- Community Details -->
            <div class="row">
                <div class="mb-4 col-12">
                    <div class="event-community-info">
                        <h3>Organized by: {{ $event->community->community_name ?? 'N/A' }}</h3>
                        <p>{{ $event->community->description ?? 'No description available' }}</p>
                        <p><strong>Contact:</strong> {{ $event->community->email ?? 'N/A' }} | {{ $event->community->phone ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>

            <!-- Social Media Share -->
            <div class="row">
                <div class="blogdetail-post-share">
                    <div class="blogdetail-post-left">
                        <p>Share via:</p>
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($event->title) }}" target="_blank">
                                    <i class="fa-brands fa-x-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://api.whatsapp.com/send?text={{ urlencode($event->title . ' - ' . url()->current()) }}" target="_blank">
                                    <i class="fa fa-whatsapp"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
