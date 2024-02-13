<?php

namespace App\Livewire\TouristSpot;

use App\Models\BookingTransaction;
use App\Models\Shop\Product;
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


class SpotAppointment extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    use Actions;
    public $booking_receipt = false;
    public $booked_data = [];

    public function table(Table $table): Table
    {
        return $table
            ->query(BookingTransaction::query()->where('tourist_spot_id', auth()->user()->tourist_spot->id)->orderBy('created_at','DESC'))
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
                ActionGroup::make([
                    Action::make('Accept')->color('success')->icon('heroicon-m-hand-thumb-up')->action(
                        function($record){
                            $record->update([
                                'status' => 'accepted',
                            ]);
                            $this->dialog()->success(
                                $title = 'Accepted',
                                $description = 'Booking Accepted',
                            );
                        }
                    ),
                    Action::make('Decline')->color('danger')->icon('heroicon-m-hand-thumb-down')->action(
                        function($record){
                            $record->update([
                                'status' => 'declined',
                            ]);
                            $this->dialog()->success(
                                $title = 'Declined',
                                $description = 'Booking Declined',
                            );
                        }
                    ),
                ])->visible(
                    function($record){
                        return $record->status == 'pending';
                    }
                ),
            ])
            ->bulkActions([
                // ...
            ]);
    }
    public function render()
    {
        return view('livewire.tourist-spot.spot-appointment');
    }
}
