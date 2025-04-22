@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Available Venues in Kozhikode</h1>

    <div class="row">
        @foreach($venues as $venue)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title">{{ $venue->name }}</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Location:</strong> {{ $venue->location }}</p>
                        <p><strong>Description:</strong> {{ $venue->description }}</p>
                        <p><strong>Opening Time:</strong> {{ \Carbon\Carbon::parse($venue->opening_time)->format('h:i A') }}</p>
                        <p><strong>Closing Time:</strong> {{ \Carbon\Carbon::parse($venue->closing_time)->format('h:i A') }}</p>
                        <a href="{{ route('venues.slots', $venue->id) }}" class="btn btn-outline-secondary mt-2">View Available Slots</a>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
