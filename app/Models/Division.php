<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    protected $table = 'divisions';
    protected $primaryKey = 'division_id';
    protected $fillable = [
        'name',
        'description',
    ];
    public function divisionHasMany(){
        return $this->hasMany('App\Models\Positions', 'division_position_id');
    }
}
