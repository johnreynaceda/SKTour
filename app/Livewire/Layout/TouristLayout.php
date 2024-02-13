<?php

namespace App\Livewire\Layout;

use App\Models\BookingTransaction;
use App\Models\Municipality;
use App\Models\Spot;
use App\Models\TouristSpot;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Livewire\Component;

class TouristLayout extends Component implements HasForms
{
    use InteractsWithForms;

    public $municipality_id = 1;
    public $tourist_spot_id;
    public $modal=false;

    public $firstname, $lastname,$email, $phone_number, $guest, $arrival_date, $address, $municipality, $province;

    public function form(Form $form): Form
    {


        return $form
            ->schema([
                Grid::make(2)->schema([
                    TextInput::make('firstname')->required(),
                    TextInput::make('lastname')->required(),
                    TextInput::make('email')->required()->placeholder(auth()->user()->email)->disabled(),
                    TextInput::make('phone_number')->required(),
                    TextInput::make('guest')->label('Number of Guest')->columnSpan(1)->required(),
                    DatePicker::make('arrival_date')->required(),
                ]),
                Grid::make(2)->schema([

                    TextInput::make('address')->columnSpan(2)->required(),
                    TextInput::make('municipality')->required(),
                    TextInput::make('province')->label('Province/City')->required(),
                ]),

            ]);

    }

    public function submitBooking(){
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'phone_number' => 'required',
            'guest' => 'required',
            'arrival_date' => 'required',
            'address' => 'required',
            'municipality' => 'required',
            'province' =>'required',
        ]);
        $spot = TouristSpot::where('id', $this->tourist_spot_id)->first()->billing_amount;
        BookingTransaction::create([
            'tourist_spot_id' => $this->tourist_spot_id,
            'user_id' => auth()->user()->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => auth()->user()->email,
            'phone_number' => $this->phone_number,
            'no_of_guest' => $this->guest,
            'arrival_date' => Carbon::parse($this->arrival_date),
            'address' => $this->address,
          'municipality' => $this->municipality,
          'bill' => $spot * $this->guest,
           'city' => $this->province,
          'status' => 'pending',
        ]);
        $this->modal = false;
    }

    public function render()
    {

        return view('livewire.layout.tourist-layout', [
            'municipalities' => Municipality::get(),
            'tourist_spots' => TouristSpot::where('municipality_id', $this->municipality_id)->get(),
            'spots' => Spot::where('tourist_spot_id', $this->tourist_spot_id)->get(),
        ]);
    }
}
