<article class="item-card">

    {{-- IMAGE / PLACEHOLDER --}}
    <div class="item-image">
        @if ($item->image)
            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
        @else
            <div class="item-image-placeholder">
                <span>▭</span>
            </div>
        @endif
    </div>


    <div class="item-card-content">

        <div class="item-top">

            <x-status-tag :type="$item->type" />

            <span class="item-category">
                {{ $item->category->name }}
            </span>

        </div>


        <h3>
            <a href="{{ route('items.show', $item->id) }}">
                {{ $item->name }}
            </a>
        </h3>


        <p class="item-location">

            <span class="location-dot"></span>

            {{ $item->location }}

        </p>


        <p class="item-date">
            {{ $item->date->format('d M Y, h:i A') }}
        </p>


        <p class="item-description">
            {{ $item->description }}
        </p>


        <div class="item-actions">

            <a href="{{ route('items.edit', $item->id) }}" class="foundly-btn-outline">
                Edit
            </a>


            <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="delete-form"
                onsubmit="return confirm('Are you sure you want to delete this item?');">

                @csrf
                @method('DELETE')

                <button type="submit" class="delete-btn">
                    Delete
                </button>

            </form>

        </div>

    </div>

</article>
