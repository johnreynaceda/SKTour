<?php

namespace App\Livewire\Municipal;

use App\Models\Municipality;
use App\Models\TouristSpot;
use App\Models\User;
use Livewire\Component;

class MunicipalReport extends Component
{
    public $report;
    public $spot_id;

    public function updatedReport(){
        $this->spot_id = null;
    }

    public function updatedSpotId(){
        $this->name = TouristSpot::where('id', $this->spot_id)->first()->name;
    }
    public $name;
    public function render()
    {
        return view('livewire.municipal.municipal-report',[
            'spots' => TouristSpot::where('municipality_id', auth()->user()->municipality_id)->get(),
            'tourists' => User::whereHas('booking_transactions', function($record){
                $record->where('status', 'accepted')->when($this->spot_id, function($spot){
                    $spot->where('tourist_spot_id', $this->spot_id);
                });
            })->get(),
        ]);
    }
}
