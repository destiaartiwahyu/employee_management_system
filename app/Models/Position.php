<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $table = "positions";
    protected $primaryKey = "position_id";
    protected $fillable = [
        'name',
        'salary',
        'level',
        'division_position_id',
        'description'
    ];

    public function divisionBelongsTo(){
        return $this->belongsTo('App\Models\Division', 'division_position_id');
    }

    public function userHasMany(){
        return $this->hasMany('App\Models\User', 'position_user_id');
    }
}
