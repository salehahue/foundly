@extends('layouts.app')

@section('title', $item->name . ' — Foundly')

@section('content')

    <div class="detail-page">

        <div class="container">

            <a href="{{ route('items.index') }}" class="back-link">
                ← Back to Lost & Found
            </a>

            <div class="detail-card">

                {{-- LEFT: IMAGE --}}
                <div class="detail-image">

                    @if ($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
                    @else
                        <div class="detail-image-placeholder">
                            <span>▱</span>
                        </div>
                    @endif

                </div>


                {{-- RIGHT: DETAILS --}}
                <div class="detail-content">

                    <div class="detail-meta">

                        <x-status-tag :type="$item->type" />

                        <span class="item-category">
                            {{ $item->category->name }}
                        </span>

                    </div>


                    <h1>
                        {{ $item->name }}
                    </h1>


                    <p class="detail-location">
                        {{ $item->type }} at {{ $item->location }}
                    </p>


                    <p class="detail-date">
                        {{ $item->date->format('d M Y, h:i A') }}
                    </p>


                    <hr class="detail-divider">


                    <p class="detail-description">
                        {{ $item->description }}
                    </p>


                    <button class="foundly-btn">
                        I think this is mine
                    </button>

                </div>

            </div>

        </div>

    </div>

@endsection
