<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Category extends Model
{
    use HasFactory;
    
    public function getByCategory(int $limit_count = 5)
    {
         return $this->posts()->with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function index(Category $category)
    {
        return view('categories.index')->with(['posts'=> $category->getByCategory()]);
    }
}
