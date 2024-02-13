<?php

namespace App\Livewire\TouristSpot;

use App\Models\Spot;
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

class SpotList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public $add_modal = false;
    public $edit_modal = false;
    public $attachment = [];
    public $name, $description, $address, $spot_id;

    public function table(Table $table): Table
    {
        return $table
            ->query(Spot::query()->where('tourist_spot_id', auth()->user()->tourist_spot->id))->headerActions([
                Action::make('new_spot')->color('success')->icon('heroicon-o-plus-circle')->action(
                    function(){
                      $this->add_modal = true;
                    }
                ),
            ])
            ->columns([
                GridLayout::make(1)->schema([
                    ViewColumn::make('status')->view('filaments.tables.photo'),
                        TextColumn::make('name')->searchable(),
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
                Action::make('edit')->color('success')->action(
                    function($record){
                        $this->name = $record->name;
                        $this->description = $record->description;
                        $this->spot_id = $record->id;
                        $this->edit_modal = true;
                    }
                ),
                DeleteAction::make('delete')
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('attachment')->required()->label('Image'),
                Grid::make(2)->schema([
                    TextInput::make('name')->required()->label('Name'),
                    TextInput::make('description')->required()->label('Description'),
                ]),
            ]);
    }

    public function createSpot(){
        $this->validate([
            'attachment' => 'required',
            'name' => 'required',
            'description' =>'required',
        ]);

        foreach ($this->attachment as $key => $value) {
            Spot::create([
                'tourist_spot_id' => auth()->user()->tourist_spot->id,
                'name' => $this->name,
                'description' => $this->description,
                'photo_path' => $value->store('Tourist Spots', 'public'),
            ]);
            $this->reset('attachment','name','description');
            $this->add_modal = false;
        }
    }

    public function updateSpot(){
        $this->validate([
            'attachment' => 'required',
            'name' => 'required',
            'description' =>'required',

        ]);

        foreach ($this->attachment as $key => $value) {
            $data = Spot::where('id', $this->spot_id)->first();
            $data->update([
                'name' => $this->name,
                'description' => $this->description,

                'photo_path' => $value->store('Tourist Spots', 'public'),
            ]);
            $this->reset('attachment','name','description');
            $this->edit_modal = false;
        }
    }


    public function render()
    {
        return view('livewire.tourist-spot.spot-list');
    }
}
