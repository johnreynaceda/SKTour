<?php

namespace App\Livewire\TouristSpot;

use App\Models\BookingTransaction;
use App\Models\Shop\Product;
use App\Models\User;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use WireUi\Traits\Actions;

class TouristList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(User::query()->where('user_type', 'tourist')->whereHas('booking_transactions', function($record){
                $record->where('tourist_spot_id', auth()->user()->tourist_spot->id)->where('status', 'accepted');
            }))
            ->columns([
                TextColumn::make('fullname')->label('FULLNAME')->searchable(),
                TextColumn::make('email')->label('EMAIL'),
                TextColumn::make('booking_transactions.arrival_date')->date()->label('CREATED DATE'),

            ])
            ->filters([
                // ...
            ])
            ->actions([

            ])
            ->bulkActions([
                // ...
            ]);
    }
    public function render()
    {
        return view('livewire.tourist-spot.tourist-list');
    }
}
