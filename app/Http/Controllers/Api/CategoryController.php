<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    private $category;

    public function __construct (Category $category)
    {
        $this->$category = $category;
    }

    public function index (Request $request)
    {
        $categories = $this->$category->getResults($request->name);
        return response()->json($categories, 200);
    }

    public function store (Request $request)
    {        
        $categoria = $this->$category->create($request->all());

        return response()->json($categoria, 201);
    }
    
    public function update (Request $request, $id)   
    {
        $category = $this->$category->find($id);        
        $category->update($request->all());        
        return response()->json($category);
    } 
}