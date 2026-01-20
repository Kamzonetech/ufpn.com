<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'surname',
        'othernames',
        'email',
        'phone',
        'role',
        'bio',
        'member_status',
        'photo',
        'linkedin',
        'twitter',
        'instagram',
        'facebook',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
