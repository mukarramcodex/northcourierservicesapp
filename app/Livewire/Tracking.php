<?php

namespace App\Livewire;

use App\Models\Parcel;
use Livewire\Component;

class Tracking extends Component
{
    public $tracking_number;
    public $parcel = null;
    public $errorMessage = null;

    public function trackParcel()
    {
        $this->reset(['parcel', 'errorMessage']);

        if(!$this->tracking_number) {
            $this->errorMessage = "Please enter a tracking Number.";
            return;
        }

        $parcel = Parcel::where('tracking_number', $this->tracking_number)->first();

        if($parcel) {
            $this->parcel = $parcel;
        } else {
            $this->errorMessage = "No parcel found with this tracking number.";
        }
    }

    public function render()
    {
        return view('livewire.tracking');
    }
}
