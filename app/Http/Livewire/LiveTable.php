<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class LiveTable extends Component
{
    private $apiBaseUrl = '127.0.0.1/api/';
    public $search = '';
    protected $listeners = ['delete' => 'delete', 'triggerRefresh' => '$refresh'];

    public function delete($id)
    {
        return Http::delete($this->apiBaseUrl . 'users/' . $id);
    }

    public function render()
    {
        $users = User::query()
            ->where('name', 'LIKE', "%{$this->search}%")
            ->orWhere('email', 'LIKE', "%{$this->search}%")
            ->paginate();

        $countries = config('app.countries');    

        return view('livewire.live-table', compact('users', 'countries'));
    }
}
