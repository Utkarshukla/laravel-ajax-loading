<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ScrollableCards extends Component
{
    public $catN;
    public $catS;
    public $catImg;

    /**
     * Create a new component instance.
     */
    public function __construct($catN, $catS, $catImg)
    {
        $this->catN = $catN;
        $this->catS = $catS;
        $this->catImg = $catImg;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.scrollable-cards');
    }
}
