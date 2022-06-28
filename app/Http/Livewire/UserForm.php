<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class UserForm extends Component
{
    public $name;
    public $email;
    public $age;
    public $country;
    public $uuid = null;
    protected $listeners = ['triggerEdit'];

    public function triggerEdit($user)
    {
        $this->uuid = $user['uuid'];
        $this->name = $user['name'];
        $this->email = $user['email'];
        $this->age = $user['age'];
        $this->country = $user['country_id'];

        $this->emit('dataFetched', $user);
    }

    public function save()
    {
        if ($this->uuid) {
            Http::put(config('app.apiBaseUrl') . 'users/' . $this->uuid, [
                'name' => $this->name,
                'email' => $this->email,
                'age' => $this->age,
                'country_id' => $this->country,
            ]);
    
            $this->dispatchBrowserEvent('user-saved', ['action' => 'updated', 'user_name' => $this->name]);
        } else {
            Http::post(config('app.apiBaseUrl') . 'users', [
                'name' => $this->name,
                'email' => $this->email,
                'age' => $this->age,
                'country_id' => $this->country,
            ]);

            $this->dispatchBrowserEvent('user-saved', ['action' => 'created', 'user_name' => $this->name]);
        }

        $this->resetForm();
        $this->emitTo('live-table', 'triggerRefresh');
    }

    public function resetForm()
    {
        $this->uuid = null;
        $this->name = null;
        $this->email = null;
        $this->age = null;
        $this->address = null;
    }

    public function render()
    {
        $countries = config('app.countries');  

        return view('livewire.user-form', compact('countries'));
    }
}
