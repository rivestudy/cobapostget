<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CustomizationBox extends Component
{
    public $socialButtons;
    public $linkButtons;

    public function __construct($socialButtons, $linkButtons)
    {
        $this->socialButtons = $socialButtons;
        $this->linkButtons = $linkButtons;
    }

    public function render()
    {
        return view('components.customization-box');
    }
}

