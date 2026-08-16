@extends('layouts.app')

@section('title', 'Foundly — Lost & Found')

@section('content')
    <div class="page">

        <div class="container">

            {{-- HERO --}}
            <section class="hero-grid">

                <div class="hero-copy">

                    <span class="badge-foundly">
                        Campus Lost & Found
                    </span>

                    <h1 class="section-title" style="margin-top: 18px;">
                        Lost something?
                        <br>
                        <em>Maybe it's here.</em>
                    </h1>

                    <p class="lead muted">
                        Foundly helps students report lost belongings,
                        share found items, and reconnect people with
                        the things they thought were gone forever.
                    </p>

                    <div class="hero-actions">

                        <a href="{{ route('items.index') }}" class="foundly-btn">
                            Browse Lost & Found
                        </a>

                        <a href="{{ route('items.create') }}" class="foundly-btn-outline">
                            Report an item
                        </a>

                    </div>

                </div>
                {{-- CUTE FOUNDLY ILLUSTRATION --}}
                <div class="hero-visual">
                    <img src="{{ asset('images/foundly-hero.png') }}" alt="Foundly lost and found illustration"
                        class="foundly-hero-img">
                </div>

            </section>


            {{-- THREE THINGS --}}
            <section class="feature-grid">

                <div class="feature">

                    <span class="feature-number">01</span>

                    <h3>Report</h3>

                    <p>
                        Lost or found something?
                        Put it on Foundly so someone can find it.
                    </p>

                </div>


                <div class="feature">

                    <span class="feature-number">02</span>

                    <h3>Browse</h3>

                    <p>
                        Look through belongings reported
                        around campus and see if something belongs to you.
                    </p>

                </div>


                <div class="feature">

                    <span class="feature-number">03</span>

                    <h3>Reunite</h3>

                    <p>
                        Help lost things and their owners
                        find their way back together.
                    </p>

                </div>

            </section>

        </div>

    </div>

@endsection
