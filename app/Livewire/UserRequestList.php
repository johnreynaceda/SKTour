<?php

namespace App\Livewire;

use App\Models\User;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class UserRequestList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(User::query()->where('is_approved', false))
            ->columns([
                TextColumn::make('fullname')->label('FULLNAME')->searchable(),
                TextColumn::make('email')->label('EMAIL')->searchable(),
                TextColumn::make('tourist_spot.name')->label('TOURIST SPOT')->searchable(),
                TextColumn::make('tourist_spot.address')->label('ADDRESS')->searchable(),
                TextColumn::make('tourist_spot.municipality.name')->label('MUNICIPALITY')->searchable(),

            ])
            ->filters([
                // ...
            ])
            ->actions([
                Action::make('approve')->label('APPROVED')->button()->color('success')->icon('heroicon-s-hand-thumb-up')->action(
                    function ($record) {
                        $record->update([
                            'is_approved' => true,
                        ]);
                    }
                ),
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.user-request-list');
    }
}
