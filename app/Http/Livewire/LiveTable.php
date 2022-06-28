<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class LiveTable extends Component
{
    public $search = '';
    protected $listeners = ['delete' => 'delete', 'triggerRefresh' => '$refresh'];

    public function delete($id)
    {
        $request = Request::create('/api/users/'.$id, 'DELETE');
        $response = app()->handle($request);
    }

    public function render()
    {
        $users = User::query()
            ->where('name', 'LIKE', "%{$this->search}%")
            ->orWhere('email', 'LIKE', "%{$this->search}%")
            ->simplePaginate();

        $countries = config('app.countries');    

        return view('livewire.live-table', compact('users', 'countries'));
    }
}
