@extends('home')

@section('content')  

<form action="{{route('addbookPost')}}" method="POST">
    @csrf
    <label for="titulo">Title</label>
    <input type="text" name="title" required>
    <label for="autor">Autor</label>
    @include('book.components.select', ['items' => $authors])
    <label for="genre">Genero</label>
    @include('book.components.selectgenre', ['items' => $genres])
    <label for="year">Year</label>
    <input type="text" name="year" required>
    <label for="cover">Cover</label>
    <input type="text" name="cover" required>
    <label for="description">Description</label>
    <input type="textarea" name="description" required>
    



{{-- 
    $this->book->title = $request->input('title');
    $this->book->author_id = $request->input('author_id');
    $this->book->year = $request->input('year');
    $this->book->description = $request->input('description');
    $this->book->genre_id = $request->input('genre_id'); 
    $this->book->cover = $request->input('cover');
    $this->book->available = true; --}}


    <button type="submit">Crear</button>
    
     </form>

     
@endsection