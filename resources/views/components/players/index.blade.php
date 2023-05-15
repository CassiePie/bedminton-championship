<body>
    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
        <h1 class="mt-8 text-2xl font-medium text-gray-900">
            Register New Player
        </h1>
    </div>
    
    <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
    
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form method="post" action="{{ url('players') }}" class="mt-6">
            @csrf
            <div class="col-span-6 sm:col-span-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Name:</label>
                <input type="text" id="name" name="name" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
            </div>
    
            <div class="col-span-6 sm:col-span-4">
                <label for="country" class="block text-gray-700 font-medium mb-2">Country:</label>
                <input type="text" id="country" name="country" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
            </div>
    
            <div class="col-span-6 sm:col-span-4">
                <label for="concept" class="block text-gray-700 font-medium mb-2">Concept:</label>
                <div class="flex justify-between items-center mt-1">
                    <label for="singles" class="inline-flex items-center mr-6">
                        <input type="checkbox" id="singles" name="concept" value="singles" class="form-checkbox">
                        <span class="ml-2 text-gray-700">Singles</span>
                    </label>
                    <label for="doubles" class="inline-flex items-center mr-6">
                        <input type="checkbox" id="doubles" name="concept" value="doubles" class="form-checkbox">
                        <span class="ml-2 text-gray-700">Doubles</span>
                    </label>
                    <label for="mixed_doubles" class="inline-flex items-center">
                        <input type="checkbox" id="mixed_doubles" name="concept" value="mixed doubles" class="form-checkbox">
                        <span class="ml-2 text-gray-700">Mixed Doubles</span>
                    </label>
                </div>
            </div>
    
            <button type="submit" class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mt-4">
                Register
            </button>
        </form>
    </div>
    
    <div class="bg-white-200 p-6 lg:p-8 border-b border-gray-200">
        <h1 class="mt-8 text-2xl font-medium text-gray-900">
            Player List
        </h1>
    
        <ul class="mt-6">
            <li class="mt-4">
                <x-players.show
                    :players="$players"
                />
            </li>
        </ul>
    
    </div>
    
</body>
