@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Venue Performance Report</h2>
    
    <table class="table table-striped table-hover table-bordered align-middle text-center shadow-sm">
        <thead class="table-dark">
            <tr>
                <th scope="col">Rank</th>
                <th scope="col">Venue Name</th>
                <th scope="col">Total Bookings</th>
                <th scope="col">Current Month Bookings</th>
                <th scope="col">Category</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($venues as $venue)
                <tr class="
                    @if ($venue->bookings_count == $maxBookings) table-success
                    @elseif ($venue->bookings_count == $minBookings) table-danger
                    @endif
                ">
                    <td>{{ $venue->rank }}</td>
                    <td>{{ $venue->name }}</td>
                    <td>{{ $venue->bookings_count }}</td>
                    <td>{{ $venue->monthly_bookings }}</td>
                    <td>
                        <span class="badge 
                            @if($venue->category === 'A') bg-success
                            @elseif($venue->category === 'B') bg-primary
                            @elseif($venue->category === 'C') bg-warning text-dark
                            @else bg-danger
                            @endif">
                            {{ $venue->category }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
