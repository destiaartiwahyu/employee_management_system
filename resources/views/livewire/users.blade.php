@section('title', 'User')

@if($isOpen)
<div class="card">
    <div class="card-header">
        <button wire:click="closeModal()" class="btn btn-secondary"><i class="fas fa-angle-left pr-1"></i> Back</button>
    </div>
    <form method="POST" wire:submit.prevent="store()">
        <div class="card-body">
            <div class="form-row">

                <div class="form-group col-12">
                    <label for="name">Name</label>
                    <input type="text" wire:model="name" id="name" class="form-control @error('name') is-invalid @enderror">
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group col-12">
                    <label for="name">Date Of birth</label>
                    <input type="date" wire:model="date_birth" id="date_birth" class="form-control @error('date_birth') is-invalid @enderror">
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group col-12">
                    <label for="name">Phone Number</label>
                    <input type="text" wire:model="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror">
                    @error('phone_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group col-12">
                    <label for="email">Email</label>
                    <input type="email" wire:model="email" id="email" class="form-control @error('email') is-invalid @enderror">
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group col-12">
                    <label for="password">Password</label>
                    <input type="text" wire:model="password" id="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group col-12">
                    <label for="pic">Photo</label>
                    <input type="file" wire:model="pic" id="pic" class="form-control @error('pic') is-invalid @enderror">
                    @error('pic') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>


                <div class="form-group col-12">
                    <label for="role">Role</label>
                    <select wire:model="role" class="form-control @error('role') is-invalid @enderror" required="required">
                    <option value="" selected="selected">- Select -</option>  
                    <option value="admin">Admin</option>
                        <option value="member">Member</option>
                    </select>
                    @error('role') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Textarea -->
                <div class="form-group col-12">
                    <label for="description">Address</label>
                    <textarea wire:model="address" id="address" class="form-control @error('address') is-invalid @enderror"></textarea>
                    @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
            <div class="col-6">
                <button wire:click="create()" class="btn btn-dark"><i class="fas fa-plus pr-1"></i> Add New</button>
            </div>
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
                        <th class="text-left">Date of Birth</th>
                        <th class="text-left">Age</th>
                        <th class="text-left">Address</th>
                        <th class="text-left">Role</th>
                        <th class="text-left">Phone Number</th>
                        <th class="text-left">Email</th>
                        @if(Auth::user()->role == "admin")
                        <th width="10%" colspan="2">Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($users as $list)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td class="text-left">{{ $list->name }}</td>
                        <td class="text-left">{{ $list->date_birth}}</td>
                        <td class="text-left">{{ date('Y') - date('Y',strtotime($list->date_birth))}}</td>
                        <td class="text-left">{{ $list->address }}</td>
                        <td class="text-left">{{ $list->role }}</td>
                        <td class="text-left">{{ $list->phone_number }}</td>
                        <td class="text-left">{{ $list->email }}</td>
                        @if(Auth::user()->role == "admin")
                        <td>
                            <button wire:click="edit({{ $list->id }})" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></button>
                        </td>
                        <td>
                            <button wire:click="delete({{ $list->id }})" class="btn btn-sm btn-danger" onclick="confirm('Are you sure to delete?') || event.stopImmediatePropagation()"><i class="fas fa-trash"></i></button>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($users->hasPages())
            {{ $users->links() }}
        @endif
    </div>
</div>
@endif