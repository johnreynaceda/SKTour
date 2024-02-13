<?php

namespace App\Livewire\Tourist;

use App\Models\BookingTransaction;
use App\Models\Shop\Product;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class TouristAppointment extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public $booking_receipt = false;
    public $booked_data = [];

    public function table(Table $table): Table
    {
        return $table
            ->query(BookingTransaction::query()->where('user_id', auth()->user()->id)->orderBy('created_at','DESC'))
            ->columns([
                TextColumn::make('tourist_spot.name')->label('TOURIST SPOT'),
                TextColumn::make('id')->label('TOURIST')->formatStateUsing(
                    function($record){
                        return $record->firstname. ' ' . $record->lastname;
                    }
                ),
                TextColumn::make('arrival_date')->date()->label('ARRIVAL DATE'),
                TextColumn::make('created_at')->date()->label('CREATED DATE'),
                ViewColumn::make('status')->label('STATUS')->view('filament.tables.status')
            ])
            ->filters([
                // ...
            ])
            ->actions([
                Action::make('view')->icon('heroicon-o-eye')->button()->color('success')->action(
                    function($record){
                        $this->booked_data = $record;
                        $this->booking_receipt = true;
                    }
                ),
            ])
            ->bulkActions([
                // ...
            ]);
    }
    public function render()
    {
        return view('livewire.tourist.tourist-appointment');
    }
}
