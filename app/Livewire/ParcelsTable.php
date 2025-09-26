<?php

namespace App\Livewire;

use App\Models\Parcel;
use Livewire\Component;
use Livewire\WithPagination;

class ParcelsTable extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $sortField = 'id';
    public $sortDirection = 'asc';

    protected $queryString = ['search', 'status', 'sortField', 'sortDirection'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if(!$this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'dec' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function render()
    {
        $parcels = Parcel::query()
            ->when($this->search, fn($q) =>
                $q->where('tracking_number', 'like', "%{$this->search}%")
                  ->orWhere('receiver_name', 'like', "%{$this->search}%")
                  ->orWhere('receiver_phone', 'like', "%{$this->search}%")
            )
            ->when($this->status, fn($q) =>
                $q->where('status', $this->status)
            )
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(5);
        return view('livewire.parcels-table', compact('parcels'));
    }
}
