<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardProduct extends Component
{
public $product_row = null;
public function __construct($productitem)
{
    $this->product_row = $productitem;
}

/**
 * Get the view / contents that represent the component.
 */
public function render(): View|Closure|string
{
    $product = $this->product_row; // phải đúng chữ product
    return view('components.card-product', compact('product'));
}

}
