<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    protected $author;

    public function __construct(Author $author)
    {
        $this->author = $author;
    }

    public function showAddAuthorForm(){
        return view('author.addAuthor');
    }

    public function showSelectAuthor(){
        $authors = $this->author->allAuthors();
        return view('selectAuthor', compact('authors'));
    }

    public function addAuthor(Request $request)
    {
        $autor=$this->author->where('name',$request->input('name') )->first();
        if(!isset($autor)){
            $this->author->name = $request->input('name');
            $this->author->save();
            return redirect()->back()->with('message', 'El autor se ha creado correctamente.');
        }
        return redirect()->back()->with('message', 'El autor ya existe.'); 
    }

    public function allAuthors()
    {
        return Author::allAuthor();
    }

    public function getAuthor($id)
    {
        return Author::findAuthor($id);
    }

    public function updateAuthor(Request $request)
    {
        $this->author = Author::findAuthor($request->input('id'));

        $data = [
            'name' => $request->input('name')
        ];

        Author::updateAuthor($this->author->id, $data);
    }

    public function deleteAuthor(Request $request)
    {
        Author::deleteAuthor($request->input('id'));
    }
}



    

