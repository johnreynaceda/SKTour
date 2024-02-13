<?php

namespace App\Livewire\Provincial;

use App\Models\Municipality;
use App\Models\TouristSpot;
use Livewire\Component;

class ProvincialReport extends Component
{
    public $municipality_id;
    public $spot_id;
    public function render()
    {
        return view('livewire.provincial.provincial-report',[
            'municipalities' => Municipality::all(),
            'spots' => TouristSpot::where('municipality_id',$this->municipality_id)->get(),

        ]);
    }
}
