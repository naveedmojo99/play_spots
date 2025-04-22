@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Available Slots for {{ $venue->name }}</h2>
    <p><strong>Venue ID:</strong> {{ $venue->id }}</p>
    <p><strong>Location:</strong> {{ $venue->location }}</p>
    <p><strong>Description:</strong> {{ $venue->description }}</p>

    <ul class="list-group mt-4">
        @foreach($slots as $slot)
            <li class="list-group-item">
                {{ \Carbon\Carbon::parse($slot->start_time)->format('h:i A') }} - 
                {{ \Carbon\Carbon::parse($slot->end_time)->format('h:i A') }}
            </li>
        @endforeach
    </ul>

    <a href="{{ route('venues.index') }}" class="btn btn-secondary mt-4">Back to Venues</a>
</div>
@endsection
