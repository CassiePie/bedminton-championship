<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        List of Accommodations
    </h1>
</div>
  
<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
    @foreach($accommodations as $accommodation)
    
    <div>
        
        <h2 class="text-xl font-semibold text-gray-900">{{ $accommodation->name }}</h2>
        <p class="mt-4 text-sm text-gray-500">{{ $accommodation->description }}</p>
     
        <p class="mt-4 text-sm">
            <a href="{{ $accommodation->website_link }}" target="_blank" class="inline-flex items-center font-semibold text-indigo-700">
                Book Here
            </a>
        </p>
    </div>
    @endforeach
</div>

