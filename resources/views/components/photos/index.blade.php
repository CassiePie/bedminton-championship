<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Photos
    </h1>
</div>

<div class="bg-gray-200 bg-opacity-25 border-b border-gray-200 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">

    @if(auth()->check())
        <x-photos.create :games="$games" />
    @endif
</div>


<div class="text-center bg-gray-200 bg-opacity-25 border-b border-gray-200">
    <form action="{{ route('photos.index') }}" method="GET">
        <div class="form-group">
            <label for="game_id" class="text-center">Filter by Game:</label>
            <select name="game_id" id="game_id" class="form-control" onchange="this.form.submit()">
                <option value="">All Games</option>
                @foreach ($games as $game)
                    <option value="{{ $game->id }}" {{ request('game_id') == $game->id ? 'selected' : '' }}>
                        {{ $game->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>
</div>


@if ($photos->isNotEmpty())
    <div class="photo-grid">
        {{-- {{ dd($photos) }} --}}
        <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 p-6 lg:p-8">
            @foreach ($photos as $photo)
                <div class="photo-card text-center">
                    <p>Game: {{ $photo->game->name }}</p>
                    <h2>{{ $photo->name }}</h2>
                    <img src="{{ $photo->url }}" alt="{{ $photo->title }}">
                    <p>{{ $photo->caption }}</p>
                    <p>Uploaded by: {{ $photo->user->name }}</p>
                    <form action="/photos/{{ $photo->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-semibold px-4 py-2 bg-white text-red-500 rounded">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
    {{ $photos->links() }}
@else
    <p class="text-center">No photos added yet!</p>
@endif

</div>