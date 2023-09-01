<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $type;
    public $placeholder;
    public $value;
    public function __construct($name,$type,$placeholder,$value)
    {
        $this->value = $value;
        $this->name = $name;
        $this->type = $type;
        $this->placeholder = $placeholder;
    }
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
