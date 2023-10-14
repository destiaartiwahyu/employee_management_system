@section('title', 'Division')

@if($isOpen)
<div class="card">
    <div class="card-header">
        <button wire:click="closeModal()" class="btn btn-secondary"><i class="fas fa-angle-left pr-1"></i> Back</button>
    </div>
    <form method="POST" wire:submit.prevent="store()">
        <div class="card-body">
            <div class="form-row">

                <!-- String -->
                <div class="form-group col-12">
                    <label for="name">Name</label>
                    <input type="text" wire:model="name" id="name" class="form-control @error('name') is-invalid @enderror">
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Textarea -->
                <div class="form-group col-12">
                    <label for="description">Description</label>
                    <textarea wire:model="description" id="description" class="form-control @error('description') is-invalid @enderror"></textarea>
                    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                        <th class="text-left">Description</th>
                        @if(Auth::user()->role == "admin")
                        <th width="10%" colspan="2">Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($divisions as $list)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td class="text-left">{{ $list->name }}</td>
                        <td class="text-left">{{ $list->description }}</td>
                        @if(Auth::user()->role == "admin")
                        <td>
                            <button wire:click="edit({{ $list->division_id }})" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></button>
                        </td>
                        <td>
                            <button wire:click="delete({{ $list->division_id }})" class="btn btn-sm btn-danger" onclick="confirm('Are you sure to delete?') || event.stopImmediatePropagation()"><i class="fas fa-trash"></i></button>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($divisions->hasPages())
            {{ $divisions->links() }}
        @endif
    </div>
</div>
@endif