<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Division;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Divisions extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $isOpen = false;
    public $paginatedPerPages = 5;
    public $searchData, $division_id, $name, $description;


    // Reset input fields
    private function resetInputFields(){
        $this->reset([
            'division_id', 'name', 'description'
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
        return view('livewire.divisions', [
            'divisions' => Division::where('name', 'like', '%'.$this->searchData.'%')->paginate($this->paginatedPerPages)
        ])->extends('layouts.app');;
    }

    public function store(){
        $messages = [
            '*.required' =>  "Cannot be Blank !"
        ];

        $this->validate([
            'name' => ['required'],
            'description' => ['required']
        ]);
        Division::updateOrCreate(
            ['division_id' => $this->division_id],
            ['name' => $this->name, 'description' => $this->description]
        );
        // Show an alert
        $this->alert('success', $this->division_id ? 'Already Edited!' : 'Already submited!');

        // Close input form, we're going back to the list
        $this->closeModal();
    
        // Reset input fields for next input
        $this->resetInputFields();
    }

    public function edit($id){
        // Find data from the $id
        $data = Division::findOrFail($id);

        // Parse data from the $post variable
        $this->division_id = $id;
        $this->name = $data->name;
        $this->description = $data->description;

        // Then input fields and show data
        $this->openModal();
    }

    public function delete($id){
        $data = Division::where('division_id', $id)->firstOrFail();
        $data->find($id)->delete();
        $this->alert('warning', 'Division has been deleted!');
    }
}
