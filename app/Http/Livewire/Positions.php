<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Position;
use App\Models\Division;

class Positions extends Component
{
    use WithPagination;
    protected $pagination_theme = 'boostrap';
    public $isOpen = false;
    public $paginatedPerPages = 5;
    public $searchData, $position_id, $name, $salary, $description, $division_position_id, $level;

    private function resetInputFields(){
        $this->reset([
            'position_id', 'name', 'description', 'salary', 'division_position_id', 'level'
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
    {       
        return view('livewire.positions', [
            'positions' => Position::where('name', 'like', '%'.$this->searchData.'%')
            ->orWhere('level', 'like', '%'.$this->searchData.'%')
            ->orWhere('description', 'like', '%'.$this->searchData.'%')
            ->paginate($this->paginatedPerPages),'division' => Division::get(),
        ])->extends('layouts.app');;
    }

    public function store(){
        $messages = [
            '*.required' =>  "Cannot be Blank !",
            '*.numeric'   => "Must number !"
        ];

        $this->validate([
            'name' => ['required'],
            'salary' => ['required', 'numeric'],
            'description' => ['required'],
            'level' => ['required']
        ]);
        Position::updateOrCreate(
            ['position_id' => $this->position_id],
            [
            'name' => $this->name, 'description' => $this->description, 'salary' => $this->salary, 
            'division_position_id' => $this->division_position_id, 'level'=> $this->level
            ]
        );
        // Show an alert
        $this->alert('success', $this->position_id ? 'Already Edited!' : 'Already submited!');

        // Close input form, we're going back to the list
        $this->closeModal();
    
        // Reset input fields for next input
        $this->resetInputFields();
    }

    public function edit($id){
        // Find data from the $id
        // dd($id);
        $data = Position::findOrFail($id);

        // Parse data from the $post variable
        $this->position_id = $id;
        $this->division_position_id = $data->division_position_id;
        $this->name = $data->name;
        $this->description = $data->description;
        $this->salary = $data->salary;
        $this->level = $data->level;

        // Then input fields and show data
        $this->openModal();
    }

    public function delete($id){
        $data = Position::where('position_id', $id)->firstOrFail();
        $data->find($id)->delete();
        $this->alert('warning', 'Position has been deleted!');
    }

}
