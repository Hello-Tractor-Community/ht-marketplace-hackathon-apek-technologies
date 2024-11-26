<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Wish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   public function index(){
      $products = Product::all();
      return view('index', compact('products'));
   }
   public function wishlist(){
      $wishes = Wish::where('user_id',Auth::user()->id)->get();
      // $wishes = Wish::all();
      return view('wishlist', compact('wishes'));
   }
   public function dashboard(){
        $users = User::where('isApproved',false)->get();
        $products = Product::where('isApproved',false)->get();
        return view('dashboard.index', compact('users','products'));
   }
   public function product($id){
      $product = Product::findOrFail($id);
      return view('product', compact('product'));
   }
}
