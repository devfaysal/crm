<?php

namespace App\Filament\Pages;

use App\Services\WoocommerceService;
use Filament\Pages\Page;

class Stock extends Page
{
    protected static bool $shouldRegisterNavigation = false;

    protected static string $view = 'filament.pages.stock';

    protected static ?string $slug = 'stock/{id}';

    private WoocommerceService $woo;
    public $products;
    public $total_product;
    public $page_count;

    public function boot(WoocommerceService $woo)
    {
        $this->woo = $woo;
    }

    public function mount($id)
    {
        $category = $this->woo->techplatoon->get('products/categories/' . $id);
        $this->total_product = $category->count;

        $page = 1;
        $per_page = 50;
        $this->page_count = intval(ceil($this->total_product / $per_page));
        $requested_page = intval(request('page'));
        if ($requested_page > 0 && $requested_page <= $this->page_count) {
            $page = $requested_page;
        }

        $this->products = $this->woo->techplatoon->get('products', [
            'per_page'  => $per_page,
            'page' => $page,
            'category'  => $id
        ]);
    }
}
