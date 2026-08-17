@extends('layouts.app')

@section('title', 'Lost & Found — Foundly')

@section('content')

    <div class="page">
        <div class="container">
            <div class="board-header">
                <div>
                    <span class="badge-foundly">
                        The Board
                    </span>
                    <h1 class="page-title" style="margin-top: 16px;">
                        Lost & Found
                    </h1>
                    <p>
                        Maybe what you're looking for is here.
                    </p>
                </div>
                <a href="{{ route('items.report') }}" class="foundly-btn">
                    Report an item
                </a>
            </div>
            {{-- SEARCH & FILTER --}}

            <form action="{{ route('items.index') }}" method="GET" class="items-filter">

                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search items..."
                    class="form-control-foundly">

                <select name="type" class="form-select-foundly">

                    <option value="">All items</option>

                    <option value="Lost" {{ ($type ?? '') === 'Lost' ? 'selected' : '' }}>
                        Lost items
                    </option>

                    <option value="Found" {{ ($type ?? '') === 'Found' ? 'selected' : '' }}>
                        Found items
                    </option>

                </select>

                <button type="submit" class="foundly-btn">
                    Search
                </button>

                <a href="{{ route('items.index') }}" class="foundly-btn-outline">
                    Clear
                </a>

            </form>
            <div class="items-grid">
                @foreach ($items as $item)
                    <x-item-card :item="$item" />
                @endforeach
            </div>


@if ($items->hasPages())

    <div class="foundly-pagination">

        {{-- Previous --}}
        @if ($items->onFirstPage())
            <span class="foundly-page disabled">
                ←
            </span>
        @else
            <a href="{{ $items->previousPageUrl() }}" class="foundly-page">
                ←
            </a>
        @endif


        {{-- Page Numbers --}}
        <div class="foundly-page-numbers">

            @for ($page = 1; $page <= $items->lastPage(); $page++)

                @if ($page == $items->currentPage())

                    <span class="foundly-page active">
                        {{ $page }}
                    </span>

                @else

                    <a href="{{ $items->url($page) }}" class="foundly-page">
                        {{ $page }}
                    </a>

                @endif

            @endfor

        </div>


        {{-- Next --}}
        @if ($items->hasMorePages())

            <a href="{{ $items->nextPageUrl() }}" class="foundly-page">
                →
            </a>

        @else

            <span class="foundly-page disabled">
                →
            </span>

        @endif

    </div>

@endif        </div>
    </div>

@endsection
