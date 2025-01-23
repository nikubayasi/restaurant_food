<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Coupon;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    public function AddToCart($id)
    {
        $products = Product::find($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $priceToShow = isset($products->discount_price) ?
                $products->discount_price : $products->price;
            $cart[$id] = [
                'id' => $id,
                'name' => $products->name,
                'image' => $products->image,
                'price' => $priceToShow,
                'client_id' => $products->client_id,
                'quantity' => 1
            ];
        }
        session()->put('cart', $cart);

        // return response()->json($cart);
        $notification = array(
            'message' => 'Add to Cart Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function updateCartQuantity(Request $request)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }
        return response()->json([
            'message' => 'Quantity Updated',
            'alert-type' => 'success'
        ]);
    }

    public function RemoveToCart(Request $request)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }
        return response()->json([
            'message' => 'Cart Remove Success',
            'alert-type' => 'success'
        ]);
    }
    public function ApplyCoupon(Request $request){
        $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('validity', '>=',Carbon::now()->format('Y-m-d'))->first();
        $carts = session()->get('cart',[]);

        $totalAmount = 0;
        $clientIds = [];

        foreach($carts as $cart ){
            $totalAmount += ($cart['price'] * $cart['quantity']);
            $pd = Product::find($cart['id']);
            $cdid = $pd->client_id;
            array_push($clientIds,$cdid);
        }
        if($coupon){
            if(count(array_unique($clientIds))=== 1){
                $cvendorId = $coupon->client_id;
                if($cvendorId == $clientIds[0]){
                    Session::put('coupon',[
                        'coupon_name' => $coupon->coupon_name,
                        'discount' => $coupon->discount,
                        'discount_amount' => $totalAmount - ($totalAmount * $coupon->discount/100),
                    ]);
                    $couponData = Session()->get('coupon');
                    return response()->json(array(
                        'validity' => true,
                        'success' => 'Coupon Applied Successfully',
                        'couponData' => $couponData,
                    ));
                }else{
                    return response()->json(['error' => 'This Coupon Not Valid for this Restruant']);
                }
            }else{
                return response()->json(['error' => 'This Coupon for one of the selected Restruant']);
            }
        }else{
            return response()->json(['error' => 'Invalid Coupon']);
        }
    }

}
