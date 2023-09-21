<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PositionUser;
use App\Models\Position;
use App\Models\User;
use Livewire\WithPagination;

class PositionUsers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $isOpen = false;
    public $paginatedPerPages = 5;
    public $searchData, $pivot_id, $position_pivot_id, $user_pivot_id;


    // Reset input fields
    private function resetInputFields(){
        $this->reset([
            'pivot_id','position_pivot_id', 'user_pivot_id'
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

    public function render()
    {   $searchData = $this->searchData;
        return view('livewire.position-users', [
            'position_users' => PositionUser::whereHas('positionBelongsTo', function ($searchQuery) use ($searchData){
                $searchQuery->where([
                    ['name', 'like', '%' . $searchData . '%']
                ])->orWhere([
                    ['salary', 'like', '%' . $searchData . '%'],
                ])->orWhere([
                    ['level', 'like', '%' . $searchData . '%'],
                ]);
            })->orWhereHas('userBelongsTo', function ($searchQuery) use ($searchData){
                $searchQuery->where([
                    ['name', 'like', '%' . $searchData . '%']
                ]);
            })
            ->paginate($this->paginatedPerPages),
            'positions' => Position::get(), 
            'users' => User::get(),
        ])->extends('layouts.app');;
    }

    public function store(){
        $messages = [
            '*.required' =>  "Cannot be Blank !"
        ];

        $this->validate([
            'user_pivot_id' => ['required'],
            'position_pivot_id' => ['required']
        ]);
        PositionUser::updateOrCreate(
            ['pivot_id' => $this->pivot_id],
            ['position_pivot_id' => $this->position_pivot_id,
            'user_pivot_id' => $this->user_pivot_id]
        );
        // Show an alert
        $this->alert('success', $this->pivot_id ? 'Already Edited!' : 'Already submited!');

        // Close input form, we're going back to the list
        $this->closeModal();
    
        // Reset input fields for next input
        $this->resetInputFields();
    }

    public function edit($id){
        // Find data from the $id
        $data = PositionUser::findOrFail($id);

        // Parse data from the $post variable
        $this->pivot_id = $id;
        $this->position_pivot_id = $data->position_pivot_id;
        $this->user_pivot_id = $data->user_pivot_id;

        // Then input fields and show data
        $this->openModal();
    }

    public function delete($id){
        $data = PositionUser::where('pivot_id', $id)->firstOrFail();
        $data->find($id)->delete();
        $this->alert('warning', 'User Position has been deleted!');
    }
}
