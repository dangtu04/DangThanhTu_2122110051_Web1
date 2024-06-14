<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardProductSale extends Component
{
    public $product;

    /**
     * Create a new component instance.
     */
    public function __construct($productitem)
    {
        $this->product = $productitem;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-product-sale');
    }
}
