<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    protected $genre;

    public function __construct(Genre $genre)
    {
        $this->genre = $genre;
    }

    public function showAddGenreForm(){
        return view('genre.addGenre');
    }

    public function addGenre(Request $request)
    {
        $genre=$this->genre->where('name',$request->input('name') )->first();
        if(!isset($genre)){
            $this->genre->name = $request->input('name');
        $this->genre->save();
        return redirect()->back()->with('message', 'El genero se ha creado correctamente.');
        }
        return redirect()->back()->with('message', 'El genero ya existe.'); 
    }
        
    

    public function allGenres()
    {
        return Genre::allGenre();
    }

    public function getGenre($id)
    {
        return Genre::findGenre($id);
    }

    public function updateGenre(Request $request)
    {
        $this->genre = Genre::findGenre($request->input('id'));

        $data = [
            'name' => $request->input('name')
        ];

        Genre::updateGenre($this->genre->id, $data);
    }

    public function deleteGenre(Request $request)
    {
        Genre::deleteGenre($request->input('id'));
    }
    //
}
