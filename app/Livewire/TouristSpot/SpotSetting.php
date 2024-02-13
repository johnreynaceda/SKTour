<?php

namespace App\Livewire\TouristSpot;

use Livewire\Component;
use WireUi\Traits\Actions;
class SpotSetting extends Component
{
    use Actions;
    public $amount;
    public function render()
    {
        $this->amount = auth()->user()->tourist_spot->billing_amount ?? 0;
        return view('livewire.tourist-spot.spot-setting');
    }

    public function save(){
        auth()->user()->tourist_spot->update([
            'billing_amount' => $this->amount
        ]);
        $this->dialog()->success(
            $title = 'Amount Saved!',
            $description = 'Booking amount was successfully saved'
        );
    }
}
