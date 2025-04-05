@extends('layouts.guest.partial.layouts')
@section('content')
<div class="main-content-wrapper">
    <!-- Community details -->
    <div class="community-detail-content">
        <div class="container">
            <div class="row">
                <div class="mb-4 col-12">
                    <div class="py-3 backto-event">
                        <a href="{{ route('home') }}">← Back</a>
                    </div>
                </div>
            </div>

            <!-- Community Profile -->
            <div class="row">
                <div class="col-md-4">
                    <div class="community-profile">
                        <img src="{{ asset($community->profile_image) }}" alt="{{ $community->community_name }}" class="img-fluid rounded">
                    </div>
                </div>
                <div class="col-md-8">
                    <h2>{{ $community->community_name }}</h2>
                    <p><strong>Email:</strong> {{ $community->email }}</p>
                    <p><strong>Phone:</strong> {{ $community->phone }}</p>
                    <p><strong>Location:</strong> {{ $community->location }}</p>
                    <p><strong>Bio:</strong> {{ $community->bio }}</p>
                    <p>{{ $community->description }}</p>
                </div>
            </div>

            <!-- Community Leaders -->
            <div class="row mt-4">
                <div class="col-12">
                    <h3>Community Leaders</h3>
                    <div class="row pt-4">
                        @forelse ($community->leaders as $leader)
                            <div class="col-md-4">
                                <div class="card text-center shadow-sm mb-3">
                                    <div class="card-body">
                                        <img src="{{ asset($leader->profile_image) }}" alt="{{ $leader->leader_name }}" class="img-fluid rounded-circle mb-2" width="100" height="100">
                                        <h5 class="card-title">{{ $leader->leader_name }}</h5>
                                        <p class="card-text"><strong>Position:</strong> {{ $leader->position }}</p>
                                        <p class="card-text"><strong>Email:</strong> {{ $leader->email }}</p>
                                        <p class="card-text"><strong>Phone:</strong> {{ $leader->phone }}</p>
                                        <p class="card-text">{{ $leader->bio }}</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No leaders available for this community.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Community Events -->
            <div class="row mt-4">
                <div class="col-12">
                    <h3>Upcoming Events</h3>
                    <ul class="list-group pt-4">
                        @forelse ($community->events as $event)
                            <li class="list-group-item">
                                <a href="{{ route('events.show', $event->id) }}">
                                    {{ $event->title }} - {{ date('F d, Y', strtotime($event->event_date)) }}
                                </a>
                            </li>
                        @empty
                            <li class="list-group-item">No events available.</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <!-- Social Media Links -->
            <div class="row mt-4">
                <div class="col-12">
                    <h3>Follow Us</h3>
                    <ul class="social-links d-flex justify-between gap-4 py-3">
                        @if($community->facebook_links)
                            <li><a href="{{ $community->facebook_links }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        @endif
                        @if($community->linkedin_links)
                            <li><a href="{{ $community->linkedin_links }}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                        @endif
                        @if($community->twitter_links)
                            <li><a href="{{ $community->twitter_links }}" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                        @endif
                        @if($community->instagram_links)
                            <li><a href="{{ $community->instagram_links }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        @endif
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
