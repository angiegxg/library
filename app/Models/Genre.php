<?php

namespace App\Models;

use App\Models\Books;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{
    use HasFactory;
    protected $table = 'genres';
    protected $fillable = ['name'];

    public function books()
    {
       return $this->hasMany(Books::class);
    }

    // public function createGenre($name){
    //     $genre = new Genre();
    //     $genre->name = $name;
    //     $genre->save();
    //     return $genre;
    // }
    // public function updateGenre($id, $name){
    //     $genre = Genre::find($id);
    //     $genre->name = $name;
    //     $genre->save();
    //     return $genre;
    // }

    // public function deleteGenre($id){
    //     $genre = Genre::find($id);
    //     $genre->delete();
    //     return $genre;
    // }

    // public function getGenre($id){
    //     $genre = Genre::find($id);
    //     return $genre;
    // }

    // public function getAllGenres(){
         
    //     return Genre::all();
    // }

    public static function allGenre(){
        return Genre::all();
     }
     
     public static function findGenre($id){
        return Genre::find($id);
     }
     
     public static function createGenre($data){
        return Genre::create($data);
     }
     
     public static function updateGenre($id, $data){
        return Genre::find($id)->update($data);
     }
     
     public static function deleteGenre($id){
        return Genre::find($id)->delete();
     }
     
     public static function searchGenre($query){
        return Genre::where('titulo', 'LIKE', '%'.$query.'%')->get();
     }
    
}
