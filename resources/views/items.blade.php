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
                <a href="{{ route('items.create') }}" class="foundly-btn">
                    Report an item
                </a>
            </div>
            <div class="items-grid">
                @foreach ($items as $item)
                    <x-item-card :item="$item" />
                @endforeach
            </div>
        </div>
    </div>

@endsection
