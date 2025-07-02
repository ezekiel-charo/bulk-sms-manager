<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['first_name', 'last_name', 'phone_number'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deliveryReports()
    {
        return $this->hasMany(DeliveryReport::class);
    }

    public function recipients()
    {
        return $this->hasMany(MessageRecipient::class);
    }
}
