<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCard extends Component
{
    public $imageSrc;
    public $title;
    public $priceRange;
    public $buttonText;
    /**
     * Create a new component instance.
     */

    public function __construct($imageSrc, $title, $priceRange, $buttonText)
    {
        $this->imageSrc=$imageSrc;
        $this->title=$title;
        $this->priceRange=$priceRange;
        $this->buttonText=$buttonText;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-card');
    }
}
