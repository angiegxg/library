@extends('home')

@section('content')    
<div class="card-list">
    @foreach ($books as $book)
    @if ($book->available === 1)
    @include('book.components.book', ['book' => $book])
    @endif
        
    @endforeach
</div>
@endsection


