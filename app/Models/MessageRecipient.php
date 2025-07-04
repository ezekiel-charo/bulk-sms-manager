<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageRecipient extends Model
{
    protected $fillable = ['message_id', 'contact_id', 'delivered'];

    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}
