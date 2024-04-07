@extends('home')

@section('content')    

<table>
    <thead>
        <tr>
            <th>id</th>
            <th>User</th>
            <th>Book</th>
            <th>Checkout Date</th>
            <th>Check in Date</th>
            <th>Status</th>

        </tr>
    </thead>
    <tbody>
        @foreach($checkouts as $checkout)
        <tr>
            <td>{{ $checkout->id }}</td>
            <td>{{ $checkout->user->name }}</td>
            <td>{{ $checkout->book->title }}</td>
            <td>{{ $checkout->ckeckout_date }}</td>
            <td>{{ $checkout->ckeck_in_date }}</td>
            @if ($checkout->ckeck_in_date===null)
            <td><a href="{{route('checkoutUpdateStatus', ['id' => $checkout->id])}}">Check in </a></td>
            @else 
            <td>In stock</td>  
            @endif
           
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
