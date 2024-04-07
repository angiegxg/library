@extends('home')

@section('content')  

<form action="{{ route('updateBookPost', ['id' => $book->id]) }}" method="POST">

    @csrf
    
    <label for="titulo" >Title</label>
    <input type="text" name="title" value="{{ old('title', $book->title) }}">
    <label for="autor">Autor</label>
    @include('book.components.select', ['items' => $authors])
    <label for="genre">Genero</label>
    @include('book.components.selectgenre', ['items' => $genres])
    <label for="year" >Year</label>
    <input type="text" value="{{ old('year', $book->year) }}" name="year">
    <label for="cover">Cover</label>
    <input type="text" value="{{ old('cover', $book->cover) }}" name="cover">
    <label for="description">Description</label>
    <input type="textarea" value="{{ old('description', $book->description) }}" name="description" >


    <button type="submit">Crear</button>
    
     </form>

     @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@endsection