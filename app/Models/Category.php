<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // 大量割り当て可能なフィールドを指定
    protected $fillable = [
        'category_name', // 必要なフィールドを追加
        'image'
    ];
}