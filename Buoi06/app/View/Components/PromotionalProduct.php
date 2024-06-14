<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PromotionalProduct extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $args_product_sale = [
            ['status', '=', 1],
            ['pricesale', '>', 0]
        ];
        $product_sale = Product::where($args_product_sale)
        ->orderBy('created_at', 'desc') // mới nhất
        ->limit(4) // giới hạn
        ->get();
        return view('components.promotional-product',compact('product_sale'));
    }
}
