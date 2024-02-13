<?php

namespace App\Livewire\Tourist;

use App\Models\Post;
use App\Models\UserInformation;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use WireUi\Traits\Actions;

class TouristProfile extends Component implements HasForms
{
    use InteractsWithForms;
    use Actions;
    public $name,$address, $contact, $email, $password;
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
               Grid::make(2)->schema([
                TextInput::make('address'),
                TextInput::make('contact'),
                TextInput::make('email')->email(),
                TextInput::make('password')->password(),
               ]),
            ]);

    }

    public function saveRecord(){
        if (UserInformation::where('user_id', auth()->user()->id)->count() > 0) {
            UserInformation::where('user_id', auth()->user()->id)->update([
                'name' => $this->name,
                'address' => $this->address,
                'contact' => $this->contact,
            ]);
            if ($this->password != null) {
                auth()->user()->update([
                    'email' => $this->email,
                    'password' => bcrypt($this->password),
                ]);
            }else{
                auth()->user()->update([
                    'email' => $this->email,
                ]);
            }
            $this->dialog()->success(

                $title = 'Profile saved',

                $description = 'Your profile was successfully saved'

            );
        }else{
            UserInformation::create([
                'name' => $this->name,
                'address' => $this->address,
                'contact' => $this->contact,
                'user_id' => auth()->user()->id,
            ]);
            if ($this->password != null) {
                auth()->user()->update([
                    'email' => $this->email,
                    'password' => bcrypt($this->password),
                ]);
            }else{
                auth()->user()->update([
                    'email' => $this->email,
                ]);
            }
            $this->dialog()->success(

                $title = 'Profile saved',

                $description = 'Your profile was successfully saved'

            );
        }
    }

    public function render()
    {
        if (UserInformation::where('user_id', auth()->user()->id)->count() > 0) {
            $data = UserInformation::where('user_id', auth()->user()->id)->first();
            $this->name = $data->name;
            $this->address = $data->address;
            $this->contact = $data->contact;

            $this->email = auth()->user()->email;
        }else{


            $this->email = auth()->user()->email;
        }
        return view('livewire.tourist.tourist-profile');
    }
}
