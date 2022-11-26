<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function store()
    {
        $product = Product::create([

            'name' => 'Platinum 1',

            'price' => 10

        ]);

        return $product;
    }
}
