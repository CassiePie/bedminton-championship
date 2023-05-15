<div class=" p-6 lg:p-8">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1 class="text-xl font-medium mb-4">Add New Photo</h1>
    <form method="post" action="{{ route('photos.store') }}" enctype="multipart/form-data" class="grid grid-cols-2 gap-4">
        @csrf
        <div>
            <label for="title" class="block text-gray-700 font-medium mb-2">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
            @error('title')
                <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-span-2">
            <label for="game_id" class="block text-gray-700 font-medium mb-2">Game:</label>
            <select name="game_id" id="game_id" class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                @foreach ($games as $game)
                    <option value="{{ $game->id }}">{{ $game->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="photo" class="block text-gray-700 font-medium mb-2">Photo:</label>
            <input type="file" id="photo" name="photo" required class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
            @error('photo')
                <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-span-2">
            <label for="caption" class="block text-gray-700 font-medium mb-2">Caption:</label>
            <input type="text" id="caption" name="caption" value="{{ old('caption') }}" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
            @error('caption')
                <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-span-2">
            <button type="submit" class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mt-4">
                Upload Photo
            </button>
        </div>
    </form>
</div>
