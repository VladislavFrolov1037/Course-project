<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilter;
use App\Filters\QueryFilter;
use App\Http\Requests\FilterRequest;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends BaseController {
        public function index(ProductFilter $request) {
        $products = Product::Filter($request)->paginate(9);
        return view('product.index', compact('products'));
    }

    public function create() {
        return view('product.create');
    }

    public function store(StoreRequest $request) {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('product.index');
    }

    public function show(Product $product) {
        return view('product.show', compact('product'));
    }

    public function edit(Product $product) {
        return view('product.edit', compact('product'));
    }

    public function update(Product $product, UpdateRequest $request) {
        $data = $request->validated();

        $this->service->update($product, $data);

        return redirect()->route('product.show', $product->id);
    }

    public function destroy(Product $product) {
        $product->delete();
        return redirect()->route('product.index');
    }
}


