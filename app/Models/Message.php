<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['num_recipients', 'num_delivered',  'content'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function recipients()
    {
        return $this->belongsToMany(Contact::class, 'message_recipients')
            ->withPivot('delivered')
            ->withTimestamps();
    }
}
