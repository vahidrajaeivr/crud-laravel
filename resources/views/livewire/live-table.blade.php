<div>
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="float-left mt-5">
                <button class="btn btn-success" wire:click="$emit('triggerCreate')">Create New User</button>
            </div>

            <div class="float-right mt-5">
                <input wire:model="search" class="form-control" type="text" placeholder="Search Users...">
            </div>
        </div>
    </div>

    <div class="row">
        @if ($users->count())
        <table class="table">
            <thead>
                <tr>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Age
                    </th>
                    <th>
                        Country
                    </th>
                    <th>
                        Created At
                    </th>
                    <th>
                        Delete
                    </th>
                    <th>
                        Edit
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->age }}</td>
                        <td>{{ $countries[$user->country_id] }}</td>
                        <td>{{ $user->created_at->format('m-d-Y') }}</td>
                        <td>
                            <button  wire:click="$emit('deleteTriggered', '{{ $user->uuid }}', '{{ $user->name }}')" class="btn btn-sm btn-danger">
                                Delete
                            </button>
                        </td>
                        <td>
                            <button wire:click="$emitTo('user-form', 'triggerEdit', {{ $user }})" class="btn btn-sm btn-dark">
                                Edit
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <div class="alert alert-warning">
                Your query returned zero results.
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col">
            {{ $users->links() }}
        </div>
    </div>
</div>