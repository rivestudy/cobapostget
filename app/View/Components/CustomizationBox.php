<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CustomizationBox extends Component
{
    public $socialButtons;
    public $linkButtons;
    public $customizations;

    public function __construct($customizations, $socialButtons, $linkButtons)
    {
        $this->customizations = $customizations;
        $this->socialButtons = $socialButtons;
        $this->linkButtons = $linkButtons;
    }

    public function render()
    {
        return view('components.customization-box');
    }
}

