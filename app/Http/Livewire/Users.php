<?php

namespace App\Http\Livewire;

// First let's load Livewire trait
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

// Let's load an alert
use Jantinnerezo\LivewireAlert\LivewireAlert;

// Now we need a Laravel Facades
use Illuminate\Support\Facades\Storage;

// I usualy place 'Model' here
use App\Models\User;

class Users extends Component{
    // Load addon trait
    use WithPagination, WithFileUploads;

    // Bootsrap pagination
    protected $paginationTheme = 'bootstrap';

    // Public variable
    public $isOpen = 0;
    public $paginatedPerPages = 5;
    public $user_id, $searchData, $name, $date_birth, $phone_number, $pic, $address, $password, $email, $role;

    // View
    public function render(){
        return view('livewire.users', [
            
            // Lists
            'users' => User::where('name', 'like','%'.$this->searchData.'%')
            ->paginate($this->paginatedPerPages)
        ])->extends('layouts.app');
    }

    // Reset input fields
    private function resetInputFields(){
        $this->reset([
            'user_id', 'name', 'password', 'phone_number', 'date_birth', 'pic', 'address', 'password', 'email', 'role'
        ]);
    }

    // Open input form
    public function openModal(){
        $this->isOpen = true;
    }

    // Close input form
    public function closeModal(){
        $this->isOpen = false;
    }

    // Open input form and then reset input fields
    public function create(){
        $this->openModal();
        $this->resetInputFields();
    }

    // Save data
    public function store(){
        // Send a custom message if something is error
        $messages = [
            '*.required'                => 'This column is required',
            '*.numeric'                 => 'This column is required to be filled in with number',
            '*.string'                  => 'This column is required to be filled in with letters',
        ];

        // Validate input with custom message
        $this->validate([
            'name'      => ['required'],
            'email'    => ['required'],
            'phone_number' => ['required'],
            'pic' => ['required']
        ], $messages); // Delete this '$messages' variable if you don't want to use the custom message validator

        // Photo Name with Regex - Replace anything weird with underscore
        $pic_name = time().'_'.strtolower(preg_replace('/\s+/', '_', $this->pic->getClientOriginalName()));

        // Upload Photo if this is a 'Create'
        if($this->user_id == false){
            $this->pic->storeAs('public/asset/image', $pic_name);
        }

        // Delete Existing Photo and then Upload the New One if this is an 'Update'
        elseif($this->user_id == true){
            // Find existing photo
            $sql = User::select('id', 'pic')->where('id', $this->user_id)->firstOrFail();
            
            // Then delete it
            File::delete('storage/asset/image/' . $sql->pic);
            
            // And upload the new one
            $this->pic->storeAs('public/asset/image', $photo_name);
        }

        // Insert or Update if Ok
        $user = User::updateOrCreate(['id' => $this->user_id], [
            'name'      => $this->name,
            'pic'    => $pic_name,
            'date_birth'    => $this->date_birth,
            'address' => $this->address,
            'email' => $this->email,
            'role' => $this->role,
            'phone_number' => $this->phone_number
        ]);

        if($this->password == null){
            $user->password = Hash::make($this->password);
            $user->save();
        }
        // Show an alert
        $this->alert('success', $this->id ? 'Edited, mate!' : 'Cool, submited!');

        // Close input form, we're going back to the list
        $this->closeModal();

        // Reset input fields for next input
        $this->resetInputFields();
    }

    // Parse data to input form
    public function edit($id){
        // Find data from the $id
        $post = User::findOrFail($id);
// dd(Crypt::::decryptString(Crypt::encryptString("tes")));
        // Parse data from the $post variable
        $this->user_id = $id;
        $this->email = $post->email;
        $this->phone_number = $post->phone_number;
        $this->name = $post->name;
        $this->date_birth = $post->date_birth;
        $this->role = $post->role;
        $this->pic = $post->pic;
        $this->address = $post->address;

        // Then input fields and show data
        $this->openModal();
    }

    // Delete data
    public function delete($id){
        // Find existing photo
        $sql = User::where('id', $id)->firstOrFail();

        // Delete Data from DB
        $sql->find($id)->delete();

        // Then delete it
        Storage::delete('public/asset/image/' . $sql->pic);

        // Show an alert
        $this->alert('warning', 'Alright, deleted!');
    }
}
