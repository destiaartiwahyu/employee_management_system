<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Division;
use Livewire\WithPagination;

class Divisions extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.divisions', [
            'divisions' => Division::where('name', 'like', '%'.$this->search.'%')->paginate(5)
        ]);
    }
}
