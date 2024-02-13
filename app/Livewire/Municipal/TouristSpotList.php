<?php

namespace App\Livewire\Municipal;

use App\Models\Spot;
use App\Models\TouristSpot;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\ViewColumn;
use Livewire\Component;
use App\Models\Shop\Product;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Tables\Columns\Layout\Grid as GridLayout;

class TouristSpotList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(auth()->user()->user_type == 'municipal' ? TouristSpot::query()->where('municipality_id', auth()->user()->municipality_id) : TouristSpot::query())
            ->columns([
                GridLayout::make(1)->schema([
                    ViewColumn::make('status')->view('filaments.tables.photo-bg'),
                        TextColumn::make('name')->searchable()->weight('bold')->formatStateUsing(
                            function($record){
                                return strtoupper($record->name);
                            }
                        ),
                        TextColumn::make('description'),
                    ]),
            ])->contentGrid([
                'md' => 2,
                'xl' => 3,
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
        return view('livewire.municipal.tourist-spot-list');
    }
}
