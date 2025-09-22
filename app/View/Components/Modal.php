<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{

    public $id;
    public $title;
    public $createAction;
    public $updateAction;
    /**
     * Create a new component instance.
     */
    public function __construct( $id = 'modal', $title = 'Modal', $createAction = '', $updateAction = '')
    {
        $this->id = $id;
        $this->title = $title;
        $this->createAction = $createAction;
        $this->updateAction = $updateAction;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}
