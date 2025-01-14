<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
}
