<?php

namespace App\Livewire\Auth;

use App\Models\Municipality;
use App\Models\TouristSpot;
use App\Models\User;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class RegisterUser extends Component implements HasForms
{
    use InteractsWithForms;
    public $firstname, $lastname, $email, $password, $middlename, $user_type, $municipality, $address, $name, $description, $path=[];

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('path')->required(),
                Select::make('municipality')->options(
                    Municipality::all()->pluck('name', 'id')
                ),
            ]);

    }

    public function createAccount()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'user_type' => 'required',
            'municipality' => $this->user_type == 'tourist spot' ? 'required' : '',
        ]);

        $user = User::create([
            'name' => $this->firstname . ' ' . $this->lastname,
            'email' => $this->email,
            'password' => $this->password,
            'user_type' => $this->user_type,
            'fullname' => $this->firstname . ' ' . $this->lastname,
            'is_approved' => $this->user_type == 'tourist spot' ? false : true,
        ]);

        if ($this->user_type == 'tourist spot') {
           foreach ($this->path as $key => $value) {
            TouristSpot::create([
                'user_id' => $user->id,
                'name' => $this->name,
                'description' => $this->description,
                'background_path' => $value->store('Spot Image', 'public'),
                'address' => $this->address,
                'municipality_id' => $this->municipality,
            ]);
           }
        }
        auth()->loginUsingId($user->id);
        sleep(4);

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.auth.register-user');
    }
}
