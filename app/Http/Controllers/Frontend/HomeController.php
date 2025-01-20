<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Menu;
use App\Models\Gallery;
use App\Models\WishList;


use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
{
    //
    public function RestaurantDetails($id)
    {
        $client = Client::find($id);
        $menus = Menu::where('client_id', $client->id)->get()->filter(
            function ($menu) {
                return $menu->products->isNotEmpty();
            }
        );
        $gallerys = Gallery::where('client_id', $client->id)->get()->filter();
        return view('frontend.details_page', compact('client', 'menus', 'gallerys'));
    }

    public function AddWishList(Request $request, $id)
    {
        if (Auth::check()) {
            $exists = WishList::where('user_id', Auth::id())->where('client_id', $id)->first();
            if (!$exists) {
                WishList::insert([
                    'user_id' => Auth::id(),
                    'client_id' => $id,
                    'created_at' => carbon::now(),
                ]);
                return response()->json(['success' => 'Your Wishlist Added Successfully']);
            } else {
                return response()->json(['error' => 'This product has already on your Wishlist']);
            }
        } else {
            return response()->json(['error' => 'First Login Your Account']);
        }
    }

    public function  AllWishList()
    {
        $wishlist = WishList::where('user_id', Auth::id())->get();
        return view('frontend.dashboard.all_wishlist', compact('wishlist'));
    }
}
