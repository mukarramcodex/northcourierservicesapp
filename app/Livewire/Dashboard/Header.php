<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class Header extends Component
{
    public string $title;
    public array $breadcrumbs = [];
    public function mount(string $title = 'Dashbaord', array $breadcrumbs = [])
    {
        $this->title = $title;
        $this->breadcrumbs = $breadcrumbs;
    }
    public function render()
    {
        return view('livewire.dashboard.header');
    }
}
