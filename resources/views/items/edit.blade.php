@extends('layouts.app')

@section('title', 'Edit Item — Foundly')

@section('content')

    <div class="form-page">

        <div class="container">

            <div class="form-heading">

                <span class="badge-foundly">
                    Update a report
                </span>

                <h1 class="page-title" style="margin-top: 16px;">
                    Edit item
                </h1>

                <p>
                    Update the information about this reported item.
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

                <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data"
                    class="foundly-form">
                    @csrf
                    @method('PUT')


                    <div class="form-field">

                        <label for="name" class="form-label">
                            Item name
                        </label>

                        <input type="text" name="name" id="name" class="form-control-foundly"
                            value="{{ old('name', $item->name) }}">

                    </div>


                    <div class="form-field">

                        <label for="type" class="form-label">
                            Type
                        </label>

                        <select name="type" id="type" class="form-select-foundly">

                            <option value="Lost" {{ old('type', $item->type) == 'Lost' ? 'selected' : '' }}>
                                Lost
                            </option>

                            <option value="Found" {{ old('type', $item->type) == 'Found' ? 'selected' : '' }}>
                                Found
                            </option>

                        </select>

                    </div>


                    <div class="form-field">

                        <label for="category_id" class="form-label">
                            Category
                        </label>

                        <select name="category_id" id="category_id" class="form-select-foundly">

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach

                        </select>

                    </div>


                    <div class="form-field">

                        <label for="location" class="form-label">
                            Location
                        </label>

                        <input type="text" name="location" id="location" class="form-control-foundly"
                            value="{{ old('location', $item->location) }}">

                    </div>
                    {{-- DATE & TIME --}}
                    {{-- DATE & TIME --}}
                    <div class="form-field">

                        <label for="date" class="form-label">
                            Date & Time
                        </label>

                        <input type="datetime-local" name="date" id="date" class="form-control-foundly"
                            value="{{ old('date', $item->date?->format('Y-m-d\TH:i')) }}">

                    </div>

                    <div class="form-field">

                        <label for="description" class="form-label">
                            Description
                        </label>

                        <textarea name="description" id="description" class="form-control-foundly">{{ old('description', $item->description) }}</textarea>

                    </div>
                    <div class="form-field">

                        <label for="image" class="form-label">
                            Item image
                        </label>

                        @if ($item->image)
                            <div class="current-image">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
                            </div>
                        @endif

                        <input type="file" name="image" id="image" class="form-control-foundly" accept="image/*">

                        <small>
                            Leave empty to keep the current image.
                        </small>

                    </div>


                    <div class="form-actions">

                        <button type="submit" class="foundly-btn">
                            Save changes
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
