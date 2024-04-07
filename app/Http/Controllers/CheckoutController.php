<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    protected $checkout;

    public function __construct(Checkout $checkout)
    {
        $this->checkout = $checkout;
    }

    public function showBorrowedbooks()
    {
        $checkouts = $this->checkout->allCheckout();
        return view('checkouts.borrowedbooks', compact('checkouts'));
    }

    public function checkoutBook($id, bookController $updateBookStatus)
    {
        $userId = Auth::id();
        $this->checkout->user_id = $userId;
        $this->checkout->book_id = intval($id);
        $this->checkout->ckeckout_date = Carbon::now()->toDateString();
        $this->checkout->ckeck_in_date = null;
        $updateBookStatus->updateBookStatus(intval($id));
        $this->checkout->createCheckout($this->checkout);

        

    }

    public function checkInBook($id, bookController $updateBookStatus)
    {
        $userId = Auth::id();
        $this->checkout->user_id = $userId;
        $this->checkout->book_id = intval($id);
        $this->checkout->ckeckout_date = Carbon::now()->toDateString();
        $this->checkout->ckeck_in_date = null;
        $updateBookStatus->updateBookStatus(intval($id));
        $this->checkout->createCheckout($this->checkout);
    }
    public function checkoutUpdateStatus($id, bookController $updateBookStatus){

        $this->checkout = Checkout::findCheckout($id);
        $this->checkout->ckeck_in_date=Carbon::now()->toDateString();
        $updateBookStatus->updateBookStatus($this->checkout->book_id);
        $this->checkout->update($this->checkout->toArray());
    }





    public function allCheckout()
    {
        return $this->checkout::allCheckout();
    }

    public function getCheckout($id)
    {
        return Checkout::findCheckout($id);
    }

    // public function updateGenre(Request $request)
    // {
    //     $this->genre = Genre::findGenre($request->input('id'));

    //     $data = [
    //         'name' => $request->input('name')
    //     ];

    //     Genre::updateGenre($this->genre->id, $data);
    // }

    // public function deleteGenre(Request $request)
    // {
    //     Genre::deleteGenre($request->input('id'));
    // }
}
