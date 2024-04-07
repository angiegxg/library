<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library</title>
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="">Bienvenido {{ auth()->user()->name}}</a></li>
            <li><a href="{{ route('logout') }}">cerrar sesión</a></li>
            <li><a href="{{route('showAllBook')}}">Show Books</a></li>
            <li><a href="{{route('showBorrowedbooks')}}">borrowed books</a></li>

            
        </ul>
    </nav>
</header>
<main>

<aside class="">
    <h3>New</h3>
    <nav>
        <ul>
            <li><a href="{{route('showAddAuthorForm')}}">Author</a></li>
            <li><a href="{{route('showAddGenreForm')}}">Genre</a></li>
            <li><a href="{{route('addBookForm')}}">Book</a></li>
        </ul>
    </nav>
</aside>
{{-- @if(empty($books))
    <p>No hay libros disponibles.</p>
    
@else
    <div class="card-list">
        @foreach ($books as $book)
            @include('book.components.book', ['book' => $book])
        @endforeach
    </div>

@endif --}}



@yield('content')
@include('components.alert')
</main>

    
</body>
</html>
