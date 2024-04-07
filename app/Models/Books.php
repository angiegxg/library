<?php

namespace App\Models;
use Exception;

use App\Models\Genre;
use App\Models\Author;
use App\Models\Checkout;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Books extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $book;
    protected $fillable = [
        'title',
        'author_id',
        'year',
        'description',
        'genre_id', 
        'cover',
        'available'
    ];


    public function author(){
        return $this->belongsTo(Author::class);
    }

    public function genre(){
        return $this->belongsTo(Genre::class);
    }

    public function checkout()
    {
       return $this->hasMany(Checkout::class);
    }

    public static function allBooks(){
        return Books::all();
    }

    public static function findBook($id){
        return Books::find($id);
    }
    public static function createBook(Books $book){
        try {
            $book->save();
            return $book;
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }
    
    public static function updateBook(Books $book){
        
        return $book->update();
    }
    public static function deleteBook($id){
        return Books::find($id)->delete();
    }
    
    public static function searchBook($query){
        return Books::where('titulo', 'LIKE', '%'.$query.'%')->get();
    }
};
