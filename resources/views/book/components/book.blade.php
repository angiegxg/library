<header>
<h1>{{ $book->title }}</h1>
<img src="{{$book->cover}}" alt="">
</header>
<body>
<p>Author:</p>
<p>{{ $book->author->name }}</p>
</body>
<footer>
    
   
    <a href="{{ route('showUpdateBookForm', ['id' => $book->id]) }}">editar</a>
    <a href="{{ route('checkoutBook', ['id' => $book->id]) }}">Prestar</a>


</footer>

</html>
