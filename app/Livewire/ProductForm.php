<?php

namespace App\Livewire;

use App\Services\WoocommerceService;
use Livewire\Component;

class ProductForm extends Component
{
    private WoocommerceService $woo;  
    public $product;
    public $id;
    public $sku;
    public $name;
    public $permalink;
    public $regular_price;
    public $sale_price;
    public $stock_quantity;

    public function boot(WoocommerceService $woo)
    {
        $this->woo = $woo;
    }
    
    public function mount($product)
    {
        $this->product = $product;
        $this->id = $product->id;
        $this->sku = $product->sku;
        $this->name = $product->name;
        $this->permalink = $product->permalink;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->stock_quantity = $product->stock_quantity;
    }

    public function render()
    {
        return view('livewire.product-form');
    }

    public function updateProduct()
    {
        $data = [
            'stock_quantity' => $this->stock_quantity,
            'regular_price' => $this->regular_price,
            'sale_price' => $this->sale_price,
        ];

        $response = $this->woo->techplatoon->put('products/' . $this->id, $data);
        // dd($response);
        // return json_encode($response);
    }
}
