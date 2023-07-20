<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Toast extends Component
{
    const ICONS = [
        'success' => 'check-circle',
        'danger' => 'exclamation-circle',
        'warning' => 'exclamation-triangle',
        'info' => 'info-circle',
    ];

    public string $icon;

    public function __construct(
        public string $message = '',
        public string $theme = 'success',
    ) {
        $this->icon = self::ICONS[$this->theme];
    }

    public function render(): View
    {
        return view('components.toast');
    }

    public function shouldRender(): bool
    {
        return $this->message !== '';
    }
}
