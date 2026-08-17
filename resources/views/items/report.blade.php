@extends('layouts.app')

@section('title', 'Report an Item — Foundly')

@section('content')

    <div class="form-page">
        <div class="container">
            <div class="form-heading">

                <span class="badge-foundly">
                    Report a finding
                </span>

                <h1 class="page-title" style="margin-top: 16px;">
                    Report an item
                </h1>

                <p>
                    Tell us about something you lost or found.
                </p>

            </div>

            @if ($errors->any())

                <div class="validation-box">

                    <strong>Please fix the following:</strong>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>

            @endif
            <div class="form-shell">
                <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data" class="foundly-form">
                    @csrf
                    {{-- NAME --}}
                    <div class="form-field">

                        <label for="name" class="form-label">
                            Item name
                        </label>

                        <input type="text" name="name" id="name" class="form-control-foundly"
                            value="{{ old('name') }}" placeholder="e.g. Black Wallet">

                    </div>
                    {{-- TYPE --}}
                    <div class="form-field">

                        <label for="type" class="form-label">
                            Type
                        </label>

                        <select name="type" id="type" class="form-select-foundly">

                            <option value="">
                                Select type
                            </option>

                            <option value="Lost" {{ old('type') == 'Lost' ? 'selected' : '' }}>
                                Lost
                            </option>

                            <option value="Found" {{ old('type') == 'Found' ? 'selected' : '' }}>
                                Found
                            </option>

                        </select>

                    </div>
                    {{-- CATEGORY --}}
                    <div class="form-field">

                        <label for="category_id" class="form-label">
                            Category
                        </label>

                        <select name="category_id" id="category_id" class="form-select-foundly">

                            <option value="">
                                Select category
                            </option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach

                        </select>

                    </div>
                    {{-- LOCATION --}}
                    <div class="form-field">

                        <label for="location" class="form-label">
                            Location
                        </label>

                        <input type="text" name="location" id="location" class="form-control-foundly"
                            value="{{ old('location') }}" placeholder="e.g. College Library">

                    </div>
                    {{-- DATE & TIME --}}
                    <div class="form-field">

                        <label for="date" class="form-label">
                            When was it found?
                        </label>

                        <input type="datetime-local" name="date" id="date" class="form-control-foundly"
                            value="{{ old('date') }}">

                    </div>
                    {{-- DESCRIPTION --}}
                    <div class="form-field">

                        <label for="description" class="form-label">
                            Description
                        </label>

                        <textarea name="description" id="description" class="form-control-foundly" placeholder="Describe the item...">{{ old('description') }}</textarea>

                    </div>
                    {{-- IMAGE --}}
                    <div class="form-field">
                        <label for="image" class="form-label">
                            Item image
                        </label>
                        <input type="file" name="image" id="image" class="form-control-foundly" accept="image/*">
                        <small>
                            JPG, JPEG, PNG, WEBP — maximum 2 MB.
                        </small>
                    </div>
                    <div class="form-actions">

                        <button type="submit" class="foundly-btn">
                            Report Item
                        </button>

                        <a href="{{ route('items.index') }}" class="foundly-btn-outline">
                            Cancel
                        </a>

                    </div>
                </form>

            </div>

        </div>

    </div>

@endsection
