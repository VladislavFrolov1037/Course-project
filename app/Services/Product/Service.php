<?php

namespace App\Services\Product;

use App\Models\Product;

class Service {
    public function store($data) {
        $data['balcony'] = ($data['balcony'] === 'true');

        Product::create($data);
    }

    public function update($product, $data) {
        $data['balcony'] = ($data['balcony'] === 'true');

        $product->update($data);
    }
}
