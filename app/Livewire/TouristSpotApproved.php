<?php

namespace App\Livewire;

use Livewire\Component;

class TouristSpotApproved extends Component
{
    public $modal = true;
    public function render()
    {
        if (auth()->user()->is_approved == true) {
            $this->modal = false;
        } else {
            $this->modal = true;
        }
        return view('livewire.tourist-spot-approved');
    }
}
