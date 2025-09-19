<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InfoCard extends Component
{

    public string $title;
    public string|int $value;
    public ?string $description;
    public ?string $icon;
    public ?array $trend;
    public ?string $class;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $title,
        string|int $value,
        string $description = null,
        string $icon = null,
        array $trend = null,
        string $class = null,
    )
    {
        $this->title = $title;
        $this->value = $value;
        $this->description = $description;
        $this->icon = $icon;
        $this->trend = $trend;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.info-card');
    }
}
