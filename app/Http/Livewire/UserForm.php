<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class UserForm extends Component
{
    public $name;
    public $email;
    public $age;
    public $country = 1; // United Kingdom
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
        if ($this->uuid) { // Update

            $request = Request::create('/api/users/'.$this->uuid, 'PUT', [
                'name' => $this->name,
                'email' => $this->email,
                'age' => $this->age,
                'country_id' => $this->country,
            ]);
            $response = app()->handle($request);

            $this->dispatchBrowserEvent('user-saved', ['action' => 'updated', 'user_name' => $this->name]);

        } else { // Create

            $validated = $this->validate([
                'name' => 'required',
                'email' => 'required|email|min:10',
                'age' => 'required|integer',
                'country' => 'required',
            ]);

            $request = Request::create('/api/users', 'POST', [
                'name' => $this->name,
                'email' => $this->email,
                'age' => $this->age,
                'country_id' => $this->country,
            ]);
            $response = app()->handle($request);

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
