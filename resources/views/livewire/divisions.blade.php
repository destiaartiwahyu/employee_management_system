@section('title', 'CRUD Livewire')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <button wire:click="create()" class="btn btn-dark"><i class="fas fa-plus pr-1"></i> Add New</button>
            </div>
            <div class="col-6">
                <input type="text" wire:model="searchTerm" placeholder="Search Something..." class="form-control">
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="text-center">
                    <tr>
                        <th width="5%">No</th>
                        <th class="text-left">Base</th>
                        <th class="text-left">String</th>
                        <th width="10%" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($divisions as $list)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-left">{{ $list->name }}</td>
                        <td class="text-left">{{ $list->description }}</td>
                        <td>
                            <button wire:click="" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></button>
                        </td>
                        <td>
                            <button wire:click="" class="btn btn-sm btn-danger" onclick="confirm('Are you sure to delete?') || event.stopImmediatePropagation()"><i class="fas fa-trash"></i></button>
                        </td>
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
@endsection