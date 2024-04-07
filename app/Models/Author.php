<?php

namespace App\Models;
use App\Models\Books;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    
    use HasFactory;
    protected $table = 'authors';
    protected $fillable = ['name'];

    public function books()
 {
    return $this->hasMany(Books::class);
 }

// public function createAuthor($name){
//     $author = new Author();
//     $author->name = $name;
//     $author->save();
//     return $author;
// }
// public function getAuthor($id){
//     return Author::find($id);
// }
// public function updateAuthor($id, $name){
//     $author = Author::find($id);
//     $author->name = $name;
//     $author->save();
//     return $author;
// }
// public function deleteAuthor($id){
//     $author = Author::find($id);
//     $author->delete();
//     return $author;
// }

// public function getAllAuthors(){
//     return Author::all();
// }


public static function allAuthor(){
   return Author::all();
}

public static function findAuthor($id){
   return Author::find($id);
}
public static function createAuthor($data){
   return Author::create($data);
}
public static function updateAuthor($id, $data){
   return Author::find($id)->update($data);
}
public static function deleteAuthor($id){
   return Author::find($id)->delete();
}

public static function searchAuthor($query){
   return Author::where('titulo', 'LIKE', '%'.$query.'%')->get();
}

}
