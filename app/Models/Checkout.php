<?php

namespace App\Models;
use App\Models\User;
use App\Models\Books;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Checkout extends Model
{
    use HasFactory;
    protected $table = 'checkouts';
    protected $fillable = [
        'user_id',
        'book_id',
        'ckeckout_date',
        'ckeck_in_date',];
        
        public function book(){
            return $this->belongsTo(Books::class);
        }

        public function user(){
            return $this->belongsTo(User::class);
        }

        public static function allCheckout(){
            return Checkout::all();
         }
         
         public static function findCheckout($id){
            return Checkout::find($id);
         }
         
         public static function createCheckout(Checkout $checkout){
            return $checkout->save();
         }
         
         public static function updateCheckout(Checkout $checkout){
            return $checkout->update($checkout->toArray());
         }
         
         public static function deleteCheckout($id){
            return Checkout::find($id)->delete();
         }
         
         public static function searchCheckout($query){
            return Checkout::where('titulo', 'LIKE', '%'.$query.'%')->get();
         }
         
}

