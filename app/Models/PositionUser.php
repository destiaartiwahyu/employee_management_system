<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionUser extends Model
{
    use HasFactory;
    protected $table = "position_users";
    protected $primaryKey = "pivot_id";

    protected $fillable = [
        'position_pivot_id',
        'user_pivot_id'
    ];

    public function positionBelongsTo(){
        return $this->belongsTo('App\Models\Position', 'position_pivot_id');
    }
    public function userBelongsTo(){
        return $this->belongsTo('App\Models\User', 'user_pivot_id');
    }
}
