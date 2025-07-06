<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AfricasTalkingCredentials extends Model
{
    protected $fillable = ['username', 'api_key',];

    public function user()
    {
        return  $this->belongsTo(User::class);
    }
}
