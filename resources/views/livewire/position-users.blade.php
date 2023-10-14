@section('title', 'User Position')

@if($isOpen)
<div class="card">
    <div class="card-header">
        <button wire:click="closeModal()" class="btn btn-secondary"><i class="fas fa-angle-left pr-1"></i> Back</button>
    </div>
    <form method="POST" wire:submit.prevent="store()">
        <div class="card-body">
            <div class="form-row">
            <div class="form-group col-12">
                    <label for="user_pivot_id">User</label>
                    <select wire:model="user_pivot_id" class="form-control @error('user_pivot_id') is-invalid @enderror" required="required">
                        <option value="" selected="selected">- Select -</option>
                        @foreach($users AS $base)
                        <option value="{{ $base->id }}">{{ $base->name }}</option>
                        @endforeach
                    </select>
                    @error('user_pivot_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group col-12">
                    <label for="position_pivot_id">Division</label>
                    <select wire:model="position_pivot_id" class="form-control @error('position_pivot_id') is-invalid @enderror" required="required">
                        <option value="" selected="selected">- Select -</option>
                        @foreach($positions AS $base)
                        <option value="{{ $base->position_id }}">{{ $base->name }} -  {{ $base->level }} - {{ $base->salary }}</option>
                        @endforeach
                    </select>
                    @error('position_pivot_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

            </div>
        </div>
        <div class="card-footer text-right">
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="button" wire:click.prevent="store()" class="btn btn-success">Save</button>
        </div>
    </form>
</div>
@else
<div class="card">
    <div class="card-header">
        <div class="row">
            @if(Auth::user()->role == "admin")
                <div class="col-6">
                    <button wire:click="create()" class="btn btn-dark"><i class="fas fa-plus pr-1"></i> Add New</button>
                </div>
            @endif
            <div class="col-6">
                <input type="text" wire:model="searchData" placeholder="Search Something..." class="form-control">
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="text-center">
                    <tr>
                        <th width="5%">No</th>
                        <th class="text-left">Name</th>
                        <th class="text-left">Division</th>
                        <th class="text-left">Level</th>
                        @if(Auth::user()->role == "admin")
                        <th class="text-left">Salary</th>
                        <th width="10%" colspan="2">Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($position_users as $list)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td class="text-left">{{ $list->userBelongsTo->name }}</td>
                        <td class="text-left">{{ $list->positionBelongsTo->divisionBelongsTo->name }}</td>
                        <td class="text-left">{{ $list->positionBelongsTo->level }}</td>
                        @if(Auth::user()->role == "admin")
                        <td class="text-left">{{ number_format($list->positionBelongsTo->salary, 2, ",", ".") }}</td>
                        <td>
                            <button wire:click="edit({{ $list->pivot_id }})" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></button>
                        </td>
                        <td>
                            <button wire:click="delete({{ $list->pivot_id }})" class="btn btn-sm btn-danger" onclick="confirm('Are you sure to delete?') || event.stopImmediatePropagation()"><i class="fas fa-trash"></i></button>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($position_users->hasPages())
            {{ $position_users->links() }}
        @endif
    </div>
</div>
@endif