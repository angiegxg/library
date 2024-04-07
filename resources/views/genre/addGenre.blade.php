@extends('home')

@section('content') 

<form action="{{route('addGenrePost')}}" method="POST">
    @csrf 
<label for="name">Name</label>
<input type="text" name="name" required>
<button type="submit">Crear</button>

</form>

@endsection