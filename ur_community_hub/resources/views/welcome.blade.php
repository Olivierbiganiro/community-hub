@extends('layouts.guest.partial.layouts')
@section('content')
    <!-- main content wrapper -->
    <div class="main-content-wrapper">
        <div class="banner-wrapper">
            <div class="container h-100">
                <div class="row align-items-center justify-content-center h-100">
                    <div class="col-12 col-md-8 col-lg-8 h-100">
                        <div class="banner-content-wrapper">
                            <h1>Connecting and Empowering the University of Rwanda Community</h1>
                            <h4>UR Community Hub is your go-to platform for collaboration, networking, and resource sharing
                                among students, staff, and alumni.</h4>
                            <div class="banner-btn">
                                <a href="#community-events" class="theme-btn btn-main">Explore more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container my-5" id="community">
            <h2 class="mb-4 text-center">Available Communities</h2>

            <!-- Swiper Wrapper -->
            <div class="swiper mySwiper ">
                <div class="swiper-wrapper pb-5">
                    @php
                        $communities = App\Models\CommunityProfile::where('status', 1)->withCount('events')->get();
                    @endphp

                    @foreach ($communities as $community)
                        <div class="swiper-slide">
                            <div class="shadow-sm card h-50">
                                <a href="{{ route('community.show', $community->id) }}">
                                    <!-- Community Image -->
                                    <div class="card-img-top">
                                        @if ($community->profile_image)
                                            <img src="{{ $community->profile_image }}"
                                                alt="{{ $community->community_name }}" class="img-fluid">
                                        @else
                                            <div class="py-5 text-center bg-light">
                                                <i class="fas fa-users fa-3x text-secondary"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <!-- Community Details -->
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">{{ $community->community_name }}</h5>
                                        <p class="card-text flex-grow-1">{{ Str::limit($community->bio, 100, '...') }}</p>
                                        <p class="card-text"><small class="text-muted">{{ $community->location }}</small>
                                        </p>
                                        <p class="card-text"><strong>Events:</strong> {{ $community->events_count }}</p>
                                    </div>
                                </a>

                                <!-- Social Links -->
                                <div class="bg-white card-footer">
                                    <div class="d-flex justify-content-around">
                                        @if ($community->facebook_links)
                                            <a href="{{ $community->facebook_links }}" target="_blank" class="text-primary">
                                                <i class="fab fa-facebook fa-2x"></i>
                                            </a>
                                        @endif
                                        @if ($community->linkedin_links)
                                            <a href="{{ $community->linkedin_links }}" target="_blank" class="text-info">
                                                <i class="fab fa-linkedin fa-2x"></i>
                                            </a>
                                        @endif
                                        @if ($community->instagram_links)
                                            <a href="{{ $community->instagram_links }}" target="_blank" class="text-danger">
                                                <i class="fab fa-instagram fa-2x"></i>
                                            </a>
                                        @endif
                                        @if ($community->twitter_links)
                                            <a href="{{ $community->twitter_links }}" target="_blank" class="text-primary">
                                                <i class="fab fa-twitter fa-2x"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>



        <!-- Community Event Section -->
        <div class="section function" id="community-events">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8 col-lg-8">
                        <div class="section-heading-wrapper">
                            <h2 class="mb-2">Community Events</h2>
                            <h2 class="mb-3 section-main-heading">Latest Events from Your Community</h2>
                            <p>Explore events organized by your community and get involved.</p>
                        </div>
                    </div>
                </div>
                <div class="text-end">
                    <a href="{{ route('event-list') }}" class="text-primary">← Event List</a>
                </div>
            </div>

            <div class="container">
                @php
                    $events = \App\Models\Event::latest()->take(4)->get();
                @endphp
                @if ($events->isEmpty())
                    <p class="text-center text-gray-500">No upcoming events in your community.</p>
                @else
                    @foreach ($events as $index => $event)
                        <div class="about-timeline-item">
                            <div class="about-timeline-line"></div>
                            <div class="about-timeline-dot"></div>
                            <div class="row">
                                @if ($index % 2 == 0)
                                    <!-- Image on Left -->
                                    <div class="col-lg-6 col-md-12 col-xs-12">
                                        <div class="about-timeline">
                                            <img class="img-fluid"
                                                src="{{ asset($event->image ?? 'assets/web/images/default-event.jpg') }}"
                                                alt="{{ $event->title }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-xs-12">
                                        <div class="about-timeline-info">
                                            <h3>{{ $event->title }}</h3>
                                            <p>{{ $event->description }}</p>
                                            <p><strong>Date:</strong>
                                                {{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}</p>
                                            <p><strong>Location:</strong> {{ $event->location }}</p>
                                            <p><strong>Community:</strong> {{ $community->community_name ?? 'N/A' }}</p>
                                            <p><strong>Slug:</strong> {{ $event->slug }}</p>
                                            <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary">
                                                <i class="fa fa-eye"></i> View Event
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <!-- Image on Right -->
                                    <div class="col-lg-6 col-md-12 col-xs-12">
                                        <div class="about-timeline-info">
                                            <h3>{{ $event->title }}</h3>
                                            <p>{{ $event->description }}</p>
                                            <p><strong>Date:</strong>
                                                {{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}</p>
                                            <p><strong>Location:</strong> {{ $event->location }}</p>
                                            <p><strong>Community:</strong> {{ $community->community_name ?? 'N/A' }}</p>
                                            <p><strong>Slug:</strong> {{ $event->slug }}</p>
                                            <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary">
                                                <i class="fa fa-eye"></i> View Event
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-xs-12">
                                        <div class="about-timeline">
                                            <img class="img-fluid"
                                                src="{{ asset($event->image ?? 'assets/web/images/default-event.jpg') }}"
                                                alt="{{ $event->title }}">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        {{-- @include('layouts.guest.software.software') --}}

        @include('layouts.guest.section.contact')
    </div>
@endsection
