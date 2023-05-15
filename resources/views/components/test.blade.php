

<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <div class="container">
        <div class="row">
            @foreach($accommodations as $accommodation)
            <div class="col-md-4">
                
                    <h2>{{ $accommodation->name }}</h2>
                    <p>{{ $accommodation->description }}</p>
                    <p>Max Capacity: {{ $accommodation->max_capacity }}</p>
                    <p>Price Per Person: {{ $accommodation->price_per_person }}</p>
                    <p>Breakfast Option: {{ $accommodation->breakfast_option ? 'Yes' : 'No' }}</p>
                    <a class="btn btn-primary" href="{{ route('accommodations.book', $accommodation->id) }}">Book Here</a>
                </div>
            @endforeach
        </div>
    </div>
</div>