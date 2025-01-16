<?php

namespace App\Http\Controllers\Admin;


use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\City;

class CategoryController extends Controller
{
    //
    public function AllCategory()
    {
        $category = Category::latest()->get();
        return view('admin.backend.category.all_category', compact('category'));
    }
    public function AddCategory()
    {
        return view('admin.backend.category.add_category');
    }

    public function StoreCategory(Request $request)
    {
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(300, 300)->save(public_path('upload/category/' . $name_gen));
            $save_url = 'upload/category/' . $name_gen;

            Category::create([
                'category_name' => $request->category_name,
                'image' => $save_url,
            ]);
        }
        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.category')->with($notification);
    }

    public function EditCategory($id)
    {
        $category = Category::find($id);
        return view('admin.backend.category.edit_category', compact('category'));
    }

    public function UpdateCategory(Request $request)
    {
        $cat_id = $request->id;
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(300, 300)->save(public_path('upload/category/' . $name_gen));
            $save_url = 'upload/category/' . $name_gen;

            Category::find($cat_id)->update([
                'category_name' => $request->category_name,
                'image' => $save_url,
            ]);
            $notification = array(
                'message' => 'Category Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.category')->with($notification);
        } else {
            Category::find($cat_id)->update([
                'category_name' => $request->category_name,
            ]);
            $notification = array(
                'message' => 'Category Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.category')->with($notification);
        }
    }
    public function DeleteCategory($id)
    {
        $item = Category::find($id);
        $img = $item->image;

        unlink($img);
        Category::find($id)->delete();
        $notification = array(
            'message' => 'Category Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // All City Category

    public function AllCity()
    {
        $city = City::latest()->get();
        return view('admin.backend.city.all_city', compact('city'));
    }
    public function StoreCity(Request $request)
    {

        City::create([
            'city_name' => $request->city_name,
            'city_slug' => strtolower(str_replace(' ', '-', $request->city_name)),
        ]);

        $notification = array(
            'message' => 'City Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function EditCity($id)
    {
        $city = City::find($id);
        return response()->json($city);
    }

    public function UpdateCity(Request $request)
    {
        $cat_id = $request->cat_id;
        City::find($cat_id)->update([
            'city_name' => $request->city_name,
            'city_slug' => strtolower(str_replace(' ', '-', $request->city_name)),
        ]);

        $notification = array(
            'message' => 'City Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function DeleteCity($id)
    {
        City::find($id)->delete();
        $notification = array(
            'message' => 'City Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}