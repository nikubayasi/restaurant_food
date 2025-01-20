<?php

namespace App\Http\Controllers\Client;


use Carbon\Carbon;
use App\Models\City;
use App\Models\Menu;
use App\Models\Client;

use App\Models\Gallery;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class RestaurantController extends Controller
{
    //
    public function AllMenu()
    {
        $id = Auth::guard('client')->id();
        $menu = Menu::where('client_id', $id)->orderBy('id', 'desc')->get();
        return view('client.backend.menu.all_menu', compact('menu'));
    }
    public function AddMenu()
    {
        return view('client.backend.menu.add_menu');
    }
    public function StoreMenu(Request $request)
    {
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(300, 300)->save(public_path('upload/menu/' . $name_gen));
            $save_url = 'upload/menu/' . $name_gen;
            Menu::create([
                'menu_name' => $request->menu_name,
                'client_id' => Auth::guard('client')->id(),
                'image' => $save_url,
            ]);
        }
        $notification = array(
            'message' => 'City Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.menu')->with($notification);
    }
    public function EditMenu($id)
    {
        $menu = Menu::find($id);
        return view('client.backend.menu.edit_menu', compact('menu'));
    }

    public function UpdateMenu(Request $request)
    {
        $menu_id = $request->id;
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(300, 300)->save(public_path('upload/menu/' . $name_gen));
            $save_url = 'upload/menu/' . $name_gen;

            Menu::find($menu_id)->update([
                'menu_name' => $request->menu_name,
                'image' => $save_url,
            ]);
            $notification = array(
                'message' => 'Menu Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.menu')->with($notification);
        } else {
            Menu::find($menu_id)->update([
                'menu_name' => $request->menu_name,
            ]);
            $notification = array(
                'message' => 'Menu Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.menu')->with($notification);
        }
    }
    public function DeleteMenu($id)
    {
        $item = Menu::find($id);
        $img = $item->image;

        unlink($img);
        Menu::find($id)->delete();
        $notification = array(
            'message' => 'Menu Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    // ////// All Product
    public function AllProduct()
    {
        $id = Auth::guard('client')->id();
        $product = Product::where('client_id', $id)->orderBy('id', 'desc')->latest()->get();
        return view('client.backend.product.all_product', compact('product'));
    }

    public function AddProduct()
    {
        $id = Auth::guard('client')->id();

        $category = Category::latest()->get();
        $city = City::latest()->get();
        $menu = Menu::where('client_id', $id)->latest()->get();

        return view('client.backend.product.add_product', compact('category', 'city', 'menu'));
    }

    public function StoreProduct(Request $request)
    {
        $pcode = IdGenerator::generate(['table' => 'products', 'field' => 'code', 'length' => '5', 'prefix' => 'PC']);
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(300, 300)->save(public_path('upload/product/' . $name_gen));
            $save_url = 'upload/product/' . $name_gen;

            Product::create([
                'name' => $request->name,
                'slug' => strtolower(str_replace(' ', '-', $request->name)),
                'category_id' => $request->category_id,
                'city_id' => $request->city_id,
                'menu_id' => $request->menu_id,
                'code' => $pcode,
                'qty' => $request->qty,
                'size' => $request->size,
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'client_id' => Auth::guard('client')->id(),
                'most_populer' => $request->most_populer,
                'best_seller' => $request->best_seller,
                'created_at' => Carbon::now(),
                'status' => 1,
                'image' => $save_url,
            ]);
        }
        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.product')->with($notification);
    }

    public function EditProduct($id)
    {
        $cid = Auth::guard('client')->id();

        $category = Category::latest()->get();
        $city = City::latest()->get();
        $menu = Menu::where('client_id', $cid)->latest()->get();
        $product = Product::find($id);
        return view('client.backend.product.edit_product', compact('category', 'city', 'menu', 'product'));
    }

    public function UpdateProduct(Request $request)
    {
        $pro_id = $request->id;

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(300, 300)->save(public_path('upload/product/' . $name_gen));
            $save_url = 'upload/product/' . $name_gen;

            Product::find($pro_id)->update([
                'name' => $request->name,
                'slug' => strtolower(str_replace(' ', '-', $request->name)),
                'category_id' => $request->category_id,
                'city_id' => $request->city_id,
                'menu_id' => $request->menu_id,
                'qty' => $request->qty,
                'size' => $request->size,
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'most_populer' => $request->most_populer,
                'best_seller' => $request->best_seller,
                'created_at' => Carbon::now(),
                'image' => $save_url,
            ]);
            $notification = array(
                'message' => 'Product Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.product')->with($notification);
        } else {
            Product::find($pro_id)->update([
                'name' => $request->name,
                'slug' => strtolower(str_replace(' ', '-', $request->name)),
                'category_id' => $request->category_id,
                'city_id' => $request->city_id,
                'menu_id' => $request->menu_id,
                'qty' => $request->qty,
                'size' => $request->size,
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'most_populer' => $request->most_populer,
                'best_seller' => $request->best_seller,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Product Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.product')->with($notification);
        }
    }

    public function DeleteProduct($id)
    {
        $item = Product::find($id);
        $img = $item->image;

        unlink($img);
        Product::find($id)->delete();
        $notification = array(
            'message' => 'Product Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ChangeStatus(Request $request)
    {
        $product = Product::find($request->product_id);
        $product->status = $request->status;
        $product->save();
        return response()->json(['success' => 'Status Change Successfully']);
    }
    public function AllGallery()
    {
        $cid = Auth::guard('client')->id();

        $gallery = Gallery::where('client_id', $cid)->latest()->get();
        return view('client.backend.gallery.all_gallery', compact('gallery'));
    }

    public function AddGallery()
    {
        $cid = Auth::guard('client')->id();

        $gallery = Gallery::where('client_id', $cid)->latest()->get();
        $client = Client::latest()->get();

        return view('client.backend.gallery.add_gallery', compact('gallery', 'client'));
    }

    public function StoreGallery(Request $request)
    {
        $images = $request->file('gallery_img');
        foreach ($images as $gimg) {
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $gimg->getClientOriginalExtension();
            $img = $manager->read($gimg);
            $img->resize(700, 700)->save(public_path('upload/gallery/' . $name_gen));
            $save_url = 'upload/gallery/' . $name_gen;
            Gallery::insert([
                'client_id' => Auth::guard('client')->id(),
                'gallery_img' => $save_url,
            ]);
        }
        $notification = array(
            'message' => 'Gallery Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.gallery')->with($notification);
    }

    public function EditGallery($id)
    {
        $gallery = Gallery::find($id);

        return view('client.backend.gallery.edit_gallery', compact('gallery'));
    }

    public function UpdateGallery(Request $request)
    {
        $gallery_id = $request->id;
        if ($request->hasFile('gallery_img')) {
            $image = $request->file('gallery_img');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(700, 700)->save(public_path('upload/gallery/' . $name_gen));
            $save_url = 'upload/gallery/' . $name_gen;

            $gallery = Gallery::find($gallery_id);
            if ($gallery->gallery_img) {
                $img = $gallery->gallery_img;
                unlink($img);
            }

            $gallery->update([
                'gallery_img' => $save_url,
            ]);
            $notification = array(
                'message' => 'Gallery Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.gallery')->with($notification);
        } else {
            $notification = array(
                'message' => 'No Image Selected For Updated',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function DeleteGallery($id)
    {
        $item = Gallery::find($id);
        $img = $item->gallery_img;

        unlink($img);
        Gallery::find($id)->delete();
        $notification = array(
            'message' => 'Gallery Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
