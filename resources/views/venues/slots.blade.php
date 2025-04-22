@extends('layouts.app')
@section('content')
<style>
    #success-alert {
        transition: opacity 0.5s ease-out;
    }
    #success-alert.hide {
        opacity: 0;
    }
</style>
<div class="container">
    <h2 class="my-4">Available Slots for {{ $venue->name }}</h2>
    @if(session('success'))
        <div id="success-alert" class="alert alert-success">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(() => {
                const alert = document.getElementById('success-alert');
                if (alert) alert.style.display = 'none';
            }, 2000); // 3 seconds
        </script>
    @endif

    <p><strong>Venue ID:</strong> {{ $venue->id }}</p>
    <p><strong>Location:</strong> {{ $venue->location }}</p>
    <p><strong>Description:</strong> {{ $venue->description }}</p>

    <!-- Booking Date Field -->
    <div class="form-group mb-4">
        <label for="booking_date"><strong>Select Booking Date:</strong></label>
        <input 
            type="date" 
            id="booking_date" 
            class="form-control mt-2" 
            required
            min="{{ \Carbon\Carbon::today()->format('Y-m-d') }}"
            max="{{ \Carbon\Carbon::today()->addMonth()->format('Y-m-d') }}"
            value="{{ $booking_date }}"
            onchange="onDateChange()"
        >
    </div>
 
    <!-- Slots List -->
    <ul class="list-group mt-4">
    @foreach($slots as $slot)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                {{ \Carbon\Carbon::parse($slot->start_time)->format('h:i A') }} -
                {{ \Carbon\Carbon::parse($slot->end_time)->format('h:i A') }}
            </div>

            <div class="d-flex align-items-center gap-2">
                @if($slot->is_booked)
                    <span class="badge bg-danger">Booked</span>
                @else
                    <form method="POST" action="{{ route('book.slot') }}">
                        @csrf
                        <input type="hidden" name="venue_id" value="{{ $venue->id }}">
                        <input type="hidden" name="slot_id" value="{{ $slot->id }}">
                        <input type="hidden" name="booking_date" class="booking-date-input" value="{{ $booking_date }}">
                        <button type="submit" class="btn btn-success btn-sm">Book Now</button>
                    </form>
                @endif
            </div>
        </li>
    @endforeach
</ul>

    <a href="{{ route('venues.index') }}" class="btn btn-secondary mt-4">Back to Venues</a>
</div>


<script>
    function onDateChange() {
        const date = document.getElementById('booking_date').value;
        if (date) {
            const venueId = "{{ $venue->id }}";
            const url = `{{ route('venues.slots', ['venue' => '__VENUE__']) }}?date=${date}`;
            window.location.href = url.replace('__VENUE__', venueId);
        }
    }
</script>

@endsection
