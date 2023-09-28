<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Division;
use App\Models\Position;
use App\Models\PositionUser;
use App\Models\User;

class Dashboard extends Component {
   
    public function render(){
        return view('welcome',[
            'total_user' => User::count(),
            'total_position' => Position::count(),
            'total_division' => Division::count(),
            'total_user_position' => PositionUser::count(),
            'user_limit' => User::select('id', 'name', 'email','phone_number', 'role')->limit(5)->get(),
            'position_limit' => Position::limit(5)->get(),
            'division_limit' => Division::select('division_id','name','description')->limit(5)->get(),
            'user_position_limit' => PositionUser::limit(5)->get()
        ])->extends('layouts.app');;

    }
}
?>