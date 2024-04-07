<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Genre;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthorController;

class bookController extends Controller
{

    protected $book;

    public function __construct (Books $book)  {
        $this->book = $book;
    }

    public function showAllbook() {
        $books = $this->book->allBooks();
        return view('book.allbook', compact('books'));
    }

    public function showAddBookForm(Author $author, Genre $genre)
    {
        $authors= $author->allAuthor();
        $genres=$genre->allGenre();
        return view('book.addBook', compact('authors','genres'));
    }
    public function showUpdateBookForm($id, Author $author, Genre $genre)
    {
        $book = $this->book->findBook($id);
        if(!isset($book)){
            return redirect()->route('home')->with('fail', 'El libro no existe.');  
        }
        $authors= $author->allAuthor();
        $genres=$genre->allGenre();
        return view('book.updatebook', compact('book','authors','genres'));
    }

    public function updateBookStatus($id){
        $this->book = $this->book->findBook($id);
        $this->book->available = !$this->book->available;
        $this->book->save();
    }

    

    public function addBook(Request $request){    
        $this->book->title = $request->input('title');
        $this->book->author_id = intval($request->input('author_id'));
        $this->book->year = $request->input('year');
        $this->book->description = $request->input('description');
        $this->book->genre_id = intval($request->input('genre_id')); 
        $this->book->cover = $request->input('cover');
        $this->book->available = true;
     
       $this->book->save();
       return redirect()->back()->with('message', 'El libro se ha creado correctamente.');
    
    }

    public function getAllBooks(){
        return $this->book->allBooks();
    }

    public function getBook($id){
        return $this->book->findBook($id);
    }

    public function updateBook(Request $request, $id)
    {

        $book = $this->book->findBook($id);
        if(!isset($book)){
            return redirect()->route('home')->with('message', 'El libro no existe.');  
        }

        $book->title = $request->input('title');
        $book->author_id = intval($request->input('author_id'));
        $book->year = $request->input('year');
        $book->description = $request->input('description');
        $book->genre_id = intval($request->input('genre_id')); 
        $book->cover = $request->input('cover');
        $book->available = true;
        $book->updateBook($book);
        return redirect()->back()->with('message', 'El libro se ha actualizado correctamente.');


    
    }

    public function deleteBook(Request $request){
        $this->book->deleteBook($request->input('id'));
        return redirect()->route('');
    }



    

}